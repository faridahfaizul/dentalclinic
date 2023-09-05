<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class AssessmentModel extends Model{
    protected $table = 'assessment';
    protected $allowedFields = ['id', 'name','email','phonenum','score','terms','created_date'];
}