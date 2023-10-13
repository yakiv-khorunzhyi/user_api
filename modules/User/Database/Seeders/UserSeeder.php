<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        (new UserFactory())->count(env('TEST_DATA_COUNT'))->create();
    }
}
