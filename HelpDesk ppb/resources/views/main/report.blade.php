<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk - Buat Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            background-color: #fff;
        }

        .header {
            background-color: #2F4AA3;
            color: white;
            padding: 28px 0 18px 40px;
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .container {
            max-width: 900px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 32px;
            box-shadow: 0 0 24px rgba(0, 0, 0, 0.08);
            padding: 48px 48px 40px 48px;
        }

        .report-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .report-header-left {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .circle-icon {
            width: 70px;
            height: 70px;
            background-color: #2F4AA3;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 38px;
        }

        .report-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .report-kategori {
            font-size: 20px;
            font-weight: 400;
        }

        .dropdown {
            font-size: 22px;
            margin-left: 8px;
            cursor: pointer;
        }

        .submit-btn {
            padding: 8px 38px;
            background-color: white;
            border: 2px solid #222;
            border-radius: 16px;
            cursor: pointer;
            font-size: 24px;
            font-family: 'Poppins', Arial, sans-serif;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }

        .submit-btn:hover {
            background: #2F4AA3;
            color: #fff;
        }

        .report-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .report-form input[type="text"],
        .report-form textarea {
            width: 100%;
            border: 2px solid #222;
            border-radius: 16px;
            padding: 14px 18px;
            font-size: 20px;
            font-family: 'Poppins', Arial, sans-serif;
            margin-bottom: 0;
            box-sizing: border-box;
            background: #fff;
        }

        .report-form textarea {
            min-height: 110px;
            resize: vertical;
        }

        .report-form label {
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 6px;
        }

        @media (max-width: 900px) {
            .container {
                padding: 18px 8px 24px 8px;
            }

            .report-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .submit-btn {
                width: 100%;
                margin-top: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="header">helpdesk</div>
    <div class="container">
        <div class="report-header">
            <div class="report-header-left">
                <div class="circle-icon">
                    <i class="bi bi-file-earmark-plus"></i>
                </div>
                <div>
                    <div class="report-title">buat pengaduan</div>
                    <div class="report-kategori">
                        kategori :
                        <select name="kategori" form="reportForm" class="form-select d-inline w-auto"
                            style="font-size:20px; border:none; background:transparent; box-shadow:none; outline:none;">
                            <option value="akademik">Akademik</option>
                            <option value="keuangan">Keuangan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <form class="report-form" id="reportForm" method="POST" action="{{ route('ticket.store') }}">
            @csrf
            <label>Nama lengkap :</label>
            <input type="text" name="nama" required>
            <label>NPM :</label>
            <input type="text" name="npm" required>
            <label>Subject :</label>
            <input type="text" name="subject" required>
            <label>pesan :</label>
            <textarea name="pesan" required></textarea>
            <button type="submit" class="submit-btn" style="margin-left:auto;display:block;">kirim</button>
        </form>
    </div>
</body>

</html>
