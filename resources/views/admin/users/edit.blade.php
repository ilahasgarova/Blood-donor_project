@extends('admin.layout')

@section('title', 'İstifadəçini Düzəlt')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">İstifadəçini Düzəlt</h3>

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Ad</label>
                <input type="text" name="name" value="{{ $user->name }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Email</label>
                <input type="email" name="email" value="{{ $user->email }}"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Yeni Şifrə (boş buraxsanız dəyişməz)</label>
                <input type="password" name="password"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Rol</label>
                <select name="role" style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>İstifadəçi</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

        </div>

        <div style="margin-top:28px; display:flex; gap:12px;">
            <button type="submit"
                    style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yenilə
            </button>
            <a href="{{ route('admin.users.index') }}"
               style="background:#f0f2f5; color:#333; padding:12px 28px; border-radius:8px; font-size:15px; text-decoration:none; font-weight:600;">
                Geri
            </a>
        </div>

    </form>
</div>

@endsection
