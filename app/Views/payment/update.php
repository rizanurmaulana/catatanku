<?= $this->extend('layouts/layouts'); ?>

<?= $this->section('main-content'); ?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="d-flex align-items-center">
              <h6 class="mb-0">Edit Pembayaran</h6>
            </div>
          </div>
        </div>
        <div class="card-body pt-3 pb-2">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <form action="/payment/<?= $payment['id']; ?>/update" method="post">
                  <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="bulan_tagih" class="form-control-label">Bulan Tagih</label>
                    <input type="month" class="form-control" name="billing_month" value="<?= $payment['billing_month']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="total_tagihan" class="form-control-label">Total Tagihan</label>
                    <input type="text" id="rupiah" step="0.01" class="form-control" name="total_amount" value="<?= number_format(($payment['total_amount']), 0, ',', '.') ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_bayar" class="form-control-label">Tanggal Bayar</label>
                    <input type="date" class="form-control" name="date" value="<?= $payment['date']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="metode_pembayaran" class="form-control-label">Metode Pembayaran</label>
                    <select class="form-control" name="method" value="<?= $payment['method']; ?>" required>
                      <option value="transfer">Transfer Bank</option>
                      <option value="tunai">Tunai</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                </form>
              </div>
            </div>
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