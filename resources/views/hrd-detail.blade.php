<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Persetujuan HRD
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

        <div class="row justify-content-center pt-3">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <form action="/detail/{{ $pengajuan['id'] }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4 col-lg-4">
                                    <label for="first" class="form-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" id="first" name="tgl-first"
                                        value="{{ $pengajuan['awal'] }}" disabled>
                                </div>

                                <div class="col-md-4 col-lg-4">
                                    <label for="last" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="last" name="tgl-last"
                                        value="{{ $pengajuan['akhir'] }}" disabled>
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4 col-lg-4">
                                    <label for="jml" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="jml" name="jumlah"
                                        value="{{ $pengajuan['jumlah'] }}" disabled>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <label for="ket" class="form-label">Keterangan Karyawan</label>
                                    <input type="text" class="form-control" id="ket" name="ket"
                                        value="{{ $pengajuan['keterangan_karyawan'] }}" disabled>
                                </div>
                            </div>

                            <div class="row justify-content-between mb-3">
                                <div class="col-md-4 col-lg-4 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="flexRadioDefault1" value="setuju">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="flexRadioDefault2" value="tolak">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Tolak
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <label for="ket" class="form-label">Isi Keterangan</label>
                                    <input type="text" class="form-control" id="ket" name="keterangan_hrd">
                                </div>
                            </div>



                            <div class="row justify-content-between">
                                <div class="col-5">
                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="d-grid gap-2 mt-3">
                                        <a class="btn btn-danger" type="button" href="/hrd">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>

    </html>
</x-app-layout>
