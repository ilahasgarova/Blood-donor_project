@extends('admin.layout')

@section('title', 'Yeni Xəstəxana')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Yeni Xəstəxana Əlavə Et</h3>

    {{-- 1. enctype əlavə edildi --}}
    <form method="POST" action="{{ route('admin.hospitals.store') }}" enctype="multipart/form-data">
        @csrf

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstəxana Adı</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Şəhər</label>
                <input type="text" name="city" value="{{ old('city') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Ünvan</label>
                <input type="text" name="address" value="{{ old('address') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>
            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Status</label>
                <select name="is_active" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="1">Aktiv</option>
                    <option value="0">Passiv</option>
                </select>
            </div>

            {{-- 2. Şəkil seçmək üçün input əlavə edildi --}}
            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstəxana Şəkli</label>
                <input type="file" name="image" accept="image/*"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>

        </div>

        <div style="margin-top:28px; display:flex; gap:12px;">
            <button type="submit"
                    style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yadda Saxla
            </button>
            <a href="{{ route('admin.hospitals.index') }}"
               style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>

    </form>
</div>

@endsection