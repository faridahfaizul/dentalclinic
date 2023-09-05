<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\WelcomeModel;
use App\Models\TextInfoModel;
use App\Models\BusinessInfosModel;
use App\Models\BusinessLinksModel;
use App\Models\CalendarModel;
  
class AdminPageBusiness extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $welcomepic = new WelcomeModel();
        $data['welcome'] = $welcomepic->findAll();

        $info_model = new TextInfoModel();
        $data['text_info'] = $info_model->findAll();
                
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        $busslink = new BusinessLinksModel();
        $data['business_links'] = $busslink->findAll();
        
        $calendar = new CalendarModel();
        $data['calendar'] = $calendar->findAll();

        echo view('admin/businesspage', $data);
    }

    public function updateWelcome()
    {   
        helper(['form', 'url']);
         
        $welcomepic = new WelcomeModel();
 
        $id = $this->request->getVar('id');
 
        $data = ['image'  => $this->request->getVar('image')];
 
        $save = $welcomepic->update($id,$data);
 
        return redirect()->to( base_url('/adminpagebusiness') );
    }

    public function updateText()
    {   
        helper(['form', 'url']);
         
        $info = new TextInfoModel();
 
        $id = $this->request->getVar('id');
 
        $data = [

            'welcome_text'  => $this->request->getVar('welcome_text'),
            'heading'  => $this->request->getVar('heading'),
            'info_text'  => $this->request->getVar('info_text'),
            ];
 
        $save = $info->update($id,$data);
 
        return redirect()->to( base_url('/adminpagebusiness') );
    }
    
    public function updateInfos()
    {   
        helper(['form', 'url']);
         
        $infos = new BusinessInfosModel();
 
        $id = $this->request->getVar('id');
 
        $data = [

            'webname1'  => $this->request->getVar('webname1'),
            'webname2'  => $this->request->getVar('webname2'),
            'contact'  => $this->request->getVar('contact'),
            'email'  => $this->request->getVar('email'),
            'address1'  => $this->request->getVar('address1'),            
            'address2'  => $this->request->getVar('address2'),            
            'postal_code'  => $this->request->getVar('postal_code'),
            'city'  => $this->request->getVar('city'),
            'state'  => $this->request->getVar('state'),            
            'country'  => $this->request->getVar('country'),
            'map'  => $this->request->getVar('map'),
            'website'  => $this->request->getVar('website')
            ];
 
        $save = $infos->update($id,$data);
 
        return redirect()->to( base_url('/adminpagebusiness') );
    }  

    public function storeLinks()
    {   
        helper(['form', 'url']);
         
        $links = new BusinessLinksModel();
 
        $data = [

            'name'  => $this->request->getVar('name'),
            'logo'  => $this->request->getVar('logo'),
            'link'  => $this->request->getVar('link'),  
            'status'  => $this->request->getVar('status'),
            ];
 
        $save = $links->insert($data);
 
        return redirect()->to(base_url('/adminpagebusiness'));
    }

    public function updateLinks()
    {   
        helper(['form', 'url']);
         
        $links = new BusinessLinksModel();
 
        $id = $this->request->getVar('idLink');
 
        $data = [

            'name'  => $this->request->getVar('name'),          
            'logo'  => $this->request->getVar('logo'),
            'link'  => $this->request->getVar('link'),  
            'status'  => $this->request->getVar('status'),
            ];
 
        $save = $links->update($id,$data);
 
        return redirect()->to( base_url('/adminpagebusiness') );
    }

    public function deleteLinks($id = null)
    {
        helper(['form', 'url']);

        $links = new BusinessLinksModel();

        $id = $this->request->getVar('delete_id');
        
        $data['link'] = $links->where('id', $id)->delete();
      
        return redirect()->to( base_url('/adminpagebusiness') );
     
    }
    

    public function storeCalendar()
    {   
        helper(['form', 'url']);
         
        $calendar = new CalendarModel();
 
        $data = [

            'operation'  => $this->request->getVar('operation'),
            'start'  => $this->request->getVar('start'),
            'end'  => $this->request->getVar('end'),
            ];
 
        $save = $calendar->insert($data);
 
        return redirect()->to(base_url('/adminpagebusiness'));
    }

    public function updateCalendar()
    {   
        helper(['form', 'url']);
         
        $calendar = new CalendarModel();
 
        $id = $this->request->getVar('idCalendar');
 
        $data = [

            'operation'  => $this->request->getVar('operation'),
            'start'  => $this->request->getVar('start'),
            'end'  => $this->request->getVar('end'),  
            ];
 
        $save = $calendar->update($id,$data);
 
        return redirect()->to( base_url('/adminpagebusiness') );
    }
}