<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\AssessmentModel;
use App\Models\ResultLevelModel;
use App\Models\BusinessInfosModel;
  
class AdminPageRiskAnalysis extends Controller
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

        echo view('admin/riskanalysispage', $data);
    }

    public function updateRiskLevel()
    {   
        helper(['form', 'url']);
         
        $resultlevelModel = new ResultLevelModel();
        $id = $this->request->getVar('id');
 
        $data = [

            'minscore'  => $this->request->getVar('minscore'),          
            'maxscore'  => $this->request->getVar('maxscore')
            ];
 
        $save = $resultlevelModel->update($id,$data);
 
        return redirect()->to(base_url('/websetup/public/adminpageriskanalysis'));
    }

}