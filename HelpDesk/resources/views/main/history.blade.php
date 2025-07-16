<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Riwayat Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #2748a1;
            color: white;
            padding: 16px 24px;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            background-color: white;
            max-width: 600px;
            margin: 40px auto;
            padding: 24px;
            border-radius: 8px;
        }

        .icon-section {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .icon-section img {
            width: 40px;
            height: 40px;
            margin-right: 12px;
        }

        .icon-section div {
            flex: 1;
        }

        .icon-section strong {
            font-size: 18px;
        }

        .submit-btn {
            padding: 8px 20px;
            background-color: white;
            border: 1px solid black;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #333;
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="header">helpdesk</div>

    <div class="container">
        <div class="icon-section">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" alt="icon">
            <div>
                <div><strong>lihat riwayat tiket</strong></div>
            </div>
        </div>

        <form method="GET" action="{{ route('ticket.index') }}">
            <label>Kode Unik Tiket (4 digit) :</label>
            <input type="text" name="idtiket" placeholder="Masukkan kode unik tiket"
                value="{{ request('idtiket') }}">

            <label>Email :</label>
            <input type="email" name="email" placeholder="Masukkan email" value="{{ request('email') }}">
            <button type="submit" class="submit-btn" style="margin-top:10px;">Cari</button>
        </form>

        @if (isset($tikets) && $tikets->count())
            <div style="margin-top:32px;">
                <h3>Hasil Pengaduan:</h3>
                <table style="width:100%;border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="border:1px solid #333;padding:8px;">Kode Tiket</th>
                            <th style="border:1px solid #333;padding:8px;">Subject</th>
                            <th style="border:1px solid #333;padding:8px;">Pesan</th>
                            <th style="border:1px solid #333;padding:8px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tikets as $tiket)
                            <tr>
                                <td style="border:1px solid #333;padding:8px;">{{ $tiket->idtiket }}</td>
                                <td style="border:1px solid #333;padding:8px;">{{ $tiket->subject }}</td>
                                <td style="border:1px solid #333;padding:8px;">{{ $tiket->pesan }}</td>
                                <td style="border:1px solid #333;padding:8px;">{{ $tiket->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif(request('idtiket') && request('email'))
            <div style="margin-top:32px;color:red;">Tidak ditemukan pengaduan dengan data tersebut.</div>
        @endif
    </div>

</body>

</html>
