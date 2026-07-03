@extends('layouts.app')

@section('title', 'Qan Tələbi — QanBağışı')

@section('content')

<section class="page-head">
  <div class="container">
    <h1>Qan <span style="color:var(--primary)">Tələbi</span></h1>
    <p>Təcili qan ehtiyacınız varsa, formanı doldurun — donorlarımız sizinlə əlaqə saxlayacaq</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="form-wrap">

      @if(session('success'))
        <div style="background:#e8f5e9; color:#2e7d32; padding:14px 18px; border-radius:8px; margin-bottom:20px; font-size:15px;">
          <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('qan-teleb.store') }}">
        @csrf

        <div class="alert alert-danger" style="margin-bottom:24px">
          <i class="fas fa-exclamation-triangle"></i>
          <strong>Təcili hallarda</strong> birbaşa <a href="tel:+994123456789" style="color:inherit;text-decoration:underline">+994 12 345 67 89</a> nömrəsi ilə əlaqə saxlayın.
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Xəstənin Adı <span style="color:var(--primary)">*</span></label>
            <input type="text" name="xeste_adi" class="form-control" value="{{ old('xeste_adi') }}" required>
          </div>
          <div class="form-group">
            <label>Xəstənin Yaşı</label>
            <input type="number" name="xeste_yasi" class="form-control" value="{{ old('xeste_yasi') }}">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Əlaqə Telefonu <span style="color:var(--primary)">*</span></label>
            <input type="tel" name="telefon" class="form-control" value="{{ old('telefon') }}" required>
          </div>
          <div class="form-group">
            <label>Tələb Olunan Qan Qrupu <span style="color:var(--primary)">*</span></label>
            <select name="qan_grupu" class="form-control" required>
              <option value="">Seçin</option>
              @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                <option value="{{ $type }}" {{ old('qan_grupu') == $type ? 'selected' : '' }}>{{ $type }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Təcillilik <span style="color:var(--primary)">*</span></label>
            <select name="tecillik" class="form-control" required>
              <option value="tecili" {{ old('tecillik') == 'tecili' ? 'selected' : '' }}>Təcili (24 saat içində)</option>
              <option value="orta" {{ old('tecillik') == 'orta' ? 'selected' : '' }}>Orta (3 gün içində)</option>
              <option value="planli" {{ old('tecillik') == 'planli' ? 'selected' : '' }}>Planlı (1 həftə)</option>
            </select>
          </div>
          <div class="form-group">
            <label>Xəstəxana / Tibb Müəssisəsi <span style="color:var(--primary)">*</span></label>
            <input type="text" name="xestexana" class="form-control" placeholder="Adı və ünvanı" value="{{ old('xestexana') }}" required>
          </div>
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

        <button type="submit" class="btn btn-primary btn-block">
          <i class="fas fa-paper-plane"></i> Tələbi Göndər
        </button>
      </form>
    </div>
  </div>
</section>

@endsection