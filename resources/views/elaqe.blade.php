@extends('layouts.app')

@section('title', 'Əlaqə — QanBağışı')

@section('content')

<section class="page-head">
  <div class="container">
    <h1>Bizimlə <span style="color:var(--primary)">Əlaqə</span></h1>
    <p>Suallarınız varsa, bizimlə əlaqə saxlayın</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="hero-grid">
      <div>
        <h2 class="section-title" style="text-align:left;font-size:28px">Əlaqə <span>Məlumatları</span></h2>
        <div style="margin-top:30px">
          <div style="display:flex;gap:16px;margin-bottom:24px">
            <div class="logo-icon"><i class="fas fa-phone"></i></div>
            <div><strong>Telefon</strong><p style="color:var(--gray)">+994 12 345 67 89<br>+994 50 123 45 67</p></div>
          </div>
          <div style="display:flex;gap:16px;margin-bottom:24px">
            <div class="logo-icon"><i class="fas fa-envelope"></i></div>
            <div><strong>E-poçt</strong><p style="color:var(--gray)">info@qanbagisi.az<br>destek@qanbagisi.az</p></div>
          </div>
          <div style="display:flex;gap:16px;margin-bottom:24px">
            <div class="logo-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div><strong>Ünvan</strong><p style="color:var(--gray)">Bakı şəhəri, Nəsimi rayonu,<br>Nizami küçəsi 25</p></div>
          </div>
          <div style="display:flex;gap:16px">
            <div class="logo-icon"><i class="fas fa-clock"></i></div>
            <div><strong>İş Saatları</strong><p style="color:var(--gray)">Bazar ertəsi — Cümə: 09:00 — 18:00<br>Şənbə: 10:00 — 14:00</p></div>
          </div>
        </div>
      </div>

      <div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.9!2d49.8671!3d40.3777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDIyJzM5LjciTiA0OcKwNTInMDEuNiJF!5e0!3m2!1saz!2saz!4v1"
          width="100%"
          height="400"
          style="border:0; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.1);"
          allowfullscreen=""
          loading="lazy">
        </iframe>
      </div>

    </div>
  </div>
</section>

@endsection