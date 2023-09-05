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
   use App\Models\AppointmentModel;
   use App\Models\AppointmentHoursModel;
  
  class Appointment extends Controller
  {
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
        
        $appointmentModel = new AppointmentModel();
        $data['appointment'] = $appointmentModel->findAll();
        
        $appointmentModel = new AppointmentHoursModel();
        $data['hour'] = $appointmentModel->findAll();

        //get data in session from result form
        $session = session();
        $data['name'] = $session->get('name'); 
        $data['email'] = $session->get('email');  
        $data['phonenum'] = $session->get('phonenum');  
        $data['score'] = $session->get('score'); 
        
        echo view('/appointment', $data);
    }
  
    public function save()
    {
        //include helper form
        helper(['form']);
        $model = new AppointmentModel();
        $data = [
            'name'      => $this->request->getVar('name'),
            'identity'  => $this->request->getVar('identity'),            
            'phone'     => $this->request->getVar('contact'),
            'email'     => $this->request->getVar('email'),
            'service'   => $this->request->getVar('service'),
            'date'      => $this->request->getVar('date'),
            'time'      => $this->request->getVar('time'),
            'score'     => $this->request->getVar('score'),
            'notes'     => $this->request->getVar('notes'),
            'status'    =>'Pending',
        ];        
        $save = $model->insert($data);

        $session = session();
        $session->destroy();

        return redirect()->to( base_url('/websetup/public/appointment') );     
    }  
  }
?>
