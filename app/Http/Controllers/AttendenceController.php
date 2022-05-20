<?php

namespace App\Http\Controllers;



use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Notifyuser;
use Illuminate\Support\Facades\Mail;


class AttendenceController extends Controller
{

    /**
     * Show attendence page
     * 
     * @return \Illuminate\View
     */

    public function index()
    {

        $attendance = Attendance::where('user_id', Auth::user()->user_id)->orderBy('attendance_id', 'DESC')->first();
        $today_attendance = Attendance::where('user_id', Auth::user()->user_id)->whereDate('created_at', Carbon::today())->orderBy('attendance_id', 'DESC')->first();
        return view('Attendence.index', compact('attendance', 'today_attendance'));
    }


    /**
     * 
     * employee login 
     * 
     * @return Boolen
     * 
     */

    public function login()
    {

        $login_time = time();
        $attendence = new Attendance();
        $attendence->login = $login_time;
        $attendence->user_id = Auth::user()->user_id;
        $attendence->save();
        return redirect()->back();
    }

    /**
     * 
     * employee breakin 
     * 
     * @return Boolen
     * 
     */

    public function breakin()
    {
        $breakin_time = time();
        $attendence = Attendance::where('user_id', Auth::user()->user_id)->orderBy('attendance_id', 'DESC')->first();
        $attendence->breakin = $breakin_time;
        $attendence->save();
        return redirect()->back();
    }
    /**
     * 
     * employee breakout 
     * 
     * @return Boolen
     * 
     */

    public function breakout()
    {
        $breakout_time = time();
        $attendence = Attendance::where('user_id', Auth::user()->user_id)->orderBy('attendance_id', 'DESC')->first();
        $attendence->breakout = $breakout_time;
        $attendence->save();
        return redirect()->back();
    }

    /**
     * 
     * employee logout 
     * 
     * @return Boolen
     * 
     */

    public function logout()
    {
        //save logout time of today
        $logout_time = time();
        $attendence  = Attendance::where('user_id', Auth::user()->user_id)->orderBy('attendance_id', 'DESC')->first();
        $attendence->logout = $logout_time;
        $attendence->save();

        //get authenticated user today attendance information
        $daily_attendance_info = Attendance::where('user_id', Auth::user()->user_id)->orderBy('attendance_id', 'DESC')->first();

        $time_of_login      = date("H:i:s", $daily_attendance_info->login);
        $time_of_breakin    = date("H:i:s", $daily_attendance_info->breakin);
        $time_of_breakout   = date("H:i:s", $daily_attendance_info->breakout);
        $time_of_logout     = date("H:i:s", $daily_attendance_info->logout);

        //today attendance array
        $today_attendance =  [$time_of_login, $time_of_breakin, $time_of_breakout, $time_of_logout];





        $before_breakin = $daily_attendance_info->breakin - $daily_attendance_info->login;
        $after_breaking = $daily_attendance_info->logout - $daily_attendance_info->breakout;

        $total_working_hour = date("H:i:s", $before_breakin + $after_breaking);
        $total_breakout = date("H:i:s", $daily_attendance_info->breakout - $daily_attendance_info->breakin);

        $attendence  = Attendance::where('user_id', Auth::user()->user_id)->orderBy('attendance_id', 'DESC')->first();
        $attendence->total_hours = $total_working_hour;
        $attendence->total_breakout = $total_breakout;
        $attendence->save();

        Mail::to(Auth::user()->user_email)->send(new Notifyuser($today_attendance, $total_working_hour, $total_breakout));
        return redirect()->back();
    }
}
