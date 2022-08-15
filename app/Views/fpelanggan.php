<?=$this->extend('admin')?>
<?=$this->section('title')?>
Form Input Pelanggan
<?=$this->endSection()?>
<?=$this->section('content')?>
    <div class="card">
        <div class="card-header bg-primary">
            Form Input Pelanggan
        </div>
        <form action="/spelanggan" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="no_hp" class="form-label">No_HP</label>
                    <input type="number" name="no_hp" id="no_hp" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="Simpan" class="btn btn-primary"> |
                <input type="reset" value="Reset" class="btn btn-warning"> |
                <a href="/pelanggan" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
<?=$this->endSection()?>