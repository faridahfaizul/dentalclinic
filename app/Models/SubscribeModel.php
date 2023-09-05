<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class SubscribeModel extends Model{
    protected $table = 'subscribe';
    protected $allowedFields = ['id','name', 'email', 'date_created'];
}