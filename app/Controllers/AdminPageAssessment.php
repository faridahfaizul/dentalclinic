<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\AssessmentModel;
use App\Models\ResultLevelModel;
use App\Models\BusinessInfosModel;

class AdminPageAssessment extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $assessmentModel = new AssessmentModel();
        $data['assessment'] = $assessmentModel->findAll();        

        $resultlevelModel = new ResultLevelModel();
        $data['resultlevel'] = $resultlevelModel->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/assessmentpage', $data);
    }

    public function deleteAssessment($id = null)
    {
        helper(['form', 'url']);

        $assessmentModel = new AssessmentModel();

        $id = $this->request->getVar('delete_id');
        
        $data['assessment'] = $assessmentModel->where('id', $id)->delete();
      
     return redirect()->to( base_url('/adminpageassessment') );
    }

}