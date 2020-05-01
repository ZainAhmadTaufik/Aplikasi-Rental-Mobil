$.getJSON ('data/mobil.json' , function (data){
	let menu = data.menu;
	$.each(menu, function (i, data){
		$('#daftar-mobil'). append('<div class="col-md-4"><div class="card mb-4"><img src="img/<?= $row["gambar"]; ?>" class="card-img-top"><div class="card-body"><h5 class="card-title"><?= $row["nama"]; ?></h5><p class="card-text"><?= $row["deskripsi"]; ?></p><h5 class="card-title"><?= $row["harga"]; ?></h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>')
	});
});