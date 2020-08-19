<?php

use Illuminate\Database\Seeder;
use Laravel\Passport\Client;

class OauthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'MSC Back Test Grant Client',
            'secret' => 'nfZK7MXvaiChUEo0li8GZEO56AqAAi6U8b172KHN',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0
        ]);
    }
}
