@extends('layouts.app')

@section('title', 'Qan Ehtiyatı — QanBağışı')

@section('content')

<section class="page-head">
  <div class="container">
    <h1>Qan <span style="color:var(--primary)">Ehtiyatı</span></h1>
    <p>Cari qan ehtiyatımızın vəziyyəti</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="donor-grid">
      @forelse($inventories as $inventory)
        <div class="donor-card">
          <div class="donor-head">
            <div class="donor-avatar" style="font-size: 24px;">{{ $inventory->blood_type }}</div>
            <div class="donor-name" style="margin-top:10px">{{ $inventory->units_available }} vahid</div>
          </div>
          <div class="donor-body">
            <div class="donor-info">
              <span>Status</span>
              <span style="color:var(--primary)">
                @switch($inventory->status)
                    @case('critical') Təcili @break
                    @case('low') Az @break
                    @case('normal') Normal @break
                    @default {{ ucfirst($inventory->status) }}
                @endswitch
              </span>
            </div>
            <div class="donor-info">
              <span>Xəstəxana</span>
              <span>{{ $inventory->hospital }}</span>
            </div>
          </div>
        </div>
      @empty
        <div style="text-align:center; padding:40px; color:#999; grid-column:span 3;">
          Hal-hazırda qan ehtiyatı məlumatı yoxdur.
        </div>
      @endforelse
    </div>
  </div>
</section>

@endsection