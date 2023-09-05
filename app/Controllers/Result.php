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
  use App\Models\ResultLevelModel;

  class Result extends Controller  {
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
                    
      $questionnaire = new QuestionnaireModel();
      $data['question'] = $questionnaire->findAll();
      
      $resultlevelModel = new ResultLevelModel();
      $data['resultlevel'] = $resultlevelModel->findAll();   

      //get data in session from assessment form
      $session = session();
      $data['name'] = $session->get('name'); 
      $data['email'] = $session->get('email');  
      $data['phonenum'] = $session->get('phonenum');  
      $data['score'] = $session->get('score');  
    
      //set data using session to pass to appointment form
      $ses_data = [
        'name'        => $session->get('name'),
        'email'       => $session->get('email'),
        'phonenum'    => $session->get('phonenum'),
        'score'       => $session->get('score')
      ];      
      $session->set($ses_data);

      echo view('/result', $data);
	  }
  }
?>