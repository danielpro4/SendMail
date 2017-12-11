<?php

use App\Message;
use App\User;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * @author Daniel Pérez Atanacio<daniel@goplek.com>
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
        factory(Message::class, 500)->create();
    }
}
