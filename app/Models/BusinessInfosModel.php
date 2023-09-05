<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
  
class BusinessInfosModel extends Model{
    protected $table = 'business_info';
    protected $allowedFields = ['webname1', 'webname2', 'logo', 'contact', 'email','address1', 'address2', 'postal_code', 'city', 'state', 'country', 'map', 'website'];
}