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

    public function index()
    {
        $data['skills'] = DB::table('skills')->get();
        return view('skills',$data);
    }

    public function add(Request $request)
    {
        $this->add_type($request,'skills');
        return redirect('skills');
    }

    public function edit(Request $request)
    {
        $this->edit_type($request,'skills');
        return redirect('skills');
    }

    public function delete(Request $request)
    {
        $this->delete_type($request,'skills');
        return redirect('skills');
    }
}
