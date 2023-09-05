<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class BackgroundImageModel extends Model{
    protected $table = 'background_images';
    protected $allowedFields = ['info', 'image'];
}