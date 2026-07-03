@extends('admin.layout')

@section('title', 'Qan Tələbini Düzəlt')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Qan Tələbini Düzəlt</h3>

    <form method="POST" action="{{ route('admin.blood-requests.update', $bloodRequest) }}">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstənin Adı</label>
                <input type="text" name="patient_name" value="{{ $bloodRequest->patient_name }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Yaş</label>
                <input type="number" name="age" value="{{ $bloodRequest->age }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstəxana</label>
                <input type="text" name="hospital" value="{{ $bloodRequest->hospital }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Şəhər</label>
                <input type="text" name="city" value="{{ $bloodRequest->city }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Əlaqə Telefonu</label>
                <input type="text" name="contact_phone" value="{{ $bloodRequest->contact_phone }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Qan Qrupu</label>
                <select name="blood_type" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                        <option value="{{ $type }}" {{ $bloodRequest->blood_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Lazım olan vahid</label>
                <input type="number" name="units_needed" value="{{ $bloodRequest->units_needed }}" min="1"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Təcililik</label>
                <select name="urgency" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="normal" {{ $bloodRequest->urgency == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="urgent" {{ $bloodRequest->urgency == 'urgent' ? 'selected' : '' }}>Təcili</option>
                    <option value="critical" {{ $bloodRequest->urgency == 'critical' ? 'selected' : '' }}>Kritik</option>
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Status</label>
                <select name="status" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="open" {{ $bloodRequest->status == 'open' ? 'selected' : '' }}>Açıq</option>
                    <option value="fulfilled" {{ $bloodRequest->status == 'fulfilled' ? 'selected' : '' }}>Tamamlandı</option>
                    <option value="closed" {{ $bloodRequest->status == 'closed' ? 'selected' : '' }}>Bağlı</option>
                </select>
            </div>

            <div style="grid-column:span 2;">
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Qeyd</label>
                <textarea name="notes" rows="3"
                          style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px; resize:vertical;">{{ $bloodRequest->notes }}</textarea>
            </div>

        </div>

        <div style="margin-top:28px; display:flex; gap:12px;">
            <button type="submit"
                    style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yenilə
            </button>
            <a href="{{ route('admin.blood-requests.index') }}"
               style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>

    </form>
</div>

@endsection