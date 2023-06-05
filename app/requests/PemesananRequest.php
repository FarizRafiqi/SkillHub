<?php

class PemesananRequest
{
    public function validate($data): array
    {
        $id = $data["id"];
        $id_pengguna = $data["id_pengguna"];
        $id_kursus = $data["id_kursus"];
        $total_harga = $data["total_harga"];
        $tanggal_pesan = $data["tanggal_pesan"];

        $errors = [];

        // rule required
        if (empty($id))
            $errors["id"] = "ID tidak boleh kosong.";

        if (empty($id_pengguna))
            $errors["id_pengguna"] = "ID pengguna tidak boleh kosong.";

        if (empty($id_kursus))
            $errors["id_kursus"] = "ID kursus tidak boleh kosong.";

        if(!isset($data["total_harga"]))
            $errors["total_harga"] = "Total harga tidak boleh kosong.";

        if(!isset($data["tanggal_pesan"]))
            $errors["tanggal_pesan"] = "Tanggal pesan tidak boleh kosong.";

        return $errors;
    }
}