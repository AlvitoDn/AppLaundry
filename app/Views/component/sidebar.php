<div class="card">
    <div class="card-header bg-secondary text-cent">Menu</div>
    <div class="list-group">
        <a href="/user" class="list-group-item list-group-item-action list-group-item-secondary">Petugas</a>
        <a href="/pelanggan" class="list-group-item list-group-item-action list-group-item-secondary">Pelanggan</a>
        <a href="/paket" class="list-group-item list-group-item-action list-group-item-secondary">Paket</a>
        <a href="/transaksi" class="list-group-item list-group-item-action list-group-item-secondary">Transaksi</a>
        <a href="" class="list-group-item list-group-item-action list-group-item-secondary">Laporan</a>
        <?php if(!empty(session()->get("username"))):?>
            <a href="/logout" class="list-group-item list-group-action list-group-item-secondary" >LogOut</a>
        <?php endif?>
    </div>
</div>