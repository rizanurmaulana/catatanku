<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Tambahkan Pelanggan</h6>
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
                <form action="/customers/create" method="post">
                  <?= csrf_field(); ?>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Pelanggan</label>
                    <input class="form-control" type="text" name="name" value="<?= old('name'); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No. Handphone</label>
                    <input class="form-control" type="text" name="phone" value="<?= old('phone'); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <div class="row">
                      <div class="col-4">
                        <input class="form-control" type="text" name="dusun" placeholder="Dusun" required>
                      </div>
                      <div class="col-2">
                        <input class="form-control" type="text" name="rt" placeholder="RT" required>
                      </div>
                      <div class="col-2">
                        <input class="form-control" type="text" name="rw" placeholder="RW" required>
                      </div>
                      <div class="col-4">
                        <input class="form-control" type="text" name="desa" placeholder="Desa" required>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mt-4">Tambah Pelanggan</button>
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