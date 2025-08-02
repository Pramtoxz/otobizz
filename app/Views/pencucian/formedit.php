<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-purple">
            <div class="card-header text-center">
                <h3 class="card-title">Edit Data Pelanggan</h3>
            </div>

            <div class="card-body">
                <?= form_open('pelanggan/updatedata', ['id' => 'formeditpelanggan', 'enctype' => 'multipart/form-data']) ?>
                <?= csrf_field() ?>
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="idpelanggan">ID Pelanggan</label>
                            <input type="text" id="idpelanggan" name="idpelanggan" class="form-control" value="<?= $pelanggan['idpelanggan'] ?>" readonly>
                            <div class="invalid-feedback error_idpelanggan"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?= $pelanggan['nama'] ?>">
                            <div class="invalid-feedback error_nama"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" id="alamat" name="alamat" class="form-control"><?= isset($pelanggan['alamat']) ? $pelanggan['alamat'] : '' ?></textarea>
                            <div class="invalid-feedback error_alamat"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="nohp">No HP</label>
                            <input type="number" id="nohp" name="nohp" class="form-control" value="<?= $pelanggan['nohp'] ?>">
                            <div class="invalid-feedback error_nohp"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="form-control">
                                <option value="L" <?= $pelanggan['jk'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= $pelanggan['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <div class="invalid-feedback error_jk"></div>
                        </div>
                        <div class="form-group">
                            <label for="cover">Plat Nomor</label>
                            <input type="text" id="platnomor" name="platnomor" class="form-control" value="<?= $pelanggan['platnomor'] ?>">
                            <div class="invalid-feedback error_platnomor"></div>
                        </div>
                        
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary" id="tombolSimpan">
                                <i class="fas fa-save"></i> SIMPAN
                            </button>
                            <a class="btn btn-secondary ml-2" href="<?= base_url('pelanggan') ?>">
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
        $('#formeditpelanggan').submit(function(e) {
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

                        if (err.error_idpelanggan) {
                            $('#idpelanggan').addClass('is-invalid').removeClass('is-valid');
                            $('.error_idpelanggan').html(err.error_idpelanggan);
                        } else {
                            $('#idpelanggan').removeClass('is-invalid').addClass('is-valid');
                            $('.error_idpelanggan').html('');
                        }
                        if (err.error_nama) {
                            $('#nama').addClass('is-invalid').removeClass('is-valid');
                            $('.error_nama').html(err.error_nama);
                        } else {
                            $('#nama').removeClass('is-invalid').addClass('is-valid');
                            $('.error_nama').html('');
                        }

                        if (err.error_alamat) {
                            $('#alamat').addClass('is-invalid').removeClass('is-valid');
                            $('.error_alamat').html(err.error_alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid').addClass('is-valid');
                            $('.error_alamat').html('');
                        }

                        if (err.error_nohp) {
                            $('#nohp').addClass('is-invalid').removeClass('is-valid');
                            $('.error_nohp').html(err.error_nohp);
                        } else {
                            $('#nohp').removeClass('is-invalid').addClass('is-valid');
                            $('.error_nohp').html('');
                        }

                        if (err.error_jk) {
                            $('#jk').addClass('is-invalid').removeClass('is-valid');
                            $('.error_jk').html(err.error_jk);
                        } else {
                            $('#jk').removeClass('is-invalid').addClass('is-valid');
                            $('.error_jk').html('');
                        }

                        if (err.error_platnomor) {
                            $('#platnomor').addClass('is-invalid').removeClass('is-valid');
                            $('.error_platnomor').html(err.error_platnomor);
                        } else {
                            $('#platnomor').removeClass('is-invalid').addClass('is-valid');
                            $('.error_platnomor').html('');
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
                            text: "Data pelanggan berhasil disimpan.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?= site_url('pelanggan') ?>';
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