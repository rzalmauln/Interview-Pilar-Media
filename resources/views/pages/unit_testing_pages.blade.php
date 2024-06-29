@extends('layout.main')

@section('content')
    <section class="container">
        <h3>Optimasi Query dan Dashboard Grafik</h1>
            <div class="mb-5">
                <h5>Apa itu unit testing dan mengapa penting dalam pengembangan perangkat lunak?
                </h5>
                <div class="card">
                    <div class="card-body">
                        Unit testing adalah metode pengujian perangkat lunak di mana bagian-bagian terkecil dari suatu
                        aplikasi, yang disebut unit, diuji secara individual dan terisolasi dari bagian lain dari aplikasi.
                        Sebuah unit bisa berupa fungsi, metode, atau komponen kecil dari kode yang bisa diuji secara
                        independen. Tujuannya untuk memvalidasi bahwa setiap unit berfungsi sebagaimana mestinya.
                        <br>
                        Mengapa penting ? Karena untuk mendeteksi kesalahan dari dini agar tidak berdampak buruk diakhir
                        nanti, membuat kode terlihat clean dan lebih terstrutur, bisa memudahkan developer lain sebagai
                        dokumentasi hidup ketika mungkin bekerja dengan kode yang sama.
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5>Bagaimana Anda akan melakukan unit testing dalam bahasa pemrograman yang Anda kuasai? Berikan contoh
                    sederhana.</h5>
                <div class="card">
                    <div class="card-body">
                        Jika dilaravel sudah disediakan test unit tersendiri yang bisa kita buat. contoh kasus sederhana
                        testing fungsi penambahan
                        <br>
                        <pre>
                            <code>
namespace App\Services;

class Calculator{
    public function add($a, $b){
        return $a + $b;
    }
}
                            </code>
                        </pre>
                        kita bisa buat unit testing dengan command "php artisan make:test CalculatorTest --unit".
                        <br>
                        Setelah itu kita buat program unit test nya.
                        <br>
                        <pre>
                            <code>
// tests/Unit/CalculatorTest.php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Calculator;

class CalculatorTest extends TestCase
{
    public function test_add_two_positive_numbers()
    {
        $calculator = new Calculator();
        $result = $calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function test_add_negative_numbers()
    {
        $calculator = new Calculator();
        $result = $calculator->add(-1, -1);
        $this->assertEquals(-2, $result);
    }

    public function test_add_positive_and_negative_number()
    {
        $calculator = new Calculator();
        $result = $calculator->add(5, -3);
        $this->assertEquals(2, $result);
    }
}
                            </code>
                        </pre>
                        Kemudian kita jalankan program unit testing nya dengan command "vendor/bin/phpunit --filter
                        CalculatorTest"
                    </div>
                </div>
            </div>
    </section>

    <script></script>
@endsection
