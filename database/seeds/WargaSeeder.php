<?php

use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warga = [
            [
                'id'=>1,
                'id_bagian' => 6,
                'nama' => 'Tomi Andreas',
                'nik' => '3578101312860312',
                'tgl_lahir' => '1992-05-02',
                'no_hp' => '081210801913',
                'jkel' => 'L',
                'status_kawin' => 'sudah',
                'no_kk' => '0000000000000',
                'agama' => 'Islam',
                'pendidikan' => 'Strata 1',
                'pekerjaan' => 'Karyawan Swasta',
                'kewarganegaraan' => 'WNI',
                'kedudukan_keluarga' => 'Kepala',
                'alamat' => 'Dakota D5 No. 2',
                'alamat_ktp' => 'Jl. Buaran 2, Klender'
            ],
            [
                'id'=>2,
                'id_bagian' => 6,
                'nama' => 'Zenal Mutaqn',
                'nik' => '0000000000',
                'tgl_lahir' => '1984-10-12',
                'no_hp' => '000000000',
                'jkel' => 'L',
                'status_kawin' => 'sudah',
                'no_kk' => '0000000000000',
                'agama' => 'Islam',
                'pendidikan' => 'Strata 1',
                'pekerjaan' => 'Karyawan Swasta',
                'kewarganegaraan' => 'WNI',
                'kedudukan_keluarga' => 'Kepala',
                'alamat' => 'Dakota D5 No. 3A',
                'alamat_ktp' => 'Dakota D5 No. 3A'
            ],
        ];

        foreach ($warga as $value) {
            Warga::create($value);
        }
    }
}
