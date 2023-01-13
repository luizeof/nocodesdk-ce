<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Actions\Fortify\CreateNewUser;

class DefaultUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup:user {email} {pass}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Default User for Your App';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if (User::exists() == false) {

            $email = $this->argument("email");
            $pass = $this->argument("pass");

            (new CreateNewUser())->create([
                'name' => 'Admin',
                'email' => $email,
                'password' => $pass,
                'password_confirmation' => $pass,
                'terms' => true,
            ]);
        }

        return Command::SUCCESS;
    }
}
