<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class QuestionnaireTermsModel extends Model{
    protected $table = 'questionnaire_terms';
    protected $allowedFields = ['id','topic', 'description', 'terms'];
}