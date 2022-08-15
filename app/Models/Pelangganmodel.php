<?php 
namespace App\Models;

use CodeIgniter\Model;

class Pelangganmodel extends Model{
    protected $table      = 'tbpelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama','alamat','no_hp'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}