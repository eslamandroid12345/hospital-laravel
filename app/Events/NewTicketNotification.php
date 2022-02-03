<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTicketNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;




    public $phone;
    public $patient_address;
    public $operation;
    public $user;
    public $date;

    public function __construct($data = [])
    {
        $this->phone = $data['phone'];
        $this->patient_address = $data['patient_address'];
        $this->operation = $data['operation'];
        $this->user = $data['user'];
        $this->date = Carbon::now('Africa/Cairo');
    }


    public function broadcastOn()
    {
        return new Channel('new-notification');
    }
}
