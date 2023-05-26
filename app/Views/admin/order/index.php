<?= $this->extend('admin/layout/template') ?>

<?php
    function buatRp($angka){
        $hasil="Rp. ". number_format($angka);
        return $hasil;
    }
    ?>

    <?= $this->section('content') ?>
        <div class="card mb-4 my-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                        
                    </div>
                <div class="card-body">
                <h1 class="mt-4">Daftar Order Tiket Wisata</h1>
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id User</th>
                            <th scope="col">Wisata</th>
                            <th scope="col">Tiket Anak</th>
                            <th scope="col">Tiket Dewasa</th>
                            <th scope="col">Tanggal Datang</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $total = 0;
                            foreach($pesan as $row):
                                $total += $row->total;
                            ?>
                            <tr>
                              <th scope="row"><?= $no;?></th>
                                <td><?= $row->id;?></td>
                                <td><?= $row->nama_wisata;?></td>
                                <td><?= $row->qty_anak;?></td>
                                <td><?= $row->qty_dewasa;?></td>
                                <td><?= $row->tgl_datang;?></td>
                                <td><?= buatRp($row->total);?></td>
                                <td>
                                    <?php
                                    if($row->status == 200){
                                        $ket="Sudah Bayar";
                                    }elseif($row->status == 502){
                                        $ket="Tagihan belum dibayar";
                                    }elseif($row->status == ''){
                                        $ket="Belum dibayar";
                                    }elseif($row->status == 201){
                                        $ket="Tagihan belum dibayar";
                                    }elseif($row->status== 404){
                                        $ket="Belum dibayar";
                                    }
                                    ?>
                                    <?= $ket?>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            endforeach;
                            ?>
                        </tbody>
                 </table>
               </div>
            </div>

<?= $this->endSection(); ?>