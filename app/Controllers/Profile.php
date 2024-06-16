<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
  public function index($id)
  {
  $model = new UserModel();
  $users = $model->getUserById($id);

  $data = [
    'title' => 'Profile',
    'page'  => 'Profile saya',
    'users'  => $users,
  ];
  return view('profile/index', $data);
  }
}
