<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class WelcomeModel extends Model{
    protected $table = 'welcome_image';
    protected $allowedFields = ['info', 'image'];
}