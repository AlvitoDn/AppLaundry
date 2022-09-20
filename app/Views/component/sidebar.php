<div class="card">
    <div class="card-header bg-light" style="display:flex; justify-content:center; align-items:center;"><p class="txt-dark">MENU</p></div>
    <div class="list-group">
        <?php
        if (session('hak_akses')=='kasir') {
            ?>
            <a href="/transaksi" class="list-group-item list-group-item-action list-group-item-dark">Transaksi</a>
            <a href="/laporan" class="list-group-item list-group-item-action list-group-item-dark">Laporan</a>
            <?php
        }
        else {
            ?>
            <a href="/user" class="list-group-item list-group-item-action list-group-item-dark">Petugas</a>
        <a href="/pelanggan" class="list-group-item list-group-item-action list-group-item-dark">Pelanggan</a>
        <a href="/paket" class="list-group-item list-group-item-action list-group-item-dark">Paket</a>
        <a href="/transaksi" class="list-group-item list-group-item-action list-group-item-dark">Transaksi</a>
        <a href="/laporan" class="list-group-item list-group-item-action list-group-item-dark">Laporan</a>
        <?php if(!empty(session()->get("username"))):?>
            <a href="/logout" class="list-group-item list-group-action list-group-item-dark" onclick="return confirm('Yakin ingin Keluar Dari Akun ini??')">LogOut</a>
        <?php endif?>
        <?php
            }
        ?>
    </div>
</div>