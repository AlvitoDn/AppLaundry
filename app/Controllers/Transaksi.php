<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TransaksiModel;
use App\Models\PaketModel;
use App\Models\PelangganModel;
use App\Models\DetailModel;
class Transaksi extends Controller{
    protected $pelanggans, $pakets, $transaksi, $detail, $session;
    
    function __construct()
    {
        $this->pelanggans = new PelangganModel;
        $this->pakets = new PaketModel;
        $this->transaksi = new TransaksiModel;
        $this->detail = new DetailModel;
        $this->session = session();
    }

    public function tampil()
    {
        $data['pelanggan'] = $this->pelanggans->findAll();
        $data['paket'] = $this->pakets->findAll();
        if(session('cart') != null){
            $data['trans'] = array_values(session('cart'));
        }else {
            $data['trans'] = null;
        }

        return view('tampil_transaksi',$data);
    }

}