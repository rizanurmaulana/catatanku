<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
  protected $table = 'payments';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'id_payment',
    'customer_id',
    'user_id',
    'billing_month',
    'total_amount',
    'method',
    'date',
    'created_at',
  ];

  public function getPaymentDetailsByCustomerId($customerId)
  {
    return $this->select('payments.*, customers.id AS customer_id, customers.name AS customer_name, users.id AS user_id, users.name AS user_name')
      ->join('customers', 'payments.customer_id = customers.id')
      ->join('users', 'payments.user_id = users.id')
      ->where('payments.customer_id', $customerId)
      ->findAll();
  }

  public function getTotalAmount()
  {
    return $this->selectSum('total_amount')->get()->getRow()->total_amount;
  }

  public function getTotalAmountByUser($user_id)
  {
    return $this->selectSum('total_amount')
      ->where('user_id', $user_id)
      ->get()
      ->getRow()
      ->total_amount;
  }

  public function getPaymentById($id)
  {
    return $this->where('id', $id)->first();
  }

  public function deletePayment($id)
  {
    return $this->where('id', $id)->delete();
  }
}
