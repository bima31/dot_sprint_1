<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetProvinsiAndCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-provinsi-and-city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $responseProvince = Http::get('https://api.rajaongkir.com/starter/province', [
            'key' => '0df6d5bf733214af6c6644eb8717c92c',
        ]);
        if ($responseProvince->json()['rajaongkir']['status']['code'] == 200){
            DB::table('province_table')->delete();
            $this->info('province berhasil di hapus');
            DB::table('province_table')->insert($responseProvince->json()['rajaongkir']['results']);
            $this->info('province berhasil di insert');
        }

        $responseCity = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '0df6d5bf733214af6c6644eb8717c92c',
        ]);
        if ($responseCity->json()['rajaongkir']['status']['code'] == 200){
            DB::table('city_table')->delete();
            $this->info('city berhasil di hapus');
            DB::table('city_table')->insert($responseCity->json()['rajaongkir']['results']);
            $this->info('city berhasil di insert');
        }

    }
}
