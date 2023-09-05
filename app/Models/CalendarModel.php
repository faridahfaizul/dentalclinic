<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class CalendarModel extends Model{
    protected $table = 'calendar';
    protected $allowedFields = ['id','operation', 'start', 'end'];
}