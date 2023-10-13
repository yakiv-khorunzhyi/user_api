<?php

use Illuminate\Database\Migrations\Migration;
use Modules\User\Entities\User;

return new class extends Migration
{
    public function up()
    {
        User::create([
            'first_name'        => 'Admin',
            'last_name'         => '',
            'email'             => env('ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }

    public function down()
    {
        User::where('email', env('ADMIN_EMAIL'))->first()->forceDelete();
    }
};
