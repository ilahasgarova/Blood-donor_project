@extends('admin.layout')

@section('title', 'Yeni Bağış')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Yeni Bağış Əlavə Et</h3>

    <form method="POST" action="{{ route('admin.donations.store') }}">
        @csrf

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Donor</label>
                <select name="donor_id" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="">Seçin</option>
                    @foreach($donors as $donor)
                        <option value="{{ $donor->id }}" {{ old('donor_id') == $donor->id ? 'selected' : '' }}>
                            {{ $donor->name }} ({{ $donor->blood_type }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstəxana</label>
                <input type="text" name="hospital" value="{{ old('hospital') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Şəhər</label>
                <input type="text" name="city" value="{{ old('city') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Bağış Tarixi</label>
                <input type="date" name="donation_date" value="{{ old('donation_date') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Vahid sayı</label>
                <input type="number" name="units_donated" value="{{ old('units_donated', 1) }}" min="1"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Status</label>
                <select name="status" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="pending">Gözləmə</option>
                    <option value="completed">Tamamlandı</option>
                    <option value="cancelled">Ləğv edildi</option>
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Qeyd</label>
                <textarea name="notes" rows="3"
                          style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px; resize:vertical;">{{ old('notes') }}</textarea>
            </div>

        </div>

        <div style="margin-top:28px; display:flex; gap:12px;">
            <button type="submit"
                    style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yadda Saxla
            </button>
            <a href="{{ route('admin.donations.index') }}"
               style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>

    </form>
</div>

@endsection