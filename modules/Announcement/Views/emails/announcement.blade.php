@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            @switch($user->role_id)
                @case ('1')
                    <h3 class="email-headline"><strong>{{__('Hello Administrator')}}</strong></h3>
                @break
                @case ('2')
                    <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$user->nameOrEmail ?? ''])}}</strong></h3>
                @break

                @case ('3')
                    <h3 class="email-headline"><strong>{{__('Hello :name',['name'=>$user->nameOrEmail ?? ''])}}</strong></h3>
                @break
            @endswitch
            <p>{!! $announcement->content !!}</p>
            @if($announcement->image_id > 0)
                <img src="{{get_file_url($announcement->image_id,'full')}}" class="img-fluid" alt="image">
            @endif
        </div>
    </div>
@endsection