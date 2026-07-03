@extends('admin.layout')

@section('title', 'Xəstəxananı Düzəlt')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Xəstəxananı Düzəlt</h3>

    {{-- Formanı açarkən enctype-ın olduğundan əmin olun --}}
    <form action="{{ route('admin.hospitals.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstəxana Adı</label>
                <input type="text" name="name" value="{{ old('name', $hospital->name) }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Şəhər</label>
                <input type="text" name="city" value="{{ old('city', $hospital->city) }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Ünvan</label>
                <input type="text" name="address" value="{{ old('address', $hospital->address) }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone', $hospital->phone) }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Status</label>
                <select name="is_active" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="1" {{ $hospital->is_active == 1 ? 'selected' : '' }}>Aktiv</option>
                    <option value="0" {{ $hospital->is_active == 0 ? 'selected' : '' }}>Passiv</option>
                </select>
            </div>

            <div style="grid-column: span 2;">
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstəxana Şəkli</label>
                @if($hospital->image)
                    <div style="margin-bottom:10px;">
                        <img src="{{ asset($hospital->image) }}" alt="Hospital Image" style="width:150px; height:100px; object-fit:cover; border-radius:8px; border:1px solid #eee;">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>
        </div>

        <div style="margin-top:28px; display:flex; gap:12px;">
            <button type="submit" style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yenilə
            </button>
            <a href="{{ route('admin.hospitals.index') }}" style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>
    </form>
</div>

@endsection