<?php

namespace App\Console\Commands;

use App\User;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Addadmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add account with admin role';

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
        $name = $this->ask('Input name : ');
        $email = $this->ask('Input your email : ');
        $password = $this->secret('Input your password');
        
        if($this->confirm('Are you sure ?')){
            $admin = new User();
            $admin->name = $name;
            $admin->status = 'admin';
            $admin->email = $email;
            $admin->password = Hash::make($password);
            
            try {
                $this->save();
                $this->info('Account created Successfully');
                
            } catch (Exception $e) {
                $this->error('Error!! check your input');
            }

        }else{
            $this->error('Canceled');
        }
    }
}
