<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="card shadow-lg mx-4">
  <div class="card-body p-3">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            <?= $users['name']; ?>
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            <?= $users['role']; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Detail Profile</p>
            <!-- <button class="btn btn-primary btn-sm ms-auto">Simpan</button> -->
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Nama</label>
                <p class="ps-1 text-xs font-weight-bold"><?= $users['name']; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email</label>
                <p class="ps-1 text-xs font-weight-bold"><?= $users['email']; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">No. Handphone</label>
                <p class="ps-1 text-xs font-weight-bold"><?= $users['phone']; ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Role</label>
                <p class="ps-1 text-xs font-weight-bold"><?= $users['role']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>