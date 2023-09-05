<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\DoctorsAppModel;
use App\Models\NursesAppModel;
use App\Models\BusinessInfosModel;
  
class AdminPageStaff extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $doctorModel = new DoctorsAppModel();
        $data['doctor'] = $doctorModel->findAll();
        
        $nurseModel = new NursesAppModel();
        $data['nurse'] = $nurseModel->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/staffpage', $data);
    }

    public function storeDoctor()
    {   
        helper(['form', 'url']);
          
        $doctorModel = new DoctorsAppModel();
        $data = [
            
            'staff_id'  => $this->request->getVar('staff_id'),
            'name'      => $this->request->getVar('name'),
           
            ];
        $save = $doctorModel->insert($data);

        return redirect()->to(base_url('/websetup/public/adminpagestaff'));
    }

    public function updateDoctor()
    {   
        helper(['form', 'url']);
         
        $doctorModel = new DoctorsAppModel();
 
        $id = $this->request->getVar('edit_id');

        $data = [

            'staff_id'  => $this->request->getVar('edit_staff_id'),
            'name'      => $this->request->getVar('edit_name')

            ]; 
 
        $save = $doctorModel->update($id,$data);
 
        return redirect()->to( base_url('/websetup/public/adminpagestaff') );
    }

    public function deleteDoctor($id = null)
    {
        helper(['form', 'url']);

        $doctorModel = new DoctorsAppModel();

        $id = $this->request->getVar('delete_id');
        
        $data['doctor'] = $doctorModel->where('id', $id)->delete();
      
     return redirect()->to( base_url('/websetup/public/adminpagestaff') );

    }
    
    public function storeNurse()
    {   
        helper(['form', 'url']);

        $nurseModel = new NursesAppModel();
        
        $data = [
            
            'staff_id'  => $this->request->getVar('nurse_staff_id'),
            'name'      => $this->request->getVar('nurse_name'),
           
            ];
        $save = $nurseModel->insert($data);

        return redirect()->to(base_url('/websetup/public/adminpagestaff'));
    }

    public function updateNurse()
    {   
        helper(['form', 'url']);
         
        $nurseModel = new NursesAppModel();
         
        $id = $this->request->getVar('edit_nurse_id');

        $data = [

            'staff_id'  => $this->request->getVar('edit_nurse_staff_id'),
            'name'      => $this->request->getVar('edit_nurse_name')

            ]; 
 
        $save = $nurseModel->update($id,$data);
 
        return redirect()->to( base_url('/websetup/public/adminpagestaff') );
    }

    public function deleteNurse($id = null)
    {
        helper(['form', 'url']);

        $nurseModel = new NursesAppModel();
        
        $id = $this->request->getVar('delete_nurse_id');
        
        $data['nurse'] = $nurseModel->where('id', $id)->delete();
      
     return redirect()->to( base_url('/websetup/public/adminpagestaff') );
    
    }    
}