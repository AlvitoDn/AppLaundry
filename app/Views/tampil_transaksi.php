<?=$this->extend('admin')?>
<?=$this->section('title')?>
Transaksi
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <!-- Form Input -->
            <div class="card">
                <div class="card-header">Input data</div>
                <div class="card-body">
                    <form action="/addcart" method="post">
                        <div class="form-group">
                            <label for="paket">Paket</label>
                            <select name="paket" id="paket" class='form-control' required>
                                <option value="">Pilih Paket</option>
                                <?php
                                    foreach ($paket as $keyp => $valp) {
                                        ?>
                                    <option value="<?=$valp['id_paket']?>"><?=$valp['nama_paket']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <!-- Tampil data -->

        </div>
    </div>
</div>
<?=$this->endSection()?>