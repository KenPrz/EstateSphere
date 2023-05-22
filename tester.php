<!-- Carousel -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
            <div #swiperRef="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                        <div class="swiper-slide" style="width:357px; height:144px;">
                            <div class="card mx-2" style="width: 14rem; background-color: #F9F9F9; color: black;">
                                            <img src="<?php echo $img; ?>" class="card-img mt-2" alt="image"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                            <div class="card-body px-0">
                                                <h6 class="card-subtitle mb-1" style="font-size:10px">
                                                    <img src="./assets/img/icons/location.png" alt=""
                                                        style="width: 13px; height: 13px; margin-right:5px; object-fit: cover;">
                                                    <?php echo $location; ?>
                                                </h6>
                                                <h5 class="card-title mb-"
                                                    style="font-size: 18px; font-family: Montserrat, sans-serif;">
                                                    <span class="highlight-text">
                                                        <?php echo $property_name; ?>
                                                    </span>
                                                </h5>
                                                <h6 class="card-subtitle"
                                                    style="color: #18A0FB; font-size: 18px; font-family: Montserrat, sans-serif;">
                                                    ₱<b>
                                                        <?php echo number_format($price, 0, ',', ','); ?>
                                                    </b>
                                                </h6>
                                                <div class="card-text">
                                                    <div class="row justify-content-center">
                                                        <h4 class="border-bottom">
                                                            <?php
                                                            $stars = rand(2, 5); // Generate a random number between 2 and 5
                                                            for ($i = 1; $i <= $stars; $i++) {
                                                                ?>
                                                                <img src="./assets/img/icons/star.png"
                                                                    style="height: 15px; width: 15px;">
                                                                <?php
                                                            }
                                                            ?>
                                                        </h4>
                                                        <div class="row justify-content-center my-2">
                                                            <div class="col-4">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <span class="me-1">
                                                                        <?php echo $num_of_beds; ?>
                                                                    </span>
                                                                    <img src="./assets/img/icons/bed.png" alt=""
                                                                        style="width: 25px; height: 25px;">
                                                                </div>
                                                                <div class="row">
                                                                    <p style="font-size:8px">Bedrooms</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <span class="me-1">
                                                                        <?php echo $num_of__baths; ?>
                                                                    </span>
                                                                    <img src="./assets/img/icons/bathtub.png" alt=""
                                                                        style="width: 25px; height: 25px;">
                                                                </div>
                                                                <div class="row">
                                                                    <p style="font-size:8px">Bathroom</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <span class="me-1">
                                                                        <?php echo $num_of_carports; ?>
                                                                    </span>
                                                                    <img src="./assets/img/icons/garage.png" alt=""
                                                                        style="width: 25px; height: 25px;">
                                                                </div>
                                                                <div class="row">
                                                                    <p style="font-size:8px">Carports</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="property_details.php?id=<?php echo $row['property_id']; ?>"
                                                        class="btn btn-primary btn-sm btn-block w-100">View More</a>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
            <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        centeredSlides: true,
        spaceBetween: 40,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
            <!-- Carousel -->