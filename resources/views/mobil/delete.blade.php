<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Mobil</title>

    <style>
        :root{
            --ink:#111316;
            --ink-soft:#5b6168;
            --line:#dcdfe3;
            --line-strong:#111316;
            --surface:#ffffff;
            --bg:#f4f5f7;
            --accent:#002fa7;
            --warn:#b3261e;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Inter','Helvetica Neue',Arial,sans-serif;
            background:var(--bg);
            color:var(--ink);
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:32px;
            -webkit-font-smoothing:antialiased;
        }

        .panel{
            width:100%;
            max-width:440px;
            background:var(--surface);
            border:1px solid var(--line);
        }

        .panel-head{
            padding:28px 32px 22px;
            border-bottom:2px solid var(--warn);
        }

        .kicker{
            font-size:12px;
            font-weight:600;
            letter-spacing:.12em;
            text-transform:uppercase;
            color:var(--warn);
            margin-bottom:8px;
        }

        .panel-head h2{
            font-size:22px;
            font-weight:700;
            letter-spacing:-.01em;
        }

        .panel-body{
            padding:24px 32px 28px;
        }

        .panel-body p{
            font-size:14px;
            color:var(--ink-soft);
            line-height:1.6;
        }

        .panel-body strong{
            color:var(--ink);
            font-weight:700;
        }

        form{
            margin-top:24px;
            display:flex;
            justify-content:flex-end;
            gap:10px;
            padding-top:20px;
            border-top:1px solid var(--line);
        }

        .btn-batal, .btn-hapus{
            padding:10px 18px;
            font-size:13px;
            font-weight:600;
            border-radius:2px;
            cursor:pointer;
            text-decoration:none;
            transition:background .15s ease, border-color .15s ease, color .15s ease;
        }

        .btn-batal{
            color:var(--ink);
            background:transparent;
            border:1px solid var(--line);
        }

        .btn-batal:hover{
            border-color:var(--ink);
        }

        .btn-hapus{
            color:#fff;
            background:var(--warn);
            border:none;
        }

        .btn-hapus:hover{
            background:#8c1e17;
        }

        @media(max-width:480px){
            body{
                padding:16px;
            }

            .panel-head, .panel-body{
                padding-left:20px;
                padding-right:20px;
            }
        }
    </style>
</head>
<body>

    <div class="panel">

        <div class="panel-head">
            <div class="kicker">Konfirmasi Hapus</div>
            <h2>Hapus Data Mobil</h2>
        </div>

        <div class="panel-body">
            <p>
                Apakah Anda yakin ingin menghapus mobil
                <strong>{{ $mobil->nama_mobil }}</strong>? Tindakan ini tidak dapat dibatalkan.
            </p>

            <form action="/mobil/{{ $mobil->id }}" method="POST">
                @csrf
                @method('DELETE')

                <a href="/mobil" class="btn-batal">Batal</a>
                <button type="submit" class="btn-hapus">Ya, Hapus</button>
            </form>
        </div>

    </div>

</body>
</html>