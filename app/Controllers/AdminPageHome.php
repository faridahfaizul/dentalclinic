<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\SliderModel;
use App\Models\BackgroundImageModel;
use App\Models\BusinessInfosModel;
  
class AdminPageHome extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $sliderModel = new SliderModel();
        $data['slider'] = $sliderModel->findAll();
        
        $imageModel = new BackgroundImageModel();
        $data['welcome'] = $imageModel->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/homepage', $data);
    }    

    public function storeSlider()
    {   
        helper(['form', 'url']);

        $sliderModel = new SliderModel();

        $data = [

            'topic'  => $this->request->getVar('topic'),
            'description'  => $this->request->getVar('description'),
            'link'  => $this->request->getVar('link'),
            'image'  => $this->request->getVar('image'),
            'showCheck'  => $this->request->getVar('showCheck'),
            ];

        $save = $sliderModel->insert($data);

        return redirect()->to(base_url('/adminpagehome'));
    }

    public function updateSlider()
    {   
        helper(['form', 'url']);
         
        $sliderModel = new SliderModel();
 
        $id = $this->request->getVar('id');
 
        $data = [

            'topic'  => $this->request->getVar('topic'),
            'description'  => $this->request->getVar('description'),
            'link'  => $this->request->getVar('link'),
            'image'  => $this->request->getVar('image'),
            'showCheck'  => $this->request->getVar('showCheck'),
        ]; 
 
        $save = $sliderModel->update($id,$data);
 
        return redirect()->to( base_url('/adminpagehome') );
    }

    public function deleteSlider($id = null)
    {
        helper(['form', 'url']);

        $sliderModel = new SliderModel();

        $id = $this->request->getVar('delete_id');
        
        $data['slider'] = $sliderModel->where('id', $id)->delete();
      
     return redirect()->to( base_url('/adminpagehome') );
    }
    
}