<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\TeamModel;
use App\Models\BusinessInfosModel;
  
class AdminPageTeam extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $teamModal = new TeamModel();
        $data['team'] = $teamModal->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/teampage', $data);
    }

    public function storeTeam()
    {   
        helper(['form', 'url']);

        $teamModal = new TeamModel();

        $data = [

            'name'  => $this->request->getVar('name'),
            'position'  => $this->request->getVar('position'),
            'info'  => $this->request->getVar('info'),
            'status'  => $this->request->getVar('status'),
            'image'  => $this->request->getVar('image')
            
            ];

        $save = $teamModal->insert($data);

        return redirect()->to(base_url('/adminpageteam'));
    }

    public function updateTeam()
    {   
        helper(['form', 'url']);
         
        $teamModal = new TeamModel();
 
        $id = $this->request->getVar('id');
 
        $data = [

            'name'  => $this->request->getVar('name'),
            'position'  => $this->request->getVar('position'),
            'info'  => $this->request->getVar('info'),
            'status'  => $this->request->getVar('status'),
            'image'  => $this->request->getVar('image')
        ]; 
 
        $save = $teamModal->update($id,$data);
 
        return redirect()->to( base_url('/adminpageteam') );
    }

    public function deleteTeam($id = null)
    {
        helper(['form', 'url']);

        $teamModal = new TeamModel();

        $id = $this->request->getVar('delete_id');
        
        $data['team'] = $teamModal->where('id', $id)->delete();
      
     return redirect()->to( base_url('/adminpageteam') );
    }
    
}