<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
  public function index()
  {
    helper(['form']);
    echo view('login');
  }

  public function auth()
  {
    $session = session();
    $model = new UserModel();
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $data = $model->where('email', $email)->first();
    if ($data) {
      $pass = $data['password'];
      $verify_pass = password_verify($password, $pass);
      if ($verify_pass) {
        $ses_data = [
          'id'       => $data['id'],
          'name'     => $data['name'],
          'email'    => $data['email'],
          'role'     => $data['role'],
          'logged_in'     => TRUE
        ];
        $session->set($ses_data);
        return redirect()->to('/dashboard');
      } else {
        $session->setFlashdata('msg', 'Password salah!');
        return redirect()->to('/');
      }
    } else {
      $session->setFlashdata('msg', 'Email tidak ditemukan!');
      return redirect()->to('/');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/');
  }
}
