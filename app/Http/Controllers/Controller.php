<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     *
     * Метод верификации данных, приходящих от пользователя.
     *
     * @param array $data
     * @param string $type
     */
    protected function Verification(array $data, string $type): bool
    {
        $return = true;
        switch ($type) {
            case 'add':
                if (!isset($data['name']) || empty($data['name'])) $return = false;
                break;
            case 'edit':
                if (!isset($data['id']) || !isset($data['name'])) $return = false;
                if (empty($data['id']) || empty($data['name'])) $return = false;
                break;
            case 'delete':
                if (!isset($data['id'])) $return = false;
                break;
            case 'user_edit_post':
                if (!isset($data['post_id'])) $return = false;
                break;
            case 'user_edit_skills':
                if (!isset($data['skills'])) $return = false;
                break;
        }
        if (!$return) {
            session(['dataVerificationError' => 'Проверьте, все ли данные введены верно.']);
        }
        return $return;
    }

    /**
     *
     * Метод создания сущности.
     *
     * @param Request $request
     * @param string $type
     */
    public function add_type(Request $request, string $type)
    {
        $saveData = $request->all();
        if ($this->Verification($saveData, 'save')) {
            DB::table($type)->insert(
                ['name' => $saveData['name']]
            );
        }
    }

    /**
     *
     * Метод изменения сущности.
     *
     * @param Request $request
     * @param string $type
     */
    public function edit_type(Request $request, string $type)
    {
        $editData = $request->all();
        if ($this->Verification($editData, 'edit')) {
            DB::table($type)
                ->where('id', $editData['id'])
                ->update(['name' => $editData['name']]);
        }
    }

    /**
     *
     * Метод удаления сущности.
     *
     * @param Request $request
     * @param string $type
     */
    public function delete_type(Request $request, string $type)
    {
        $deleteData = $request->all();
        if ($this->Verification($deleteData, 'delete')) {
            DB::table($type)->where('id', $deleteData['id'])->delete();
            switch ($type) {
                case 'posts':
                    DB::table('users')
                        ->where('post', $deleteData['id'])
                        ->update(['post' => '']);
                    break;
                case 'skills':
                    DB::table('user_skills')->where('skill_id', $deleteData['id'])->delete();
                    break;
            }
        }
    }

    /**
     *
     * Метод получения и структурирования конкретных данных о пользователе
     *
     * @param object $user
     * @return array
     */
    protected function getUserData($user): array
    {
        $userPost = DB::table('posts')->where('id', $user->post)->first();
        $userSkills = DB::table('user_skills')
            ->leftJoin('skills', 'user_skills.skill_id', '=', 'skills.id')
            ->where('user_id', $user->id)->get();
        $inData = [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'group' => $user->group,
        ];
        if ($userPost) $inData['post'] = $userPost->name;

        if ($userSkills) {
            foreach ($userSkills as $skill) {
                $inData['skills'][] = $skill->name;
            }
        }
        return $inData;
    }

    /**
     *
     * Метод получения всех пользователей в зависимости от фильтров и сортировки
     *
     * @param array $filter
     * @param string $order_by
     * @return object
     */
    protected function getUsers(array $filter, string $order_by)
    {
        $query = DB::table('users')->select('users.*');
        if (isset($filter['filter'])) {
            switch ($filter['filter']) {
                case 'forPost':
                    $val = (int)$filter['post_id'];
                    $query->where('post', $val);
                    break;
                case 'forSkills':
                    $val = (int)$filter['skill_id'];
                    $query->leftJoin('user_skills', 'users.id', '=', 'user_skills.user_id');
                    $query->where('user_skills.skill_id', $val);
                    break;
                case 'forWord':
                    $val = htmlspecialchars($filter['word']);

                    $query->leftJoin('user_skills', 'users.id', '=', 'user_skills.user_id');
                    $query->leftJoin('skills', 'skills.id', '=', 'user_skills.skill_id');
                    $query->leftJoin('posts', 'posts.id', '=', 'users.post');
                    $query->where('skills.name', 'like', '%' . $val . '%');
                    $query->orWhere('posts.name', 'like', '%' . $val . '%');
                    $query->orWhere('users.name', 'like', '%' . $val . '%');

                    break;
            }
        }

        if (!empty($order_by)) {
            $query->orderByRaw($order_by)->get();
        }

        return $query->distinct()->get();
    }
}
