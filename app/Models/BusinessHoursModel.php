<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
  
class BusinessHoursModel extends Model{
    protected $table = 'business_hours';
    protected $allowedFields = ['operation', 'open_at', 'close_at', 'holiday'];
}