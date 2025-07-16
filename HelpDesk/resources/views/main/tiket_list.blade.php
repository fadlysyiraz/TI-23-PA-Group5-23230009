<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #fff;
            margin: 0;
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
            max-width: 950px;
            margin: 40px auto;
            padding: 0 32px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 32px;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(47, 74, 163, 0.07);
        }

        th {
            background: #2F4AA3;
            color: #fff;
            font-weight: 600;
            padding: 14px 18px;
            font-size: 18px;
            border: none;
        }

        td {
            padding: 14px 18px;
            font-size: 17px;
            border: none;
        }

        tbody tr:nth-child(even) {
            background: #f6f8ff;
        }

        tbody tr:hover {
            background: #eaf0ff;
        }

        .show-btn {
            background: #2F4AA3;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 6px 18px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .show-btn:hover {
            background: #1e3577;
        }
    </style>
</head>

<body>
    <div class="header">helpdesk</div>
    <div class="container">
        <h2>Daftar Tiket Pengaduan</h2>
        <table>
            <thead>
                <tr>
                    <th>Kode Tiket</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Kategori</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tikets as $tiket)
                    <tr>
                        <td style="font-weight:600; color:#2F4AA3;">{{ $tiket->idtiket }}</td>
                        <td>{{ $tiket->user->nama ?? $tiket->nama }}</td>
                        <td>{{ $tiket->NPM }}</td>
                        <td>{{ ucfirst($tiket->kategori) }}</td>
                        <td>{{ $tiket->subject }}</td>
                        <td>
                            @if ($tiket->status == 'open')
                                <span style="color:#f39c12;font-weight:600;">Open</span>
                            @elseif($tiket->status == 'answered')
                                <span style="color:#2F4AA3;font-weight:600;">Answered</span>
                            @elseif($tiket->status == 'proses')
                                <span style="color:#3498db;font-weight:600;">Proses</span>
                            @elseif($tiket->status == 'selesai')
                                <span style="color:#27ae60;font-weight:600;">Selesai</span>
                            @else
                                <span>{{ $tiket->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px; align-items: center;">
                                <a href="{{ route('ticket.show', $tiket->id) }}" class="show-btn">Lihat / Balas</a>
                                @if (auth()->user() && auth()->user()->role === 'admin' && $tiket->status !== 'selesai')
                                    <form action="{{ route('ticket.selesai', $tiket->id) }}" method="POST"
                                        style="display:inline; margin:0;">
                                        @csrf
                                        <button type="submit" class="show-btn"
                                            style="background:#27ae60;">Selesai</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
