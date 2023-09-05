<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class AppointmentModel extends Model{
    protected $table = 'appointment';
    protected $allowedFields = ['id','name', 'identity', 'phone','email','service', 'date','time','doctor','nurse', 'score', 'notes','status','created_at'];
}