<?=$this->extend('admin')?>
<?=$this->section('title')?>
Form Pembuatan User
<?=$this->endSection()?>
<?=$this->section('content')?>
    <div class="card">
        <form action="/suser" method="post">
            <div class="card-header bg-primary">
                form Pembuatan User
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div><br>
                <div class="form-group">
                    <label for="hak_akses" class="form-label">Hak Akses</label><br>
                    <select name="hak_akses" id="hak_akses">
                        <option value="ADMIN">ADMIN</option>
                        <option value="KASIR">KASIR</option>
                    </select>
                </div><br>
            <div class="card-footer">
                <input type="submit" class="btn btn-warning">
                <input type="reset" class="btn btn-secondary">
                <a href="/user" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
<?=$this->endSection()?>