<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\GalleryModel;
use App\Models\BusinessInfosModel;
  
class AdminPageGallery extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $galleryModel = new GalleryModel();
        $data['gallery'] = $galleryModel->findAll();
                        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/gallerypage', $data);
    }

    
    public function storeGallery()
    {   
        helper(['form', 'url']);

        $galleryModel = new GalleryModel();

        $data = [
            
            'caption'   => $this->request->getVar('caption'),
            'status'    => $this->request->getVar('status'),
            'image'     => $this->request->getVar('image')
           
            ];
        $save = $galleryModel->insert($data);

        return redirect()->to(base_url('/websetup/public/adminpagegallery'));
    }

    public function updateGallery()
    {   
        helper(['form', 'url']);

        $galleryModel = new GalleryModel();

        $id = $this->request->getVar('edit_id');

        $data = [

            'caption'   => $this->request->getVar('edit_caption'),
            'status'    => $this->request->getVar('edit_status'),            
            'image'     => $this->request->getVar('edit_image')

            ]; 
 
        $save = $galleryModel->update($id,$data);
 
        return redirect()->to( base_url('/websetup/public/adminpagegallery') );
    }

    public function deleteGallery($id = null)
    {
        helper(['form', 'url']);

        $galleryModel = new GalleryModel();

        $id = $this->request->getVar('delete_id');
        
        $data['gallery'] = $galleryModel->where('id', $id)->delete();
      
     return redirect()->to( base_url('/websetup/public/adminpagegallery') );

    }
}