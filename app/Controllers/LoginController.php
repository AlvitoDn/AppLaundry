<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
class LoginController extends Controller{
    protected $Users;

    public function index()
    {
        return view('tampil_login');
    }

    public function login()
    {
        $users = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        d($dataUser);
        if($dataUser) {
            if(password_verify($password, $dataUser['password'])) {
                session()->set(
                    [
                        'username' => $dataUser['username'],
                        'nama' => $dataUser['nama'],
                        'hak_akses'=>$dataUser['hak_akses'],
                        'logged_in' => true, 
                        'id_user'=>$dataUser['id_user']
                    ]
                );
                return $this->response->redirect('/home');
            } else {
                session()->setFlashdata('error','username atau Password salah');
                return $this->response->redirect('/login');
            }
        } else {
            session()->setFlashdata('error','Username tidak ditemukan');
            return $this->response->redirect('/login');
        }
    }
    function logout(){
        session()->destroy();
        return $this->response->redirect('/login');
    }
}