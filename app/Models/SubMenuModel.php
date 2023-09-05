<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class SubMenuModel extends Model{
    protected $table = 'submenu';
    protected $allowedFields = ['id','menu_id', 'name', 'url_name', 'url', 'status'];
}