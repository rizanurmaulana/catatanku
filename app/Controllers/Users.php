<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends BaseController
{

  public function index()
  {
    $model = new UserModel();
    $users = $model->getAllUsers();

    $data = [
      'title' => 'Data User',
      'page'  => 'User',
      'users' => $users
    ];

    return view('users/index', $data);
  }

  public function create()
  {
    helper(['form']);
    $rules = [
      'name'      => 'required|min_length[3]|max_length[255]',
      'email'     => 'required|valid_email|is_unique[users.email]',
      'role'      => 'required',
      'phone'     => 'required',
      'password'  => 'required|min_length[8]'
    ];

    if ($this->validate($rules)) {
      $userData = [
        'name'      => $this->request->getVar('name'),
        'email'     => $this->request->getVar('email'),
        'role'      => $this->request->getVar('role'),
        'phone'     => $this->request->getVar('phone'),
        'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      ];

      $model = new UserModel();
      if ($model->insert($userData)) {
        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan!');
      } else {
        return redirect()->back()->with('error', 'Gagal menambahkan user!');
      }
    }

    return view('users/create', [
      'title' => 'Data User',
      'page'  => 'Tambahkan User',
    ]);
  }


  public function update($id)
  {
    helper(['form']);
    $model = new UserModel();

    $rules = [
      'name'      => 'required|min_length[3]|max_length[255]',
      'email'     => 'required|valid_email',
      'role'      => 'required',
      'phone'     => 'required',
      'password'  => 'required|min_length[8]'
    ];

    if ($this->validate($rules)) {
      $data = [
        'name'     => $this->request->getVar('name'),
        'email'    => $this->request->getVar('email'),
        'role'     => $this->request->getVar('role'),
        'phone'    => $this->request->getVar('phone'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
      ];

      if ($model->updateUser($id, $data)) {
        return redirect()->to('/users')->with('success', 'User berhasil diperbarui!');
      } else {
        return redirect()->back()->with('error', 'Gagal memperbarui user!');
      }
    }

    return view('users/update', [
      'title'       => 'Data User',
      'page'        => 'Edit User',
      'user'        => $model->getUserById($id),
    ]);
  }

  public function delete($id)
  {
    $model = new UserModel();

    if ($model->deleteUser($id)) {
      return redirect()->to('/users')->with('success', 'User berhasil dihapus!');
    } else {
      return redirect()->to('/users')->with('error', 'Gagal menghapus user!');
    }
  }
}
