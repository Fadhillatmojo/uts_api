<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Data Nilai Mahasiswa</title>
</head>

<body>

    <div class="d-flex flex-column align-items-center justify-content-center mt-5">
        <h1 class="text-center">Data Nilai Mahasiswa</h1>
        <a href="{{ route('nilai-mahasiswa.create') }}" class="btn btn-primary mt-3">(+) Create gallery</a>
    </div>

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="container mt-5">
        <!-- Tabel untuk menampilkan data -->
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_nilai_mahasiswa as $nilai_mahasiswa)
                    @php
                        $nim = $nilai_mahasiswa['nim'];
                        $kode_mk = $nilai_mahasiswa['kode_mk'];
                    @endphp
                    <tr>
                        <td>{{ $nilai_mahasiswa['nim'] }}</td>
                        <td>{{ $nilai_mahasiswa['nama'] }}</td>
                        <td>{{ $nilai_mahasiswa['alamat'] }}</td>
                        <td>{{ $nilai_mahasiswa['kode_mk'] }}</td>
                        <td>{{ $nilai_mahasiswa['nama_mk'] }}</td>
                        <td>{{ $nilai_mahasiswa['sks'] }}</td>
                        <td>{{ $nilai_mahasiswa['nilai'] }}</td>
                        <td>
                            <a href="{{ route('nilai-mahasiswa.edit', $nilai_mahasiswa['id_perkuliahan']) }}"
                                class="btn btn-primary">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('manual-delete', ['nim' => $nilai_mahasiswa['nim'], 'kode_mk' => $nilai_mahasiswa['kode_mk']]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger my-2">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
