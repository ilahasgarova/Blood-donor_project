@extends('layouts.app')

@section('title', 'Donor Ol — QanBağışı')

@section('content')

<section class="page-head">
  <div class="container">
    <h1>Donor <span style="color:var(--primary)">Qeydiyyatı</span></h1>
    <p>Aşağıdakı formanı doldurun və qəhrəman komandamıza qoşulun</p>
  </div>
</section>

<section class="section section-light">
  <div class="container">
    <div class="form-wrap">

      @if(session('success'))
        <div style="background:#e8f5e9; color:#2e7d32; padding:14px 18px; border-radius:8px; margin-bottom:20px; font-size:15px;">
          <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('donor.store') }}">
        @csrf

        <div class="form-row">
          <div class="form-group">
            <label>Ad <span style="color:var(--primary)">*</span></label>
            <input type="text" name="ad" class="form-control" value="{{ old('ad') }}" required>
          </div>
          <div class="form-group">
            <label>Soyad <span style="color:var(--primary)">*</span></label>
            <input type="text" name="soyad" class="form-control" value="{{ old('soyad') }}" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>E-poçt <span style="color:var(--primary)">*</span></label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label>Telefon <span style="color:var(--primary)">*</span></label>
            <input type="tel" name="telefon" class="form-control" placeholder="+994 50 000 00 00" value="{{ old('telefon') }}" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Qan Qrupu <span style="color:var(--primary)">*</span></label>
            <select name="qan_grupu" class="form-control" required>
              <option value="">Seçin</option>
              @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                <option value="{{ $type }}" {{ old('qan_grupu') == $type ? 'selected' : '' }}>{{ $type }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Şəhər <span style="color:var(--primary)">*</span></label>
            <select name="seher" class="form-control" required>
              <option value="">Seçin</option>
              @foreach(['Bakı','Gəncə','Sumqayıt','Mingəçevir','Şirvan','Naxçıvan'] as $city)
                <option value="{{ $city }}" {{ old('seher') == $city ? 'selected' : '' }}>{{ $city }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label style="display:flex;align-items:center;gap:8px;font-weight:400">
            <input type="checkbox" name="razilig" required>
            Şəxsi məlumatlarımın işlənməsinə razıyam
          </label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">
          <i class="fas fa-heart"></i> Qeydiyyatı Tamamla
        </button>
      </form>
    </div>
  </div>
</section>

@endsection
