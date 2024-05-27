<?= $header ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<div style="height:100%">
	<div class="container mt-5 pt-5">
		<div class="row gy-5" data-aos="fade-in">
			<div
				class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
				<h1 class="fw-bold">Selamat Datang
					<br>
					<?php echo $this->session->userdata('NamaMekanik') ?>
				</h1>
			</div>
			<div class="col-lg-6 order-1 order-lg-2">
				<img src="<?= base_url('assets/img/hero1.png') ?>" class="img-fluid " alt="" data-aos="zoom-out"
					data-aos-delay="100" style="width:60%; margin-left:6rem">
			</div>
		</div>
		<?php if (!empty($hasil)) { ?>
			<?php foreach ($hasil as $data):
				if ($data->Status == 'Mengerjakan Pesanan') { ?>
					<div class="row gx-lg-0 gy-4 mt-5 mb-5">
						<div class="col-lg-7">
							<div style="height: 45.2rem; width:55rem;" id="map" class="img-fluid"> </div>
						</div>
						<div class="col-lg-5 card">
							<div class="card-body">
								<h1 class="fw-bold">Detail Pesanan</h1>
								<div class="mt-4 mb-3">
									<label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
									<input type="readonly" class="form-control" id="exampleFormControlInput1"
										value="<?php echo $data->Nama; ?>">
								</div>
								<div class="mt-4 mb-3">
									<label for="exampleFormControlInput1" class="form-label">No Handphone</label>
									<input type="readonly" class="form-control" id="exampleFormControlInput1"
										value="<?php echo $data->NoHandphone; ?>">
								</div>
								<div class="mt-4 mb-3">
									<label for="exampleFormControlInput1" class="form-label">Tipe Ban</label>
									<input type="readonly" class="form-control" id="exampleFormControlInput1"
										value="<?php echo $data->TipeBan; ?>">
								</div>
								<div class="mt-4 mb-3">
									<label for="exampleFormControlInput1" class="form-label">Detail Lokasi</label>
									<input type="readonly" class="form-control" id="exampleFormControlInput1"
										value="<?php echo $data->Lokasi; ?>">
								</div>
								<div class="mt-4 mb-3">
									<div class="accordion accordion-flush" id="faqlist">
										<div class="accordion-item">
											<h3 class="accordion-header">
												<button class="accordion-button collapsed border" type="button"
													data-bs-toggle="collapse" data-bs-target="#faq-content-1">
													Foto Kerusakan
												</button>
											</h3>
											<div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
												<div class="accordion-body">
													<img class="img-fluid "
														src="<?php echo base_url('assets/img/uploads/' . $data->FotoKerusakan); ?>"
														alt="" style="width:20rem; height:20rem;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mt-4 mb-3">
									<label for="exampleFormControlInput1" class="form-label">Harga</label>
									<input type="text" class="form-control" value="<?php echo $data->Harga; ?>" readonly>
								</div>

								<div class="d-grid mb-3">
									<button type="button"
										onclick="finishorder('<?php echo $this->session->userdata('AkunMekanik') ?>');"
										class="btn btn-danger p-2 rounded rounded-5" style="backgound-color :brown">Selesaikan
										Pesanan</button>
								</div>
							<?php }
			endforeach; ?>
					</div>
				</div>
			</div>

		<?php } else { ?>
		<?php } ?>
	</div>
</div>


<script>
	// Fungsi untuk membuat marker dengan ikon tertentu
	function createCustomMarker(waypoint, customIcon) {
		var customMarker = L.marker(waypoint.latLng, {
			icon: customIcon,
			draggable: true
		});

		// Tambahkan event listener jika diperlukan
		customMarker.on('dragend', function (event) {
			var markerLatLng = event.target.getLatLng();
			// Lakukan sesuatu setelah marker di-drag
			console.log('Marker dragged to:', markerLatLng);
		});

		return customMarker;
	}

	var defaultIcon = L.icon({
		iconUrl: '<?= base_url("assets/img/MarkerPengguna.png"); ?>',
		iconSize: [32, 32],
		iconAnchor: [16, 32],
		popupAnchor: [0, -32]
	});

	var customIcon = L.icon({
		iconUrl: '<?= base_url("assets/img/MarkerBengkel.png"); ?>',
		iconSize: [32, 32],
		iconAnchor: [16, 32],
		popupAnchor: [0, -32]
	});

	var map = L.map('map');

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '© OpenStreetMap contributors'
	}).addTo(map);

	var routingControl = L.Routing.control({
		waypoints: [
			L.latLng(-8.766602845586416, 115.17795252238366),
			L.latLng(<?php echo $data->Latitude; ?>, <?php echo $data->Longitude; ?>)
		],
		routeWhileDragging: true,
		createMarker: function (i, waypoint, n) {
			// Gunakan ikon default untuk waypoint pertama dan ikon kustom untuk waypoint kedua
			if (i === 0) {
				return createCustomMarker(waypoint, customIcon);
			} else {
				return createCustomMarker(waypoint, defaultIcon);
			}
		}
	}).addTo(map);
</script>
<script>
	function finishorder(AkunMekanik) {
		if (confirm("Apakah yakin Menyelesaikan Pesanan?")) {
			window.open("<?php echo base_url(); ?>cmekanik/finishorder/" + AkunMekanik, "_self");
		}
	}
</script>
<?php foreach ($status as $data):
	if ($data->Status != 'Mengerjakan Pesanan') { ?>
		<script>
			setInterval(function () {
				location.reload();
			}, 5000);
		</script>
	<?php }
endforeach; ?>

<div class="" style="margin-top:15rem">
	<?= $footer ?>
</div>