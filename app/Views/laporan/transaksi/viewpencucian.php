<style>
/* Modern Table Styles */
.modern-table-container {
    background: white;
    border-radius: 15px;
    overflow-x: auto;
    overflow-y: hidden;
    box-shadow: 0 10px 30px rgba(111, 66, 193, 0.08);
    border: 1px solid rgba(111, 66, 193, 0.1);
    margin: 20px 0;
    -webkit-overflow-scrolling: touch;
}

.modern-table {
    width: 100%;
    min-width: 900px;
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 14px;
    table-layout: fixed;
}

.modern-table thead {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%);
    color: white;
}

.modern-table thead th {
    padding: 15px 12px;
    font-weight: 600;
    border: none;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    position: relative;
    vertical-align: middle;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
}

.modern-table thead th:first-child {
    border-top-left-radius: 0;
}

.modern-table thead th:last-child {
    border-top-right-radius: 0;
}

.modern-table thead th::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.modern-table tbody tr {
    background: white;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(111, 66, 193, 0.08);
}

.modern-table tbody tr:hover {
    background: linear-gradient(135deg, #f8f9ff 0%, #eef2ff 100%);
    transform: scale(1.01);
    box-shadow: 0 5px 15px rgba(111, 66, 193, 0.1);
}

.modern-table tbody tr:last-child {
    border-bottom: none;
}

.modern-table tbody td {
    padding: 15px 12px;
    border: none;
    vertical-align: middle;
    color: #333;
    font-weight: 500;
    word-wrap: break-word;
}

.modern-table tbody td:first-child {
    text-align: center;
    font-weight: 600;
    color: #6F42C1;
    background: linear-gradient(135deg, #f8f9ff 0%, #eef2ff 100%);
    width: 60px;
}

/* Column Specific Styles */
.col-no {
    background: linear-gradient(135deg, #f8f9ff 0%, #eef2ff 100%) !important;
    font-weight: 700 !important;
    color: #6F42C1 !important;
    text-align: center !important;
    font-size: 15px;
    width: 60px;
    padding: 15px 12px !important;
}

.col-id {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: #2c3e50;
    text-align: center !important;
    width: 120px;
    font-size: 13px;
    padding: 15px 12px !important;
}

.col-name {
    font-weight: 600;
    color: #2c3e50;
    text-align: left !important;
    width: 150px;
    padding: 15px 12px !important;
}

.col-date {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: #e67e22;
    text-align: center !important;
    width: 120px;
    padding: 15px 12px !important;
}

.col-paket {
    font-weight: 600;
    color: #27ae60;
    text-align: left !important;
    width: 150px;
    padding: 15px 12px !important;
}

.col-price {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: #e74c3c;
    text-align: right !important;
    width: 140px;
    padding: 15px 12px !important;
}

/* Footer Total Styles */
.total-row {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%) !important;
    color: white !important;
    font-weight: 700 !important;
}

.total-row td {
    color: white !important;
    font-weight: 700 !important;
    font-size: 16px !important;
    padding: 18px 12px !important;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.total-row .total-label {
    text-align: right !important;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.total-row .total-amount {
    text-align: right !important;
    font-family: 'Courier New', monospace;
    font-size: 18px !important;
    font-weight: 900 !important;
}

/* Table Stats */
.table-stats {
    background: linear-gradient(135deg, #f8f9ff 0%, #eef2ff 100%);
    padding: 15px 20px;
    border-top: 1px solid rgba(111, 66, 193, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
    color: #666;
}

.table-stats .stats-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.table-stats .stats-item i {
    color: #6F42C1;
    font-size: 14px;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #999;
}

.empty-state i {
    font-size: 48px;
    color: #ddd;
    margin-bottom: 20px;
    display: block;
}

.empty-state h5 {
    color: #666;
    margin-bottom: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .modern-table {
        font-size: 11px;
        table-layout: auto;
        min-width: 700px;
    }
    
    .modern-table thead th,
    .modern-table tbody td {
        padding: 8px 6px;
    }
    
    .modern-table thead th {
        font-size: 10px;
    }
    
    .col-name,
    .col-id {
        width: auto;
        min-width: 80px;
        font-size: 10px;
    }
    
    .col-price {
        width: auto;
        min-width: 90px;
        font-size: 10px;
    }
    
    .table-stats {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .modern-table-container {
        margin: 10px -15px;
        border-radius: 0;
    }
    
    .modern-table {
        font-size: 11px;
        min-width: 600px;
    }
    
    .modern-table thead th,
    .modern-table tbody td {
        padding: 8px 6px;
    }
}

/* Print Styles */
@media print {
    .modern-table-container {
        box-shadow: none;
        border: 1px solid #000;
        overflow: visible;
    }
    
    .modern-table {
        min-width: auto;
        table-layout: auto;
        width: 100%;
        font-size: 12px;
    }
    
    .modern-table thead {
        background: #f0f0f0 !important;
        color: #000 !important;
    }
    
    .modern-table thead th,
    .modern-table tbody td {
        padding: 8px 6px;
        border: 1px solid #000;
    }
    
    .modern-table tbody tr:hover {
        background: white !important;
        transform: none !important;
        box-shadow: none !important;
    }
    
    .total-row {
        background: #f0f0f0 !important;
        color: #000 !important;
    }
    
    .total-row td {
        color: #000 !important;
        border: 1px solid #000;
    }
    
    .table-stats {
        background: white !important;
        border-top: 1px solid #000;
    }
}
</style>

<?php if (empty($perawatan)): ?>
    <div class="empty-state">
        <i class="fas fa-car-wash"></i>
        <h5>Tidak Ada Data Pencucian</h5>
        <p class="text-muted">Belum ada data transaksi pencucian yang terdaftar dalam sistem untuk periode yang dipilih.</p>
    </div>
<?php else: ?>
    <div class="modern-table-container">
        <table class="modern-table">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 120px;">ID Pencucian</th>
                    <th style="width: 120px;">Plat Nomor</th>
                    <th style="width: 150px;">Pelanggan</th>
                    <th style="width: 150px;">Karyawan</th>
                    <th style="width: 120px;">Tanggal</th>
                    <th style="width: 150px;">Paket Cucian</th>
                    <th style="width: 140px;">Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $totalBiaya = 0;
                
                foreach ($perawatan as $row): 
                    $totalBiaya += $row['total'];
                ?>
                <tr>
                    <td class="col-no"><?= $no++ ?></td>
                    <td class="col-id"><?= esc($row['idpencucian']) ?></td>
                    <td class="col-id"><?= esc($row['platnomor']) ?></td>
                    <td class="col-name"><?= esc($row['nama_pelanggan']) ?></td>
                    <td class="col-name"><?= esc($row['nama_karyawan']) ?></td>
                    <td class="col-date"><?= date('d-m-Y', strtotime($row['tglpencucian'])) ?></td>
                    <td class="col-paket"><?= esc($row['namapaket']) ?></td>
                    <td class="col-price">Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
                
                <tr class="total-row">
                    <td colspan="7" class="total-label">Total Keseluruhan:</td>
                    <td class="total-amount">Rp <?= number_format($totalBiaya, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
        
        <div class="table-stats">
            <div class="stats-item">
                <i class="fas fa-car-wash"></i>
                <span><strong>Total Transaksi:</strong> <?= count($perawatan) ?> item</span>
            </div>
            <div class="stats-item">
                <i class="fas fa-money-bill-wave"></i>
                <span><strong>Total Pendapatan:</strong> Rp <?= number_format($totalBiaya, 0, ',', '.') ?></span>
            </div>
            <div class="stats-item">
                <i class="fas fa-calendar"></i>
                <span><strong>Dicetak:</strong> <?= date('d F Y, H:i') ?> WIB</span>
            </div>
        </div>
    </div>
<?php endif; ?> 