<?=$this->extend('admin')?>
<?=$this->section('title')?>
Laporan Data Pelanggan
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header bg-success"><h3>Data Transaksi</h3>
            <a href="/transaksi" class="btn btn-primary">Tambahkan transaksi</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>NO.</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Ambil</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no=0;
                        foreach ($trans as $row) {
                
                        $no++;
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=$row['tanggal_masuk']?></td>
                                <td><?=$row['tanggal_ambil']?></td>
                                <td><?php if ($row['status']==0)
                                {
                                    ?>
                                    <a href="/laporan/ambil/<?=$row['id_transaksi']?>" class="btn btn-info">Belum Diambil</a>
                                    <?php
                                }
                                else{
                                    echo "Sudah Diambil";
                                }
                                ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit">Detail</a>
                                    <a href="<?=base_url('/laporan/hapus/'.$row['id_transaksi'])?>" onclick="return confirm('apakah kamu yakin ingin menghapusnya')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEdit" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form" action="" method="post">
                <div class="modal-header">
                    <h5>Detail Transaksi</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                                <label for="nama_paket" class="form-label">Nama Paket</label>
                                <input type="text" name="nama_paket" id="nama_paket" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" name="satuan" id="satuan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control">
                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if(!empty(session()->getFlashdata('message'))) : ?>

    <div class="alert alert-success">
        <?php echo session()->getFlashdata('message');?>
    </div>
    
<?php endif ?>
<?=$this->endSection()?>
<?=$this->section("script")?>
    <script>
        $(document).ready(function(){
            $("#ModalEdit").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('paket');
                if(data != ""){
                    const barisdata = data.split(",");
                    $("#nama_paket").val(barisdata[1]);
                    $("#satuan").val(barisdata[2]);
                    $("#harga").val(barisdata[3]);
                    $("#form").attr('action',barisdata[4]);
                }
            });
        })
    </script>
<?=$this->endSection()?>