<?=$this->extend('admin')?>
<?=$this->section('title')?>
Form Paket
<?=$this->endSection()?>
<?=$this->section('content')?>
    <div class="card">
        <div class="card-header bg-primary">
            Form Pemilihan Paket
        </div>
        <form action="/spaket" method="post">
            <div class="card-body">
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
            <div class="card-footer">
                <input type="submit" value="Simpan" class="btn btn-primary"> |
                <input type="reset" value="Reset" class="btn btn-warning"> |
                <a href="/paket" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
<?=$this->endSection()?>