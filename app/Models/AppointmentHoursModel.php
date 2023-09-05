<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class AppointmentHoursModel extends Model{
    protected $table = 'appointment_hours';
    protected $allowedFields = ['id','time', 'number','status'];
}