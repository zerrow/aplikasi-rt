<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id_warga' => 1,
                'id_bagian' => 6,
                'tipe' => 'RT',
                'username' => 'tomi312',
                'password' => Hash::make('tomi1992'),
            ],
            [
                'id_warga' => 2,
                'id_bagian' => 6,
                'tipe' => 'RW',
                'username' => 'zenal',
                'password' => Hash::make('zenal321'),
            ],
        ];

        foreach ($user as $value) {
            User::create($value);
        }
    }
}
