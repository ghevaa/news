<?php

namespace App\Models;

class BeritaModel
{
    private $data = [
        [
            'id' => 1,
            'judul' => 'Teknologi AI Semakin Berkembang Pesat di Tahun 2026',
            'isi' => 'Kecerdasan buatan (AI) kini telah menjadi bagian tak terpisahkan dari kehidupan kita sehari-hari. Mulai dari asisten virtual, sistem rekomendasi, hingga mobil otonom. Di tahun 2026, perkembangannya bahkan lebih pesat.',
            'gambar' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&q=80&w=800',
            'created_at' => '2026-04-20 10:00:00'
        ],
        [
            'id' => 2,
            'judul' => 'Menjaga Kesehatan Mental di Era Digital',
            'isi' => 'Di era yang serba digital dan serba cepat ini, menjaga kesehatan mental adalah hal yang krusial. Beberapa ahli merekomendasikan detoks digital secara berkala.',
            'gambar' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=800',
            'created_at' => '2026-04-22 14:30:00'
        ],
        [
            'id' => 3,
            'judul' => 'Eksplorasi Luar Angkasa: Misi Mars Terbaru',
            'isi' => 'Badan antariksa dunia baru saja meluncurkan misi terbarunya ke planet merah. Misi ini diharapkan dapat menemukan tanda-tanda kehidupan mikroba di masa lampau.',
            'gambar' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=800',
            'created_at' => '2026-04-24 09:15:00'
        ]
    ];

    public function getBerita($id = false)
    {
        if ($id === false) {
            $sortedData = $this->data;
            usort($sortedData, function($a, $b) {
                return strtotime($b['created_at']) <=> strtotime($a['created_at']);
            });
            return $sortedData;
        }

        foreach ($this->data as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }

        return null;
    }
}
