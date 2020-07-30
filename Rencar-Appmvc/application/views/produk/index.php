
<div class="container">

<?php if( $this->session->flashdata('flash')) :?>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mobil<strong>berhasil!</strong><?= $this->sesion->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php endif; ?>


    <div class="row mt-3">
        <div class="col">
            <h1>All Menu</h1>
            <a href="<?= base_url(); ?>produk/tambah" class="btn btn-primary">Tambah Data mobil</a>
            <!-- <a href="" class="btn btn-danger">Tambah Data mobil</a>
            <a href="" class="btn btn-su">Tambah Data mobil</a> -->
        </div>
    </div>
    
    <div class="row mt-3">
        <?php foreach($mobil as $mbl) :?>
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?= $mbl["nama_mobil"]; ?></h5>
                    <p class="card-text"><?= $mbl["desc_mobil"]; ?></p>
                    <h5 class="card-title">Rp.<?= $mbl["harga_mobil"]; ?></h5>
                    <a href="<?= base_url(); ?>Data_pemesanan/index" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div> 
</div>