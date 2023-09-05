<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class ResultLevelModel extends Model{
    protected $table = 'result';
    protected $allowedFields = ['id', 'risklevel','minscore','maxscore'];
}