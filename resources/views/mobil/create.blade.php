<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>

    <style>
        :root{
            --ink:#111316;
            --ink-soft:#5b6168;
            --line:#dcdfe3;
            --line-strong:#111316;
            --surface:#ffffff;
            --bg:#f4f5f7;
            --accent:#002fa7;
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
            max-width:520px;
            background:var(--surface);
            border:1px solid var(--line);
        }

        .panel-head{
            padding:28px 32px 22px;
            border-bottom:2px solid var(--line-strong);
        }

        .kicker{
            font-size:12px;
            font-weight:600;
            letter-spacing:.12em;
            text-transform:uppercase;
            color:var(--accent);
            margin-bottom:8px;
        }

        .panel-head h2{
            font-size:24px;
            font-weight:700;
            letter-spacing:-.01em;
        }

        .panel-head p{
            font-size:13px;
            color:var(--ink-soft);
            margin-top:4px;
        }

        form{
            padding:28px 32px 32px;
        }

        .field{
            margin-bottom:20px;
        }

        .field-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:16px;
        }

        label{
            display:block;
            font-size:11px;
            font-weight:600;
            letter-spacing:.06em;
            text-transform:uppercase;
            color:var(--ink-soft);
            margin-bottom:8px;
        }

        input, select{
            width:100%;
            padding:10px 12px;
            font-family:inherit;
            font-size:14px;
            color:var(--ink);
            background:var(--surface);
            border:1px solid var(--line);
            border-radius:2px;
            transition:border-color .15s ease;
        }

        input:focus, select:focus{
            outline:none;
            border-color:var(--accent);
        }

        select{
            cursor:pointer;
        }

        .actions{
            display:flex;
            justify-content:flex-end;
            gap:10px;
            margin-top:28px;
            padding-top:20px;
            border-top:1px solid var(--line);
        }

        .btn-batal{
            padding:10px 18px;
            font-size:13px;
            font-weight:600;
            color:var(--ink);
            background:transparent;
            border:1px solid var(--line);
            border-radius:2px;
            text-decoration:none;
            transition:border-color .15s ease, color .15s ease;
        }

        .btn-batal:hover{
            border-color:var(--ink);
        }

        .btn-simpan{
            padding:10px 20px;
            font-size:13px;
            font-weight:600;
            color:#fff;
            background:var(--accent);
            border:none;
            border-radius:2px;
            cursor:pointer;
            transition:background .15s ease;
        }

        .btn-simpan:hover{
            background:#001f70;
        }

        @media(max-width:480px){
            body{
                padding:16px;
            }

            .panel-head, form{
                padding-left:20px;
                padding-right:20px;
            }

            .field-row{
                grid-template-columns:1fr;
                gap:0;
            }
        }
    </style>
</head>
<body>

    <div class="panel">

        <div class="panel-head">
            <div class="kicker">Manajemen Kendaraan</div>
            <h2>Tambah Mobil</h2>
            <p>Lengkapi data unit armada baru di bawah ini.</p>
        </div>

        <form action="/mobil-test" method="POST">
    @csrf

    <div class="field">
        <label for="nama_mobil">Nama Mobil</label>
        <input
            type="text"
            id="nama_mobil"
            name="nama_mobil"
            required
        >
    </div>

    <div class="field">
        <label for="merk">Merk</label>
        <input
            type="text"
            id="merk"
            name="merk"
            required
        >
    </div>

    <div class="field field-row">
        <div>
            <label for="tahun">Tahun</label>
            <input
                type="number"
                id="tahun"
                name="tahun"
                required
            >
        </div>

        <div>
            <label for="harga_sewa">Harga Sewa (Rp)</label>
            <input
                type="number"
                id="harga_sewa"
                name="harga_sewa"
                required
            >
        </div>
    </div>

    <div class="field">
        <label for="status">Status Ketersediaan</label>

        <select
            id="status"
            name="status"
        >
            <option value="Tersedia">Tersedia</option>
            <option value="Disewa">Disewa</option>
        </select>
    </div>

    <div class="actions">
        <a href="{{ route('mobil.index') }}" class="btn-batal">
            Batal
        </a>

        <button type="submit" class="btn-simpan">
            Simpan
        </button>
    </div>
</form>
    </div>

</body>
</html>