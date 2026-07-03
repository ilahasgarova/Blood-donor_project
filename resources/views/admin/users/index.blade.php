@extends('admin.layout')

@section('title', 'İstifadəçilər')

@section('content')

<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
        <h3 style="color:#1a1a2e; font-size:20px; font-weight:700;">İstifadəçilər</h3>
        <a href="{{ route('admin.users.create') }}"
           style="background:#c0392b; color:#fff; padding:12px 24px; border-radius:8px; text-decoration:none; font-size:15px; font-weight:600;">
            + Yeni İstifadəçi
        </a>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f8f9fa;">
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">#</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Ad</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Email</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Rol</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Qeydiyyat Tarixi</th>
                <th style="padding:14px 16px; text-align:left; font-size:14px; color:#666; font-weight:600;">Əməliyyat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr style="border-top:1px solid #f0f0f0;">
                <td style="padding:16px; font-size:15px; color:#666;">{{ $loop->iteration }}</td>
                <td style="padding:16px; font-size:15px; color:#333; font-weight:500;">{{ $user->name }}</td>
                <td style="padding:16px; font-size:15px; color:#666;">{{ $user->email }}</td>
                <td style="padding:16px;">
                    @if($user->role == 'admin')
                        <span style="background:#fdecea; color:#c0392b; padding:5px 12px; border-radius:20px; font-size:14px; font-weight:600;">Admin</span>
                    @else
                        <span style="background:#e3f2fd; color:#1565c0; padding:5px 12px; border-radius:20px; font-size:14px;">İstifadəçi</span>
                    @endif
                </td>
                <td style="padding:16px; font-size:15px; color:#666;">{{ $user->created_at->format('d.m.Y') }}</td>
                <td style="padding:16px;">
                    <a href="{{ route('admin.users.edit', $user) }}"
                       style="color:#1a1a2e; font-size:14px; margin-right:12px; text-decoration:none; font-weight:500;">Düzəlt</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Silinsin?')"
                                style="background:none; border:none; color:#c0392b; font-size:14px; cursor:pointer; font-weight:500;">Sil</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="padding:50px; text-align:center; color:#999; font-size:15px;">
                    Hələ heç bir istifadəçi yoxdur.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
