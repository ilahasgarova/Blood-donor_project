@extends('admin.layout')

@section('title', 'Qan Ehtiyatını Düzəlt')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Qan Ehtiyatını Düzəlt</h3>

    <form method="POST" action="{{ route('admin.blood-inventory.update', $bloodInventory) }}">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Qan Qrupu</label>
                <select name="blood_type" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    @foreach(['A+','A-','B+','B-','AB+','AB-','0+','0-'] as $type)
                        <option value="{{ $type }}" {{ $bloodInventory->blood_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Miqdar (vahid)</label>
                <input type="number" name="units_available" value="{{ $bloodInventory->units_available }}" min="0"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Status</label>
                <select name="status" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="normal" {{ $bloodInventory->status == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="low" {{ $bloodInventory->status == 'low' ? 'selected' : '' }}>Az</option>
                    <option value="critical" {{ $bloodInventory->status == 'critical' ? 'selected' : '' }}>Kritik</option>
                </select>
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Xəstəxana</label>
                <input type="text" name="hospital" value="{{ $bloodInventory->hospital }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Şəhər</label>
                <input type="text" name="city" value="{{ $bloodInventory->city }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

        </div>

        <div style="margin-top:28px; display:flex; gap:12px;">
            <button type="submit"
                    style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yenilə
            </button>
            <a href="{{ route('admin.blood-inventory.index') }}"
               style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>

    </form>
</div>

@endsection
