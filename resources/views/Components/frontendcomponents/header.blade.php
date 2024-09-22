<nav class="navbar navbar-expand-lg navbar-light fixed-top py-2 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
  <div class="container"><a class="navbar-brand" href="#service"><img height="90px" src="{{asset('img/logo.png')}}"
        alt="logo" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
        class="navbar-toggler-icon"> </span></button>
    <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
        <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#service">Home</a>
        </li>
        <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
          <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#about">About</a>
          </li>
          <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
            <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page"
                href="#contact">Contact</a></li>
            <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page"
                href="#destination">Destination</a></li>
            <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page"
                href="#booking">Booking</a></li>
            <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page"
                href="#testimonial">Testimonial</a></li>
            <ul class="navbar-nav ms-auto">
              @guest
          <!-- Show these links if the user is not logged in -->
          <li class="nav-item px-3 px-xl-4">
          <a class="nav-link fw-medium" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item px-3 px-xl-4">
          <a class="btn btn-outline-dark order-1 order-lg-0 fw-medium" href="{{ route('register') }}">Sign
            Up</a>
          </li>
        @endguest

              @auth
          <!-- Show this link if the user is logged in -->
          <li class="nav-item px-3 px-xl-4">
          <a class="btn btn-outline-dark order-1 order-lg-0 fw-medium" href="{{ route('admin') }}">Dashboard</a>
          </li>
        @endauth
            </ul>

          </ul>
    </div>
  </div>
</nav>