<?php
session_start();
include "../header.php";
?>





		<div id="welcomeModal" class="modal">
											<div class="modal-content">
												<span class="close" onclick="closeModal()">&times;</span>
												<h3>Welcome, <?= isset($_SESSION['first_name']) ? htmlspecialchars($_SESSION['first_name']) : 'User'; ?>!</h3>
												<p>We are glad to have you back. You can now book your appointment easily.</p>
												<a href="../appointment/appointment.php" class="btn btn-primary mt-3">Go to Appointment</a>
											</div>
	</div>


			<!-- Slider Area -->
			<section class="slider">
				<div class="hero-slider">
					<!-- Start Single Slider -->
					<div class="single-slider" style="background-image:url('../img/pic4.webp')">
						<div class="container">
							<div class="row">
								<div class="col-lg-7">
									<div class="text">
										<h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam. </p>
										<div class="button">
										<a href="#" class="btn <?= $current_page == '../appointment.appointment.php' ? 'active' : ''; ?>" onclick="checkLoginStatus()">Book Appointment</a>
											<a href="#" class="btn primary">Learn More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Single Slider -->
					<!-- Start Single Slider -->
					<div class="single-slider" style="background-image:url('../img/pic3.jpg')">
						<div class="container">
							<div class="row">
								<div class="col-lg-7">
									<div class="text">
										<h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam. </p>
										<div class="button">
										<a href="#" class="btn <?= $current_page == '../appointment.appointment.php' ? 'active' : ''; ?>" onclick="checkLoginStatus()">Book Appointment</a>
											<a href="#" class="btn primary">About Us</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Start End Slider -->
					<!-- Start Single Slider -->
					<div class="single-slider" style="background-image:url('../img/pic2.jpg')">
						<div class="container">
							<div class="row">
								<div class="col-lg-7">
									<div class="text">
										<h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam. </p>
										<div class="button">
										<a href="#" class="btn <?= $current_page == '../appointment.appointment.php' ? 'active' : ''; ?>" onclick="checkLoginStatus()">Book Appointment</a>
											<a href="#" class="btn primary">Conatct Now</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Single Slider -->
				</div>
			</section>
			<!--/ End Slider Area -->
			
			<!-- Start Schedule Area -->
			<section class="schedule">
				<div class="container">
					<div class="schedule-inner">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-12 ">
								<!-- single-schedule -->
								<div class="single-schedule first">
									<div class="inner">
										<div class="icon">
											<i class="fa fa-ambulance"></i>
										</div>
										<div class="single-content">
											<h4>Experience</h4>
											<p>Being known to many people since the year it was established which was is 2000.</p>
											<a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<!-- single-schedule -->
								<div class="single-schedule middle">
									<div class="inner">
										<div class="icon">
											<i class="icofont-prescription"></i>
										</div>
										<div class="single-content">
											<h4>Clinic Location</h4>
											<p>The clinic coud be found at 	Baliwasan road, Zamboanga City, Philippines, fronting Jolibee .</p>
											<a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-12 col-12">
								<!-- single-schedule -->
								<div class="single-schedule last">
									<div class="inner">
										<div class="icon">
											<i class="icofont-ui-clock"></i>
										</div>
										<div class="single-content">
											<h4>Opening Hours</h4>
											<ul class="time-sidual">
												<li class="day">Monday - Friday<span>8:00am - 6:00pm</span></li>
												<li class="day">Saturday <span>8:00am - 3:30pm</span></li>
												<li class="day">Sunday <span>Closed</span></li>
											</ul>
											<a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/End Start schedule Area -->

			<!-- Start Feautes -->
			<section class="Feautes section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2>We Are Always Ready to Help You & Your Family</h2>
								<img src="../img/section-img.png" alt="#">
								<p>We are always ready to help you and your family, ensuring support whenever you need it.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-12">
							<!-- Start Single features -->
							<div class="single-features">
								<div class="signle-icon">
									<i class="icofont icofont-ambulance-cross"></i>
								</div>
								<h3>Emergency Eye Care</h3>
								<p>Prompt, expert care for sudden eye issues to protect your vision in urgent situations.</p>
							</div>
							<!-- End Single features -->
						</div>
						<div class="col-lg-4 col-12">
							<!-- Start Single features -->
							<div class="single-features">
								<div class="signle-icon">
									<i class="icofont icofont-medical-sign-alt"></i>
								</div>
								<h3>Optical Pharmacy</h3>
								<p>A full range of eye medications and treatments to support your vision health.</p>
							</div>
							<!-- End Single features -->
						</div>
						<div class="col-lg-4 col-12">
							<!-- Start Single features -->
							<div class="single-features last">
								<div class="signle-icon">
									<i class="icofont icofont-eye"></i>
								</div>
								<h3>Comprehensive Eye Exams</h3>
								<p>Detailed exams to assess eye health and detect conditions early for lasting vision care.</p>
							</div>
							<!-- End Single features -->
						</div>
					</div>
				</div>
			</section>
			<!--/ End Feautes -->
			
			<!-- Start Fun-facts -->
			<div id="fun-facts" class="fun-facts section overlay">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Start Single Fun -->
							<div class="single-fun">
								<i class="icofont icofont-home"></i>
								<div class="content">
									<span class="counter">19</span>
									<p>Optical Services</p>
								</div>
							</div>
							<!-- End Single Fun -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Start Single Fun -->
							<div class="single-fun">
								<i class="icofont icofont-user-alt-3"></i>
								<div class="content">
									<span class="counter">1</span>
									<p>Specialist Doctors</p>
								</div>
							</div>
							<!-- End Single Fun -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Start Single Fun -->
							<div class="single-fun">
								<i class="icofont-simple-smile"></i>
								<div class="content">
									<span class="counter">3</span>
									<p>Happy Patients</p>
								</div>
							</div>
							<!-- End Single Fun -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Start Single Fun -->
							<div class="single-fun">
								<i class="icofont icofont-table"></i>
								<div class="content">
									<span class="counter">24</span>
									<p>Years of Experience</p>
								</div>
							</div>
							<!-- End Single Fun -->
						</div>
					</div>
				</div>
			</div>
			<!--/ End Fun-facts -->
			
			<!-- Start Why choose -->
			<section class="why-choose section" >
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2>About Us</h2>
								<img src="../img/section-img.png" alt="#">
								<p>deliver compassionate eye care, prioritizing your vision health with expert treatments and exams.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-12">
							<!-- Start Choose Left -->
							<div class="choose-left">
								<h3>Who We Are</h3>
								<p>RFL Visual Care (Optical Clinic and Contact Lens Center) is an optical design to help customers who seek help in terms of their eye problem. the business have been growing, improving as well as being known to many people since the year it was established which was is 2000.</p>
								<p>The one who founded this medical institution was Dr. Rosalinda Fernandez Lim. Dr. Rosalinda Fernandez Lim is an optimetrists who take care of primary health care for the eye. She is the main doctor who owned the clinic and treat the patients. The clinic performs eye exam anf vision test before prescribing the best fit eyeglasses and contact lens to the customers. </p>
								<div class="row">
									<div class="col-lg-6">
										<ul class="list">
											<li><i class="fa fa-caret-right"></i>24 years of experience. </li>
											<li><i class="fa fa-caret-right"></i>Quality eyewear available</li>
											<li><i class="fa fa-caret-right"></i>Comprehensive eye care.</li>
										</ul>
									</div>
									<div class="col-lg-6">
										<ul class="list">
											<li><i class="fa fa-caret-right"></i>Professional eye vision.</li>
											<li><i class="fa fa-caret-right"></i>
											Advanced eye examinations.</li>
											<li><i class="fa fa-caret-right"></i>Personalized patients service.</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End Choose Left -->
						</div>
						<div class="col-lg-6 col-12">
							<!-- Start Choose Rights -->
							<div class="choose-right">
								<div class="video-image">
									<!-- Video Animation -->
									<div class="promo-video">
										<div class="waves-block">
											<div class="waves wave-1"></div>
											<div class="waves wave-2"></div>
											<div class="waves wave-3"></div>
										</div>
									</div>
									<!--/ End Video Animation -->
									<a href="https://www.youtube.com/watch?v=7-i8fLgCwfQ" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
								</div>
							</div>
							<!-- End Choose Rights -->
						</div>
					</div>
				</div>
			</section>
			<!--/ End Why choose -->
			
			<!-- Start Call to action -->
			<section class="call-action overlay" data-stellar-background-ratio="0.5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="content">
								<h2>You can call email on Us!</h2>
								<p>Feel free to reach out to us via call or email anytime! We're here to help.</p>
								<div class="button">
									<a href="#" class="btn">Contact Now</a>
									<a href="#" class="btn second">Learn More<i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/ End Call to action -->
			
			<!-- Start portfolio -->
			<section class="portfolio section" >
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2>Products That We Offer On Patients</h2>
								<img src="../img/section-img.png" alt="#">
								<p>We offer a range of products for patients, including eyewear, contact lenses, and specialized treatments to enhance vision health.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-12">
							<div class="owl-carousel portfolio-slider">
								<div class="single-pf">
									<img src="../img/products-c-l-1.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
								<div class="single-pf">
									<img src="../img/products-c-l-2.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
								<div class="single-pf">
									<img src="../img/products-c-l-3.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
								<div class="single-pf">
									<img src="../img/products-ef-1.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
								<div class="single-pf">
									<img src="../img/products-ef-2.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
								<div class="single-pf">
									<img src="../img/products-ef-3.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
								<div class="single-pf">
									<img src="../img/products-lens-1.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
								<div class="single-pf">
									<img src="../img/products-lens-2.png" alt="#">
									<a href="portfolio-details.html" class="btn">View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="container-fluid mt-3">
					<div class="row">
						<div class="col text-center">
							<div class="get-quote">
								<a href="appointment.php" class="btn">See More</a>    
							</div>
						</div>
					</div>
				</div>



			<!--/ End portfolio -->
			
			<!-- Start service -->
			<section class="services section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2>We Offer Different Services To Improve Your Eye Sight</h2>
								<img src="../img/section-img.png" alt="#">
								<p>We provide a variety of services designed to enhance your eyesight, ensuring optimal vision health and comfort for every patient.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Start Single Service -->
							<div class="single-service">
								<i class="iconfont icofont-eye-alt"></i>
								<h4><a href="service-details.html">General Eye Care</a></h4>
								<p>We provide comprehensive eye examinations to assess vision health and identify potential issues early. </p>	
							</div>
							<!-- End Single Service -->
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Start Single Service -->
							<div class="single-service">
								<i class="icofont icofont-eye-alt"></i>
								<h4><a href="service-details.html">Contact Lens Fitting</a></h4>
								<p>Our experts offer personalized contact lens fittings to ensure comfort and optimal vision correction for all patients. </p>	
							</div>
							<!-- End Single Service -->
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Start Single Service -->
							<div class="single-service">
								<i class="icofont icofont-eye-alt"></i>
								<h4><a href="service-details.html">Treatment Eye Infections</a></h4>
								<p> Our clinic offers effective treatment for various eye infections, ensuring rapid recovery and restoration of eye health.</p>	
							</div>
							<!-- End Single Service -->
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Start Single Service -->
							<div class="single-service">
								<i class="icofont icofont-eye-alt"></i>
								<h4><a href="service-details.html">Ear Treatment</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet. </p>	
							</div>
							<!-- End Single Service -->
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Start Single Service -->
							<div class="single-service">
								<i class="icofont icofont-eye-alt"></i>
								<h4><a href="service-details.html">Management Vision Problems</a></h4>
								<p> We address a wide range of vision problems, providing tailored solutions to enhance your overall visual experience. </p>	
							</div>
							<!-- End Single Service -->
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- Start Single Service -->
							<div class="single-service">
								<i class="icofont icofont-eye-alt"></i>
								<h4><a href="service-details.html">Pediatric Eye Care</a></h4>
								<p>Our clinic is dedicated to children’s eye health, offering specialized exams and treatments to support developing vision.</p>	
							</div>
							<!-- End Single Service -->
						</div>
					</div>
				</div>
			</section>
			<!--/ End service -->
			
			<!-- Pricing Table -->
			<section class="pricing-table section">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2>We Provide You The Best Treatment In Resonable Price</h2>
								<img src="../img/section-img.png" alt="#">
								<p>We provide exceptional, affordable treatment options tailored to your needs with trusted care.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- Single Table -->
						<div class="col-lg-4 col-md-12 col-12">
							<div class="single-table">
								<!-- Table Head -->
								<div class="table-head">
									<div class="icon">
										<i class="icofont icofont-eye"></i>
									</div>
									<h4 class="title">Eye Exams</h4>
									<div class="price">
										<p class="amount">P800-P1000<span>/ Per Session</span></p>
									</div>	
								</div>
								<!-- Table List -->
								<ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>30 minutes to 1 hour of session</li>
								<li><i class="icofont icofont-ui-check"></i>Assessment of eye health and vision clarity</li>
								<li><i class="icofont icofont-ui-check"></i>Advanced retinal imaging</li>
								<li><i class="icofont icofont-ui-check"></i>Glaucoma and cataract screening</li>
								</ul>
								<div class="table-bottom">
									<a class="btn" href="#">Book Now</a>
								</div>
								<!-- Table Bottom -->
							</div>
						</div>
						<!-- End Single Table-->
						<!-- Single Table -->
						<div class="col-lg-4 col-md-12 col-12">
							<div class="single-table">
								<!-- Table Head -->
								<div class="table-head">
									<div class="icon">
										<i class="icofont icofont-optic"></i>
									</div>
									<h4 class="title">UV Protection</h4>
									<div class="price">
										<p class="amount">P1200-P1500<span>/ Per Session</span></p>
									</div>	
								</div>
								<!-- Table List -->
								<ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>30 minutes to 1 hour of session</li>
								<li><i class="icofont icofont-ui-check"></i>Reduces eye strain from sunlight and screens</li>
								<li><i  class="icofont icofont-ui-check"></i>Blue light filtering</li>
								<li><i class="icofont icofont-ui-check"></i>Helps prevent UV-related eye conditions</li>
							
								</ul>
								<div class="table-bottom">
									<a class="btn" href="#">Book Now</a>
								</div>
								<!-- Table Bottom -->
							</div>
						</div>
						<!-- End Single Table-->
						<!-- Single Table -->
						<div class="col-lg-4 col-md-12 col-12">
							<div class="single-table">
								<!-- Table Head -->
								<div class="table-head">
									<div class="icon">
										<i class="icofont-eye-dropper"></i>
									</div>
									<h4 class="title">Dry Eye Management</h4>
									<div class="price">
										<p class="amount">P1400-P1500<span>/ Per Visit</span></p>
									</div>	
								</div>
								<!-- Table List -->
								<ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>40 minutes to 1 hour of session</li>
								<li><i class="icofont icofont-ui-check"></i>Treatment options tailored to severity</li>
								<li><i class="icofont icofont-ui-check"></i>Moisture therapy for film analysis</li>
								<li><i class="icofont icofont-ui-check"></i>Guidance on lifestyle adjustments for eye health</li>
								</ul>
								<div class="table-bottom">
									<a class="btn" href="#">Book Now</a>
								</div>
								<!-- Table Bottom -->
							</div>
						</div>
						<div class="col text-center mt-3">
							<div class="get-quote">
								<a href="appointment.php" class="btn" style="width: 200px;">View all services   <i class="fa fa-long-arrow-right"></i></a>    
							</div>
						</div>


						<!-- End Single Table-->
					</div>	
				</div>	
				
			</section>	

			<!--/ End Pricing Table -->

			
			
			<!-- Start Blog Area -->
			<section class="blog section" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Common Technology Used In The RFL Optical Clinic.</h2>
						<img src="../img/section-img.png" alt="#">
						<p>Essential diagnostic tools enhancing vision care at RFL Optical Clinic for precise treatments.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="../img/auto.jpg" alt="#" class="blog-image">
						</div>
						<div class="news-body">
							<div class="news-content">
								<h2><a href="blog-single.html">Auto Refractor</a></h2>
								<p class="text">These devices are used to measure refractive errors, helping determine if patients need prescription glasses or contact lenses.</p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="../img/slit.jpg" alt="#" class="blog-image">
						</div>
						<div class="news-body">
							<div class="news-content">
								<h2><a href="blog-single.html">Slit Lamp</a></h2>
								<p class="text">Allowing for detailed examination and diagnosis of conditions like cataracts, macular degeneration, and corneal ulcers.</p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="../img/phoro.jpg" alt="#" class="blog-image">
						</div>
						<div class="news-body">
							<div class="news-content">
								<h2><a href="blog-single.html">Phoropter</a></h2>
								<p class="text">Used during eye exams, a phoropter helps optometrists measure an individual’s prescription for glasses by changing lenses in front of the patient’s eyes.</p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
			</div>
		</div>
	</section>->
			
			<!-- Start clients -->
			<section class="call-action overlay" data-stellar-background-ratio="0.5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="content ">
								<h2>We Are Always Ready to Help You. Book An Appointment</h2>
								<div class="button mt-3">
									<a href="#" class="btn">Book Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--/Ens clients -->
			
			<!-- Start Appointment -->
			<section class="appointment">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2>
								Contact With Us</h2>
								<img src="../img/section-img.png" alt="#">
								<p>If you have any questions please fell free to contact with us.	</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-12 col-12">
						<form class="form" method="post" action="mail/mail.php">
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<input type="text" name="name" placeholder="Name" required="">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<input type="email" name="email" placeholder="Email" required="">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<input type="text" name="phone" placeholder="Phone" required="">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<input type="text" name="subject" placeholder="Subject" required="">
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<textarea name="message" placeholder="Your Message" required=""></textarea>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group login-btn">
													<button class="btn" type="submit">Send</button>
												</div>
											</div>
										</div>
									</form>
						</div>
						<div class="col-lg-6 col-md-12 ">
							<div class="appointment-image">
								<img src="../img/contact-img.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</section>

			<footer id="footer" class="footer ">
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-footer">
									<h2>About Us</h2>
									<p> We are a primary care optometry and optical clinic offering comprehensive eye exams, eyecare services, eye wear products, optical dispensing, and contact lenses for all ages.</p>
									<!-- Social -->
									<ul class="social">
										<li><a href="#"><i class="icofont-facebook"></i></a></li>
										<li><a href="#"><i class="icofont-google-plus"></i></a></li>
										<li><a href="#"><i class="icofont-twitter"></i></a></li>
									</ul>
									<!-- End Social -->
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-footer f-link">
									<h2>Quick Links</h2>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-12">
											<ul>
												<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
												<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Products</a></li>
												<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
												<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Doctors</a></li>
												<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>	
											</ul>
										</div>
										<div class="col-lg-6 col-md-6 col-12">
											<ul>
												<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>
												<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Book Appointment</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-footer">
									<h2>Open Hours</h2>
									<p>This will be the official opening hours of the clinic.</p>
									<ul class="time-sidual">
										<li class="day">Monday - Friday <span>8:00am-6:00pm</span></li>
										<li class="day">Saturday <span>8:00-3:30</span></li>
										<li class="day">Sundays & Holidays <span>Closed</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>


		
				<!--/ End Footer Top -->
				<!-- Copyright -->
				<div class="copyright">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-12">
								<div class="copyright-content">
									<p>© Copyright 2025 |  All Rights Reserved </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Copyright -->
			</footer>
			<!--/ End Footer Area -->
			
			<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($showWelcomeModal): ?>
        // Display the modal
        const welcomeModal = document.getElementById('welcomeModal');
        welcomeModal.style.display = 'block';

        // Close the modal when clicking on the close button
				function closeModal() {
					welcomeModal.style.display = 'none';
				}

				document.querySelector("#welcomeModal .close").onclick = closeModal;

				// Close the modal when clicking outside the modal
				window.onclick = function(event) {
					if (event.target === welcomeModal) {
						closeModal();
					}
				};
				<?php endif; ?>
			});
</script>

		
		<?php
		include '../script.php';
		?>
		</body>
	</html>