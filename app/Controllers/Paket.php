<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Paketmodel;
class Paket extends Controller{
    protected $paket;

    function __construct()
    {
        $this->paket = new PaketModel();
    }
    
    public function tampil()
    {
        return view('tampil_paket');
    }

}