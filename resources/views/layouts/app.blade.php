<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Qan-Donor')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Footer sosial ikonları üçün stil */
        .footer .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        .footer .social-links a {
            font-size: 1.5rem;
            transition: 0.3s;
            text-decoration: none;
        }
        
        /* İkonların real rəngləri */
        .footer .social-links .facebook { color: #1877f2; }
        .footer .social-links .instagram { color: #e4405f; }
        .footer .social-links .whatsapp { color: #25d366; }
        
        /* Hover effekti */
        .footer .social-links a:hover { opacity: 0.7; }
    </style>
    
    @yield('styles')
</head>
<body>

<nav class="navbar">
  <div class="container nav-wrap">
    <a href="{{ route('home') }}" class="logo">
      <span class="logo-icon"><i class="fas fa-tint"></i></span> Qan-Donor
    </a>
    <ul class="nav-links">
      <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Ana Səhifə</a></li>
      <li><a href="{{ route('donorlar') }}" class="{{ request()->routeIs('donorlar') ? 'active' : '' }}">Donorlar</a></li>
      <li><a href="/qan-teleb" class="{{ request()->is('qan-teleb') ? 'active' : '' }}">Qan Tələbi</a></li>
      <li><a href="{{ route('qan-ehtiyati') }}" class="{{ request()->routeIs('qan-ehtiyati') ? 'active' : '' }}">Qan Ehtiyatı</a></li>
      <li><a href="/haqqimizda" class="{{ request()->is('haqqimizda') ? 'active' : '' }}">Haqqımızda</a></li>
      <li><a href="{{ route('xestexanalar') }}" class="{{ request()->routeIs('xestexanalar') ? 'active' : '' }}">Xəstəxanalar</a></li>
      <li><a href="/elaqe" class="{{ request()->is('elaqe') ? 'active' : '' }}">Əlaqə</a></li>
      <li><a href="{{ route('donor.create') }}" class="nav-cta {{ request()->routeIs('donor.create') ? 'active' : '' }}">Donor Ol</a></li>
    </ul>
    <button class="menu-toggle"><i class="fas fa-bars"></i></button>
  </div>
</nav>

@yield('content')

<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="{{ route('home') }}" class="logo footer-logo">
          <span class="logo-icon"><i class="fas fa-tint"></i></span> Qan-Donor
        </a>
        <p>Həyat xilas edən könüllü donorlar platforması.</p>
        <div class="social-links">
          <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Keçidlər</h4>
        <ul>
          <li><a href="{{ route('home') }}">Ana Səhifə</a></li>
          <li><a href="{{ route('donorlar') }}">Donorlar</a></li>
          <li><a href="/haqqimizda">Haqqımızda</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Xidmətlər</h4>
        <ul>
          <li><a href="{{ route('donor.create') }}">Donor Ol</a></li>
          <li><a href="/qan-teleb">Qan Tələbi</a></li>
          <li><a href="{{ route('qan-ehtiyati') }}">Qan Ehtiyatı</a></li>
          <li><a href="/elaqe">Əlaqə</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Əlaqə</h4>
        <ul>
          <li><i class="fas fa-phone"></i> +994 12 345 67 89</li>
          <li><i class="fas fa-envelope"></i> info@qandonor.az</li>
          <li><i class="fas fa-map-marker-alt"></i> Bakı, Azərbaycan</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      &copy; 2026 Qan-Donor. Bütün hüquqlar qorunur.
    </div>
  </div>
</footer>

<script src="{{ asset('frontend/js/main.js') }}"></script>
@yield('scripts')
</body>
</html>