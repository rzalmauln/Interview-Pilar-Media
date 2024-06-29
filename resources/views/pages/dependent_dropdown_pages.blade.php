@extends('layout.main')

@section('content')
    <section class="container">
        <h3>Dependent Dropdown</h1>
            <div class="mb-5">
                <h5>Apa itu dependent dropdown (pilihan terkait) dan kapan Anda akan menggunakannya dalam pengembangan web?
                </h5>
                <div class="card">
                    <div class="card-body">
                        Dependent dropdown (pilihan terkait) adalah sebuah pilihan yang terkait dengan pilihan sebelumnya.
                        <br>
                        Kapan akan menggunakannya ? <br> Ketika saat pengguna harus memilih lokasi seperti negara, provinsi,
                        dan
                        kota. Pilihan negara akan menentukan daftar negara bagian/provinsi yang ditampilkan, dan pilihan
                        negara bagian/provinsi akan menentukan daftar kota yang tersedia.
                    </div>
                </div>
                <h5>Implementasi koding</h5>
                <div class="card">
                    <div class="card-body">
                        <blockquote>
                            <pre>
                                <code>
HTML
&lt;form class=&apos;mt-2&apos;&gt;
    &lt;div class=&apos;mb-2&apos;&gt;
        &lt;label&gt; Provinsi&lt;/label&gt;
        &lt;select id=&quot;selectProv&quot; class=&quot;form-select&quot; aria-label=&quot;Default select example&quot;&gt;

        &lt;/select&gt;
    &lt;/div&gt;

    &lt;div class=&apos;mb-2&apos;&gt;
        &lt;label&gt; Kabupaten/Kota&lt;/label&gt;
        &lt;select id=&quot;selectKab&quot; class=&quot;form-select&quot; aria-label=&quot;Default select example&quot;&gt;

        &lt;/select&gt;
    &lt;/div&gt;
&lt;/form&gt;

JavaScript
function loadProvinces() {
    var selectProv = $('#selectProv');
    selectProv.empty();
    selectProv.append('<option value="">Pilih Provinsi</option>');
    $.ajax({
        url: "{{ route('provinsi') }}",
        type: 'GET',
        dataType: 'json',
        success: function(provinces) {
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

function loadRegencies(idProvinsi) {
    var selectKab = $('#selectKab');
    selectKab.empty();
    selectKab.append('<option value="">Pilih Kabupaten/Kota</option>');

    $.ajax({
        url: "{{ url('selectRegenc') }}/" + idProvinsi,
        type: 'GET',
        dataType: 'json',
        success: function(regencies) {
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

$(document).ready(function() {
    loadProvinces();

    $("#selectProv").change(function() {
        var idProvinsi = $(this).val();
        if (idProvinsi) {
            loadRegencies(idProvinsi); 
        } else {
            $('#selectKab')
        .empty(); 
            $('#selectKec').empty(); 
            $('#selectKelu').empty();
        }
    });
}):

                                </code>
                            </pre>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5>Bagaimana Anda akan mengimplementasikan dependent dropdown dalam JavaScript atau kerangka kerja tertentu
                    yang anda kuasai ?</h5>
                <div class="card">
                    <div class="card-body">
                        Menggunakan Laravel dan JQuery
                        <ol>
                            <li>Menyiapkan data yang dependent terlebih dahulu, bisa dalam bentuk format json ataupun model
                                pada umumnya, dalam percobaan kali ini saya menggunakan data API
                                https://github.com/emsifa/api-wilayah-indonesia.</li>
                            <li>Jika data yang diperlukan sudah siap, selanjutnya membuat controller untuk menangani
                                response data sesuai dengan apa yang diminta client-side.</li>
                            <li>Kemudian disisi client-side, pertama-tama load data provinsi, kemudian jika ada aksi memilih
                                dari user ambil id provinsi yang dipilih, lalu kirim request ke controller kemudian dari
                                controller merespon data kecamatan sesuai provinsi, lalu menangkap dan menampilkan data
                                kecamatan di dropdown selanjutnya</li>
                            <li>begitu seterusnya sampai pada pilihan kelurahan</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5>Berikan contoh penggunaan Dependent Dropdown dalam bahasa pemrograman yang anda kuasai. (Negara,
                    Propinsi, Kabupaten/Kota, Kecamatan, Kelurahan) </h5>
                <h5>Implementasi koding</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h5 class='mt-5'>Indonesia</h5>
                            <form class='mt-2'>
                                <div class='mb-2'>
                                    <label> Provinsi</label>
                                    <select id="selectProv" class="form-select" aria-label="Default select example">

                                    </select>
                                </div>

                                <div class='mb-2'>
                                    <label> Kabupaten/Kota</label>
                                    <select id="selectKab" class="form-select" aria-label="Default select example">

                                    </select>
                                </div>

                                <div class='mb-2'>
                                    <label> Kecamatan</label>
                                    <select id="selectKec" class="form-select" aria-label="Default select example">

                                    </select>
                                </div>

                                <div class='mb-2'>
                                    <label> Kelurahan</label>
                                    <select id="selectKelu" class="form-select" aria-label="Default select example">

                                    </select>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

    </section>

    <script></script>
@endsection
