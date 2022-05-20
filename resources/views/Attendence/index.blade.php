@extends('layout.app')
<style>
    .attendance-btn {
        pointer-events: none;
        background: #d22d3d !important;
        border-color: #d22d3d !important;
        color: #fff !important;
    }
</style>


@section('content')


     @php

      if(is_null($today_attendance)){
        $today_attendance_breakin = NULL;
        $today_attendance_breakout = NULL;
        $today_attendance_logout = NULL;
      }else{
        $today_attendance_breakin  = $today_attendance->breakin;
        $today_attendance_breakout = $today_attendance->breakout;
        $today_attendance_logout = $today_attendance->logout;
      }

     @endphp

    <a href="{{ route('attendence.login') }}" class="btn btn-outline-primary {{ $today_attendance != NULL ? 'attendance-btn':''  }}">Login</a>
    <a href="{{ route('attendence.breakin') }}" class="btn btn-outline-primary {{ $today_attendance_breakin == NULL && $today_attendance != NULL ? '':'attendance-btn'}}">Breakin</a> 
    <a href="{{ route('attendence.breakout') }}" class="btn btn-outline-primary {{ $today_attendance_breakin != NULL && $today_attendance_breakout == NULL ? '':'attendance-btn'  }}">Breakout</a>
    <a href="{{ route('attendence.logout') }}" class="btn btn-outline-primary {{ $today_attendance_breakout != NULL && $today_attendance_logout == NULL ? '':'attendance-btn' }}">Logout</a>
 

<br>
<br>
<br>

@if($attendance != NULL)
@php

    if($attendance->login != NULL){
       $login_time = date("H:i:s d M, Y",$attendance->login);
    }else{
       $login_time = "00:00:00";
    }

    if($attendance->breakin != NULL){
       $breakin_time = date("H:i:s d M, Y",$attendance->breakin);
    }else{
       $breakin_time = "00:00:00";
    }

    if($attendance->breakout != NULL){
       $breakout_time = date("H:i:s d M, Y",$attendance->breakout);
    }else{
       $breakout_time = "00:00:00";
    }

    if($attendance->logout != NULL){
        $logout_time = date("H:i:s d M, Y",$attendance->logout);
    }else{
        $logout_time = "00:00:00";
    }

@endphp

<form class="card" method="post" action="">
    @csrf
    <div class="card-body">
        <div class="row">

            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Login Time</label>
                    <input class="form-control" name="user_name" value="{{ $login_time }}" readonly />

                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Breakin Time</label>
                    <input class="form-control" name="user_email" value="{{ $breakin_time }}" readonly />
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Breakout Time</label>
                    <input class="form-control" name="phone" value="{{ $breakout_time }}" readonly />

                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Logout Time</label>
                    <input class="form-control" name="phone" value="{{ $logout_time }}" readonly />

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</form>

@endif



@endsection