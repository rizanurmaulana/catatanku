<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'id',
    'name',
    'email',
    'phone',
    'role',
    'password',
    'created_at'
  ];

  public function getAllUsers()
  {
    return $this->findAll();
  }

  public function deleteUser($id)
  {
    return $this->delete($id);
  }

  public function getUserById($id)
  {
    return $this->find($id);
  }

  public function updateUser($id, $data)
  {
    return $this->update($id, $data);
  }
}
