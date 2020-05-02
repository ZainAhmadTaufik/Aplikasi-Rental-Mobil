
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="card" style="width: 18rem;">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= $user ['nama_user'];?></h5>
                            <p class="card-text"><?= $user ['email_user'];?></p>
                            <a href="#" class="btn btn-primary">daftar semenjak <?= date ('d F Y', $user['data_created']);?>;</a>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 