<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Edit Pelanggan</h6>
            </div>
          </div>
        </div>
        <div class="card-body pt-3 pb-2">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <?php if (session()->getFlashdata('errors')) : ?>
                  <div class="alert alert-danger text-white">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                      <p><?= $error ?></p>
                    <?php endforeach ?>
                  </div>
                <?php endif ?>
                <form action="/customers/update/<?= $customer['id']; ?>" method="post">
                  <?= csrf_field(); ?>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Pelanggan</label>
                    <input class="form-control" type="text" name="name" value="<?= $customer['name']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No. Handphone</label>
                    <input class="form-control" type="text" name="phone" value="<?= $customer['phone']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input class="form-control" type="text" name="address" value="<?= $customer['address']; ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary mt-4">Edit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>