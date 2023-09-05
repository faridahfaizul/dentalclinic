<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class NursesAppModel extends Model{
    protected $table = 'nurses_app';
    protected $allowedFields = ['id','staff_id', 'name','created'];
}