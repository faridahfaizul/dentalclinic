<?php

//New single menu
function create_new_page($page_name, $controller_name, $title){
 
  // Create Controller  
  $controller = fopen(APPPATH.'controllers/'. $controller_name.'.php', "a") or die("Unable to open file!");
  $controller_content ="<?php namespace App\Controllers;

  use App\Controllers;
  use CodeIgniter\Controller;
  //Header
  use App\Models\MenuModel;
  use App\Models\SubMenuModel;
  use App\Models\ServicesModel; 
  //Footer 
  use App\Models\BusinessInfosModel;
  use App\Models\BusinessLinksModel;   
  use App\Models\BusinessHoursModel;
  use App\Models\CalendarModel;
  use App\Models\SubscribeModel;
  //Contents
  use App\Models\WelcomeModel;
  use App\Models\BackgroundImageModel;
  use App\Models\TextInfoModel;
  use App\Models\SliderModel;
  use App\Models\TeamModel;

  class $controller_name extends Controller {
	public function index()
	{      
      \$menu = new MenuModel();
      \$data['menu'] = \$menu->findAll();
        
      \$submenu = new SubMenuModel();
      \$data['submenu'] = \$submenu->findAll();

      \$services = new ServicesModel();
      \$data['services'] = \$services->findAll();
                      
      \$bussinfo = new BusinessInfosModel();
      \$data['business_infos'] = \$bussinfo->findAll();
      
      \$busslink = new BusinessLinksModel();
      \$data['business_links'] = \$busslink->findAll();
      
      \$footer = new BusinessHoursModel();
      \$data['business_hours'] = \$footer->findAll();
        
      \$calendar = new CalendarModel();
      \$data['calendar'] = \$calendar->findAll();
      
      \$subscribe = new SubscribeModel();
      \$data['subscribe'] = \$subscribe->findAll();      
      
      \$logoModel = new WelcomeModel();
      \$data['logo'] = \$logoModel->findAll();
        
      \$imageModel = new BackgroundImageModel();
      \$data['background'] = \$imageModel->findAll();

      \$textinfo = new TextInfoModel();
      \$data['text_info'] = \$textinfo->findAll();

      \$sliderModel = new SliderModel();
      \$data['slider'] = \$sliderModel->findAll();
        
      \$team = new TeamModel();
      \$data['team'] = \$team->findAll();

		  echo view('$page_name', \$data);
	  }
  }
  ?>";

  fwrite($controller, $controller_content);
  fclose($controller);
  
  // Create View
  $page = fopen(APPPATH.'views/'.$page_name.'.php', "a") or die("Unable to open file!"); 

  $page_content ="<title>DentalClinic - $title</title>
  <?php echo view('layouts/header'); ?>

  <!-- Header Start -->
    <div class='jumbotron jumbotron-fluid bg-jumbotron' style='margin-bottom: 90px;'>
      <div class='container text-center py-5'>
        <h3 class='text-white display-3 mb-4'>$title</h3>
        <div class='d-inline-flex align-items-center text-white'>
          <p class='m-0'><a class='text-white' href='/websetup/public'>Home</a></p>
          <i class='far fa-circle px-3'></i>
          <p class='m-0'><a class='text-white' href=''>$title</a></p>
        </div>
      </div>
    </div>
  <!-- Header End -->
  
  <?php echo view('layouts/footer'); ?>";

  fwrite($page, $page_content);
  fclose($page);
}

//Delete menu
function delete_menu_page($controller, $view){
  //Delete Menu Controller
  unlink(APPPATH.'Controllers/'.$controller.'.php');

  //Delete Menu View
  unlink(APPPATH.'Views/'.$view.'.php');
}

//Add new service in menu
function create_new_service($name, $controller_name, $view){ 
 
  // Create Controller  
  $controller = fopen(APPPATH.'controllers/' . $controller_name.'.php', "a") or die("Unable to open file!");
  $controller_content ="<?php namespace App\Controllers;

  use App\Controllers;
  use CodeIgniter\Controller;
  //Header
  use App\Models\MenuModel;
  use App\Models\SubMenuModel;
  use App\Models\ServicesModel; 
  //Footer 
  use App\Models\BusinessInfosModel;
  use App\Models\BusinessLinksModel;   
  use App\Models\BusinessHoursModel;
  use App\Models\CalendarModel;
  use App\Models\SubscribeModel;
  //Contents
  use App\Models\WelcomeModel;
  use App\Models\BackgroundImageModel;

  class $controller_name extends Controller  {
    public function index()
    {  
      \$menu = new MenuModel();
      \$data['menu'] = \$menu->findAll();
        
      \$submenu = new SubMenuModel();
      \$data['submenu'] = \$submenu->findAll();

      \$services = new ServicesModel();
      \$data['services'] = \$services->findAll();
                      
      \$bussinfo = new BusinessInfosModel();
      \$data['business_infos'] = \$bussinfo->findAll();
      
      \$busslink = new BusinessLinksModel();
      \$data['business_links'] = \$busslink->findAll();
      
      \$footer = new BusinessHoursModel();
      \$data['business_hours'] = \$footer->findAll();
        
      \$calendar = new CalendarModel();
      \$data['calendar'] = \$calendar->findAll();
      
      \$subscribe = new SubscribeModel();
      \$data['subscribe'] = \$subscribe->findAll();      
      
      \$logoModel = new WelcomeModel();
      \$data['logo'] = \$logoModel->findAll();
        
      \$imageModel = new BackgroundImageModel();
      \$data['background'] = \$imageModel->findAll();

		  echo view('services/$view', \$data);
	  }
  }
?>";

  fwrite($controller, $controller_content);
  fclose($controller);
 
  // Create View
  $page = fopen(APPPATH.'views/services/'.$view.'.php', "a") or die("Unable to open file!"); 
  $image = "'.base64_encode(\$vice['image']).'";
  $image1= '"data:image;base64, ' . $image . '"';

  $page_content ="<title>DentalClinic - Services</title>

  <?php echo view('layouts/header'); ?>
  
  <!-- Header Start -->
  <div class='jumbotron jumbotron-fluid bg-jumbotron' style='margin-bottom: 90px;'>
    <div class='container text-center py-5'>
      <h3 class='text-white display-3 mb-4'>Services</h3>
      <div class='d-inline-flex align-items-center text-white'>
        <p class='m-0'><a class='text-white' href='/websetup/public'>Home</a></p>
        <i class='far fa-circle px-3'></i>
        <p class='m-0'><a class='text-white' href='/websetup/public/services'>Services</a></p>
        <i class='far fa-circle px-3'></i>
        <p class='m-0'><a class='text-white' href=''>$name</a></p>
      </div>
    </div>
  </div>
  <!-- Header End -->
  
  <!-- Service Info Start -->
  <?php if(\$services): foreach(\$services as \$vice): if(\$vice['view'] == '$view'):?>
  <div class='container-fluid py-5'>
    <div class='container py-5'>
      <div class='row'>
        <div class='col-lg-6' style='min-height: 500px;'>
          <div class='position-relative h-100'>
          <?php echo '<img src= $image1>';?>          
            
          </div>
        </div>
        <div class='col-lg-6 pt-5 pb-lg-5'>
          <div class='hours-text bg-light p-4 p-lg-5 my-lg-5'>
            <h6 class='d-inline-block text-white text-uppercase bg-primary py-1 px-2'></h6>
            <h1 class='mb-4'><?php echo \$vice['name'];?></h1>
            <p><?php echo \$vice['details'];?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; endforeach; endif; ?>
  <!-- Service Info End -->
  
  <?php echo view('layouts/footer'); ?>";

  fwrite($page, $page_content);
  fclose($page);
}

//Delete services file
function delete_services($controller, $view){
  //Delete Service Controller
  unlink(APPPATH.'Controllers/'.$controller.'.php');

  //Delete Service View
  unlink(APPPATH.'Views/Services/'.$view.'.php');
}

?>