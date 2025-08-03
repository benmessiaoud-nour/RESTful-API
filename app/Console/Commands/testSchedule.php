<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class testSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test teh schedule for the user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //contains the logic
        $user =User::first();
        log::info('Hello' .$user->name);
    }
}
