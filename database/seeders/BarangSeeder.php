<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            [
                'kode_barang' => '001',
                'nama_barang' => 'Barang1',
                'harga_barang'=> 10000,
                'deskripsi_barang' => 'Barang Pertama',
                'satuan_barang' => '001'
            ],
            [
                'kode_barang' => '002',
                'nama_barang' => 'Barang2',
                'harga_barang'=> 20000,
                'deskripsi_barang' => 'Barang Kedua',
                'satuan_barang' => '002'
            ],
            [
                'kode_barang' => '003',
                'nama_barang' => 'Barang3',
                'harga_barang'=> 30000,
                'deskripsi_barang' => 'Barang Ketiga',
                'satuan_barang' => '003'
            ],
        ]);

    }
}
