<div class="sidebar">
    <div class="sidebar-logo">
        <h1> Qan-Donor</h1>
        <p>Admin Panel</p>
    </div>

    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.donors.index') }}" class="{{ request()->routeIs('admin.donors.*') ? 'active' : '' }}">Donorlar</a>
        <a href="{{ route('admin.blood-requests.index') }}" class="{{ request()->routeIs('admin.blood-requests.*') ? 'active' : '' }}">Qan Tələbləri</a>
        <a href="{{ route('admin.blood-inventory.index') }}" class="{{ request()->routeIs('admin.blood-inventory.*') ? 'active' : '' }}">Qan Ehtiyatı</a>
        <a href="{{ route('admin.donations.index') }}" class="{{ request()->routeIs('admin.donations.*') ? 'active' : '' }}">Bağışlar</a>
        <a href="{{ route('admin.hospitals.index') }}" class="{{ request()->routeIs('admin.hospitals.*') ? 'active' : '' }}">Xəstəxanalar</a>
        <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Tənzimləmələr</a>
    </nav>

    {{-- LOGOUT FORMASI --}}
    {{-- Formanı düymədən kənara çıxarıb, display:none edirik --}}
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div style="padding:12px; margin-top: auto;">
        {{-- Düymə formdan kənardadır, lakin 'form' atributu ilə onu idarə edir --}}
        <button type="submit" form="logout-form" style="width:100%; padding:13px 16px; background:#c0392b; color:#fff; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
            LOGOUT
        </button>
    </div>
</div>