# Qan Bağışı Laravel Layihəsi — Quraşdırma Təlimatı

Bu zip faylda admin panel və public saytın bütün Laravel kodları var
(migrationlar, modellər, controllerlər, blade fayllar, route-lar, admin CSS).

## ADDIM 1 — Yeni Laravel layihəsi yarat

Laragon-da terminal aç, bu əmri yaz:

```
composer create-project laravel/laravel Final-lahiye
cd Final-lahiye
```

## ADDIM 2 — Bu zip-dəki faylları köçür

Bu zip-in içindəki qovluqları aç və **eyni adlı qovluqların üzərinə** köçür:

- `app/Models/*` → `Final-lahiye/app/Models/`
- `app/Http/Controllers/*` → `Final-lahiye/app/Http/Controllers/`
- `database/migrations/*` → `Final-lahiye/database/migrations/`
- `resources/views/*` → `Final-lahiye/resources/views/`
- `routes/web.php` → `Final-lahiye/routes/web.php` (üzərinə yaz)
- `public/css/admin.css` → `Final-lahiye/public/css/admin.css`

## ADDIM 3 — Template fayllarını əlavə et

Sənin qoruduğun `qan-bagisi-template` qovluğunu (css, jscript, images)
bu yerə köçür:

```
Final-lahiye/public/qan-bagisi-template/
    ├── css/style.css
    ├── jscript/main.js
    └── images/...
```

ÖNƏMLİ: `jscript` qovluğunun adı `js` yox, `jscript` olmalıdır
(public/js qovluğu ilə qarışmasın deyə).

## ADDIM 4 — .env faylını qur

`.env` faylında verilənlər bazası ayarlarını yoxla:

```
DB_CONNECTION=sqlite
```

Əgər sqlite istifadə edirsənsə, bu faylı yarat:

```
database/database.sqlite
```

(boş fayl kifayətdir)

## ADDIM 5 — Migration işə sal

```
php artisan migrate
```

## ADDIM 6 — Admin istifadəçi yarat

```
php artisan tinker
```

Tinker içində:

```
User::create(['name'=>'Admin','email'=>'admin@qanbagisi.az','password'=>Hash::make('admin123'),'role'=>'admin']);
exit
```

## ADDIM 7 — Serveri başlat

```
php artisan serve
```

Brauzerdə aç:

- Ana səhifə: http://127.0.0.1:8000
- Admin panel: http://127.0.0.1:8000/admin/dashboard
- Donor ol: http://127.0.0.1:8000/donor-ol
- Donorlar: http://127.0.0.1:8000/donorlar

## QEYD

- Admin panelin girişi (login) hələ yoxdur — `/admin/dashboard`
  birbaşa açılır. İstəsən sonra login əlavə edə bilərik.
- `Qan Tələbi`, `Haqqımızda`, `Əlaqə` səhifələri hələ Laravel-ə
  inteqrasiya olunmayıb — bunlar növbəti addımlardır.
