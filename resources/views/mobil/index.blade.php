<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>

    <style>
        :root{
            --ink:#111316;
            --ink-soft:#5b6168;
            --line:#dcdfe3;
            --line-strong:#111316;
            --surface:#ffffff;
            --bg:#f4f5f7;
            --accent:#002fa7;
            --accent-soft:#e7ecfa;
            --ok:#1f7a4d;
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
            padding:48px 32px;
            -webkit-font-smoothing:antialiased;
        }

        .container{
            max-width:1140px;
            margin:0 auto;
        }

        /* ---------- masthead ---------- */

        .masthead{
            display:grid;
            grid-template-columns:1fr auto;
            gap:40px;
            align-items:end;
            padding-bottom:24px;
            border-bottom:2px solid var(--line-strong);
            margin-bottom:32px;
        }

        .kicker{
            font-size:12px;
            font-weight:600;
            letter-spacing:.12em;
            text-transform:uppercase;
            color:var(--accent);
            margin-bottom:10px;
        }

        .masthead h1{
            font-size:36px;
            font-weight:700;
            letter-spacing:-.01em;
            line-height:1.1;
        }

        .masthead .sub{
            color:var(--ink-soft);
            font-size:14px;
            margin-top:6px;
        }

        .stats{
            display:flex;
            gap:28px;
        }

        .stat{
            text-align:right;
            border-left:1px solid var(--line);
            padding-left:28px;
        }

        .stat:first-child{
            border-left:none;
            padding-left:0;
        }

        .stat .num{
            font-size:34px;
            font-weight:700;
            font-variant-numeric:tabular-nums;
            line-height:1;
        }

        .stat .label{
            font-size:11px;
            letter-spacing:.08em;
            text-transform:uppercase;
            color:var(--ink-soft);
            margin-top:6px;
        }

        /* ---------- toolbar ---------- */

        .toolbar{
            display:flex;
            justify-content:flex-end;
            margin-bottom:20px;
        }

        .btn-tambah{
            background:var(--accent);
            color:#fff;
            text-decoration:none;
            padding:11px 20px;
            font-size:14px;
            font-weight:600;
            letter-spacing:.01em;
            border-radius:2px;
            transition:background .15s ease;
        }

        .btn-tambah:hover{
            background:#001f70;
        }

        /* ---------- table ---------- */

        .data-panel{
            background:var(--surface);
            border:1px solid var(--line);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        thead th{
            text-align:left;
            font-size:11px;
            font-weight:600;
            letter-spacing:.08em;
            text-transform:uppercase;
            color:var(--ink-soft);
            padding:16px 18px;
            border-bottom:1px solid var(--line-strong);
        }

        tbody td{
            padding:18px;
            font-size:14px;
            border-bottom:1px solid var(--line);
            vertical-align:middle;
        }

        tbody tr:last-child td{
            border-bottom:none;
        }

        tbody tr:hover{
            background:#fafbfc;
        }

        .nama{
            font-weight:600;
        }

        .tahun, .harga{
            font-variant-numeric:tabular-nums;
        }

        .harga{
            font-weight:600;
        }

        .status{
            display:inline-block;
            font-size:11px;
            font-weight:600;
            letter-spacing:.05em;
            text-transform:uppercase;
            padding:5px 10px;
            border-radius:2px;
            border:1px solid currentColor;
        }

        .tersedia{
            color:var(--ok);
        }

        .disewa{
            color:var(--warn);
        }

        .aksi{
            display:flex;
            gap:8px;
            justify-content:flex-end;
        }

        .btn-edit, .btn-hapus{
            font-size:13px;
            font-weight:600;
            padding:8px 14px;
            border-radius:2px;
            border:1px solid var(--line);
            background:transparent;
            color:var(--ink);
            text-decoration:none;
            cursor:pointer;
            transition:border-color .15s ease, color .15s ease;
        }

        .btn-edit:hover{
            border-color:var(--accent);
            color:var(--accent);
        }

        .btn-hapus:hover{
            border-color:var(--warn);
            color:var(--warn);
        }

        .empty-row td{
            text-align:center;
            color:var(--ink-soft);
            padding:48px 0;
            font-size:14px;
        }

        @media(max-width:768px){

            body{
                padding:24px 16px;
            }

            .masthead{
                grid-template-columns:1fr;
                gap:20px;
            }

            .stats{
                justify-content:flex-start;
            }

            .stat{
                text-align:left;
            }

            .data-panel{
                overflow-x:auto;
            }

            table{
                min-width:640px;
            }
        }
        .alert-success{
            background:#d1fae5;
            color:#065f46;
            padding:12px;
            border-radius:8px;
            margin-bottom:20px;
            font-weight:600;
        }
    </style>
</head>
<body>

@php
    $totalUnit = $mobils->count();
    $totalTersedia = $mobils->filter(fn($m) => strtolower($m->status) === 'tersedia')->count();
@endphp

<div class="container">

    <div class="masthead">
        <div>
            <div class="kicker">Manajemen Kendaraan</div>
            <h1>Rental Mobil</h1>
            @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
            @endif
            <p class="sub">Daftar unit kendaraan dan status penyewaan</p>
        </div>

        <div class="stats">
            <div class="stat">
                <div class="num">{{ $totalUnit }}</div>
                <div class="label">Total Unit</div>
            </div>
            <div class="stat">
                <div class="num">{{ $totalTersedia }}</div>
                <div class="label">Tersedia</div>
            </div>
        </div>
    </div>

    <div class="toolbar">
        <a href="/mobil/create" class="btn-tambah">+ Tambah Mobil</a>
    </div>

    <div class="data-panel">

        <table>
            <thead>
                <tr>
                    <th>Nama Mobil</th>
                    <th>Merk</th>
                    <th>Tahun</th>
                    <th>Harga Sewa</th>
                    <th>Status</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($mobils as $mobil)
                <tr>

                    <td class="nama">{{ $mobil->nama_mobil }}</td>

                    <td>{{ $mobil->merk }}</td>

                    <td class="tahun">{{ $mobil->tahun }}</td>

                    <td class="harga">
                        Rp {{ number_format($mobil->harga_sewa,0,',','.') }}
                    </td>

                    <td>
                        <span class="status {{ strtolower($mobil->status) == 'tersedia' ? 'tersedia' : 'disewa' }}">
                            {{ $mobil->status }}
                        </span>
                    </td>

                    <td>
                        <div class="aksi">

                            <a href="/mobil/{{ $mobil->id }}/edit"
                               class="btn-edit">
                                Edit
                            </a>

                            <form action="/mobil/{{ $mobil->id }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn-hapus">
                                    Hapus
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>
                @empty

                <tr class="empty-row">
                    <td colspan="6">
                        Belum ada data mobil
                    </td>
                </tr>

                @endforelse
            </tbody>

        </table>

    </div>

</div>

</body>
</html>