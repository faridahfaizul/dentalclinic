<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class LocationModel extends Model{
    protected $table = 'location';
    protected $allowedFields = ['id','contact','email','address1','address2','postal_code','city','state','status'];
}