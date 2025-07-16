<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Helpdesk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #fff;
        }

        .header {
            background-color: #2F4AA3;
            color: white;
            padding: 24px 40px 18px 40px;
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .container-dashboard {
            max-width: 1100px;
            margin: 0 auto;
            text-align: center;
            padding: 0 20px;
        }

        .welcome {
            font-size: 32px;
            font-weight: 700;
            margin: 60px 0 50px 0;
            letter-spacing: 1px;
        }

        .card-menu {
            display: flex;
            justify-content: center;
            gap: 60px;
            flex-wrap: wrap;
            margin-bottom: 60px;
        }

        .menu-box {
            border: 2px solid #222;
            border-radius: 16px;
            padding: 30px 50px;
            background-color: #fff;
            width: 370px;
            display: flex;
            align-items: center;
            gap: 24px;
            font-weight: bold;
            font-size: 18px;
            transition: box-shadow 0.3s, border-color 0.3s;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .menu-box:hover {
            border-color: #2F4AA3;
            box-shadow: 0 4px 16px rgba(47, 74, 163, 0.08);
        }

        .menu-box .circle-icon {
            width: 60px;
            height: 60px;
            background-color: #2F4AA3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
        }

        .info-box {
            border: 2px solid #222;
            border-radius: 16px;
            padding: 28px 32px;
            background-color: #fff;
            display: flex;
            align-items: flex-start;
            gap: 24px;
            text-align: left;
            font-size: 18px;
            line-height: 1.5;
            margin: 0 auto 40px auto;
            max-width: 800px;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background-color: #2F4AA3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            flex-shrink: 0;
        }

        .info-text p {
            display: block;
            margin-bottom: 8px;
            font-size: 18px;
        }

        a {
            color: #2F4AA3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .card-menu {
                flex-direction: column;
                gap: 30px;
            }

            .menu-box {
                width: 100%;
                max-width: 370px;
                margin: 0 auto;
            }

            .info-box {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    @if (session('idtiket'))
        <div class="alert alert-success" style="margin: 24px auto; max-width: 600px; font-size: 20px;">
            Tiket berhasil dibuat! Kode unik tiket Anda: <strong>{{ session('idtiket') }}</strong>
        </div>
    @endif
    <div class="header">helpdesk</div>
    <div class="container-dashboard">

        @if (Auth::check())
            <h1 class="mt-5 mb-5">Selamat datang</h1>
        @else
            <p>Anda tidak login</p>
        @endif



        <div class="card-menu">
            <a href="/report" class="menu-box text-decoration-none">
                <div class="circle-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <span style="color: #222">BUAT PENGADUAN</span>
            </a>
            <a href="/history" class="menu-box text-decoration-none">
                <div class="circle-icon">
                    <i class="bi bi-journal-text"></i>
                </div>
                <span style="color: #222">LIHAT RIWAYAT TIKET</span>
            </a>
        </div>
        <div class="info-box">
            <div class="flex flex-row items-center">
                <div class="info-icon">
                    <i class="bi bi-book"></i>

                </div>
                <p>artikel</p>
            </div>
            <div class="info-text">
                Sistem Informasi Akademik bagi Mahasiswa dan Dosen dapat diakses melalui alamat
                <a href="https://kis.id" target="_blank">https://kis.id</a>. Manual Penggunaan KIS bagi mahasiswa dapat
                diakses melalui halaman
                <a href="https://docs.id/mahasiswa" target="_blank">https://docs.id/mahasiswa</a>.
            </div>
        </div>
    </div>
</body>

</html>
