<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Data Pelanggan</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn bg-gradient-dark mb-0" href="/customers/create"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambahkan</a>
            </div>
          </div>
        </div>
        <div class="card-body pt-3 pb-2">
          <div class="table-responsive p-0">
            <?php if (session()->getFlashdata('success')) : ?>
              <div class="alert alert-success text-white my-3">
                <?= session()->getFlashdata('success'); ?>
              </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
              <div class="alert alert-danger text-white my-3">
                <?= session()->getFlashdata('error'); ?>
              </div>
            <?php endif; ?>
            <table id="dataTables" class="table table-hover align-items-center mb-0" id="myTable">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Daftar</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dibuat Oleh</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Detail</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customers as $customer) : ?>
                  <tr>
                    <td>
                      <div class="px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $customer['name']; ?></h6>
                          <p class="text-xs text-secondary mb-0"><?= $customer['phone']; ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-wrap"><?= $customer['address']; ?></p>
                    </td>
                    <td>
                      <span class="text-secondary text-xs font-weight-bold"><?= date('d/m/Y', strtotime($customer['created_at'])); ?></span>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $customer['user_name']; ?></p>
                    </td>
                    <td>
                      <div>
                        <a href="/customers/<?= $customer['id']; ?>" class="btn btn-primary m-0 font-weight-bold text-xs " data-toggle="tooltip" data-original-title="Detail user">
                          Pembayaran
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex justify-content-center gap-4">
                        <a href="<?= base_url('customers/update/' . $customer['id']); ?>" class="text-secondary font-weight-bold text-xs text-success" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="ni ni-ruler-pencil me-1"></i> Edit
                        </a>
                        <a href="<?= base_url('customers/delete/' . $customer['id']); ?>" class="text-secondary font-weight-bold text-xs text-danger" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="ni ni-scissors me-1"></i> Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php if (empty($customers)) : ?>
              <div class="text-center py-4">
                <p class="text-secondary mb-0">Tidak ada data pelanggan yang tersedia.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>