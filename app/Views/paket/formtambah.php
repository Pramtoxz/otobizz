<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-maroon">
            <div class="card-header text-center">
                <h3 class="card-title">Tambah Data Paket</h3>
            </div>

            <div class="card-body">
                <?= form_open('paket/save', ['id' => 'formtambahpaket', 'enctype' => 'multipart/form-data']) ?>
                <?= csrf_field() ?>
                
                  <div class="row justify-content-center">
                    <div class="col-md-8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="idpaket">ID paket</label>
                                    <input type="text" id="idpaket" name="idpaket" class="form-control" value="<?= $next_id ?>" readonly>
                                    <div class="invalid-feedback error_idpaket"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="namapaket">Nama paket</label>
                                    <input type="text" id="namapaket" name="namapaket" class="form-control">
                                    <div class="invalid-feedback error_namapaket"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="harga">Harga Paket</label>
                                    <input type="text" id="harga" name="harga" class="form-control" placeholder="Rp. 0">
                                    <div class="invalid-feedback error_harga"></div>
                                </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">Deskripsi</label>
                                    <textarea id="keterangan" name="keterangan" class="form-control" rows="8"></textarea>
                                    <div class="invalid-feedback error_keterangan"></div>
                                </div>
                            </div>
                              <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" id="tombolSimpan">
                            <i class="fas fa-save"></i> SIMPAN
                        </button>
                        <a class="btn btn-secondary ml-2" href="<?= base_url('paket') ?>">
                            <i class="fas fa-arrow-left"></i> KEMBALI
                        </a>
                    </div>
                        </div>
                    </div>
                </div>
                
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(function() {
        // Format currency function
        function formatRupiah(value) {
            const number = parseInt(value.replace(/[^0-9]/g, ''), 10);
            if (isNaN(number)) return '';
            return 'Rp. ' + number.toLocaleString('id-ID');
        }

        // Remove currency format to get plain number
        function removeCurrencyFormat(value) {
            return value.replace(/[^0-9]/g, '');
        }

        // Format currency on input
        $('#harga').on('input', function() {
            const input = $(this);
            const value = input.val();
            const formatted = formatRupiah(value);
            input.val(formatted);
        });

        $('#formtambahpaket').submit(function(e) {
            e.preventDefault();
            const hargaPlain = removeCurrencyFormat($('#harga').val());
            let formData = new FormData(this);
            formData.set('harga', hargaPlain);

            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function() {
                    $('#tombolSimpan').html('<i class="fas fa-spin fa-spinner"></i> Tunggu');
                    $('#tombolSimpan').prop('disabled', true);
                },
                complete: function() {
                    $('#tombolSimpan').html('<i class="fas fa-save"></i> Simpan');
                    $('#tombolSimpan').prop('disabled', false);
                },
                success: function(response) {
                    if (response.error) {
                        let err = response.error;

                        if (err.idpaket) {
                            $('#idpaket').addClass('is-invalid');
                            $('.error_idpaket').html(err.idpaket);
                        } else {
                            $('#idpaket').removeClass('is-invalid').addClass('is-valid');
                            $('.error_idpaket').html('');
                        }

                        if (err.namapaket) {
                            $('#namapaket').addClass('is-invalid');
                            $('.error_namapaket').html(err.namapaket);
                        } else {
                            $('#namapaket').removeClass('is-invalid').addClass('is-valid');
                            $('.error_namapaket').html('');
                        }
                        if (err.harga) {
                            $('#harga').addClass('is-invalid');
                            $('.error_harga').html(err.harga);
                        } else {
                            $('#harga').removeClass('is-invalid').addClass('is-valid');
                            $('.error_harga').html('');
                        }
                        if (err.keterangan) {
                            $('#keterangan').addClass('is-invalid');
                            $('.error_keterangan').html(err.keterangan);
                        } else {
                            $('#keterangan').removeClass('is-invalid').addClass('is-valid');
                            $('.error_keterangan').html('');
                        }
                    } else if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.sukses,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        setTimeout(() => {
                            window.location.href = "<?= site_url('paket') ?>";
                        }, 1500);
                    }
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan:\n' + xhr.responseText);
                }
            });
            return false;
        });
    });
</script>
<?= $this->endSection() ?>