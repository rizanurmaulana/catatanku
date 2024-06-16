<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
  protected $table = 'customers';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'id',
    'user_id',
    'name',
    'phone',
    'address',
  ];

  public function getAllCustomers()
  {
    return $this->findAll();
  }

  public function getCustomerDetailsWithUser()
  {
    return $this->select('customers.*, users.name AS user_name')
      ->join('users', 'customers.user_id = users.id')
      ->findAll();
  }

  public function deleteCustomer($id)
  {
    return $this->delete($id);
  }

  public function getCustomerById($id)
  {
    return $this->find($id);
  }

  public function updateCustomer($id, $data)
  {
    return $this->update($id, $data);
  }
}
