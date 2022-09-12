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

    private function cek($id)
    {
        $cart = array_values(session('cart'));
        for($i=0;$i<count(session('cart'));$i++){
            if ($cart[$i]['id_paket']==$id){
                return $i;
            }
        }
        return -1;
    }

    public function addcart()
    {
        $id = $this->request->getPost('paket');
        $jumlah = $this->request->getPost('jumlah');
        if ($jumlah==0){
            return redirect('transaksi')->with('sukses','data tidak berhasil ditambahkan, Nilai tidak boleh diisi dengan 0');
        }
        $paket = $this->pakets->find($id);
        if ($paket!=null) {
            $isi = array(
                "id_paket" => $id,
                "nama_paket"=> $paket['nama_paket'],
                "harga"=> $paket['harga'],
                "jumlah"=> $jumlah
            );
            if($this->session->has('cart')){
                $index = $this->cek($id);
                $cart = array_values(session('cart'));
                if ($index == -1){
                    array_push($cart,$isi);
                }else{
                    $cart[$index]['jumlah'] += $jumlah;
                }
                $this->session->set('cart',$cart);
            }else{
                $this->session->set('cart',array($isi));
            }
            return redirect('transaksi')->with('sukses','data berhasil ditambahkan');
        }else {
            return redirect('transaksi')->with('sukses','data gagal ditambahkan');
        }
    }
    
    public function hapusCart($id)
    {
        $cart = array_values(session('cart'));
        $index = $this->cek($id);
        unset($cart[$index]);
        $this->session->set('cart',$cart);
        return redirect('transaksi')->with('sukses','data berhasil dihapus');
    }
}