@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('auth.sortTitle') }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item @if(isset($sort['name']) && $sort['name'] == 'a') bg-primary text-white @endif" href="{{route('users')}}?name=a">{{ __('auth.sortNameAsc') }}</a></li>
                        <li><a class="dropdown-item @if(isset($sort['name']) && $sort['name'] == 'b') bg-primary text-white @endif" href="{{route('users')}}?name=b">{{ __('auth.sortNameDesc') }}</a></li>
                        <li><a class="dropdown-item @if(isset($sort['reg']) && $sort['reg'] == 'a') bg-primary text-white @endif" href="{{route('users')}}?reg=a">{{ __('auth.sortRegDesc') }}</a></li>
                        <li><a class="dropdown-item @if(isset($sort['reg']) && $sort['reg'] == 'b') bg-primary text-white @endif" href="{{route('users')}}?reg=b">{{ __('auth.sortRegAsc') }}</a></li>
                    </ul>
                </div>
                <button class="btn btn-primary">Фильтр</button>
            </div>
        </div>
        <div class="row">
            @foreach($users as $user)
                <div class="col-sm-6">
                    <div class="card" style="margin-top: 20px;">
                        <div class="card-body">
                            <h5 class="card-title">@guest**** ****@else{{$user['name']}}@endguest</h5>
                            <p class="card-text">
                                @if(isset($user['post'])){{$user['post']}}@else{{ __('auth.NotEnoughPost') }}@endif
                                @if(isset($user['skills'])) - {{implode(', ',$user['skills'])}}@endif
                            </p>
                            @auth
                                <a href="{{ url('/card/'.$user['id']) }}" class="btn btn-primary">Перейти в карточку</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

