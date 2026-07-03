@extends('layouts.app')

@section('title', 'Donorlar — QanBağışı')

@section('content')

<section class="page-head">
  <div class="container">
    <h1>Könüllü <span style="color:var(--primary)">Donorlarımız</span></h1>
    <p>Həyat xilas edən qəhrəmanlarımız ilə tanış olun</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="form-wrap" style="max-width:100%;margin-bottom:40px">
      <form method="GET" action="{{ route('donorlar') }}">
        <div class="form-row" style="grid-template-columns:1fr 1fr 1fr auto">
          <div class="form-group" style="margin:0">
            <label>Qan Qrupu</label>
            <select class="form-control" name="blood_type">
              <option value="">Hamısı</option>
              @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                <option value="{{ $type }}" {{ request('blood_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group" style="margin:0">
            <label>Şəhər</label>
            <select class="form-control" name="city">
              <option value="">Hamısı</option>
              @foreach($cities as $city)
                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group" style="margin:0">
            <label>Ad axtar</label>
            <input type="text" class="form-control" name="search" placeholder="Donor adı..." value="{{ request('search') }}">
          </div>
          <div class="form-group" style="margin:0;display:flex;align-items:end">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Axtar</button>
          </div>
        </div>
      </form>
    </div>

    <div class="donor-grid">
      @forelse($donors as $donor)
      <div class="donor-card">
        <div class="donor-head">
          <div class="donor-avatar">{{ strtoupper(substr($donor->name, 0, 1)) }}</div>
          <div class="donor-name">{{ $donor->name }}</div>
          <div class="donor-loc"><i class="fas fa-map-marker-alt"></i> {{ $donor->city }}</div>
        </div>
        <div class="donor-body">
          <div class="donor-info"><span>Qan qrupu</span><span style="color:var(--primary)">{{ $donor->blood_type }}</span></div>
          <div class="donor-info"><span>Telefon</span><span>{{ $donor->phone }}</span></div>
          <a href="tel:{{ $donor->phone }}" class="btn btn-primary btn-block">Əlaqə Saxla</a>
        </div>
      </div>
      @empty
      <div style="text-align:center; padding:40px; color:#999; grid-column:span 3;">
        Heç bir donor tapılmadı.
      </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
