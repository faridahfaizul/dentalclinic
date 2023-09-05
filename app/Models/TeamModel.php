<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class TeamModel extends Model{
    protected $table = 'team';
    protected $allowedFields = ['id','name', 'position', 'image', 'info','status'];
}