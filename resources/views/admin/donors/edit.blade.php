@extends('admin.layout')

@section('title', 'Donor Düzəlt')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Donor Məlumatlarını Düzəlt</h3>

    <form method="POST" action="{{ route('admin.donors.update', $donor) }}">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Ad Soyad</label>
                <input type="text" name="name" value="{{ $donor->name }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Telefon</label>
                <input type="text" name="phone" value="{{ $donor->phone }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Email</label>
                <input type="email" name="email" value="{{ $donor->email }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Şəhər</label>
                <input type="text" name="city" value="{{ $donor->city }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Qan Qrupu</label>
                <select name="blood_type"
                        style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                        <option value="{{ $type }}" {{ $donor->blood_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Status</label>
                <select name="is_available"
                        style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="1" {{ $donor->is_available ? 'selected' : '' }}>Aktiv</option>
                    <option value="0" {{ !$donor->is_available ? 'selected' : '' }}>Passiv</option>
                </select>
            </div>

        </div>

        <div style="margin-top:28px; display:flex; gap:12px;">
            <button type="submit"
                    style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yenilə
            </button>
            <a href="{{ route('admin.donors.index') }}"
               style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>

    </form>
</div>

@endsection
