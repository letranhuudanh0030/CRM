<?php

namespace App\Jobs;

use App\Mail\TaskCreated;
use App\Maintenance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $task;
    protected $mailAddress;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Maintenance $task, String $mailAddress)
    {
        $this->task = $task;
        $this->mailAddress = $mailAddress;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new TaskCreated($this->task);
        Mail::to($this->mailAddress)->send($email);
    }
}
