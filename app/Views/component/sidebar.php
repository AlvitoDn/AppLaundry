<div class="card">
    <div class="card-header bg-info text-cent">Menu</div>
    <div class="list-group">
        <a href="/user" class="list-group-item list-group-item-action list-group-item-primary">Petugas</a>
        <a href="/pelanggan" class="list-group-item list-group-item-action list-group-item-primary">Pelanggan</a>
        <a href="/paket" class="list-group-item list-group-item-action list-group-item-primary">Paket</a>
        <a href="/transaksi" class="list-group-item list-group-item-action list-group-item-primary">Transaksi</a>
        <a href="" class="list-group-item list-group-item-action list-group-item-primary">Laporan</a>
        <?php if(!empty(session()->get("username"))):?>
            <a href="/logout" class="list-group-item list-group-action list-group-item-primary" >LogOut</a>
        <?php endif?>
    </div>
</div>