<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Technical Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Technical Test</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('oop') }}">Object Oriented
                                Programming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dependentDropdown') }}">Dependent Dropdown</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('query') }}">Optimasi Query</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('testing') }}">Unit Testing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Fungsi untuk mengisi dropdown provinsi
        function loadProvinces() {
            var selectProv = $('#selectProv');
            selectProv.empty(); // Kosongkan dropdown

            // Tambahkan opsi default
            selectProv.append('<option value="">Pilih Provinsi</option>');

            // Lakukan permintaan AJAX untuk mendapatkan data provinsi
            $.ajax({
                url: "{{ route('provinsi') }}",
                type: 'GET',
                dataType: 'json',
                success: function(provinces) {
                    // Tambahkan opsi provinsi dari data yang diterima
                    $.each(provinces, function(index, province) {
                        selectProv.append('<option value="' + province.id + '">' + province.name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching provinces:', status, error);
                }
            });
        }

        // Fungsi untuk mengisi dropdown kabupaten/kota
        function loadRegencies(idProvinsi) {
            var selectKab = $('#selectKab');
            selectKab.empty(); // Kosongkan dropdown

            // Tambahkan opsi default
            selectKab.append('<option value="">Pilih Kabupaten/Kota</option>');

            // Lakukan permintaan AJAX untuk mendapatkan data kabupaten/kota berdasarkan id provinsi
            $.ajax({
                url: "{{ url('selectRegenc') }}/" + idProvinsi,
                type: 'GET',
                dataType: 'json',
                success: function(regencies) {
                    // Tambahkan opsi kabupaten/kota dari data yang diterima
                    $.each(regencies, function(index, regency) {
                        selectKab.append('<option value="' + regency.id + '">' + regency.name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching regencies:', status, error);
                }
            });
        }

        // Fungsi untuk mengisi dropdown kecamatan
        function loadDistricts(idKabupaten) {
            var selectKec = $('#selectKec');
            selectKec.empty(); // Kosongkan dropdown

            // Tambahkan opsi default
            selectKec.append('<option value="">Pilih Kecamatan</option>');

            // Lakukan permintaan AJAX untuk mendapatkan data kecamatan berdasarkan id kabupaten/kota
            $.ajax({
                url: "{{ url('selectDistrict') }}/" + idKabupaten,
                type: 'GET',
                dataType: 'json',
                success: function(districts) {
                    // Tambahkan opsi kecamatan dari data yang diterima
                    $.each(districts, function(index, district) {
                        selectKec.append('<option value="' + district.id + '">' + district.name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching districts:', status, error);
                }
            });
        }

        // Fungsi untuk mengisi dropdown kelurahan
        function loadVillages(idKecamatan) {
            var selectKel = $('#selectKelu');
            selectKel.empty(); // Kosongkan dropdown

            // Tambahkan opsi default
            selectKel.append('<option value="">Pilih Kelurahan</option>');

            // Lakukan permintaan AJAX untuk mendapatkan data kelurahan berdasarkan id kecamatan
            $.ajax({
                url: "{{ url('selectVillage') }}/" + idKecamatan,
                type: 'GET',
                dataType: 'json',
                success: function(villages) {
                    // Tambahkan opsi kelurahan dari data yang diterima
                    $.each(villages, function(index, village) {
                        selectKel.append('<option value="' + village.id + '">' + village.name +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching villages:', status, error);
                }
            });
        }

        // Panggil fungsi loadProvinces saat halaman siap
        $(document).ready(function() {
            loadProvinces();

            // Event listener untuk perubahan dropdown provinsi
            $("#selectProv").change(function() {
                var idProvinsi = $(this).val();
                if (idProvinsi) {
                    loadRegencies(idProvinsi); // Panggil fungsi loadRegencies jika idProvinsi terdefinisi
                } else {
                    $('#selectKab')
                        .empty(); // Kosongkan dropdown kabupaten/kota jika idProvinsi tidak terdefinisi
                    $('#selectKec').empty(); // Kosongkan dropdown kecamatan
                    $('#selectKelu').empty(); // Kosongkan dropdown kelurahan
                }
            });

            // Event listener untuk perubahan dropdown kabupaten/kota
            $("#selectKab").change(function() {
                var idKabupaten = $(this).val();
                if (idKabupaten) {
                    loadDistricts(idKabupaten); // Panggil fungsi loadDistricts jika idKabupaten terdefinisi
                } else {
                    $('#selectKec')
                        .empty(); // Kosongkan dropdown kecamatan jika idKabupaten tidak terdefinisi
                    $('#selectKelu').empty(); // Kosongkan dropdown kelurahan
                }
            });

            // Event listener untuk perubahan dropdown kecamatan
            $("#selectKec").change(function() {
                var idKecamatan = $(this).val();
                if (idKecamatan) {
                    loadVillages(idKecamatan); // Panggil fungsi loadVillages jika idKecamatan terdefinisi
                } else {
                    $('#selectKelu')
                        .empty(); // Kosongkan dropdown kelurahan jika idKecamatan tidak terdefinisi
                }
            });
        });
    </script>
</body>

</html>
