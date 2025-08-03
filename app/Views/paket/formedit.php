<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-purple">
            <div class="card-header text-center">
                <h3 class="card-title">Edit Data Paket</h3>
            </div>

            <div class="card-body">
                <?= form_open(base_url('paket/updatedata'), ['id' => 'formedit', 'enctype' => 'multipart/form-data']) ?>
                <?= csrf_field() ?>
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="idpaket">ID Paket</label>
                            <input type="text" id="idpaket" name="idpaket" class="form-control" value="<?= $paket['idpaket']; ?>" readonly>
                            <div class="invalid-feedback error_idpaketq"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="namapaket">Nama Paket</label>
                            <input type="text" id="namapaket" name="namapaket" class="form-control" value="<?= $paket['namapaket']; ?>">
                            <div class="invalid-feedback error_nama"></div>
                        </div>                        
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" id="harga" name="harga" class="form-control" value="<?= $paket['harga']; ?>">
                            <div class="invalid-feedback error_harga"></div>
                        </div> 
                        <div class="form-group">
                            <label for="jenis">Jenis Paket</label>
                            <select id="jenis" name="jenis" class="form-control">
                                <option value="motor" <?= $paket['jenis'] == 'motor' ? 'selected' : '' ?>>Motor</option>
                                <option value="mobil" <?= $paket['jenis'] == 'mobil' ? 'selected' : '' ?>>Mobil</option>
                            </select>
                            <div class="invalid-feedback error_jenis"></div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" id="keterangan" name="keterangan" class="form-control"><?= isset($paket['keterangan']) ? $paket['keterangan'] : '' ?></textarea>
                            <div class="invalid-feedback error_keterangan"></div>
                        </div>                       
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary" id="tombolSimpan">
                                <i class="fas fa-save"></i> SIMPAN
                            </button>
                            <a class="btn btn-secondary ml-2" href="<?= base_url('karyawan') ?>">
                                <i class="fas fa-arrow-left"></i> KEMBALI
                            </a>
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
        $('#formedit').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this); // Menggunakan FormData untuk mendukung file upload
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: formData, // Menggunakan formData untuk mendukung file upload
                contentType: false, // Menunjukkan tidak adanya konten
                processData: false, // Menunjukkan tidak adanya proses data
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

                        if (err.error_idpaket) {
                            $('#idpaket').addClass('is-invalid').removeClass('is-valid');
                            $('.error_idpaket').html(err.error_idpaket);
                        } else {
                            $('#idpaket').removeClass('is-invalid').addClass('is-valid');
                            $('.error_idpaket').html('');
                        }
                        if (err.error_namapaket) {
                            $('#namapaket').addClass('is-invalid').removeClass('is-valid');
                            $('.error_namapaket').html(err.error_namapaket);
                        } else {
                            $('#namapaket').removeClass('is-invalid').addClass('is-valid');
                            $('.error_namapaket').html('');
                        }

                        if (err.error_keterangan) {
                            $('#keterangan').addClass('is-invalid').removeClass('is-valid');
                            $('.error_keterangan').html(err.error_keterangan);
                        } else {
                            $('#keterangan').removeClass('is-invalid').addClass('is-valid');
                            $('.error_keterangan').html('');
                        }
                        if (err.error_jenis) {
                            $('#jenis').addClass('is-invalid').removeClass('is-valid');
                            $('.error_jenis').html(err.error_jenis);
                        } else {
                            $('#jenis').removeClass('is-invalid').addClass('is-valid');
                            $('.error_jenis').html('');
                        }
                    }

                    if (response.sukses) {
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: "btn btn-success",
                                cancelButton: "btn btn-danger"
                            },
                            buttonsStyling: false
                        });
                        swalWithBootstrapButtons.fire({
                            title: "Sukses!",
                            text: "Data paket berhasil disimpan.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?= site_url('paket') ?>';
                            }
                        });
                    }
                },

                error: function(e) {
                    alert('Error \n' + e.responseText);
                }
            });

            return false;
        });
    });
</script>
<?= $this->endSection() ?>