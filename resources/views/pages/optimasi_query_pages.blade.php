@extends('layout.main')

@section('content')
    <section class="container">
        <h3>Optimasi Query dan Dashboard Grafik</h1>
            <div class="mb-5">
                <h5>Bagaimana Anda akan mengoptimalkan query SQL untuk mengambil data dari tabel yang memiliki jutaan baris?
                </h5>
                <div class="card">
                    <div class="card-body">
                        <ol>
                            <li>Membuat indexing pada kolom tabel seperti : primary dan foreign key, kemudian membuat
                                composite indexes pada kolom yang sering menggunakan query WHERE atau JOIN</li>
                            <li>Menggunakan query yang spesifik dan memberikan batas jumlah data yang diambil</li>
                            <li>Normalisasi data</li>
                        </ol>
                    </div>
                </div>
                <h5>Implementasi koding</h5>
                <div class="card">
                    <div class="card-body">
                        <blockquote>
                            <pre>
                                <code>
PRODUCT
Model
class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductID';
}

Migration
public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->string('ProductName');
            $table->decimal('Price', 10, 2)->nullable();
            $table->text('Description')->nullable();
            $table->timestamps();
        });
    }

Seeder
public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 1000; $i++) {
            DB::table('products')->insert([
                'ProductName' => $faker->word,
                'Price' => $faker->randomFloat(2, 10, 1000),
                'Description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
    
SALES PERSONS
Model
class SalesPerson extends Model
{
    use HasFactory;
    protected $primaryKey = 'SalesPersonID';
}

Migration
public function up(): void
    {
        Schema::create('salespersons', function (Blueprint $table) {
            $table->id('SalesPersonID');
            $table->string('SalesPersonName');
            $table->string('Address')->nullable();
            $table->string('ContactNumber')->nullable();
            $table->timestamps();
        });
    }

Seeder
public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 1000; $i++) {
            DB::table('salespersons')->insert([
                'SalesPersonName' => $faker->name,
                'Address' => $faker->address,
                'ContactNumber' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

SALES
Model
class Sale extends Model
{
    use HasFactory;
    protected $primaryKey = 'SalesID';

    public function product(){
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function salesperson(){
        return $this->belongsTo(Salesperson::class, 'SalesPersonID', 'SalesPersonID');
    }
}

Migration
public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('SalesID');
            $table->date('SalesDate');
            $table->unsignedBigInteger('ProductID');
            $table->decimal('SalesAmount', 10, 2);
            $table->unsignedBigInteger('SalesPersonID');
            $table->timestamps();

            $table->foreign('ProductID')->references('ProductID')->on('products');
            $table->foreign('SalesPersonID')->references('SalesPersonID')->on('salespersons');
        });
    }

Seeder 
public function run(): void
    {
        ini_set('memory_limit', '550M');
        $faker = Faker::create();
        $batchSize = 100;

        for ($i = 0; $i < 2000; $i++) {
            $salesData = [];
            for ($j = 0; $j < $batchSize; $j++) {
                $salesData[] = [
                    'SalesDate' => $faker->date(),
                    'ProductID' => $faker->numberBetween(1, 1000),
                    'SalesAmount' => $faker->randomFloat(2, 10, 1000),
                    'SalesPersonID' => $faker->numberBetween(1, 1000),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            DB::table('sales')->insert($salesData);
        }
    }

    <img src="{{ asset('image/running_seeder.png') }}" alt="" srcset="">
                                </code>
                            </pre>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5>Jelaskan apa yang dimaksud dengan indeks dalam basis data dan bagaimana penggunaannya dapat meningkatkan
                    performa query.</h5>
                <div class="card">
                    <div class="card-body">
                        Indeks dalam basis data adalah struktur data yang digunakan untuk meningkatkan kecepatan pencarian
                        dan pengambilan data dalam tabel. contohnya seperti indeks dalam buku, di mana ia memungkinkan
                        sistem basis data untuk menemukan baris dengan cepat tanpa harus memindai seluruh tabel.
                        <br>
                        Indeks dapat meningkatkan performa query dengan memungkinkan sistem basis data untuk menemukan data
                        lebih cepat dibandingkan dengan pencarian linier, mempercepat proses pengurutan data sehingga
                        performa yang dihasil kan lebih cepat
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5>Berikan Contoh Bagaimana Anda akan membuat dashboard grafik interaktif dari data yang diambil dari basis
                    data </h5>
                <h5>Implementasi koding</h5>
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('dashboard') }}">Lihat ke Dashboard</a>
                    </div>
                </div>
            </div>

    </section>

    <script></script>
@endsection
