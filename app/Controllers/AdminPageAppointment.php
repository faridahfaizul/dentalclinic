<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\TextInfoModel;
use App\Models\AppointmentModel;
use App\Models\ServicesModel;
use App\Models\DoctorsAppModel;
use App\Models\NursesAppModel;
use App\Models\AppointmentHoursModel;
use App\Models\BusinessInfosModel;
  
class AdminPageAppointment extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $appointmentModel = new AppointmentModel();
        $data['appointment'] = $appointmentModel->findAll();
        
        $servicesModel = new ServicesModel();
        $data['services'] = $servicesModel->findAll();
        
        $doctorsmodel = new DoctorsAppModel();
        $data['doctors'] = $doctorsmodel->findAll();
        
        $nursesmodel = new NursesAppModel();
        $data['nurses'] = $nursesmodel->findAll();
        
        $appointmentModel = new AppointmentHoursModel();
        $data['hour'] = $appointmentModel->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/appointmentpage', $data);
    }

    public function storeApp()
    {   
        helper(['form', 'url']);

        $appointmentModel = new AppointmentModel();

        $data = [

            'name'      => $this->request->getVar('name'),
            'identity'  => $this->request->getVar('identity'),
            'phone'     => $this->request->getVar('phone'),
            'email'     => $this->request->getVar('email'),
            'service'   => $this->request->getVar('services'),
            'date'      => $this->request->getVar('date'),
            'time'      => $this->request->getVar('hour'),
            'doctor'    => $this->request->getVar('doctor'),
            'nurse'     => $this->request->getVar('nurse'),
            'notes'     => $this->request->getVar('notes'),
            'status'    => $this->request->getVar('status')
            ];

        $save = $appointmentModel->insert($data);

        return redirect()->to(base_url('/websetup/public/adminpageappointment'));
    }

    public function updateApp()
    {   
        helper(['form', 'url']);
         
        $appointmentModel = new AppointmentModel();
 
        $id = $this->request->getVar('id');

        $data = [
            
            'name'      => $this->request->getVar('name'),
            'identity'  => $this->request->getVar('identity'),
            'phone'     => $this->request->getVar('phone'),
            'email'     => $this->request->getVar('email'),
            'service'   => $this->request->getVar('services'),
            'date'      => $this->request->getVar('date'),
            'time'      => $this->request->getVar('hour'),
            'doctor'    => $this->request->getVar('doctor'),
            'nurse'     => $this->request->getVar('nurse'),
            'notes'     => $this->request->getVar('notes'),
            'status'    => $this->request->getVar('status')
            ]; 
 
        $save = $appointmentModel->update($id,$data);
 
        return redirect()->to( base_url('/websetup/public/adminpageappointment') );
    }

    public function completeApp()
    {   
        helper(['form', 'url']);
         
        $appointmentModel = new AppointmentModel();
 
        $id = $this->request->getVar('complete_id');

        $data = [
            
            'status'    => $this->request->getVar('complete_status')
            ]; 
 
        $save = $appointmentModel->update($id,$data);
 
        return redirect()->to( base_url('/websetup/public/adminpageappointment') );
    }

    public function cancelApp()
    {   
        helper(['form', 'url']);
         
        $appointmentModel = new AppointmentModel();
 
        $id = $this->request->getVar('cancelled_id');

        $data = [
            
            'status'    => $this->request->getVar('cancelled_status')
            ]; 
 
        $save = $appointmentModel->update($id,$data);
 
        return redirect()->to( base_url('/websetup/public/adminpageappointment') );
    }

    public function deleteApp($id = null)
    {
        helper(['form', 'url']);

        $appointmentModel = new AppointmentModel();

        $id = $this->request->getVar('delete_id');
        
        $data['appointment'] = $appointmentModel->where('id', $id)->delete();
      
     return redirect()->to( base_url('/websetup/public/adminpageappointment') );
    }
}