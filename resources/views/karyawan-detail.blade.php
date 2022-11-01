<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
        <div class="row justify-content-center mt-3">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <div class="col-2">
                            <div class="d-grid gap-2 mt-3">
                                <a class="btn btn-danger" type="button" href="/karyawan">Back</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">nomor</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Tanggal Awal</th>
                                    <th scope="col">Tanggal Akhir</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Keterangan Hrd</th>
                                    <th scope="col">Tgl Setuju</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $item)
                                    <tr>
                                        <th scope="row">{{ $item['nomor'] }}</th>
                                        <td><button
                                                class="btn btn-sm {{ $item['status'] == 'setuju' ? 'btn-success' : 'btn-warning' }}"
                                                disabled><b>{{ $item['status'] }}</b></button></td>
                                        <td>{{ $item['awal'] }}</td>
                                        <td>{{ $item['akhir'] }}</td>
                                        <td>{{ $item['jumlah'] }} Hari</td>
                                        <td>{{ $item['keterangan_hrd'] }}</td>
                                        <td>{{ $item['tgl_setuju'] }}</td>
                                        @if ($item['status'] == 'tolak')
                                            <td><a class="btn btn-sm btn-secondary" type="button"
                                                    href="/karyawan-edit/{{ $item->id }}">Edit</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>

    </html>

</x-app-layout>
