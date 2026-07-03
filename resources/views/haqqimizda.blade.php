@extends('layouts.app')

@section('title', 'Qan Bağışı — Həyat Xilas Et')

@section('content')


<section class="page-head">
  <div class="container">
    <h1>Haqqımızda</h1>
    <p>Həyat xilas etmək missiyamızdır</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="hero-grid">
      <div>
        <h2 class="section-title" style="text-align:left">Biz <span>Kimik?</span></h2>
        <p style="color:var(--gray);margin-bottom:16px">QanBağışı — könüllü qan donorlarını ehtiyacı olan xəstələrlə birləşdirən platformadır. 2020-ci ildən bəri minlərlə həyat xilas etmişik.</p>
        <p style="color:var(--gray);margin-bottom:24px">Məqsədimiz — qan tələbi olan hər bir insanın vaxtında və təhlükəsiz şəkildə qana çatışmasını təmin etməkdir.</p>
        <a href="{{ route('donor.create') }}" class="btn btn-primary">Bizə Qoşul</a>
      </div>
      <div class="hero-card" style="max-width:100%">
        <h3 style="color:var(--primary);margin-bottom:20px"><i class="fas fa-bullseye"></i> Missiyamız</h3>
        <p style="margin-bottom:20px;color:var(--gray)">Heç bir insanın qan çatışmazlığından əziyyət çəkməməsi üçün könüllü donor şəbəkəsi qurmaq.</p>
        <h3 style="color:var(--primary);margin-bottom:20px"><i class="fas fa-eye"></i> Vizyonumuz</h3>
        <p style="color:var(--gray)">Azərbaycanın ən geniş və etibarlı qan donoru platforması olmaq.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section-light">
  <div class="container">
    <div class="section-head">
      <h2 class="section-title">Niyə <span>Biz?</span></h2>
    </div>
    <div class="steps-grid">
      <div class="step-card">
        <div class="step-num"><i class="fas fa-shield-alt"></i></div>
        <h3>Təhlükəsiz</h3><p>Bütün bağışlar tibbi standartlara uyğun aparılır.</p>
      </div>
      <div class="step-card">
        <div class="step-num"><i class="fas fa-clock"></i></div>
        <h3>Sürətli</h3><p>24/7 təcili qan tələbi sisteminə cavab veririk.</p>
      </div>
      <div class="step-card">
        <div class="step-num"><i class="fas fa-users"></i></div>
        <h3>Geniş Şəbəkə</h3><p>5000+ aktiv donor — bütün qan qrupları üzrə.</p>
      </div>
      <div class="step-card">
        <div class="step-num"><i class="fas fa-heart"></i></div>
        <h3>Pulsuz</h3><p>Bütün xidmətlərimiz tamamilə pulsuzdur.</p>
      </div>
    </div>
  </div>
</section>
@endsection