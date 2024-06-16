<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Data User</h6>
            </div>
            <?php if (session('role') == 'admin') { ?>
              <div class="col-6 text-end">
                <a href="/users/create" class="btn bg-gradient-dark mb-0"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambahkan</a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="card-body pt-3 pb-2">
          <div class="table-responsive">
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
            <table id="dataTables" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Handphone</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Dibuat</th>
                  <?php if (session('role') == 'admin') { ?>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $user['name']; ?></h6>
                          <p class="text-xs text-secondary mb-0"><?= $user['email']; ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $user['phone']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $user['role'] == 'admin' ? 'Admin' : 'Staff'; ?></p>
                    </td>
                    <td>
                      <span class="text-secondary text-xs font-weight-bold"><?= $user['created_at']; ?></span>
                    </td>
                    <?php if (session('role') == 'admin') { ?>
                      <td>
                        <div class="d-flex justify-content-center gap-4">
                          <a href="<?= base_url('users/update/' . $user['id']); ?>" class="text-secondary font-weight-bold text-xs text-success" data-toggle="tooltip" data-original-title="Edit user">
                            <i class="ni ni-ruler-pencil me-1"></i> Edit
                          </a>
                          <a href="<?= base_url('users/delete/' . $user['id']); ?>" class="text-secondary font-weight-bold text-xs text-danger" data-toggle="tooltip" data-original-title="Edit user">
                            <i class="ni ni-scissors me-1"></i> Hapus
                          </a>
                        </div>
                      </td>
                    <?php } ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php if (empty($users)) : ?>
              <div class="text-center py-4">
                <p class="text-secondary mb-0">Tidak ada data User yang tersedia.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>