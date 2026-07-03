@extends('layouts.app')

@section('title', 'Xəstəxanalar — QanBağışı')

@section('content')

<!-- Arxa fon avtomatik olaraq layihənin 'page-head' sinifi ilə tənzimlənir -->
<section class="page-head">
    <div class="container">
        <h1>Xəstəxanalarımız</h1>
        <p>Qan ehtiyacınızı qarşılaya biləcəyiniz yaxınlıqdakı xəstəxanalar</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="donor-grid">
            @forelse($hospitals as $hospital)
                <div class="donor-card">
                    <!-- Şəkil hissəsi -->
                    @if($hospital->image)
                        <img src="{{ asset($hospital->image) }}" alt="{{ $hospital->name }}" 
                             style="width:100%; height:200px; object-fit:cover; border-radius:8px 8px 0 0;">
                    @else
                        <div style="width:100%; height:200px; background:#f5f5f5; display:flex; align-items:center; justify-content:center; border-radius:8px 8px 0 0;">
                            <i class="fas fa-hospital" style="font-size:48px; color:#ddd;"></i>
                        </div>
                    @endif

                    <div class="donor-body">
                        <h3 style="color: var(--primary); margin-bottom: 15px;">{{ $hospital->name }}</h3>
                        <div class="donor-info"><strong>Şəhər:</strong> <span>{{ $hospital->city }}</span></div>
                        <div class="donor-info"><strong>Ünvan:</strong> <span>{{ $hospital->address }}</span></div>
                        <div class="donor-info"><strong>Telefon:</strong> <span>{{ $hospital->phone }}</span></div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 50px;">
                    <p>Hal-hazırda sistemdə qeydiyyatdan keçmiş xəstəxana yoxdur.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection