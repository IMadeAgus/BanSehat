<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<style>
    /* Rating */
    .stars {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .stars i {
        color: #e6e6e6;
        font-size: 35px;
        cursor: pointer;
        transition: color 0.2s ease;
        padding-bottom: 20px;
    }

    .stars i.active {
        color: #ff9c1a;
    }

    #gambar {
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        /* Menengahkan gambar dengan margin */
        padding-bottom: 20px;
    }
</style>

<body>
    <?php if (!empty($hasil)) { ?>
        <?php foreach ($hasil as $data): ?>
            <section>
                <div class="container mt-5 mb-5 pt-5 d-flex justify-content-center text-center" data-aos="fade-up">
                    <div class="border border-3 shadow  rounded-3 p-5">
                        <h1 class="fw-bold">Beri Ulasan ke mekanik</h1>
                        <form action="<?php echo base_url("corder/rating") ?>" method="post">
                            <input type="hidden" name="IdPesanan" value="<?php echo $data->IdPesanan ?>">
                            <div class=" stars mt-5 mb-4 d-flex justify-content-center">
                                <input type="checkbox" value="1" id="ratingBintang1" name="RatingBintang"
                                    onclick="handleCheckboxClick(1)" hidden checked>
                                <label for="ratingBintang1">
                                    <i class="fa-solid fa-star"></i>
                                </label>

                                <input type="checkbox" value="2" id="ratingBintang2" name="RatingBintang"
                                    onclick="handleCheckboxClick(2)" hidden>
                                <label for="ratingBintang2">
                                    <i class="fa-solid fa-star"></i>
                                </label>

                                <input type="checkbox" value="3" id="ratingBintang3" name="RatingBintang"
                                    onclick="handleCheckboxClick(3)" hidden>
                                <label for="ratingBintang3">
                                    <i class="fa-solid fa-star"></i>
                                </label>

                                <input type="checkbox" value="4" id="ratingBintang4" name="RatingBintang"
                                    onclick="handleCheckboxClick(4)" hidden>
                                <label for="ratingBintang4">
                                    <i class="fa-solid fa-star"></i>
                                </label>

                                <input type="checkbox" value="5" id="ratingBintang5" name="RatingBintang"
                                    onclick="handleCheckboxClick(5)" hidden>
                                <label for="ratingBintang5">
                                    <i class="fa-solid fa-star"></i>
                                </label>
                            </div>
                            <div class>
                                <textarea class="form-control" placeholder="Berikan alasannya (optional)" rows="5"
                                    name="UlasanText"></textarea>
                            </div>
                            <div class="d-grid mb-2 mt-5">
                                <button class="btn text-white" style="background-color:#F85900" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        <?php endforeach;
    } ?>
    <script>
        // Select all elements with the "i" tag and store them in a NodeList called "stars"
        const stars = document.querySelectorAll(".stars i");
        // Loop through the "stars" NodeList
        stars.forEach((star, index1) => {
            // Add an event listener that runs a function when the "click" event is triggered
            star.addEventListener("click", () => {
                // Loop through the "stars" NodeList Again
                stars.forEach((star, index2) => {
                    // Add the "active" class to the clicked star and any stars with a lower index
                    // and remove the "active" class from any stars with a higher index
                    index1 >= index2
                        ? star.classList.add("active")
                        : star.classList.remove("active");
                });
            });
        });
        function handleCheckboxClick(clickedValue) {
            // Disable all checkboxes
            for (let i = 1; i <= 5; i++) {
                if (i !== clickedValue) {
                    document.getElementById('ratingBintang' + i).checked = false;
                }
            }
        }
    </script>
</body>