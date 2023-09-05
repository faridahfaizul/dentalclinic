<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\AssessmentModel;
use App\Models\AppointmentModel;
use App\Models\DoctorsAppModel;
use App\Models\NursesAppModel;
use App\Models\BusinessInfosModel;
  
class Admin extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name'); 
        $data['email'] = $session->get('user_email');    
                
        $doctorsModel = new DoctorsAppModel();
        $data['doctor'] = $doctorsModel->findAll();
                
        $nursesModel = new NursesAppModel();
        $data['nurse'] = $nursesModel->findAll();
        
        $assessmentModel = new AssessmentModel();
        $data['assessment'] = $assessmentModel->findAll();
        
        $appointmentModel = new AppointmentModel();
        $data['appointment'] = $appointmentModel->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/admin', $data);
    }
}