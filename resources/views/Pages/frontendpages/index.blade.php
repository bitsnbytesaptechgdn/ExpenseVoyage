@extends('Layouts.frontendlayout')
@section('frontend')


<section style="padding-top: 7rem;" id="service">

  <div class="bg-holder" style="background-image:url(Frontend/assets/img/hero/hero-bg.svg);">
  </div>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 hero-img"
          src="Frontend/assets/img/hero/hero-img.png" alt="hero-header" /></div>
      <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
        <h4 class="fw-bold text-danger mb-3">Plan Your Trips and Budgets with Ease</h4>
        <h1 class="hero-title">Join us now, manage trip budgets!</h1>
        <p class="mb-4 fw-medium" style="font-size: 15px;"> Plan smarter, travel better! Sign up now to effortlessly
          manage,<br> track, and optimize your trip budget. Start saving more today <br> and enjoy stress-free
          adventures!"</p>
        <div class="text-center text-md-start"> <a
            class="btn btn-primary btn-lg me-md-4 mb-3 mb-md-0 border-0 primary-btn-shadow" href="#!" role="button">Find
            out more</a>

          <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <iframe class="rounded" style="width:100%;max-height:500px;" height="500px"
                  src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen="allowfullscreen"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="pt-5" id="about">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="{{ asset('img/about.jpg') }}" alt="About 1">
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3">Who Are We?</h2>
            <p class="lead fs-4 text-secondary mb-3">We help people to build incredible brands and superior products.
              Our perspective is to furnish outstanding captivating services.</p>
            <p class="mb-5">We are a fast-growing company, but we have never lost sight of our core values. We believe
              in collaboration, innovation, and customer satisfaction. We are always looking for new ways to improve our
              products and services.</p>
            <div class="row gy-4 gy-md-0 gx-xxl-5X">
              <div class="col-12 col-md-6">
                <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                      class="bi bi-gear-fill" viewBox="0 0 16 16">
                      <path
                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Versatile Brand</h2>
                    <p class="text-secondary mb-0">We are crafting a digital method that subsists life across all
                      mediums.</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                      class="bi bi-fire" viewBox="0 0 16 16">
                      <path
                        d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Digital Agency</h2>
                    <p class="text-secondary mb-0">We believe in innovation by merging primary with elaborate ideas.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>

</section>
<section class="pt-5" id="contact">

  <div class="container-xxl py-6">
    @if (Auth::check() && Auth::user()->role === 'user')
    <div class="container">
      <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
      <h1 class="display-5 mb-3">Contact Us</h1>
      <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
      </div>
      <div class="row g-5 justify-content-center">
      <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
        <div style="background-color: seagreen;"
        class="text-white d-flex flex-column justify-content-center h-100 p-5 rounded-1 shadow">
        <h5 class="text-white">Call Us</h5>
        <p class="mb-5"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
        <h5 class="text-white">Email Us</h5>
        <p class="mb-5"><i class="fa fa-envelope me-3"></i>info@example.com</p>
        <h5 class="text-white">Office Address</h5>
        <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
        <h5 class="text-white">Follow Us</h5>
        <div class="d-flex pt-2">
          <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
          <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
            class="fab fa-facebook-f"></i></a>
          <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
          <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
            class="fab fa-linkedin-in"></i></a>
        </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">


        <form action="{{ route('contacts.store') }}" method="POST">
        @csrf


        <div class="row g-3">
          <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" name="name">
            <label for="name">Your Name</label>
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-floating">
            <input type="email" class="form-control" name="email">
            <label for="email">Your Email</label>
          </div>
          </div>
          <div class="col-12">
          <div class="form-floating">
            <input type="text" class="form-control" name="subject">
            <label for="subject">Subject</label>
          </div>
          </div>
          <div class="col-12">
          <div class="form-floating">
            <textarea class="form-control" name="message"
            style="height: 200px"></textarea>

          </div>
          </div>
          <div class="col-12">
          <button class="btn btn-success rounded-pill py-3 px-5" type="submit">Send Message</button>
          </div>
        </div>
        </form>
      </div>
      </div>
    </div>
  @endif
  </div>
</section>
<!-- Contact End -->


<!-- Google Map Start -->
<div class="container-xxl px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
  <iframe class="w-100" style="height: 450px;"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
    frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="d-none">
  <section class="pt-5 pt-md-9" id="service">

    <div class="container">
      <div class="position-absolute z-index--1 end-0 d-none d-lg-block"><img
          src="Frontend/assets/img/category/shape.svg" style="max-width: 200px" alt="service" /></div>
      <div class="mb-7 text-center">
        <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">We Offer Best Services</h3>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6 mb-6">
          <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
            <div class="card-body p-xxl-5 p-4"> <img src="Frontend/assets/img/category/icon1.png" width="75"
                alt="Service" />
              <h4 class="mb-3">Calculated Weather</h4>
              <p class="mb-0 fw-medium">Built Wicket longer admire do barton vanity itself do in it.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-6">
          <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
            <div class="card-body p-xxl-5 p-4"> <img src="Frontend/assets/img/category/icon2.png" width="75"
                alt="Service" />
              <h4 class="mb-3">Best Flights</h4>
              <p class="mb-0 fw-medium">Engrossed listening. Park gate sell they west hard for the.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-6">
          <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
            <div class="card-body p-xxl-5 p-4"> <img src="Frontend/assets/img/category/icon3.png" width="75"
                alt="Service" />
              <h4 class="mb-3">Local Events</h4>
              <p class="mb-0 fw-medium">Barton vanity itself do in it. Preferd to men it engrossed listening.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-6">
          <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
            <div class="card-body p-xxl-5 p-4"> <img src="Frontend/assets/img/category/icon4.png" width="75"
                alt="Service" />
              <h4 class="mb-3">Customization</h4>
              <p class="mb-0 fw-medium">We deliver outsourced aviation services for military customers</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->

  </section>
</div>

<section class="pt-5" id="destination">

  <div class="container">
    <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4"><img
        src="Frontend/assets/img/dest/shape.svg" alt="destination" /></div>
    <div class="mb-7 text-center">
      <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Top Destinations</h3>
      <p class="mt-3 fs-5">Explore the most popular places our users are visiting to make the most of their travel
        budgets. Discover your next adventure and plan your trip with us!</p>
    </div>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card overflow-hidden shadow"> <img class="card-img-top" src="Frontend/assets/img/dest/dest1.jpg"
            alt="Rome, Italty" />
          <div class="card-body py-4 px-3">
            <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
              <h4 class="text-secondary fw-medium"><a class="link-900 text-decoration-none stretched-link"
                  href="#!">Rome, Italty</a></h4><span class="fs-1 fw-medium">$5,42k</span>
            </div>
            <div class="d-flex align-items-center"> <img src="Frontend/assets/img/dest/navigation.svg"
                style="margin-right: 14px" width="20" alt="navigation" /><span class="fs-0 fw-medium">10 Days
                Trip</span></div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card overflow-hidden shadow"> <img class="card-img-top" src="Frontend/assets/img/dest/dest2.jpg"
            alt="London, UK" />
          <div class="card-body py-4 px-3">
            <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
              <h4 class="text-secondary fw-medium"><a class="link-900 text-decoration-none stretched-link"
                  href="#!">London, UK</a></h4><span class="fs-1 fw-medium">$4.2k</span>
            </div>
            <div class="d-flex align-items-center"> <img src="Frontend/assets/img/dest/navigation.svg"
                style="margin-right: 14px" width="20" alt="navigation" /><span class="fs-0 fw-medium">12 Days
                Trip</span></div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card overflow-hidden shadow"> <img class="card-img-top" src="Frontend/assets/img/dest/dest3.jpg"
            alt="Full Europe" />
          <div class="card-body py-4 px-3">
            <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
              <h4 class="text-secondary fw-medium"><a class="link-900 text-decoration-none stretched-link"
                  href="#!">Full Europe</a></h4><span class="fs-1 fw-medium">$15k</span>
            </div>
            <div class="d-flex align-items-center"> <img src="Frontend/assets/img/dest/navigation.svg"
                style="margin-right: 14px" width="20" alt="navigation" /><span class="fs-0 fw-medium">28 Days
                Trip</span></div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end of .container-->

</section>

<section id="booking">

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="mb-4 text-start">
          <h5 class="text-secondary">Easy and Fast</h5>
          <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Plan Your Perfect Trip in 3 Simple
            Steps</h3>
        </div>
        <div class="d-flex align-items-start mb-5">
          <div class="bg-primary me-sm-4 me-3 p-3" style="border-radius: 13px">
            <img src="Frontend/assets/img/steps/selection.svg" width="22" alt="steps" />
          </div>
          <div class="flex-1">
            <h5 class="text-secondary fw-bold fs-0">Set Your Budget</h5>
            <p>Define your travel budget. No matter <br class="d-none d-sm-block"> where you're heading, we help you
              manage costs.</p>
          </div>
        </div>
        <div class="d-flex align-items-start mb-5">
          <div class="bg-danger me-sm-4 me-3 p-3" style="border-radius: 13px">
            <img src="Frontend/assets/img/steps/water-sport.svg" width="22" alt="steps" />
          </div>
          <div class="flex-1">
            <h5 class="text-secondary fw-bold fs-0">Explore Destinations</h5>
            <p>Browse our top recommended places and <br class="d-none d-sm-block"> choose your dream destination within
              your budget.</p>
          </div>
        </div>
        <div class="d-flex align-items-start mb-5">
          <div class="bg-info me-sm-4 me-3 p-3" style="border-radius: 13px">
            <img src="Frontend/assets/img/steps/taxi.svg" width="22" alt="steps" />
          </div>
          <div class="flex-1">
            <h5 class="text-secondary fw-bold fs-0">Book and Enjoy</h5>
            <p>Finalize your plans, make your bookings <br class="d-none d-sm-block"> on time, and get ready for an
              unforgettable trip!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-flex justify-content-center align-items-start">
        <div class="card position-relative shadow" style="max-width: 370px;">
          <div class="position-absolute z-index--1 me-10 me-xxl-0" style="right:-160px;top:-210px;">
            <img src="Frontend/assets/img/steps/bg.png" style="max-width:550px;" alt="shape" />
          </div>
          <div class="card-body p-3">
            <img class="mb-4 mt-2 rounded-2 w-100" src="Frontend/assets/img/steps/booking-img.jpg" alt="booking" />
            <div>
              <h5 class="fw-medium">Budget Trip to Greece</h5>
              <p class="fs--1 mb-3 fw-medium">14-29 June | Planned by Robbin Joseph</p>
              <div class="icon-group mb-4">
                <span class="btn icon-item"><img src="Frontend/assets/img/steps/leaf.svg" alt="" /></span>
                <span class="btn icon-item"><img src="Frontend/assets/img/steps/map.svg" alt="" /></span>
                <span class="btn icon-item"><img src="Frontend/assets/img/steps/send.svg" alt="" /></span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center mt-n1">
                  <img class="me-3" src="Frontend/assets/img/steps/building.svg" width="18" alt="building" />
                  <span class="fs--1 fw-medium">24 participants budgeting wisely</span>
                </div>
                <div class="show-onhover position-relative">
                  <div
                    class="card hideEl shadow position-absolute end-0 start-xl-50 bottom-100 translate-xl-middle-x ms-3"
                    style="width: 260px;border-radius:18px;">
                    <div class="card-body py-3">
                      <div class="d-flex">
                        <div style="margin-right: 10px">
                          <img class="rounded-circle" src="Frontend/assets/img/steps/favorite-placeholder.png"
                            width="50" alt="favorite" />
                        </div>
                        <div>
                          <p class="fs--1 mb-1 fw-medium">Ongoing</p>
                          <h5 class="fw-medium mb-3">Trip to Rome</h5>
                          <h6 class="fs--1 fw-medium mb-2"><span>40%</span> of budget utilized</h6>
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="25"
                              aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn"><img src="Frontend/assets/img/steps/heart.svg" width="20" alt="step" /></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end of .container-->

</section>

<section id="testimonial">

  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="mb-8 text-start">
          <h5 class="text-secondary">Testimonials </h5>
          <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">What people say about Us.</h3>
        </div>
      </div>
      <div class="col-lg-1"></div>
      <div class="col-lg-6">
        <div class="pe-7 ps-5 ps-lg-0">
          <div class="carousel slide carousel-fade position-static" id="testimonialIndicator" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button class="active" type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="0"
                aria-current="true" aria-label="Testimonial 0"></button>
              <button class="false" type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="1"
                aria-current="true" aria-label="Testimonial 1"></button>
              <button class="false" type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="2"
                aria-current="true" aria-label="Testimonial 2"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item position-relative active">
                <div class="card shadow" style="border-radius:10px;">
                  <div class="position-absolute start-0 top-0 translate-middle"> <img class="rounded-circle fit-cover"
                      src="Frontend/assets/img/testimonial/author.png" height="65" width="65" alt="" /></div>
                  <div class="card-body p-4">
                    <p class="fw-medium mb-4">&quot;This trip planner revolutionized my budgeting! It made planning
                      effortless, so I could enjoy my trip without stress. Highly recommend!&quot;</p>
                    <h5 class="text-secondary">Mike taylor</h5>
                    <p class="fw-medium fs--1 mb-0">Lahore, Pakistan</p>
                  </div>
                </div>
                <div class="card shadow-sm position-absolute top-0 z-index--1 mb-3 w-100 h-100"
                  style="border-radius:10px;transform:translate(25px, 25px)"> </div>
              </div>
              <div class="carousel-item position-relative ">
                <div class="card shadow" style="border-radius:10px;">
                  <div class="position-absolute start-0 top-0 translate-middle"> <img class="rounded-circle fit-cover"
                      src="Frontend/assets/img/testimonial/author2.png" height="65" width="65" alt="" /></div>
                  <div class="card-body p-4">
                    <p class="fw-medium mb-4">&quot;Jadoo stands out as a top-notch travel planner. Their reliable tools
                      made trip budgeting a breeze, ensuring a smooth, stress-free experience. Highly recommended!&quot;
                    </p>
                    <h5 class="text-secondary">Thomas Wagon</h5>
                    <p class="fw-medium fs--1 mb-0">CEO of Red Button</p>
                  </div>
                </div>
                <div class="card shadow-sm position-absolute top-0 z-index--1 mb-3 w-100 h-100"
                  style="border-radius:10px;transform:translate(25px, 25px)"> </div>
              </div>
              <div class="carousel-item position-relative ">
                <div class="card shadow" style="border-radius:10px;">
                  <div class="position-absolute start-0 top-0 translate-middle"> <img class="rounded-circle fit-cover"
                      src="Frontend/assets/img/testimonial/author3.png" height="65" width="65" alt="" /></div>
                  <div class="card-body p-4">
                    <p class="fw-medium mb-4">&quot;This trip planner is a game-changer! It streamlined my budgeting
                      process and made planning effortless. Highly recommend for a stress-free travel experience.&quot;
                    </p>
                    <h5 class="text-secondary">Kelly Willium</h5>
                    <p class="fw-medium fs--1 mb-0">Khulna, Bangladesh</p>
                  </div>
                </div>
                <div class="card shadow-sm position-absolute top-0 z-index--1 mb-3 w-100 h-100"
                  style="border-radius:10px;transform:translate(25px, 25px)"> </div>
              </div>
            </div>
            <div
              class="carousel-navigation d-flex flex-column flex-between-center position-absolute end-0 top-lg-50 bottom-0 translate-middle-y z-index-1 me-3 me-lg-0"
              style="height:60px;width:20px;">
              <button class="carousel-control-prev position-static" type="button" data-bs-target="#testimonialIndicator"
                data-bs-slide="prev"><img src="Frontend/assets/img/icons/up.svg" width="16" alt="icon" /></button>
              <button class="carousel-control-next position-static" type="button" data-bs-target="#testimonialIndicator"
                data-bs-slide="next"><img src="Frontend/assets/img/icons/down.svg" width="16" alt="icon" /></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end of .container-->

</section>

<section class="pt-6">

  @if (Auth::check() && Auth::user()->role === 'user')
    <div class="container">
    <div class="py-8 px-5 position-relative text-center"
      style="background-color: rgba(223, 215, 249, 0.2); border-radius: 40px;">
      <div class="position-absolute start-100 top-0 translate-middle ms-md-n3 ms-n4 mt-3">
      <img src="Frontend/assets/img/cta/send.png" style="max-width:70px;" alt="send icon" />
      </div>
      <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <h2 class="text-secondary lh-1-7 mb-4">Subscribe for the Latest Updates</h2>
        <p class="text-muted mb-4">Get information, news, and exclusive offers from Cobham.</p>
        <button class="btn btn-danger orange-gradient-btn fs--1" data-bs-toggle="modal"
        data-bs-target="#subscriptionModal">Subscribe Now</button>
      </div>
      </div>
    </div>
    </div>
  @endif

  <!-- Subscription Modal -->
  <div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-3 shadow">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="subscriptionModalLabel">Subscribe to Our Newsletter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('subscribe') }}" method="POST">
          @csrf
          <div class="modal-body">
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" name="phone" id="phone" required>
            </div>

            <!-- Payment Type -->
            <div class="mb-3">
              <label for="paymentType" class="form-label">Payment Method</label>
              <select class="form-select" name="payment_type" id="paymentType" required>
                <option value="" disabled selected>Select a method</option>
                <option value="card">Credit/Debit Card</option>
                <option value="e-wallet">E-Wallet</option>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary w-100">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- <section> close ============================-->
<!-- ============================================-->
@endsection