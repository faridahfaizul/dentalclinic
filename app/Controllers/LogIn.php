<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class LogIn extends Controller
{    
    public function index()
    {
        helper(['form']);
        return view('/login');
    } 
  
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('user_email', $email)->first();
        if($data){
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_name'     => $data['user_name'],
                    'user_email'    => $data['user_email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                $role = $data['user_role'];
                if ($role == "Admin") {
                    return redirect()->to(base_url('/admin'));
                } else {
                    return redirect()->to(base_url('/admin'));
                }
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('/login'));
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to(base_url('/login'));
        }
    }
  
    public function forgot_password()
    {
        $data = [];

        if($this->request->getMethod()=='post'){
            $rules = [
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} field required',
                        'valid_email' => 'Valid {field} required'
                    ]
                ],
            ];

            if ($this->validate($rules)){

            }
            else{
                $data['validation']=$this->validator;
            }
        }
        return view ("/forgot_password", $data);
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }

} 