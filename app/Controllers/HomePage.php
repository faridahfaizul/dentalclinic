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
  use App\Models\TextInfoModel;
  use App\Models\SliderModel;
  use App\Models\TeamModel;

  class HomePage extends Controller {
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

      $textinfo = new TextInfoModel();
      $data['text_info'] = $textinfo->findAll();

      $sliderModel = new SliderModel();
      $data['slider'] = $sliderModel->findAll();
        
      $team = new TeamModel();
      $data['team'] = $team->findAll();

	  echo view('home_view', $data);
	}

    public function storeSubscribe()
    {   
        helper(['form', 'url']);
         
        $subscribe = new SubscribeModel();
 
        $data = [

            'name'  => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            ];
 
        $save = $subscribe->insert($data);
        return redirect()->to(base_url('/websetup/public/'));
    }
  }
?>