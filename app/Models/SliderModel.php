<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class SliderModel extends Model{
    protected $table = 'slider';
    protected $allowedFields = ['image', 'topic', 'description', 'link', 'showCheck'];
}