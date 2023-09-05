<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class QuestionnaireModel extends Model{
    protected $table = 'questionnaire';
    protected $allowedFields = ['id', 'question','answer','point'];
}