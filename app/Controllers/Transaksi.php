<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TransaksiModel;
use App\Models\PaketModel;
use App\Models\PelangganModel;
use App\Models\DetailModel;
class Transaksi extends Controller{
    protected $pelanggans, $pakets, $transaksi, $detail, $session, $db;
    
    function __construct()
    {
        $this->db = \Config\Database::connect();
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

    public function simpan()
    {
        if(session('cart') !=null){   
            if ($this->session->get('id_user') != null) {
                $datatrans = array(
                    "id_pelanggan"=>$this->request->getPost('pelanggan'),
                    'tanggal_masuk'=>date('Y/m/d H:i:s'),
                    'tanggal_ambil'=>$this->request->getPost('tanggal'),
                    'id_user'=>$this->session->get('id_user')
                );
                $id = $this->transaksi->insert($datatrans);
                $cart = array_values(session('cart'));
                foreach ($cart as $val) {
                    $datadetail = array(
                        'id_transaksi'=>$id,
                        'id_paket'=>$val['id_paket'],
                        'jumlah'=>$val['jumlah']
                    );
                    $this->detail->insert($datadetail);
                }
                $this->session->remove('cart');
                return redirect('transaksi')->with('sukses','Transaksi berhasil');
            }else{
                return redirect('transaksi')->with('sukses','Transaksi Gagal silahkan login dahulu');
            }
        }else{
            return redirect('transaksi')->with('sukses','Transaksi gagal');
        }
    }

    public function ambil($id)
    {
        $data = array('status'=>1,);
        $this->transaksi->update($id, $data);

        session()->setFlashdata('message','laundry sudah diambil');
        return redirect('laporan');
    }

    public function laporan()
    {
        $query = $this->db->query("SELECT a.*,b.* from tbtransaksi a,tbpelanggan b where a.id_pelanggan=b.id_pelanggan");
        $result = $query->getResultArray();
        $data['trans'] = $result;

        return view('tampil_laporan',$data);
    }

    public function detail($id)
    {
        $query = $this->db->query("SELECT a.*,b.* FROM tbdetail a, tbpaket b WHERE a.id_paket and a.id_paket and a.id_transaksi=$id");
        $result = $query->getResultArray();
        $no=1;
        $data='<tr>
        <th>NO.</th>
        <th>Nama Paket</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>';
        foreach ($result as $value) {
            $data = $data."<tr><td>".$no."</td><td>".$value['nama_paket']."</td><td>".$value['harga']."</td><td>".$value['jumlah']."</td><td>".$value['jumlah']*$value['harga']."</td></tr>";
        $no++;
        }

        echo $data;
    }
}