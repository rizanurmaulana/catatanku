<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 col-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">total Pembayaran</p>
                <h5 class="font-weight-bolder">
                  <?php if (session()->get('id') == '1') { ?>
                    <?= 'Rp. ' . number_format(($total_amount), 0, ',', '.'); ?>
                  <?php } else { ?>
                    <?= 'Rp. ' . number_format(($total_amount_by_user), 0, ',', '.'); ?>
                  <?php } ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end d-none d-md-block">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah User</p>
                <h5 class="font-weight-bolder">
                  <?= $user_count; ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end d-none d-md-block">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pelanggan</p>
                <h5 class="font-weight-bolder">
                  <?= $customer_count; ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end d-none d-md-block">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pembayaran</p>
                <h5 class="font-weight-bolder">
                  <?= $payment_count; ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end d-none d-md-block">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>