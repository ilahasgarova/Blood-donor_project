@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<div class="stats-grid">
    <div class="stat-card">
        <h3>Aktiv Donorlar</h3>
        <p>{{ $totalDonors }}</p>
    </div>
    <div class="stat-card">
        <h3>Qan Tələbləri</h3>
        <p>{{ $totalRequests }}</p>
    </div>
    <div class="stat-card">
        <h3>Açıq Tələblər</h3>
        <p>{{ $openRequests }}</p>
    </div>
    <div class="stat-card">
        <h3>Bağışlar</h3>
        <p>{{ $totalDonations }}</p>
    </div>
    <div class="stat-card">
        <h3>Xəstəxanalar</h3>
        <p>{{ $totalHospitals }}</p>
    </div>
</div>

@endsection
