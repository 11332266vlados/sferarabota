<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * Вывод всех должностей
     *
     */
    public function index()
    {
        $data['posts'] = DB::table('posts')->get();
        return view('posts', $data);
    }

    /**
     *
     * Страница, получающая и передающая данные для создания должностей
     *
     * @param Request $request
     */
    public function add(Request $request)
    {
        $this->add_type($request,'posts');
        return redirect('posts');
    }


    /**
     *
     * Страница, получающая и передающая данные для редактирования должностей
     *
     * @param Request $request
     */
    public function edit(Request $request)
    {
        $this->edit_type($request,'posts');
        return redirect('posts');
    }

    /**
     *
     * Страница, получающая и передающая данные для удаления должностей
     *
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $this->delete_type($request,'posts');
        return redirect('posts');
    }
}
