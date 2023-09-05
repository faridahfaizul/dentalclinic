<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class DoctorsAppModel extends Model{
    protected $table = 'doctors_app';
    protected $allowedFields = ['id', 'staff_id', 'name','created'];
}