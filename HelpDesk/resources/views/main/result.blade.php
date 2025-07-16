<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan</title>
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
            max-width: 950px;
            margin: 40px auto;
            padding: 0 32px;
        }

        .icon-section {
            display: flex;
            align-items: center;
            margin-bottom: 32px;
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
            margin-right: 24px;
        }

        .icon-labels {
            flex: 1;
        }

        .icon-labels .main {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .icon-labels .sub {
            font-size: 20px;
            font-weight: 400;
        }

        .dropdown {
            font-size: 20px;
            font-weight: 400;
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
            margin-left: auto;
            transition: background 0.2s, color 0.2s;
        }

        .submit-btn:hover {
            background: #2F4AA3;
            color: #fff;
        }

        .form-section {
            margin-top: 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            border: 2px solid #222;
            border-radius: 16px;
            padding: 14px 18px;
            font-size: 20px;
            font-family: 'Poppins', Arial, sans-serif;
            margin-bottom: 0;
            box-sizing: border-box;
        }

        .form-textarea {
            min-height: 110px;
            resize: vertical;
        }

        @media (max-width: 700px) {
            .container {
                padding: 0 8px;
            }

            .icon-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .submit-btn {
                margin: 18px 0 0 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="header">helpdesk</div>
    <div class="container">
        <div class="icon-section" style="justify-content:space-between;align-items:flex-start;">
            <div style="display:flex;align-items:center;gap:24px;">
                <div class="circle-icon">
                    <i class="bi bi-file-earmark-plus"></i>
                </div>
                <div>
                    <div class="main" style="font-size:28px;font-weight:700;">lihat pengaduan</div>
                    <div class="sub" style="font-size:22px;font-weight:600;">kategori : <span
                            class="dropdown">{{ $tiket->kategori }}</span></div>
                </div>
            </div>
            <form method="POST" action="{{ route('ticket.jawab', $tiket->id) }}" style="margin-top:8px;">
                @csrf
            </form>
        </div>
        <form method="POST" action="{{ route('ticket.jawab', $tiket->id) }}"
            style="border:2px solid #2F4AA3; border-radius:20px; padding:32px 36px; margin:32px 0 40px 0; font-size:20px; max-width:700px; background:#f8f9fa; box-shadow:0 2px 12px rgba(47,74,163,0.07);">
            @csrf
            <div style="margin-bottom:18px; font-weight:600; font-size:22px; color:#2F4AA3;">Detail Pengaduan</div>
            <div style="display:flex; flex-wrap:wrap; gap:18px 32px; margin-bottom:18px;">
                <div style="min-width:220px;">Nama: <span
                        style="font-weight:500;">{{ $tiket->user->nama ?? $tiket->nama }}</span></div>
                <div style="min-width:180px;">NPM: <span style="font-weight:500;">{{ $tiket->NPM }}</span></div>
                <div style="min-width:180px;">Kategori: <span style="font-weight:500;">{{ $tiket->kategori }}</span>
                </div>
                <div style="min-width:220px;">Subject: <span style="font-weight:500;">{{ $tiket->subject }}</span></div>
            </div>
            <div style="margin-bottom:24px;">Pesan: <span style="font-weight:500;">{{ $tiket->pesan }}</span></div>
            <div
                style="border-top:1.5px solid #2F4AA3; margin:24px 0 18px 0; padding-top:18px; font-size:21px; font-weight:600; color:#2F4AA3;">
                Pesan Balasan Admin</div>
            <div style="display:flex; align-items:flex-start; gap:18px; flex-wrap:wrap;">
                <label style="font-size:18px; font-weight:500; color:#2F4AA3; min-width:120px; margin-top:8px;">Pesan
                    Balasan :</label>
                <textarea name="jawaban" class="form-textarea"
                    style="font-size:18px; border-radius:12px; border:1.5px solid #2F4AA3; min-height:90px; flex:1; margin-top:0;"
                    required></textarea>
                <button type="submit" class="submit-btn"
                    style="align-self:flex-end; background:#2F4AA3; color:#fff; border-radius:10px; font-size:18px; padding:8px 32px; font-weight:600; box-shadow:0 2px 8px rgba(47,74,163,0.08); margin-left:18px;">Kirim</button>
            </div>
        </form>
        {{-- @if (isset($jawaban) && count($jawaban))
            <div style="margin:32px auto 0 auto; max-width:700px;">
                <div style="font-weight:700; font-size:20px; margin-bottom:8px;">Jawaban Admin:</div>
                @foreach ($jawaban as $jwb)
                    <div
                        style="border:1px solid #2F4AA3; border-radius:12px; padding:16px 20px; margin-bottom:10px; background:#f6f8ff;">
                        {{ $jwb->jawaban }}</div>
                @endforeach
            </div>
        @endif --}}
    </div>
</body>

</html>
