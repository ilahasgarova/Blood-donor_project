@extends('layouts.app')

@section('title', 'Qan Bağışı — Həyat Xilas Et')

@section('content')

<!-- HERO -->
<section class="hero">
  <div class="container hero-grid">
    <div>
      <h1>Bir Damla Qan, <span style="color:var(--primary)">Bir Həyat</span> Xilas Edir</h1>
      <p>Qan bağışlayaraq ehtiyacı olan insanlara ümid verin. Hər donor bir qəhrəmandır.</p>
      <div class="hero-buttons">
        <a href="{{ route('donor.create') }}" class="btn btn-primary">Donor Ol</a>
        <a href="{{ route('qan-teleb') }}" class="btn btn-outline">Qan Tələb Et</a>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="container stats-grid">
    <div class="stat-card"><div class="stat-num" data-count="{{ $totalDonors }}">{{ $totalDonors }}</div><div class="stat-label">Aktiv Donor</div></div>
    <div class="stat-card"><div class="stat-num" data-count="{{ $savedLives }}">{{ $savedLives }}</div><div class="stat-label">Xilas Olan Həyat</div></div>
    <div class="stat-card"><div class="stat-num" data-count="{{ $totalDonations }}">{{ $totalDonations }}</div><div class="stat-label">Bağış Sayı</div></div>
    <div class="stat-card"><div class="stat-num" data-count="{{ $totalCities }}">{{ $totalCities }}</div><div class="stat-label">Şəhər/Rayon</div></div>
</div>

<!-- BLOOD GROUPS -->
<section class="section">
  <div class="container">
    <div class="section-head">
      <h2>Qan <span style="color:var(--primary)">Qrupları</span> Ehtiyacı</h2>
      <p>Cari qan ehtiyatımızın vəziyyəti</p>
    </div>
    <div class="blood-grid">
      @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
        @php $count = $bloodGroups[$type]->total ?? 0; @endphp
        <div class="blood-card">
          <div class="blood-type">{{ $type }}</div>
          <div class="blood-status">
            @if($count == 0)
              <span style="color:#c0392b">Yoxdur</span>
            @elseif($count < 3)
              <span style="color:#e65100">Az</span>
            @else
              <span style="color:#2e7d32">Normal</span>
            @endif
          </div>
          <div class="blood-count">{{ $count }} donor</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- BAĞIŞ PROSESİ + ŞƏKİL -->
<section class="section section-light">
  <div class="container">
    <div class="hero-grid" style="align-items:center; gap:40px;">
      <div>
        <h2 class="section-title" style="text-align:left;">Bağış <span style="color:var(--primary)">Prosesi</span></h2>
        <p style="color:var(--gray); margin-bottom:20px;">Qan bağışı sadə və təhlükəsizdir</p>
        <div style="margin-bottom:16px; display:flex; gap:12px; align-items:flex-start;">
          <span style="background:var(--primary); color:#fff; border-radius:50%; width:32px; height:32px; display:flex; align-items:center; justify-content:center; font-weight:700; flex-shrink:0;">1</span>
          <div><strong>Qeydiyyat</strong><p style="color:var(--gray); font-size:14px;">Onlayn formanı doldurun və qeydiyyatdan keçin.</p></div>
        </div>
        <div style="margin-bottom:16px; display:flex; gap:12px; align-items:flex-start;">
          <span style="background:var(--primary); color:#fff; border-radius:50%; width:32px; height:32px; display:flex; align-items:center; justify-content:center; font-weight:700; flex-shrink:0;">2</span>
          <div><strong>Müayinə</strong><p style="color:var(--gray); font-size:14px;">Sağlamlıq yoxlanışı və qısa müsahibə.</p></div>
        </div>
        <div style="margin-bottom:16px; display:flex; gap:12px; align-items:flex-start;">
          <span style="background:var(--primary); color:#fff; border-radius:50%; width:32px; height:32px; display:flex; align-items:center; justify-content:center; font-weight:700; flex-shrink:0;">3</span>
          <div><strong>Bağış</strong><p style="color:var(--gray); font-size:14px;">10–15 dəqiqədə qan bağışı həyata keçirilir.</p></div>
        </div>
        <div style="display:flex; gap:12px; align-items:flex-start;">
          <span style="background:var(--primary); color:#fff; border-radius:50%; width:32px; height:32px; display:flex; align-items:center; justify-content:center; font-weight:700; flex-shrink:0;">4</span>
          <div><strong>İstirahət</strong><p style="color:var(--gray); font-size:14px;">Qəlyanaltı və qısa istirahət. Hazırsız!</p></div>
        </div>
      </div>
      <div>
        <img src=https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&q=80
             alt="Qan bağışı"
             style="width:100%; border-radius:16px; box-shadow:0 8px 32px rgba(0,0,0,0.12);">
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta">
  <div class="container">
    <h2>Bu Gün Bir Həyat Xilas Et</h2>
    <p>Sənin bir saatın kiminsə bütün ömrünü dəyişə bilər.</p>
    <a href="{{ route('donor.create') }}" class="btn btn-light">İndi Donor Ol</a>
  </div>
</section>

@endsection