<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
  
class BusinessLinksModel extends Model{
    protected $table = 'business_links';
    protected $allowedFields = ['name', 'status', 'logo', 'link'];
}