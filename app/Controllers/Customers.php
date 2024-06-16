<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class Customers extends BaseController
{
  public function index()
  {
    $model = new CustomerModel();

    $customers = $model->getCustomerDetailsWithUser();

    $data = [
      'title'     => 'Pelanggan',
      'page'      => 'Data Pelanggan',
      'customers' => $customers
    ];

    return view('customers/index', $data);
  }

  public function create()
  {
    helper(['form']);
    $session = session();

    $rules = [
      'name'    => 'required|min_length[3]|max_length[255]',
      'phone'   => 'required',
      'dusun'   => 'required',
      'rt'      => 'required',
      'rw'      => 'required',
      'desa'    => 'required',
    ];

    $address = 'Dusun ' . $this->request->getVar('dusun') . ' RT ' . $this->request->getVar('rt') . ' RW ' . $this->request->getVar('rw') . ' Desa ' . $this->request->getVar('desa');

    if ($this->validate($rules)) {
      $data = [
        'name' => $this->request->getVar('name'),
        'phone' => $this->request->getVar('phone'),
        'address' => $address,
        'user_id' => $session->get('id')
      ];

      $model = new CustomerModel();
      if ($model->insert($data, false)) {
        return redirect()->to('/customers')->with('success', 'Customer berhasil ditambahkan!');
      } else {
        return redirect()->back()->with('error', 'Gagal menambahkan user!');
      }
    }

    return view('customers/create', [
      'title' => 'Data Pelanggan',
      'page' => 'Tambahkan Pelanggan',
    ]);
  }

  public function update($id)
  {
    helper(['form']);
    $model = new CustomerModel();

    $rules = [
      'name'    => 'required|min_length[3]|max_length[255]',
      'phone'   => 'required',
      'address' => 'required',
    ];

    if ($this->validate($rules)) {
      $data = [
        'name'    => $this->request->getVar('name'),
        'phone'   => $this->request->getVar('phone'),
        'address' => $this->request->getVar('address'),
      ];

      if ($model->updateCustomer($id, $data)) {
        return redirect()->to('/customers')->with('success', 'Pelanggan berhasil diperbarui!');
      } else {
        return redirect()->back()->with('error', 'Gagal memperbarui pelanggan!');
      }
    }

    return view('customers/update', [
      'title'    => 'Data Pelanggan',
      'page'     => 'Edit Pelanggan',
      'customer' => $model->getCustomerById($id),
    ]);
  }

  public function delete($id)
  {
    $model = new CustomerModel();

    if ($model->deleteCustomer($id)) {
      return redirect()->to('/customers')->with('success', 'Pelanggan berhasil dihapus!');
    } else {
      return redirect()->to('/customers')->with('error', 'Gagal menghapus pelanggan!');
    }
  }
}
