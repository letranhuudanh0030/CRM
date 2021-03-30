<?php

namespace App\Mail;

use App\Maintenance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Maintenance $task)
    {
        $this->task = $task;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd(123);
        return $this->markdown('emails.tasks.created', [
            'url' => config('app.url')."/task/".$this->task->id."/detail"
        ]);
    }
}
