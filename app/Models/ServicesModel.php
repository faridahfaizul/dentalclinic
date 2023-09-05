<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class ServicesModel extends Model{
    protected $table = 'services';
    protected $allowedFields = ['name','controller', 'view','image','details','price', 'status'];
}