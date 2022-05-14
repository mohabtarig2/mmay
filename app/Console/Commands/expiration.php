<?php

namespace App\Console\Commands;

use App\Tconstr;
use App\User;
use Illuminate\Console\Command;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tconstr:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire every 5 minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $users = Tconstr::where('status',0)->get();

       foreach($users as $user){
           $user->update(['status'=>5]);
       }
    }
}
