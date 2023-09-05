<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\WelcomeModel;
use App\Models\BackgroundImageModel;
use App\Models\MenuModel;
use App\Models\SubMenuModel;
use App\Models\BusinessInfosModel;
  
class AdminPageHeader extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = $session->get('user_name');
        $data['email'] = $session->get('user_email'); 

        $logoModel = new WelcomeModel();
        $data['logo'] = $logoModel->findAll();

        $imageModel = new BackgroundImageModel();
        $data['background'] = $imageModel->findAll();

        $menuModel = new MenuModel();
        $data['menu'] = $menuModel->findAll();

        $submenuModel = new SubMenuModel();
        $data['submenu'] = $submenuModel->findAll();
        
        $bussinfo = new BusinessInfosModel();
        $data['business_infos'] = $bussinfo->findAll();

        echo view('admin/headerpage', $data);
    }

    public function updateBackground()
    {   
        helper(['form', 'url']);
         
        $background = new BackgroundImageModel();
 
        $id = $this->request->getVar('id');     
        //$imagefile = $this->request->getVar('image');
        //$image = file_get_contents($_FILES[$imagefile]['tmp_name']); 
        //$info = $_FILES[$imagefile]['name'];
        //echo $info;
 
        $data = [

            'image'  => $this->request->getVar('image'),
            'info'  => $this->request->getVar('info'),
            ];
 
        $save = $background->update($id,$data);
 
        return redirect()->to( base_url('/adminpageheader') );
    }
    
    public function updateLogo()
    {   
        helper(['form', 'url']);
         
        $logo = new LogoModel();
 
        $id = $this->request->getVar('id');
 
        $data = [

            'image'  => $this->request->getVar('image'),
            'info'  => $this->request->getVar('info'),
            ];
 
        $save = $logo->update($id,$data);
 
        return redirect()->to( base_url('/adminpageheader') );
    }

    public function storeMenu()
    {   
        helper(['form', 'url']);

        $menu = new MenuModel();
        $urlstore = $this->request->getVar('url_name');
        $urlDb = base_url().'/'.$urlstore;
        $title = $this->request->getVar('name');

        $data = [
            'name'      => $title,
            'status'    => $this->request->getVar('status'),
            'url_name'  => $urlstore,
            'url'       => $urlDb,
            ];

            //Capitalize first letter
            $name =  ucwords($urlstore);

            helper(['pages_creator']);
            create_new_page($urlstore, $name, $title);

            $save = $menu->insert($data);
            
        return redirect()->to(base_url('/adminpageheader'));
    }

    public function updateMenu()
    {   
        helper(['form', 'url']);
         
        $menu = new MenuModel(); 
        $id = $this->request->getVar('id');
 
        $data = [
            'status'  => $this->request->getVar('status_edit'),
            ];
 
        $save = $menu->update($id,$data);
 
        return redirect()->to( base_url('/adminpageheader') );
    }

    public function deleteMenu($id = null)
    {
        helper(['form', 'url']);

        $menu = new MenuModel();

        $id = $this->request->getVar('delete_id');
        $view = $this->request->getVar('delete_urlname');
        $controller = ucwords($view);

        helper(['pages_creator']);
        delete_menu_page($controller, $view);
        
        $data['menu'] = $menu->where('id', $id)->delete();
      
     return redirect()->to( base_url('/adminpageheader') );
    }
}