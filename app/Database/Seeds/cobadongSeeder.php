<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\CobaDongModel;
use Faker\Factory;

class cobadongSeeder extends Seeder
{
    public function run()
    {

        for ($c = 0; $c < 50; $c++) {
            $data[] = $this->generate_data();
        }
        $this->cobadong = new CobaDongModel();
        foreach ($data as $k) {
            $this->cobadong->save([
                'nama_k' => $k['nama_k'],
                'email_k' => $k['email_k'],
                'department' => $k['department'],
                'nmr_hp' => $k['nmr_hp']
            ]);
        }
    }
    function generate_data()
    {
        $faker = Factory::create();

        return [
            'nama_k' => $faker->name(),
            'email_k' => $faker->email,
            'department' => $faker->randomElement(["Staff", "Produksi", "Administrasi", "Satpam"]),
            'nmr_hp' => $faker->phoneNumber,
        ];
    }
}
