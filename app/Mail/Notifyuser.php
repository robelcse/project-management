<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notifyuser extends Mailable
{
    use Queueable, SerializesModels;
    public $today_attendance = [];
    public $total_working_hour;
    public $total_breakout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($today_attendance, $total_working_hour, $total_breakout)
    {
        $this->today_attendance = $today_attendance;
        $this->total_working_hour = $total_working_hour;
        $this->total_breakout = $total_breakout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attendances = $this->today_attendance;
        $total_working_hour = $this->total_working_hour;
        $total_breakout = $this->total_breakout;
        return $this->view('mail.usernotify', compact('attendances', 'total_working_hour', 'total_breakout'));
    }
}
