<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\TextInfoModel;
use App\Models\ServicesModel;
use App\Models\BusinessInfosModel;
  
class AdminPageServices extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $servicesModal = new ServicesModel();
        $data['services'] = $servicesModal->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/servicespage', $data);
    }

    public function storeServices()
    {   
        helper(['form', 'url']);

        $servicesModal = new ServicesModel();
        $name =  $this->request->getVar('name');
        $controller = str_replace(" ", "", $name);  // remove spaces from string
        $view = strtolower($controller);

        $data = [

            'name'      => $name,
            'controller'=> $controller,
            'view'      => $view,
            'details'   => $this->request->getVar('details'),    
            'price'     => $this->request->getVar('price'),        
            'status'    => $this->request->getVar('status'),
            'image'     => $this->request->getVar('image')
            ];

            helper(['pages_creator']);
            create_new_service($name, $controller, $view);

        $save = $servicesModal->insert($data);

        return redirect()->to(base_url('/adminpageservices'));
    }

    public function updateServices()
    {   
        helper(['form', 'url']);
         
        $servicesModal = new ServicesModel();
 
        $id = $this->request->getVar('id');

        $data = [

            'details'   => $this->request->getVar('details'), 
            'price'  => $this->request->getVar('price'),           
            'status'   => $this->request->getVar('status'),
            'image'     => $this->request->getVar('image')
            ]; 
 
        $save = $servicesModal->update($id,$data);
 
        return redirect()->to( base_url('/adminpageservices') );
    }

    public function deleteServices($id = null)
    {
        helper(['form', 'url']);

        $servicesModal = new ServicesModel();

        $id = $this->request->getVar('delete_id');
        $controller = $this->request->getVar('delete_controller');
        $view = $this->request->getVar('delete_view');
        
        helper(['pages_creator']);
        delete_services($controller, $view);
        
        $data['services'] = $servicesModal->where('id', $id)->delete();
      
     return redirect()->to( base_url('/adminpageservices') );
    }
    
}