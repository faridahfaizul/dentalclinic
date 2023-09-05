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

  class Pricing extends Controller  {
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
        
		  echo view('/pricing', $data);
	  }
  }
?>