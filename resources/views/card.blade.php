@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h5>{{$user['name']}}</h5>
            <div class="row g-3 align-items-center">
                <div class="col-sm-3 text-center">
                    <label for="inputPassword6" class="col-form-label">имя</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="{{$user['email']}}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-sm-3 text-center">
                    <label for="inputPassword6" class="col-form-label">телефон</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control" value="{{$user['phone']}}">
                </div>
            </div>
            @if(isset($user['post']))
                <div class="row g-3 align-items-center">
                    <div class="col-sm-3 text-center">
                        <label for="inputPassword6" class="col-form-label">должность</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control" value="{{$user['post']}}">
                    </div>
                </div>
            @endif
            @if(isset($user['skills']))
                <div class="row g-3 align-items-center">
                    <div class="col-sm-3 text-center">
                        <label for="inputPassword6" class="col-form-label">Навыки</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control" value="{{implode(', ',$user['skills'])}}">
                    </div>
                </div>
            @endif
        </div>
        @if(Auth::user()->group == 2)
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-block btn-success"  data-bs-toggle="modal" data-bs-target="#userPostEditModal">Редактировать должность</button>
                    <button class="btn btn-block btn-success"  data-bs-toggle="modal" data-bs-target="#userSkillsEditModal">Редактировать Умения</button>
                    @if($user['group'] != 2)
                        <button class="btn btn-block btn-success"  data-bs-toggle="modal" data-bs-target="#userAdminAddModal">Сделать администратором</button>
                    @endif
                </div>
            </div>
            @include('modals/user_post_edit')
            @include('modals/user_skills_edit')
            @include('modals/user_admin_add')
        @endif
    </div>
@endsection
