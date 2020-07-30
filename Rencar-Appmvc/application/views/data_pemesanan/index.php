
<div class="container">

    <?php if( $this->session->flashdata('flash')) :?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data pemesanan<strong>berhasil!</strong><?= $this->sesion->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Data Pemesanan
                </div>
                <div class="card-body">
                    <?php if( validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_customer">Nama Customer</label>
                            <input type="text" name="nama_customer" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_mobil">Jumlah_mobil</label>
                            <input type="number" name="jumlah_mobil" class="form-control" id="jumlah_mobil">
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total harga</label>
                            <input type="number" name="total_harga" class="form-control" id="total_harga">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>