<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    private $sort = [
        'name' => [
            'a' => 'name ASC ',
            'b' => 'name DESC '
        ],
        'reg' => [
            'a' => 'created_at DESC ',
            'b' => 'created_at ASC '
        ],
    ];

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $order_by = '';
        if (isset($_GET['name']) && isset($this->sort['name'][$_GET['name']])) {
            $data['sort']['name'] = $_GET['name'];
            $order_by .= $this->sort['name'][$_GET['name']];
        }

        if (isset($_GET['reg']) && isset($this->sort['reg'][$_GET['reg']])) {
            $data['sort']['reg'] = $_GET['reg'];
            $order_by .= $this->sort['reg'][$_GET['reg']];
        }
        if (!empty($order_by)) {
            $users = DB::table('users')->orderByRaw($order_by)->get();
        } else {
            $users = DB::table('users')->get();
        }
        $usersData = [];
        foreach ($users as $user) {
            $usersData[] = $this->getUserData($user);
        }
        $data['users'] = $usersData;
        return view('users', $data);
    }

    public function card($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $data['user'] = $this->getUserData($user);

        $data['posts'] = DB::table('posts')->get();
        $data['skills'] = DB::table('skills')->get();

        return view('card', $data);
    }

    public function editPost(Request $request, $id): RedirectResponse
    {
        $postData = $request->all();
        if ($this->Verification($postData, 'user_edit_post')) {
            DB::table('users')
                ->where('id', $id)
                ->update(['post' => $postData['post_id']]);
        }
        return redirect()->route('card', ['id' => $id]);
    }

    public function editSkills(Request $request, $id): RedirectResponse
    {
        $skillsData = $request->all();
        if ($this->Verification($skillsData, 'user_edit_skills')) {
            $maxCount = 5;
            $count = 0;

            DB::table('user_skills')->where('user_id', $id)->delete();

            foreach ($skillsData['skills'] as $skill) {
                if ($count >= $maxCount) break;

                DB::table('user_skills')->insert(
                    ['user_id' => $id, 'skill_id' => $skill]
                );
                $count++;
            }
        }

        return redirect()->route('card', ['id' => $id]);
    }

    public function setAdmin($id): RedirectResponse
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['group' => 2]);
        return redirect()->route('card', ['id' => $id]);
    }

}
