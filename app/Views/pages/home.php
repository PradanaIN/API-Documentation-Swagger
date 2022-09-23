<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center mt-4">Tugas Pemrogaman Platform Khusus (T)</h1>
            <h2 class="text-center mb-5">Pertemuan 2</h2>

            <dl class="text-justify">
                <dt>A. Tugas XML</dt>
                <dd class="ml-4">
                    Berikut daftar beberapa RSS berita online di Indonesia:
                    <ol type="1" class="mt-2">
                        <li>
                            <a href="http://rss.tempo.co/bisnis" target="_blank">http://rss.tempo.co/bisnis</a>
                        </li>
                        <li>
                            <a href="https://www.cnnindonesia.com/ekonomi/rss" target="_blank">http://rss.tempo://www.cnnindonesia.com/ekonomi/rss</a>
                        </li>
                        <li>
                            <a href="https://www.republika.co.id/rss" target="_blank">https://www.republika.co.id/rss</a>
                        </li>
                    </ol>
                    Buatlah sebuah halaman web yang menampilkan kolom berita dari 3
                    RSS tersebut. Setiap kolom berita memiliki tampilan yang disesuaikan
                    sehingga berita mudah dibaca.
                </dd>
                <br>
                <dt>B. Tugas JSON</dt>
                <dd class="ml-4">
                    BMKG menyediakan data gempa bumi terbuka yang bisa
                    dimanfaatkan oleh developer dengan situs :
                    <a href="https://data.bmkg.go.id/gempabumi/" target="_blank">https://data.bmkg.go.id/gempabumi/</a>.
                    Buatlah halaman web yang menampilkan informasi gempa bumi dari
                    data yang diambil dari website tersebut seperti data gempa bumi
                    terbaru atau data 15 gempa bumi dirasakan sehingga
                    informasi dalam web yang anda buat lebih mudah dibaca dan diterima
                    masyarakat.
                </dd>
            </dl>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>