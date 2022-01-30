<?php 
    #PHP INCLUDES
    include "connect.php";
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";
?>

<!-- Home Section -->
<section class = "home_section">
    <div class="section-header">
        <div class="section-title" style = "font-size:50px; color:white">
            Find Best Vehicles to Lease today!
        </div>
        <hr class="separator">
		<div class="section-tagline">
            From as low as Ksh 1000 get your dream experience with us!
		</div>					
	</div>
</section>

<!-- Our Services Section -->
<section class = "our-services" id = "services">
    <div class = "container">
        <div class="section-header">
            <div class="section-title">
                SERVICES OFFERED TO OUR CUSTOMERS
            </div>
            <hr class="separator">
            <div class="section-tagline">
                We love our customers and so we offer a variety of services.
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="far fa-user"></i>
                        </span>
                        Free Consultancy
                    </h4>
                    <p>
                        We have in-house consultants who offer free consultancy to customers who want advice on variety of matters related to car leasing.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-search-dollar"></i>
                        </span>
                        No Hidded Fees
                    </h4>
                    <p>
                        Know exactly what you’re paying.You get to pay what is displayed
                        in the website.Cancellation is free up to 48 hours before pick-up.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        Great Support
                    </h4>
                    <p>
                        We have an efficient and active customer support.Our team
                        works round to clock to answer your questions for free!
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-rocket"></i>
                        </span>
                        Casual Leasing
                    </h4>
                    <p>
                        This service is useful for the hirer who would want to travel within and outside your city.
                        It is a reliable way to visit clients and customers when public transport won't do.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="fas fa-gem"></i>
                        </span>
                        Business Rate
                    </h4>
                    <p>
                        This service is meant for lessee who need the cars to do business or those that are going for tours and need drivers.
                        We can help your business reach customers faster than ever.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <h4>
                        <span>
                            <i class="far fa-comments"></i>
                        </span>
                        Onboarding
                    </h4>
                    <p>
                        There are times we are overwhelmed by the demands of our
                        Therefore, we are forced to look for individuals who have idle cars.We provide a
                        smooth onboarding service.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Area Section -->
<section class = "about-area">
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-6 left-area" style = "padding:0px">
                <img src="Design/images/about-img.jpeg" height="800px" alt="Car Rental Image">
            </div>
            <div class = "col-md-6 right-area" style = "padding:50px">
                <h1>
                    Globally Connected <br>
                    by Large Network
                </h1>
                <p>
                    <span>
                        We are here to listen from you deliver exellence
                    </span>
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                </p>
                <a class="my-btn bttn" href="#">get details</a>
            </div>
        </div>
    </div>
</section>

<!-- Our Brands Section -->
<section class = "our-brands" id = "brands">
    <div class = "container">
        <div class="section-header">
            <div class="section-title">
                First Class Car Rental & Limousine Services
            </div>
            <hr class="separator">
            <div class="section-tagline">
                We offer professional car rental & limousine services in our range of high-end vehicles
            </div>
        </div>
        <div class = "car-brands">
            <div class = "row">
            <?php

                $stmt = $con->prepare("Select * from car_brands");
                $stmt->execute();
                $car_brands = $stmt->fetchAll();

                foreach($car_brands as $car_brand)
                {
                    $car_brand_img = "admin/Uploads/images/".$car_brand['brand_image'];
                    ?>
                    <div class = "col-md-4">
                        <div class = "car-brand" style = "background-image: url(<?php echo $car_brand_img ?>);">
                            <div class = "brand_name">
                                <h3>
                                    <?php echo $car_brand['brand_name']; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php
                }

            ?>
            </div>
        </div>
    </div>
</section>

<!-- CAR RESERVATION SECTION -->
<section class="reservation_section" style = "padding:50px 0px" id = "reserve">
	<div class="container">
		<div class = "row">
			<div class = "col-md-5"></div>
			<div class = "col-md-7">
				<form method="POST" action = "reserve.php" class = "car-reservation-form" id = "reservation_form" v-on:submit = "checkForm">
					<div class="text_header">
						<span>
							Find your car
						</span>
					</div>
					<div>
						<div class = "form-group">
							<label for="pickup_location">Pickup Location</label>
							<input type = "text" class = "form-control" name = "pickup_location" placeholder = "USIU Road" v-model = 'pickup_location'>
							<div class="invalid-feedback" style = "display:block" v-if="pickup_location === null">
								Pickup location is required
							</div>
						</div>
						<div class = "form-group">
							<label for="return_location">Return Location</label>
							<input type = "text" class = "form-control" name = "return_location" placeholder = "Mombasa Road" v-model = 'return_location'>
							<div class="invalid-feedback" style = "display:block" v-if="return_location === null">
								Return location is required
							</div>
						</div>
						<div class = "form-group">
							<label for="pickup_date">Pickup Date</label>
							<input type = "date" min = "<?php echo date('Y-m-d', strtotime("+1 day"))?>" name = "pickup_date" class = "form-control" v-model = 'pickup_date'>
							<div class="invalid-feedback" style = "display:block" v-if="pickup_date === null">
								Pickup date is required
							</div>
						</div>
						<div class = "form-group">
							<label for="return_date">Return Date</label>
							<input type = "date" min = "<?php echo date('Y-m-d', strtotime("+2 day"))?>" name = "return_date"  class = "form-control" v-model = 'return_date'>
							<div class="invalid-feedback" style = "display:block" v-if="return_date === null">
								Return date is required
							</div>
						</div>
						<!-- Submit Button -->
						<button type="submit" class="btn sbmt-bttn" name = "reserve_car">Book Instantly</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>



<!-- BOTTOM FOOTER -->
<?php include "Includes/templates/footer.php"; ?>



<script>

new Vue({
    el: "#reservation_form",
    data: {
        pickup_location: '',
        return_location: '',
        pickup_date: '',
		return_date: ''
    },
    methods:{
        checkForm: function(event){
            if( this.pickup_location && this.return_location && this.pickup_date && this.return_date)
            {
                return true;
            }
            
            if (!this.pickup_location)
            {
                this.pickup_location = null;
            }

            if (!this.return_location)
            {
                this.return_location = null;
            }

            if (!this.pickup_date)
            {
                this.pickup_date = null;
            }

			if (!this.return_date)
            {
                this.return_date = null;
            }
            
            event.preventDefault();
        },
    }
})


</script>