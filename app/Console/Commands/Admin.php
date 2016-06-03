<?php

namespace App\Console\Commands;

use App\Model\User;
use Illuminate\Console\Command;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:set {--force} {username} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set admin';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $username = $this->argument('username');
        $email = $this->argument('email');
        $password = $this->argument('password');
        if(User::all()->count() && !$this->option('force')){
            echo "there is already have a admin\n";
            return 1;
        }else{
            if($this->option('force')){
                \DB::statement('TRUNCATE TABLE users;');
            }
            User::create([
                'name' => $username,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
            echo "done\n";
            return 0;
        }
    }
}
