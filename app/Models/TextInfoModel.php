<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
  
class TextInfoModel extends Model{
    protected $table = 'text_info';
    protected $allowedFields = ['welcome_text','heading', 'info_text'];
}