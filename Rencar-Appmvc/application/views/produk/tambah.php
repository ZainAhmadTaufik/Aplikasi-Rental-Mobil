
<div class="container">

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Form Data Mobil
            </div>
            <div class="card-body">
                <?php if( validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama_mobil">Nama mobil</label>
                        <input type="text" name="nama_mobil" class="form-control" id="nama_mobil">
                    </div>
                    <div class="form-group">
                        <label for="desc_mobil">Deskripsi mobil</label>
                        <input type="text" name="desc_mobil" class="form-control" id="desc_mobil">
                    </div>
                    <div class="form-group">
                        <label for="harga_mobil">Harga mobil</label>
                        <input type="number" name="harga_mobil" class="form-control" id="harga_mobil">
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah data</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>