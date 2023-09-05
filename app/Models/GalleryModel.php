<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class GalleryModel extends Model{
    protected $table = 'gallery';
    protected $allowedFields = ['id','image','caption','status', 'date'];
}