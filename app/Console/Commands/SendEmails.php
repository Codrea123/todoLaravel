<?php

namespace App\Console\Commands;

use App\Mail\TaskReminder;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send task reminder emails';

    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            foreach($user->tasks as $task) {
                if ($task->shouldSendReminder()) {
                    Mail::to($user->email)->send(new TaskReminder($task));
                }
            }
        }
    }
}
