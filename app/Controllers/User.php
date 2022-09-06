<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usermodel;
class User extends Controller{
    protected $users;

    function __construct()
    {
        $this->users = new UserModel();
    }

    public function tampil()
    {
        $data['user'] = $this->users->findAll();
        return view('tampil_user',$data);
    }

    public function form()
    {
        return view('fuser');
    }

    public function save()
    {
        $this->users->insert([
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'hak_akses'=>$this->request->getPost('hak_akses')
        ]);
        return redirect('user')->with('Sukses','Simpan Berhasil');
    }

    public function delete($id)
    {
        $this->users->delete($id);
        session()->setFlashdata('message','Data user berhasil di hapus');
        return redirect('user');
    }

    public function edit($id)
    {
        $data = array('nama'=>$this->request->getPost('nama'),'username'=>$this->request->getPost('username'),'password'=>$this->request->getPost('password'),'hak_akses'=>$this->request->getPost('hak_akses')
        );
        $this->users->update($id, $data);
        session()->setFlashdata('message','Data user berhasil di edit');
        return redirect('user')->with('Sukses nihh!!!','update berhasil');
    }
}