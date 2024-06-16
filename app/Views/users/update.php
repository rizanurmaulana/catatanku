<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Edit User</h6>
            </div>
          </div>
        </div>
        <div class="card-body pt-3 pb-2">
          <div class="row">
            <form action="<?= base_url('/users/update/' . $user['id']); ?>" method="post">
              <?= csrf_field(); ?>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Nama User</label>
                <input class="form-control" type="text" name="name" value="<?= $user['name']; ?>" required>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email</label>
                <input class="form-control" type="email" name="email" value="<?= $user['email']; ?>" required>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">No. Handphone</label>
                <input class="form-control" type="text" name="phone" value="<?= $user['phone']; ?>" required>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Role</label>
                <select class="form-select" name="role" aria-label="Select Role" required>
                  <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                  <option value="staff" <?= $user['role'] == 'staff' ? 'selected' : ''; ?>>Staff</option>
                </select>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Password</label>
                <input class="form-control" type="password" name="password">
              </div>
              <button type="submit" class="btn btn-primary mt-4">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>