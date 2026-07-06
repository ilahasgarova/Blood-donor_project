@extends('admin.layout')

@section('title', 'Yeni Bağış')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Yeni Bağış Əlavə Et</h3>

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.donations.store') }}">
        @csrf

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
            <div>
                <label>Donor</label>
                <select name="donor_id" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="">Seçin</option>
                    @foreach($donors as $donor)
                        <option value="{{ $donor->id }}" {{ old('donor_id') == $donor->id ? 'selected' : '' }}>
                            {{ $donor->name }} ({{ $donor->blood_type }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Qan Qrupu</label>
                <select name="blood_type" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="">Seçin</option>
                    @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                        <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Xəstəxana</label>
                <input type="text" name="hospital" value="{{ old('hospital') }}" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" required>
            </div>

            <div>
                <label>Şəhər</label>
                <input type="text" name="city" value="{{ old('city') }}" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" required>
            </div>

            <div>
                <label>Bağış Tarixi</label>
                <input type="date" name="donation_date" value="{{ old('donation_date') }}" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" required>
            </div>

            <div>
                <label>Vahid sayı</label>
                <input type="number" name="units_donated" value="{{ old('units_donated', 1) }}" min="1" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" required>
            </div>

            <div>
                <label>Status</label>
                <select name="status" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Gözləmə</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                    <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Ləğv edildi</option>
                </select>
            </div>

            <div>
                <label>Qeyd</label>
                <textarea name="notes" rows="3" style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">{{ old('notes') }}</textarea>
            </div>
        </div>

        <div style="margin-top:28px;">
            <button type="submit" style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; cursor:pointer;">Yadda Saxla</button>
            <a href="{{ route('admin.donations.index') }}" style="margin-left:10px; color:#333;">Geri</a>
        </div>
    </form>
</div>

@endsection