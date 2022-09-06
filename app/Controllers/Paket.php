<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Paketmodel;
class Paket extends Controller{
    protected $pakets;

    function __construct()
    {
        $this->pakets = new PaketModel();
    }
    
    public function tampil()
    {
        $data['paket'] = $this->pakets->findAll();
        return view('tampil_paket',$data);
    }

    public function form()
    {
        return view('fpaket');
    }

    public function save()
    {
        $this->pakets->insert([
            'nama_paket'=>$this->request->getPost('nama_paket'),
            'satuan'=>$this->request->getPost('satuan'),
            'harga'=>$this->request->getPost('harga')
        ]);
        return redirect('paket')->with('Sukses','Simpan Berhasil');
    }

    public function delete($id)
    {
        $this->pakets->delete($id);
        session()->setFlashdata('message','Data Paket berhasil di hapus');
        return redirect('paket');
    }

    public function edit($id)
    {
        $data = array('nama_paket'=>$this->request->getPost('nama_paket'),'satuan'=>$this->request->getPost('satuan'),'harga'=>$this->request->getPost('harga')
        );
        $this->pakets->update($id, $data);
        session()->setFlashdata('message','Data Paket berhasil di edit');
        return redirect('paket')->with('Sukses nihh!!!','update berhasil');
    }

}