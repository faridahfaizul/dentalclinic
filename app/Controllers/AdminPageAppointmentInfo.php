<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\AppointmentHoursModel;
use App\Models\BusinessInfosModel;
  
class AdminPageAppointmentInfo extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $appointmentModel = new AppointmentHoursModel();
        $data['hour'] = $appointmentModel->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/appointmentinfopage', $data);
    }


    public function updateTime()
    {   
        helper(['form', 'url']);
         
        $appointmentModel = new AppointmentHoursModel();
 
        $id = $this->request->getVar('id');

        $data = [
            'number'    => $this->request->getVar('number'),
            'status'    => $this->request->getVar('status')
            ]; 
 
        $save = $appointmentModel->update($id,$data);
 
        return redirect()->to( base_url('/adminpageappointmentinfo') );
    }
}