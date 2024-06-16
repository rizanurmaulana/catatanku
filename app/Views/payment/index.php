<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Data Pembayaran</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn bg-gradient-dark mb-0" href="/customers/<?= $customer['id']; ?>/payment"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambahkan</a>
            </div>
          </div>
        </div>
        <div class="card-body pt-3 pb-2">
          <div class="table-responsive">
            <?php if (session()->getFlashdata('success')) : ?>
              <div class="alert alert-success text-white my-3">
                <?= session()->getFlashdata('success'); ?>
              </div>
            <?php endif; ?>
            <table id="dataTables" class="table table-hover align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Pembayaran</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelanggan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bulan Tagih</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Tagihan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Bayar</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metode Pembayaran</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dicatat Oleh</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($payments as $payment) : ?>
                  <tr>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $payment['id_payment']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $payment['customer_name']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $payment['billing_month']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= 'Rp' . number_format($payment['total_amount'], 0, ',', '.'); ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $payment['date']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $payment['method']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $payment['user_name']; ?></p>
                    </td>
                    <td>
                      <div class="d-flex justify-content-center gap-4">
                        <a href="<?= base_url('payment/' . $payment['id'] . '/update'); ?>" class="text-secondary font-weight-bold text-xs text-success" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="ni ni-ruler-pencil me-1"></i> Edit
                        </a>
                        <a href="<?= base_url('payment/' . $payment['id'] . '/delete'); ?>" class="text-secondary font-weight-bold text-xs text-danger" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="ni ni-scissors me-1"></i> Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php if (empty($payments)) : ?>
                  <tr>
                    <td colspan="9" class="text-center py-4">
                      <p class="text-secondary mb-0">Tidak ada data pembayaran yang tersedia.</p>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var rupiah = document.getElementById("rupiah");
  rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
  }
</script>
<?= $this->endSection(); ?>