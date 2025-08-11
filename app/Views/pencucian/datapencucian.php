<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- isi konten Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h5 class="card-title">
                        <?= $title ?>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="buttons">
                        <a href="<?= site_url('pencucian/formtambah') ?>" class="btn btn-danger">Tambah Data</a>
                    </div>
                    <div class="table-responsive datatable-minimal mt-4">
                        <table class="table table-hover" id="tabelCucian">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Cucian</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Plat Nomor</th>
                                    <th>Paket</th>
                                    <th>Karyawan</th>
                                    <th>Status</th>
                                    <th class="no-short">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk cetak nomor antrian -->
<div class="modal fade" id="antrianModal" tabindex="-1" role="dialog" aria-labelledby="antrianModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
        <div class="modal-content" style="background-color: #f8f9fa; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
            <div class="modal-header"
                style="background-color: #28a745; color: white; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h5 class="modal-title" id="antrianModalLabel">
                    <i class="fas fa-ticket-alt mr-2"></i> Nomor Antrian
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4" id="antrian-content" style="overflow-y: auto;">
                <!-- Konten nomor antrian akan dimuat melalui AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-print-antrian">
                    <i class="fas fa-print mr-1"></i> Cetak Antrian
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- isi konten end -->
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $('#tabelCucian').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?= site_url('pencucian/viewCucian') ?>",
            info: true,
            ordering: true,
            paging: true,
            order: [
                [0, 'desc']
            ],
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": ["no-short"]
            }],
        });

        $(document).on('click', '.btn-delete', function() {
            var idpencucian = $(this).data('idpencucian');

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('pencucian/delete'); ?>",
                        data: {
                            idpencucian: idpencucian
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.sukses) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: response.sukses,
                                    icon: 'success'
                                });
                                // Refresh DataTable
                                $('#tabelCucian').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Gagal menghapus data',
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Gagal menghapus data',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-status', function() {
            var idpencucian = $(this).data('idpencucian');

            Swal.fire({
                title: 'Apakah Anda yakin ingin Mengubah Status ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ganti Status!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('/pencucian/ubahstatus'); ?>",
                        data: {
                            idpencucian: idpencucian
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.sukses) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: response.sukses,
                                    icon: 'success'
                                });
                                // Refresh DataTable
                                $('#tabelCucian').DataTable().ajax.reload();
                            } else if (response.error) {
                                // Handle specific error messages from server
                                Swal.fire({
                                    title: 'Tidak Dapat Mengubah Status!',
                                    text: response.error,
                                    icon: 'warning',
                                    confirmButtonText: 'OK'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Gagal mengubah status',
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Gagal mengubah status',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    });

    $(document).on('click', '.btn-edit', function() {
        var idpencucian = $(this).data('idpencucian');
        window.location.href = "<?php echo site_url('pencucian/formedit/'); ?>" + idpencucian;
    });

    $(document).on('click', '.btn-detail', function() {
        var idpencucian = $(this).data('idpencucian');
        window.location.href = "<?= site_url('pencucian/detail/') ?>" + idpencucian;
    });

    $(document).on('click', '.btn-cetak-antrian', function() {
        var idpencucian = $(this).data('idpencucian');
        
        // Load konten antrian ke modal
        $.ajax({
            type: "GET",
            url: "<?= site_url('pencucian/modalAntrian/') ?>" + idpencucian,
            dataType: 'html',
            success: function(response) {
                $('#antrian-content').html(response);
                $('#antrianModal').modal('show');
                
                // Set data untuk tombol print
                $('#btn-print-antrian').data('idpencucian', idpencucian);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                Swal.fire({
                    title: 'Error!',
                    text: 'Gagal memuat data antrian',
                    icon: 'error'
                });
            }
        });
    });

    // Handle tombol cetak di modal
    $(document).on('click', '#btn-print-antrian', function() {
        var idpencucian = $(this).data('idpencucian');
        
        // Buka halaman cetak di tab/window baru
        var printWindow = window.open("<?= site_url('pencucian/cetakAntrian/') ?>" + idpencucian, '_blank');
        
        // Auto print setelah halaman load
        printWindow.onload = function() {
            setTimeout(function() {
                printWindow.print();
            }, 500);
        };
        
        // Tutup modal
        $('#antrianModal').modal('hide');
    });
</script>
<?= $this->endSection() ?>