<?php

namespace App\Providers;

 
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    //Mengatur Hak Akses untuk user
    Gate::define('Apoteker-only', function ($user) {
        if ($user->level == 'Apoteker'){
            return true; 
        } 
        return false; 
    });

    //Mengatur Hak Akses untuk obat
    Gate::define('Apoteker-only', function ($obat) {
        if ($obat->level == 'Apoteker'){
            return true; 
        } 
        return false; 
    });

     //Mengatur Hak Akses untuk distributor
     Gate::define('Apoteker-only', function ($distributor) {
        if ($distributor->level == 'Apoteker'){
            return true; 
        } 
        return false; 
    });

     //Mengatur Hak Akses untuk pembelian
     Gate::define('Gudang-only', function ($pembelian) {
        if ($pembelian->level == 'Gudang'){
            return true; 
        } 
        return false; 
    });

     //Mengatur Hak Akses untuk detail pembelian
     Gate::define('Gudang-only', function ($detail_pembelian) {
        if ($detail_pembelian->level == 'Gudang'){
            return true; 
        } 
        return false; 
    });

     //Mengatur Hak Akses untuk penjualan
     Gate::define('Kasir-only', function ($penjualan) {
        if ($penjualan->level == 'Kasir'){
            return true; 
        } 
        return false; 
    });

     //Mengatur Hak Akses untuk detail penjualan
     Gate::define('Kasir-only', function ($detail_penjualan) {
        if ($detail_penjualan->level == 'Kasir'){
            return true; 
        } 
        return false; 
    });

     //Mengatur Hak Akses untuk generate laporan
     Gate::define('Pemilik-only', function ($generate_laporan) {
        if ($generate_laporan->level == 'Pemilik'){
            return true; 
        } 
        return false; 
    });

     //Mengatur Hak Akses untuk laporanpembelian1
     Gate::define('Pemilik-only', function ($laporanpembelian1) {
        if ($laporanpembelian1->level == 'Pemilik'){
            return true; 
        } 
        return false; 
    });

}
}
