@extends('admin.layout')

@section('title', 'Tənzimləmələr')

@section('content')

<div class="card">
    <h3 style="color:#1a1a2e; font-size:20px; font-weight:700; margin-bottom:24px;">Sayt Tənzimləmələri</h3>

    <form method="POST" action="#">
        @csrf

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Sayt Adı</label>
                <input type="text" name="site_name" value="Qan Bağışı"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Əlaqə Email</label>
                <input type="email" name="contact_email" value="info@qanbagisi.az"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Əlaqə Telefonu</label>
                <input type="text" name="contact_phone" value="+994 12 345 67 89"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div>
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Ünvan</label>
                <input type="text" name="address" value="Bakı, Azərbaycan"
                       style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px;">
            </div>

            <div style="grid-column:span 2;">
                <label style="display:block; font-size:14px; color:#555; margin-bottom:6px;">Haqqımızda</label>
                <textarea name="about" rows="4"
                          style="width:100%; padding:12px 14px; border:1px solid #ddd; border-radius:8px; font-size:15px; resize:vertical;">Həyat xilas edən könüllü donorlar platforması.</textarea>
            </div>

        </div>

        <div style="margin-top:28px;">
            <button type="submit"
                    style="background:#c0392b; color:#fff; padding:12px 28px; border:none; border-radius:8px; font-size:15px; cursor:pointer; font-weight:600;">
                Yadda Saxla
            </button>
        </div>

    </form>
</div>

@endsection
