<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            [
                'title' => 'Pengertian Sampah',
                'slug' => 'pengertian-sampah',
                'content' => '<h2>Apa Itu Sampah?</h2><p>Sampah adalah sisa kegiatan sehari-hari manusia dan/atau proses alam yang berbentuk padat. Sampah seringkali dianggap sebagai sesuatu yang sudah tidak berguna dan harus dibuang.</p><p>Namun, dengan pengelolaan yang tepat, banyak jenis sampah yang sebenarnya masih memiliki nilai guna dan nilai ekonomis.</p><h3>Dampak Sampah yang Tidak Dikelola</h3><ul><li><strong>Pencemaran Lingkungan:</strong> Mengotori tanah, air, dan udara.</li><li><strong>Sumber Penyakit:</strong> Menjadi sarang nyamuk, tikus, dan lalat pembawa bakteri.</li><li><strong>Bencana Alam:</strong> Penumpukan sampah di sungai dapat menyebabkan banjir.</li></ul>',
                'image_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Jenis-Jenis Sampah',
                'slug' => 'jenis-sampah',
                'content' => '<h2>Mengenal Jenis Sampah</h2><p>Secara umum, sampah dibagi menjadi dua kategori utama berdasarkan sifatnya:</p><h3>1. Sampah Organik</h3><p>Sampah yang berasal dari sisa makhluk hidup, mudah membusuk, dan dapat terurai oleh alam (biodegradable).</p><ul><li>Sisa makanan (nasi, sayur, buah)</li><li>Daun kering dan ranting pohon</li><li>Kotoran hewan</li></ul><p><em>Cara penanganan terbaik: Diolah menjadi pupuk kompos atau pakan ternak.</em></p><h3>2. Sampah Anorganik</h3><p>Sampah yang bukan berasal dari makhluk hidup, sulit membusuk, dan membutuhkan waktu ratusan tahun untuk terurai di alam.</p><ul><li>Plastik (kantong kresek, botol minuman)</li><li>Kaca, Logam, dan Kaleng</li><li>Kertas dan Kardus</li></ul><p><em>Cara penanganan terbaik: Didaur ulang (recycle) menjadi produk bernilai guna.</em></p>',
                'image_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Cara Pemilahan Sampah',
                'slug' => 'cara-pemilahan',
                'content' => '<h2>Bagaimana Cara Memilah Sampah?</h2><p>Memilah sampah dari rumah adalah langkah awal yang paling penting dalam pengelolaan sampah.</p><ol><li><strong>Siapkan Minimal 2 Tempat Sampah:</strong> Satu untuk organik (warna hijau) dan satu untuk anorganik (warna kuning/biru).</li><li><strong>Pisahkan Sejak Dini:</strong> Jangan mencampur sisa makanan basah dengan kertas atau plastik agar sampah anorganik tidak kotor dan bau.</li><li><strong>Bersihkan Kemasan:</strong> Sebelum membuang botol atau wadah plastik, bilas sedikit dengan air agar sisa makanan/minuman tidak membusuk di tempat sampah.</li><li><strong>Pisahkan Sampah Berbahaya (B3):</strong> Kumpulkan baterai bekas, lampu bohlam, atau botol pestisida di wadah terpisah (biasanya warna merah) karena butuh penanganan khusus.</li></ol>',
                'image_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Prinsip 3R (Reduce, Reuse, Recycle)',
                'slug' => 'prinsip-3r',
                'content' => '<h2>Apa itu Prinsip 3R?</h2><p>Prinsip 3R adalah konsep utama dalam pengelolaan sampah yang berkelanjutan:</p><h3>1. Reduce (Mengurangi)</h3><p>Mengurangi produksi sampah sejak awal.</p><ul><li>Membawa tas belanja sendiri agar tidak menggunakan plastik.</li><li>Membeli produk dalam kemasan besar daripada kemasan saset.</li></ul><h3>2. Reuse (Menggunakan Kembali)</h3><p>Menggunakan kembali barang yang masih layak.</p><ul><li>Memanfaatkan botol bekas sebagai pot tanaman.</li><li>Menyumbangkan pakaian yang masih layak pakai.</li></ul><h3>3. Recycle (Mendaur Ulang)</h3><p>Memproses barang bekas menjadi barang baru.</p><ul><li>Mendaur ulang kertas bekas menjadi kertas daur ulang.</li><li>Mengolah sampah organik menjadi pupuk kompos.</li></ul>',
                'image_path' => null,
                'is_published' => true,
            ]
        ];

        foreach ($materials as $material) {
            \App\Models\Material::updateOrCreate(
                ['slug' => $material['slug']],
                $material
            );
        }
    }
}
