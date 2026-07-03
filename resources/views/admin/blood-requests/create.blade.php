@extends('admin.layout')

@section('title', 'Yeni Qan Tələbi')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Yeni Qan Tələbi Əlavə Et</h3>

    <form method="POST" action="{{ route('admin.blood-requests.store') }}">
        @csrf

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstənin Adı</label>
                <input type="text" name="patient_name" value="{{ old('patient_name') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Yaş</label>
                <input type="number" name="age" value="{{ old('age') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
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
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Əlaqə Telefonu</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone') }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Qan Qrupu</label>
                <select name="blood_type" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="">Seçin</option>
                    @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                        <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Lazım olan vahid</label>
                <input type="number" name="units_needed" value="{{ old('units_needed', 1) }}" min="1"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Təcililik</label>
                <select name="urgency" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="normal">Normal</option>
                    <option value="urgent">Təcili</option>
                    <option value="critical">Kritik</option>
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Status</label>
                <select name="status" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="open">Açıq</option>
                    <option value="fulfilled">Tamamlandı</option>
                    <option value="closed">Bağlı</option>
                </select>
            </div>

            <div style="grid-column:span 2;">
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
            <a href="{{ route('admin.blood-requests.index') }}"
               style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>

    </form>
</div>

@endsection