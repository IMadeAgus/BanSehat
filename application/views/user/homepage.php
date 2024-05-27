<?= $header ?>
<!-- Include Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
	<div class="container position-relative">
		<div class="row gy-5" data-aos="fade-in">
			<div
				class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
				<h2>Ban Motor Kamu Bocor di Tengah Jalan? </h2>
				<h4 class="text-white mb-4">Panggil Ban<span>Sehat</span> Aja!!</h4>
				<div class="d-flex justify-content-center justify-content-lg-start">
					<a href="#pesanlayanan" class="btn-get-started">Pesan Layanan</a>

				</div>
			</div>
			<div class="col-lg-6 order-1 order-lg-2">
				<img src="<?= base_url('assets/img/hero1.png') ?>" class="img-fluid" alt="" data-aos="zoom-out"
					width="90%" data-aos-delay="100">
			</div>
		</div>
	</div>

	<div class="icon-boxes position-relative">
		<div class="container position-relative">
			<div class="row gy-4 mt-5">

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
					<div class="icon-box">
						<div class="icon"><i class="bi bi-info"></i></div>
						<h4 class="title"><a href="#about" class="stretched-link">Tentang Kami</a></h4>
					</div>
				</div>
				<!--End Icon Box -->

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
					<div class="icon-box">
						<div class="icon"><i class="bi bi-person-raised-hand"></i></div>
						<h4 class="title"><a href="#pesanlayanan" class="stretched-link">Pesan Layanan</a></h4>
					</div>
				</div>
				<!--End Icon Box -->

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
					<div class="icon-box">
						<div class="icon"><i class="bi bi-chat-right-text"></i></div>
						<h4 class="title"><a href="#testimoni" class="stretched-link">Testimoni</a></h4>
					</div>
				</div>
				<!--End Icon Box -->

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
					<div class="icon-box">
						<div class="icon"><i class="bi bi-clipboard2-fill"></i></div>
						<h4 class="title"><a href="#faq" class="stretched-link">Frequently Asked Questions</a></h4>
					</div>
				</div>
				<!--End Icon Box -->

			</div>
		</div>
	</div>

	</div>
</section>
<!-- End Hero Section -->

<main id="main">

	<!-- ======= About Us Section ======= -->
	<section id="about" class="about">
		<div class="container" data-aos="fade-up">

			<div class="section-header">
				<h2>Tentang Kami</h2>
				<p>Selamat datang di BanSehat, solusi terkini untuk keamanan perjalanan Anda!</p>
			</div>

			<div class="row gy-4">
				<div class="col-lg-6">
					<h3>Mau tambal ban tanpa ribet, pake BanSehat aja!</h3>
					<img src="<?= base_url('assets/img/AboutUs.jpg') ?>" class="img-fluid rounded-4 mb-4" alt=""
						style="width:100%">
					<p class="text-justify">Kami adalah platform tambal ban online yang berteknologi canggih,
						didedikasikan untuk memberikan
						layanan yang cepat, mudah, dan handal dalam menangani masalah ban kendaraan Anda.</p>
					<p>Dengan menggunakan layanan tambal ban online kami, Anda dapat mengatasi kerusakan ban secara
						instan tanpa harus mengunjungi bengkel atau menghabiskan waktu
						berlama-lama di tepi jalan. Tim profesional kami siap memberikan bantuan cepat dan tepat,
						membantu Anda
						melanjutkan perjalanan tanpa hambatan.</p>
				</div>
				<div class="col-lg-6">
					<div class="content ps-0 ps-lg-5">
						<p class="fst-italic">
							Kelebihan Menggunakan Layanan BanSehat
						</p>
						<ul>
							<li><i class="bi bi-check-circle-fill"></i> Layanan kami tersedia
								sepanjang waktu, sehingga Anda dapat mengandalkan kami kapan pun Anda membutuhkannya
							</li>
							<li><i class="bi bi-check-circle-fill"></i> BanSehat siap membantu Anda
								dalam situasi darurat. </li>
							<li><i class="bi bi-check-circle-fill"></i>Tim teknisi kami terdiri dari
								para profesional berpengalaman yang terlatih </li>

						</ul>
						<p>
							Dengan BanSehat, kami berkomitmen untuk memberikan solusi tambal ban yang inovatif dan dapat
							diandalkan. Keamanan dan kenyamanan perjalanan Anda adalah prioritas utama kami. Jangan
							biarkan masalah ban menghentikan perjalanan Anda. percayakan pada BanSehat untuk pengalaman
							tambal ban online yang prima!
						</p>

						<div class="position-relative mt-4">
							<img src="<?= base_url('assets/img/AboutUs2.jpg') ?>" class="img-fluid rounded-4"
								style="width:100%" alt="">
							<!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> -->
						</div>
					</div>
				</div>
			</div>

		</div>
	</section><!-- End About Us Section -->

	<!-- ======= Call To Action Section ======= -->
	<section id="call-to-action" class="call-to-action">
		<div class="container text-center" data-aos="zoom-out">
			<!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a> -->
			<h3>Ban Bocor di Tengah Jalan??</h3>
			<p>Dengan menggunakan layanan tambal ban online kami, Anda dapat mengatasi kerusakan ban secara
				instan tanpa harus mengunjungi bengkel atau menghabiskan waktu
				berlama-lama di tepi jalan.</p>
			<a class="cta-btn" href="#pesanlayanan">Pesan Layanan</a>
		</div>
	</section><!-- End Call To Action Section -->

	<!-- ======= Order Section ======= -->
	<section id="pesanlayanan" class="contact">

		<div class="container" data-aos="fade-up">

			<div class="section-header">
				<h2>Pesan Layanan</h2>
				<p>Silahkan isi form pemesanan di bawah</p>
			</div>
			<div class="row gx-lg-0 gy-3 ">
				<div class="col-lg-7">
					<div class="d-flex justify-content-between align-items-center mx-auto ">
						<h4 class="fw-bold">Silahkan tandai lokasi anda</h4>
						<button class="cari rounded-2" id="locateButton">Cari Lokasi
							Terkini</button>
					</div>
					<div style="height: 31.2rem; width:55rem;" id="mymap" class="img-fluid "> </div>
				</div>
				<div class="col-lg-5">
					<form action="<?php echo base_url("order") ?>" method="post" enctype="multipart/form-data"
						class="order-form">
						<input type="hidden" name="AkunPengguna"
							value="<?php echo $this->session->userdata('AkunPengguna'); ?>" />
						<input type="hidden" class="form-control" id="Latitude" name="Latitude">
						<input type="hidden" class="form-control" id="Longitude" name="Longitude">

						<!-- Alert -->
						<?php
						$pesan = $this->session->flashdata('pesan');
						if ($pesan == "") {
							echo "";
						} else {
							?>
							<div class="alert alert-danger alert-dismissible">
								<?php echo $pesan; ?>
							</div>
							<?php
						}
						?>

						<div class="mb-3 mt-4">
							<label for="exampleFormControlInput1" class="form-label  ">Tipe Ban</label>
							<select class="form-select mt-2" name="TipeBan">
								<option selected>Pilih </option>
								<option value="Tubles">Tubles</option>
								<option value="Ban Dalam">Ban Dalam</option>
							</select>
						</div>

						<div class="mb-4">
							<label for="exampleFormControlInput1" class="form-label">Detail Lokasi</label>
							<input class="form-control" id="Lokasi" name="Lokasi" required>
						</div>

						<div class="mb-5">
							<label for="exampleFormControlInput1" class="form-label">Foto Kerusakan</label>
							<input type="file" class="form-control" name="FotoKerusakan" required>
						</div>

						<div class="text-center">
							<button class="pesan" type="button" onclick="checkSessionAndSubmit()">
								Pesan Layanan
							</button>
						</div>

					</form>
					<script>
						function checkSessionAndSubmit() {
							var sessionData = "<?php echo $this->session->userdata('AkunPengguna'); ?>";

							if (sessionData === "") {
								alert("Silahkan login terlebih dahulu.");
								window.location.href = "<?php echo base_url('clogin'); ?>";
							} else {
								// If session is not empty, submit the form
								document.querySelector('.order-form').submit();
							}
						}
					</script>
				</div><!-- End Contact Form -->
			</div>

		</div>
	</section><!-- End Order Section -->

	<!-- ======= Testimonials Section ======= -->
	<section id="testimoni" class="testimonials">
		<div class="container" data-aos="fade-up">

			<div class="section-header">
				<h2>Testimoni</h2>
				<p>Kemudahan dalam menggunakan aplikasi BanSehat mendapat apresiasi tinggi, memberikan pengalaman
					pemesanan yang simpel dan efektif.</p>
			</div>

			<div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
				<div class="swiper-wrapper">

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<div class="d-flex align-items-center">
									<img src="<?= base_url('assets/img/testimonials/Komang.jpg') ?>"
										class="testimonial-img flex-shrink-0" alt="">
									<div>
										<h3>Komang Wahyu</h3>
										<h4>customer</h4>
										<div class="stars">
											<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i>
										</div>
									</div>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									BanSehat menyelamatkan malam saya! Ban kempes di tengah perjalanan, tapi mereka
									datang cepat dan menangani masalah dengan sangat baik. Respons cepat dan pelayanan
									ramah! Terima kasih, BanSehat
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<div class="d-flex align-items-center">
									<img src="<?= base_url('assets/img/testimonials/Weda.jpg') ?>"
										class="testimonial-img flex-shrink-0" alt="">
									<div>
										<h3>Weda Pradnyana</h3>
										<h4>customer</h4>
										<div class="stars">
											<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i>
										</div>
									</div>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									Pertama kali mencoba BanSehat dan sangat terkesan! Ketika ban motor saya kempes di
									pinggir jalan, mereka datang dalam waktu singkat. Layanan yang efisien dan membantu.
									Sangat direkomendasikan!
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<div class="d-flex align-items-center">
									<img src="<?= base_url('assets/img/testimonials/Made.png') ?>"
										class="testimonial-img flex-shrink-0" alt="">
									<div>
										<h3>Agus Made</h3>
										<h4>customer</h4>
										<div class="stars">
											<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i>
										</div>
									</div>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									BanSehat menyediakan layanan tambal ban yang sangat praktis. Saya mengalami ban
									bocor di tempat parkir kantor, dan mereka datang dalam hitungan menit. Pelayanan
									yang ramah dan efisien.
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<div class="d-flex align-items-center">
									<img src="<?= base_url('assets/img/testimonials/Oka.jpg') ?>"
										class="testimonial-img flex-shrink-0" alt="">
									<div>
										<h3>Oka Ananda</h3>
										<h4>customer</h4>
										<div class="stars">
											<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i>
										</div>
									</div>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									BanSehat benar-benar membuktikan bahwa tambal ban bisa dilakukan dengan mudah. Saya
									mengalami masalah ban di tengah malam, tetapi mereka datang tanpa menimbulkan
									kerumitan.
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<div class="d-flex align-items-center">
									<img src="<?= base_url('assets/img/testimonials/Bagus.jpg') ?>"
										class="testimonial-img flex-shrink-0" alt="">
									<div>
										<h3>Bagus Sadewa</h3>
										<h4>customer</h4>
										<div class="stars">
											<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
												class="bi bi-star-fill"></i>
										</div>
									</div>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									BanSehat adalah jawaban untuk masalah ban! Saya memanggil mereka ketika ban
									kendaraan rental saya bocor di area yang tidak familiar. Respons mereka sangat
									cepat, dan teknisi yang datang benar-benar mahir.
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div><!-- End testimonial item -->
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section><!-- End Testimonials Section -->

	<!-- ======= Frequently Asked Questions Section ======= -->
	<section id="faq" class="faq">
		<div class="container" data-aos="fade-up">

			<div class="row gy-4">

				<div class="col-lg-4">
					<div class="content px-xl-5">
						<h3>Frequently Asked <strong>Questions</strong></h3>
						<p>
							Frequently Asked Questions BanSehat dirancang untuk memberikan informasi yang jelas dan
							lengkap mengenai layanan
							kami. Setiap pertanyaan umum dijawab secara informatif untuk memandu pengguna dengan baik.
						</p>
					</div>
				</div>

				<div class="col-lg-8">

					<div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

						<div class="accordion-item">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-1">
									<span class="num">1.</span>
									Apa itu BanSehat?
								</button>
							</h3>
							<div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									BanSehat adalah platform tambal ban online yang menyediakan layanan tambal ban
									secara cepat dan efisien. Kami memungkinkan pelanggan untuk mengatasi masalah ban
									kendaraan mereka tanpa harus pergi ke bengkel.
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-2">
									<span class="num">2.</span>
									Bagaimana cara menggunakan layanan BanSehat?
								</button>
							</h3>
							<div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									Anda dapat mengakses layanan BanSehat melalui aplikasi seluler atau situs web kami.
									Cukup masukkan lokasi Anda, deskripsikan masalah ban, dan pesan layanan. Tim kami
									akan segera merespons dan mengirimkan teknisi untuk menangani perbaikan.
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-3">
									<span class="num">3.</span>
									Apakah BanSehat tersedia 24/7?
								</button>
							</h3>
							<div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									Ya, BanSehat siap membantu Anda kapan pun Anda membutuhkannya. Layanan kami tersedia
									sepanjang waktu, termasuk saat malam hari, akhir pekan, dan hari libur.
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-4">
									<span class="num">4.</span>
									Berapa estimasi waktu kedatangan teknisi setelah memesan layanan?
								</button>
							</h3>
							<div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									Waktu kedatangan teknisi tergantung pada lokasi dan tingkat kesibukan. Namun, kami
									berusaha untuk merespons dengan segera dan mengirimkan teknisi sesuai dengan
									kebutuhan mendesak.
								</div>
							</div>
						</div><!-- # Faq item-->

						<div class="accordion-item">
							<h3 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#faq-content-5">
									<span class="num">5.</span>
									Apakah BanSehat menyediakan layanan tambal ban di semua wilayah?
								</button>
							</h3>
							<div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
								<div class="accordion-body">
									Kami terus memperluas jangkauan layanan kami, namun saat ini, cakupan kami mungkin
									terbatas pada beberapa wilayah. Cek aplikasi atau situs web kami untuk informasi
									terbaru tentang daerah layanan kami.
								</div>
							</div>
						</div><!-- # Faq item-->

					</div>

				</div>
			</div>

		</div>
	</section><!-- End Frequently Asked Questions Section -->

</main><!-- End #main -->
<!-- Map -->
<script>
	var mymap = L.map('mymap').setView([-8.799093906518884, 115.16162822753351], 18);

	var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(mymap);

	var latInput = document.querySelector("[name=Latitude]");
	var lngInput = document.querySelector("[name=Longitude]");

	var curLocation = [-8.799093906518884, 115.16162822753351];

	mymap.attributionControl.setPrefix(false);

	var marker = new L.marker(curLocation, {
		draggable: true
	});

	marker.on('dragend', function (event) {
		var position = marker.getLatLng();
		marker.setLatLng(position, {
			draggable: true
		}).bindPopup(position).update();
		latInput.value = position.lat;
		lngInput.value = position.lng;
	});

	mymap.addLayer(marker);

	mymap.on("click", function (e) {
		var lat = e.latlng.lat;
		var lng = e.latlng.lng;

		if (!marker) {
			marker = L.marker(e.latlng).addTo(mymap);
		} else {
			marker.setLatLng(e.latlng);
		}

		latInput.value = lat;
		lngInput.value = lng;
	});

	// Tambahkan fungsi untuk mendapatkan lokasi terkini
	document.getElementById("locateButton").addEventListener("click", function () {
		getLocation();
	});

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			console.log("Geolocation is not supported by this browser.");
		}
	}

	function showPosition(position) {
		var latLng = [position.coords.latitude, position.coords.longitude];

		if (!marker) {
			marker = L.marker(latLng).addTo(mymap);
		} else {
			marker.setLatLng(latLng);
		}

		latInput.value = position.coords.latitude;
		lngInput.value = position.coords.longitude;

		mymap.setView(latLng, 18);
	}
</script>
<script>
	document.getElementById('orderForm').addEventListener('submit', function (event) {
		// Check if the user is logged in
		var isUserLoggedIn = <?php echo json_encode($this->session->userdata != NULL); ?>;

		if (!isUserLoggedIn) {
			// If not logged in, prevent form submission
			event.preventDefault();

			// Display a message or redirect to the login page
			alert("Silahkan login terlebih dahulu.");
		}
	});
</script>
<?= $footer ?>