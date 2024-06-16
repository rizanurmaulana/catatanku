<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use App\Models\CustomerModel;
use CodeIgniter\Controller;

class Payment extends Controller
{
  public function index($id)
  {
    $paymentModel = new PaymentModel();
    $customerModel = new CustomerModel();

    $payments = $paymentModel->getPaymentDetailsByCustomerId($id);
    $customer = $customerModel->find($id);

    return view('payment/index', [
      'title'     => 'Pembayaran',
      'page'      => 'Pembayaran saya',
      'payments'  => $payments,
      'customer' => $customer,
    ]);
  }

  public function create($customer_id)
  {
    $customerModel = new CustomerModel();
    $paymentModel = new PaymentModel();
    $customer = $customerModel->find($customer_id);

    // Generate id_payment
    date_default_timezone_set('Asia/Jakarta');
    $id_payment = date('dmyHis');
    // Sanitize the total_amount input (remove formatting and convert to decimal)
    $total_amount = str_replace(['Rp', '.'], '', $this->request->getPost('total_amount'));

    helper(['form']);
    $rules = [
      'billing_month' => 'required',
      'total_amount' => 'required',
      'date' => 'required|valid_date',
      'method' => 'required',
    ];

    if ($this->validate($rules)) {
      $paymentData = [
        'id_payment' => $id_payment,
        'customer_id' => $customer_id,
        'user_id' => session()->get('id'),
        'billing_month' => $this->request->getPost('billing_month'),
        'total_amount' => $total_amount,
        'date' => $this->request->getPost('date'),
        'method' => $this->request->getPost('method'),
      ];

      // Insert payment data
      if ($paymentModel->save($paymentData)) {
        return redirect()->to('/customers/' . $customer_id)->with('success', 'Pembayaran berhasil ditambahkan!');
      } else {
        return redirect()->back()->withInput()->with('error', 'Gagal menambahkan pembayaran!');
      }
    }


    return view('payment/create', [
      'title'    => 'Pembayaran',
      'page'     => 'Tambahkan pembayaran',
      'customer' => $customer,
    ]);
  }

  public function update($id)
  {
    $paymentModel = new PaymentModel();
    $payment = $paymentModel->getPaymentById($id);

    // Sanitize the total_amount input (remove formatting and convert to decimal)
    $total_amount = str_replace(['Rp', '.'], '', $this->request->getPost('total_amount'));

    helper(['form']);
    $rules = [
      'billing_month' => 'required',
      'total_amount' => 'required',
      'date' => 'required|valid_date',
      'method' => 'required',
    ];

    if ($this->validate($rules)) {
      $paymentData = [
        'billing_month' => $this->request->getPost('billing_month'),
        'total_amount' => $total_amount,
        'date' => $this->request->getPost('date'),
        'method' => $this->request->getPost('method'),
      ];

      if ($paymentModel->update(
        $id,
        $paymentData
      )) {
        return redirect()->to('/customers/' . $payment['customer_id'])->with('success', 'Pembayaran berhasil diperbarui!');
      } else {
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui pembayaran!');
      }
    }


    return view('payment/update', [
      'title'    => 'Pembayaran',
      'page'     => 'Edit pembayaran',
      'payment'  => $payment,
    ]);
  }

  public function delete($id)
  {
    $model = new PaymentModel();
    $model->deletePayment($id);

    return redirect()->back()->with('success', 'Pembayaran berhasil dihapus!');
  }
}
