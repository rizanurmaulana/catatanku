<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Models\PaymentModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
  public function index()
  {
    $userModel = new UserModel();
    $users = $userModel->getAllUsers();

    $customerModel = new CustomerModel();
    $customers = $customerModel->findAll();

    $paymentModel = new PaymentModel();
    $payments = $paymentModel->findAll();
    $totalAmount = $paymentModel->getTotalAmount();
    $totalAmountByUser = $paymentModel->getTotalAmountByUser(session()->get('id'));

    $data = [
      'title'       => 'Dashboard',
      'page'        => 'Statistik',
      'user_count'  => count($users),
      'customer_count'  => count($customers),
      'payment_count'  => count($payments),
      'total_amount'  => $totalAmount,
      'total_amount_by_user'  => $totalAmountByUser,
    ];
    return view('dashboard/index', $data);
  }
}
