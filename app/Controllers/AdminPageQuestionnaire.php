<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\QuestionnaireModel;
use App\Models\QuestionnaireTermsModel;
use App\Models\BusinessInfosModel;
  
class AdminPageQuestionnaire extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $questionModel = new QuestionnaireModel();
        $data['question'] = $questionModel->findAll();

        $termModel = new QuestionnaireTermsModel();
        $data['terms'] = $termModel->findAll();

        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();
        
        echo view('admin/questionpage', $data);
    }

    public function updateTerms()
    {   
        helper(['form', 'url']);
         
        $termModel = new QuestionnaireTermsModel();
        
        $id = $this->request->getVar('id');

        $data = [

            'topic'        => $this->request->getVar('topic'),
            'description'  => $this->request->getVar('description'),
            'terms'        => $this->request->getVar('terms')
            ];
 
        $save = $termModel->update($id,$data);
 
        return redirect()->to( base_url('/adminpagequestionnaire') );
    }

    public function storeQuestion()
    {   
        helper(['form', 'url']);

        $answer = implode(",", $this->request->getVar('answer'));
        $point = implode(",", $this->request->getVar('point'));

        $questionModel = new QuestionnaireModel();

        $data = [

            'question'  => $this->request->getVar('question'),
            'answer'  => $answer,
            'point'  => $point
            ];

        $save = $questionModel->insert($data); 

        return redirect()->to(base_url('/adminpagequestionnaire'));
    }

    public function updateQuestion()
    {   
        helper(['form', 'url']);

        $answer = implode(",", $this->request->getVar('answer'));
        $point = implode(",", $this->request->getVar('point'));
         
        $questionModel = new QuestionnaireModel();
        
        $id = $this->request->getVar('id');

        $data = [

            'question'  => $this->request->getVar('edit_question'),
            'answer'  => $answer,
            'point'  => $point
            ];
 
        $save = $questionModel->update($id,$data);
 
        return redirect()->to( base_url('/adminpagequestionnaire') );
    }

    public function deleteQuestion($id = null)
    {
        helper(['form', 'url']);

        $questionModel = new QuestionnaireModel();

        $id = $this->request->getVar('delete_id');
        
        $data['question'] = $questionModel->where('id', $id)->delete();
      
     return redirect()->to( base_url('/adminpagequestionnaire') );
    }
}