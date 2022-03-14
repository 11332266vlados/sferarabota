<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * Вывод всех навыков
     *
     */
    public function index()
    {
        $data['skills'] = DB::table('skills')->get();
        return view('skills',$data);
    }

    /**
     *
     * Страница, получающая и передающая данные для создания навыков
     *
     * @param Request $request
     */
    public function add(Request $request)
    {
        $this->add_type($request,'skills');
        return redirect('skills');
    }

    /**
     *
     * Страница, получающая и передающая данные для изменения навыков
     *
     * @param Request $request
     */
    public function edit(Request $request)
    {
        $this->edit_type($request,'skills');
        return redirect('skills');
    }

    /**
     *
     * Страница, получающая и передающая данные для удаления навыков
     *
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $this->delete_type($request,'skills');
        return redirect('skills');
    }
}
