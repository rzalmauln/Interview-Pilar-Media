@extends('layout.main')

@section('content')
    <section class="container">
        <h3>Object Oriented Programming</h1>
            <div class="mb-5">
                <h5>Apa itu OOP (Pemrograman Berorientasi Objek) dan mengapa itu penting dalam pengembangan perangkat lunak
                    ?
                </h5>
                <div class="card">
                    <div class="card-body">
                        OOP adalah paradigma pemrograman dimana sekumpulan kode program yang dirubah kedalam class dan
                        objek, yang didalamnya berisi properti dan method. objek sendiri adalah instansiasi dari class, dan
                        class adalah blueprint yang mendefinisikan properti (data) dan metode (fungsi) dari objek tersebut.
                        <br>
                        Mengapa penting ? karena OOP menawarkan pendekatan yang kuat dan fleksibel untuk pengembangan
                        perangkat lunak. Dengan mengorganisir kode ke dalam class dan objek, OOP tidak hanya membantu dalam
                        pemodelan yang lebih baik dari sistem kompleks tetapi juga meningkatkan maintainability pada kode
                        program yang skalanya besar.
                    </div>
                </div>
                <h5>Implementasi koding</h5>
                <div class="card">
                    <div class="card-body">
                        <pre>
                            <code style="font-family: monospace;">
// Class
class Mahasiswa {
    // Properti
    private $nrp;
    private $nama;
    private $alamat;

    // Method Constructor
    public function __construct($nrp, $nama, $alamat) {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->alamat = $alamat;
    }

    // Method
    public function daftarUlang() {
        //
    }
}

// Objek
$rizal = new Mahasiswa('3122600004', 'Rizal Maulana', 'Jl Bratang Gede');
                            </code>
                        </pre>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5>Jelaskan konsep utama dalam OOP seperti encapsulation, inheritance, dan polymorphism</h5>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h6>Encapsulation</h6>
                            <p>adalah suatu cara untuk menyembunyikan implementasi detail dari suatu class. Enkapsulasi
                                mempunyai dua hal mendasar, yaitu : information hiding, menyediakan suatu perantara (method)
                                untuk pengaksesan data
                            </p>
                        </div>
                        <div>
                            <h6>Inheritance</h6>
                            <p>Konsep inheritance ini mengadopsi dunia riil dimana suatu entitas/obyek dapat mempunyai
                                entitas/obyek turunan. Dengan konsep inheritance, sebuah class dapat mempunyai class
                                turunan.
                                Suatu class yang mempunyai class turunan dinamakan parent class atau base class. Sedangkan
                                class
                                turunan itu sendiri seringkali disebut subclass atau child class. Suatu subclass adalah
                                tidak
                                lain hanya memperluas (extend) parent class-nya.
                            </p>
                        </div>
                        <div>
                            <h6>Polimorphism</h6>
                            <p>
                                Polymorphism adalah kemampuan untuk mempunyai beberapa bentuk class yang berbeda.
                                Polimorfisme ini terjadi pada saat suatu obyek bertipe parent class, akan tetapi pemanggilan
                                constructornya melalui subclass.
                            </p>
                        </div>
                    </div>
                </div>
                <h5>Implementasi koding</h5>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h6>Encapsulation</h6>
                            <pre>
                            <code style="font-family: monospace;">
class Mahasiswa {
    // Properti NRP dengan akses private
    private $nrp;

    // Method untuk mengatur nilai NRP (setter)
    public function setNrp($n) {
        $this->nrp = $n;
    }

    // Method untuk mendapatkan nilai NRP (getter)
    public function getNrp() {
        return $this->nrp;
    }
}

// Instansiasi Objek
$mahasiswa = new Mahasiswa();
$mahasiswa->setNrp(123456);

echo "NRP Mahasiswa: " . $mahasiswa->getNrp(); // Output yang dihasilkan adalah "NRP Mahasiswa: 123456"
                            </code>
                        </pre>
                        </div>
                        <hr>
                        <div>
                            <h6>Inheritance</h6>
                            <pre>
                            <code style="font-family: monospace;">
class User {
    // Properti User
    protected $username;
    protected $password;

    // Method login
    public function login() {
        // Implementasi metode login
    }
}

// Class Mahasiswa yang mewarisi dari User
class Mahasiswa extends User {
    // Properti tambahan untuk Mahasiswa
    protected $nrp;
    protected $nama;
    protected $alamat;

    // Method daftarUlang khusus untuk Mahasiswa
    public function daftarUlang() {
        // Implementasi metode daftarUlang
    }
}

$mahasiswa = new Mahasiswa();
$mahasiswa->login(); // Memanggil method login yang diwarisi dari class User
$mahasiswa->daftarUlang(); // Memanggil method daftarUlang yang ada di class Mahasiswa
                            </code>
                        </pre>
                        </div>
                        <hr>
                        <div>
                            <h6>Polimorphism</h6>
                            <pre>
                            <code style="font-family: monospace;">
// Class
class Animal {
    public function speak() {
        echo "Suara semua hewan";
    }
}

// Class turunan dari Animal
class Dog extends Animal {
    public function speak() {
        echo "Woof! Woof!";
    }
}

// fungsi yang menerima objek dari class animal atau turunannya
function suaraHewan(Animal $animal) {
    $animal->speak();
}

$dog = new Dog();
suaraHewan($dog); // Output yang dihasilkan adalah "Woof! Woof!"
                            </code>
                        </pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5>Berikan contoh penggunaan OOP encapsulation, inheritance, polimorphism juga menerapkan SOLID principles
                    dalam bahasa pemrograman yang Anda kuasai.</h5>
                <h5>Implementasi koding</h5>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h6>Encapsulation</h6>
                            <p>Implementasi Single Responsibility Principle, Open/Closed Principle </p>
                            <pre>
                            <code style="font-family: monospace;">
class Mahasiswa {
    // Properti NRP dengan akses private
    private $nrp;

    // Method untuk mengatur nilai NRP (setter)
    public function setNrp($n) {
        $this->nrp = $n;
    }

    // Method untuk mendapatkan nilai NRP (getter)
    public function getNrp() {
        return $this->nrp;
    }
}

// Instansiasi Objek
$mahasiswa = new Mahasiswa();
$mahasiswa->setNrp(123456);

echo "NRP Mahasiswa: " . $mahasiswa->getNrp(); // Output yang dihasilkan adalah "NRP Mahasiswa: 123456"
                            </code>
                        </pre>
                        </div>
                        <hr>
                        <div>
                            <h6>Inheritance</h6>
                            <p>Implementasi Interface Segregation Principle, Dependency Inversion Principle</p>
                            <pre>
                            <code style="font-family: monospace;">
// Interface untuk login
interface LoginInterface
{
    public function login();
}

// Interface untuk user
interface UserInterface
{
    public function setUsername($username);
    public function setPassword($password);
}

// Interface untuk menyimpan data
interface StorageInterface
{
    public function save($data);
    public function load($identifier);
}

// Implementasi login dan user
class User implements LoginInterface, UserInterface
{
    protected $username;
    protected $password;

    public function login(){
        echo "User logged in";
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }
}

// Implementasi storage dengan menggunakan database
class DatabaseStorage implements StorageInterface
{
    public function save($data){
        echo "Data saved to database";
    }

    public function load($identifier){
        // Logika pengambilan data dari database
        echo "Data loaded from database";
        return [
            'nrp' => 3122600004,
            'nama' => 'Rizal Maulana',
            'alamat' => 'Jl Bratang gede',
        ];
    }
}

// Kelas Mahasiswa yang mewarisi User dan menggunakan storage
class Mahasiswa extends User
{
    protected $nrp;
    protected $nama;
    protected $alamat;
    private $storage;

    public function __construct(StorageInterface $storage){
        $this->storage = $storage;
    }

    public function setNrp($nrp){
        $this->nrp = $nrp;
    }

    public function getNrp(){
        return $this->nrp;
    }

    public function setNama($nama){
        $this->nama = $nama;
    }

    public function getNama(){
        return $this->nama;
    }

    public function setAlamat($alamat){
        $this->alamat = $alamat;
    }

    public function getAlamat(){
        return $this->alamat;
    }

    public function daftarUlang(){
        echo "Mahasiswa melakukan daftar ulang";
    }

    public function save(){
        $this->storage->save([
            'nrp' => $this->nrp,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
        ]);
    }

    public function load($nrp){
        $data = $this->storage->load($nrp);
        $this->nrp = $data['nrp'];
        $this->nama = $data['nama'];
        $this->alamat = $data['alamat'];
    }
}

// Instansiasi objek Mahasiswa dengan Dependency Injection untuk storage
$storage = new DatabaseStorage();
$mahasiswa = new Mahasiswa($storage);
$mahasiswa->setNrp(3122600004);
$mahasiswa->setUsername('rizal');
$mahasiswa->setNama('Rizal Maulana');
$mahasiswa->setAlamat('Jl Bratang gede');

$mahasiswa->login(); // Memanggil method login yang diwarisi dari class User
$mahasiswa->daftarUlang(); // Memanggil method daftarUlang yang ada di class Mahasiswa
$mahasiswa->save(); // Menyimpan data mahasiswa

// Memuat data mahasiswa dari storage
$mahasiswa->load(3122600004);
echo 'NRP Mahasiswa: ' . $mahasiswa->getNrp() . "\n"; // Output "NRP Mahasiswa: 3122600004"
echo 'Nama Mahasiswa: ' . $mahasiswa->getNama() . "\n"; // Output "Nama Mahasiswa: Rizal Maulana"
echo 'Alamat Mahasiswa: ' . $mahasiswa->getAlamat() . "\n"; // Output "Alamat Mahasiswa: Jl Bratang gede"
                            </code>
                        </pre>
                        </div>
                        <hr>
                        <div>
                            <h6>Polimorphism</h6>
                            <p>Implementasi Liskov Substitution Principle</p>
                            <pre>
                            <code style="font-family: monospace;">
// Class
class Animal {
    public function speak() {
        echo "Suara semua hewan";
    }
}

// Class turunan dari Animal
class Dog extends Animal {
    public function speak() {
        echo "Woof! Woof!";
    }
}

// fungsi yang menerima objek dari class animal atau turunannya
function suaraHewan(Animal $animal) {
    $animal->speak();
}

$dog = new Dog();
suaraHewan($dog); // Output yang dihasilkan adalah "Woof! Woof!"
                            </code>
                        </pre>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>
@endsection
