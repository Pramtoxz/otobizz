<div class="text-center">
    <!-- Nomor Antrian Besar -->
    <div class="mb-4">
        <div class="display-1 font-weight-bold text-success" style="font-size: 4rem;">
            <?= str_pad($pencucian['nomor_antrian'], 2, '0', STR_PAD_LEFT) ?>
        </div>
        <h4 class="text-muted">NOMOR ANTRIAN</h4>
        <div class="badge badge-secondary p-2" style="font-size: 0.9rem;">
            <?= $pencucian['idpencucian'] ?>
        </div>
    </div>

    <!-- Informasi Pelanggan -->
    <div class="card mb-3">
        <div class="card-body">
            <h6 class="card-title text-left mb-3">
                <i class="fas fa-user mr-2"></i> Informasi Pelanggan
            </h6>
            <div class="row text-left">
                <div class="col-sm-4 font-weight-bold">Nama:</div>
                <div class="col-sm-8"><?= esc($pencucian['nama_pelanggan']) ?></div>
            </div>
            <div class="row text-left">
                <div class="col-sm-4 font-weight-bold">Plat Nomor:</div>
                <div class="col-sm-8"><?= esc($pencucian['platnomor']) ?></div>
            </div>
            <div class="row text-left">
                <div class="col-sm-4 font-weight-bold">Paket:</div>
                <div class="col-sm-8"><?= esc($pencucian['namapaket']) ?></div>
            </div>
            <div class="row text-left">
                <div class="col-sm-4 font-weight-bold">Harga:</div>
                <div class="col-sm-8">Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></div>
            </div>
        </div>
    </div>

    <!-- Estimasi Waktu -->
    <div class="card bg-light">
        <div class="card-body">
            <h6 class="card-title">
                <i class="fas fa-clock mr-2"></i> Estimasi Waktu
            </h6>
            <div class="h4 text-primary mb-2">~<?= $estimasi_waktu ?></div>
            <small class="text-muted">
                <?php if($antrian_sebelum > 0): ?>
                    Ada <?= $antrian_sebelum ?> antrian sebelum Anda
                <?php else: ?>
                    Antrian berikutnya akan diproses
                <?php endif; ?>
            </small>
        </div>
    </div>

    <!-- Info Tambahan -->
    <div class="mt-3">
        <small class="text-muted">
            <i class="fas fa-calendar mr-1"></i> <?= date('d/m/Y', strtotime($pencucian['tgl'])) ?>
            <i class="fas fa-clock ml-3 mr-1"></i> <?= date('H:i', strtotime($pencucian['jamdatang'])) ?>
        </small>
    </div>
</div>
