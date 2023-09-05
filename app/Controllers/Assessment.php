<?php namespace App\Controllers;

  use App\Controllers;
  use CodeIgniter\Controller;
  //Header
  use App\Models\MenuModel;
  use App\Models\SubMenuModel;
  use App\Models\ServicesModel; 
  //Footer 
  use App\Models\BusinessInfosModel;
  use App\Models\BusinessLinksModel;   
  use App\Models\CalendarModel;
  use App\Models\SubscribeModel;
  //Contents
  use App\Models\WelcomeModel;
  use App\Models\BackgroundImageModel;
  use App\Models\QuestionnaireModel;
  use App\Models\QuestionnaireTermsModel;
  use App\Models\AssessmentModel;

  class Assessment extends Controller  {
    public function index()
    {        
      $menu = new MenuModel();
      $data['menu'] = $menu->findAll();
        
      $submenu = new SubMenuModel();
      $data['submenu'] = $submenu->findAll();

      $services = new ServicesModel();
      $data['services'] = $services->findAll();
                      
      $bussinfo = new BusinessInfosModel();
      $data['business_infos'] = $bussinfo->findAll();
      
      $busslink = new BusinessLinksModel();
      $data['business_links'] = $busslink->findAll();
        
      $calendar = new CalendarModel();
      $data['calendar'] = $calendar->findAll();
      
      $subscribe = new SubscribeModel();
      $data['subscribe'] = $subscribe->findAll();  
       
      $logoModel = new WelcomeModel();
      $data['logo'] = $logoModel->findAll();
        
      $imageModel = new BackgroundImageModel();
      $data['background'] = $imageModel->findAll();       
        
      $questionnaireterm = new QuestionnaireTermsModel();
      $data['terms'] = $questionnaireterm->findAll();

      $questionnaire = new QuestionnaireModel();
      $data['question'] = $questionnaire->findAll();
      
		  echo view('/assessment', $data);
	  }

    public function storeAssessment() {   
      helper(['form', 'url']);

      $assessmentModel = new AssessmentModel();

      $name  = $this->request->getVar('name');
      $email  = $this->request->getVar('email');
      $phonenum  = $this->request->getVar('phonenum');
      $score  = $this->request->getVar('score');

      $data = [

        'name'  => $name,
        'email'  => $email,
        'phonenum'  => $phonenum,
        'score'  => $score,
        'terms'  => $this->request->getVar('terms')
      ];

      $save = $assessmentModel->insert($data);
      
      //set data using session to pass to result form
      $session = session();      
      $ses_data = [
        'name'        => $name,
        'email'       => $email,
        'phonenum'    => $phonenum,
        'score'       => $score,
      ];
      
      $session->set($ses_data);
      return redirect()->to(base_url('/result'));
    }
  }
?>