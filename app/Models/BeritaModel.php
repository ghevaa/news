<?php

namespace App\Models;

class BeritaModel
{
    private $dataFile;

    public function __construct()
    {
        $this->dataFile = WRITEPATH . 'data/berita.json';
    }

    public function getBerita($id = false)
    {
        if (!file_exists($this->dataFile)) {
            return [];
        }

        $jsonBackup = file_get_contents($this->dataFile);
        $data = json_decode($jsonBackup, true);

        if ($data === null) {
            $data = [];
        }

        if ($id === false) {
            // Urutkan dari yang terbaru
            usort($data, function($a, $b) {
                return strtotime($b['created_at']) <=> strtotime($a['created_at']);
            });
            return $data;
        }

        foreach ($data as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }

        return null;
    }

    public function insert($newData)
    {
        if (!file_exists($this->dataFile)) {
            $data = [];
        } else {
            $json = file_get_contents($this->dataFile);
            $data = json_decode($json, true);
            if ($data === null) $data = [];
        }

        // Generate ID
        $newId = empty($data) ? 1 : max(array_column($data, 'id')) + 1;
        $newData['id'] = $newId;
        $newData['created_at'] = date('Y-m-d H:i:s');

        $data[] = $newData;

        return file_put_contents($this->dataFile, json_encode($data, JSON_PRETTY_PRINT));
    }
}
