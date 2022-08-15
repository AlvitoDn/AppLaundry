<?=$this->extend('admin')?>
<?=$this->section('content')?>
<div class="card">
    <div class="card-header bg-primary">
        <h3>Jenis Paket Cucian</h3>
    </div>
    <div class="card-body bg-gray">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th class="col-md-1">NO</th>
                    <th class="col-md-5">Jenis Paket</th>
                    <th class="col-md-3">Satuan</th>
                    <th class="col-md-3">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Cuci Basah</td>
                    <td>Per Kilo</td>
                    <td>7.000</td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Cuci Kering</td>
                    <td>Per Kilo</td>
                    <td>9.000</td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Cuci Setrika</td>
                    <td>Per Kilo</td>
                    <td>12.000</td>
                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
    <div class="card-footer">
        <a class="btn btn-primary" href="/form">Daftar Menjadi Pelanggan</a>
    </div>
</div>
<?=$this->endSection()?>