<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class MenuModel extends Model{
    protected $table = 'menu';
    protected $allowedFields = ['id','name', 'status', 'url_name', 'url'];
}