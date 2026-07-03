@extends('admin.layout')

@section('title', 'Qan Ehtiyatı')

@section('content')

<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <h3 style="color:#1a1a2e; font-size:20px; font-weight:700;">Qan Ehtiyatı</h3>
        <a href="{{ route('admin.blood-inventory.create') }}"
           style="background:#c0392b; color:#fff; padding:12px 24px; border-radius:8px; text-decoration:none; font-size:15px; font-weight:600;">
            + Yeni Ehtiyat
        </a>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f8f9fa;">
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">#</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Qan Qrupu</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Miqdar</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Status</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Xəstəxana</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Şəhər</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Əməliyyat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inventories as $inventory)
            <tr style="border-top:1px solid #f0f0f0;">
                <td style="padding:16px; font-size:15px; color:#666;">{{ $loop->iteration }}</td>
                <td style="padding:16px;">
                    <span style="background:#fdecea; color:#c0392b; padding:5px 12px; border-radius:20px; font-size:14px; font-weight:600;">
                        {{ $inventory->blood_type }}
                    </span>
                </td>
                <td style="padding:16px; font-size:15px; color:#333; font-weight:600;">{{ $inventory->units_available }} vahid</td>
                <td style="padding:16px;">
                    @if($inventory->status == 'critical')
                        <span style="background:#fdecea; color:#c0392b; padding:5px 12px; border-radius:20px; font-size:14px;">Kritik</span>
                    @elseif($inventory->status == 'low')
                        <span style="background:#fff3e0; color:#e65100; padding:5px 12px; border-radius:20px; font-size:14px;">Az</span>
                    @else
                        <span style="background:#e8f5e9; color:#2e7d32; padding:5px 12px; border-radius:20px; font-size:14px;">Normal</span>
                    @endif
                </td>
                <td style="padding:16px; font-size:15px; color:#666;">{{ $inventory->hospital ?? '-' }}</td>
                <td style="padding:16px; font-size:15px; color:#666;">{{ $inventory->city ?? '-' }}</td>
                <td style="padding:16px;">
                    <a href="{{ route('admin.blood-inventory.edit', $inventory) }}"
                       style="color:#1a1a2e; font-size:14px; margin-right:12px; text-decoration:none; font-weight:500;">Düzəlt</a>
                    <form action="{{ route('admin.blood-inventory.destroy', $inventory) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Silinsin?')"
                                style="background:none; border:none; color:#c0392b; font-size:14px; cursor:pointer; font-weight:500;">Sil</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="padding:50px; text-align:center; color:#999; font-size:15px;">
                    Hələ heç bir ehtiyat yoxdur.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
