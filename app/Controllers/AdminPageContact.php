<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\LocationModel;
use App\Models\BusinessInfosModel;
  
class AdminPageContact extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $location = new LocationModel();
        $data['contact'] = $location->findAll();
        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/contactpage', $data);
    }

    public function storeContact()
    {   
        helper(['form', 'url']);
         
        $location = new LocationModel();
 
        $data = [

            'contact'  => $this->request->getVar('contact'),          
            'email'  => $this->request->getVar('email'),
            'address1'  => $this->request->getVar('address1'),  
            'address2'  => $this->request->getVar('address2'),
            'postal_code'  => $this->request->getVar('postal_code'),
            'city'  => $this->request->getVar('city'),
            'state'  => $this->request->getVar('state'),
            'status'  => $this->request->getVar('status')
            ];
 
        $save = $location->insert($data);
 
        return redirect()->to(base_url('/adminpagecontact'));
    }
    
    public function updateContact()
    {   
        helper(['form', 'url']);
         
        $location = new LocationModel();
 
        $id = $this->request->getVar('id');
 
        $data = [

            'contact'  => $this->request->getVar('contact'),          
            'email'  => $this->request->getVar('email'),
            'address1'  => $this->request->getVar('address1'),  
            'address2'  => $this->request->getVar('address2'),
            'postal_code'  => $this->request->getVar('postal_code'),
            'city'  => $this->request->getVar('city'),
            'state'  => $this->request->getVar('state'),
            'status'  => $this->request->getVar('status')
            ];
 
        $save = $location->update($id,$data);
 
        return redirect()->to( base_url('/adminpagecontact') );
    }

    public function deleteContact($id = null)
    {
        helper(['form', 'url']);

        $location = new LocationModel();

        $id = $this->request->getVar('delete_id');
        
        $data['location'] = $location->where('id', $id)->delete();
      
     return redirect()->to( base_url('/adminpagecontact') );
    }
}