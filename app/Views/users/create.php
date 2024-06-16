<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Tambahkan User</h6>
            </div>
          </div>
        </div>
        <div class="card-body pt-3 pb-2">
          <form action="/users/create" method="post">
            <?= csrf_field(); ?>
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="name" class="form-control-label">Nama User</label>
                  <input class="form-control" type="text" name="name" id="name" value="<?= old('name'); ?>" required>
                </div>
                <div class="form-group">
                  <label for="email" class="form-control-label">Email</label>
                  <input class="form-control" type="email" name="email" id="email" value="<?= old('email'); ?>" required>
                </div>
                <div class="form-group">
                  <label for="phone" class="form-control-label">No. Handphone</label>
                  <input class="form-control" type="tel" name="phone" id="phone" value="<?= old('phone'); ?>" required>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-group">
                  <label for="role" class="form-control-label">Role</label>
                  <select class="form-select" name="role" aria-label="Select Role" required>
                    <option selected>Pilih Role</option>
                    <option value="admin" <?= old('role') == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="staff" <?= old('role') == 'staff' ? 'selected' : ''; ?>>Staff</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="password" class="form-control-label">Password</label>
                  <input class="form-control" type="password" name="password" id="password" required>
                </div>
              </div>
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-primary me-2">Tambah User</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>