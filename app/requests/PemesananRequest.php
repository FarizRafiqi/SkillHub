<?php

class PemesananRequest
{
    public function validate($data): array
    {
        $id_pengguna = $data["id_pengguna"];
        $id_kursus = $data["id_kursus"];
        $total_harga = $data["total_harga"];
        $tanggal_pesan = $data["tanggal_pesan"];

        $errors = [];

        // rule required
        if (empty($id_pengguna))
            $errors["id_pengguna"] = "Pengguna tidak boleh kosong.";

        if (empty($id_kursus))
            $errors["id_kursus"] = "Kursus tidak boleh kosong.";

        if(empty($total_harga))
            $errors["total_harga"] = "Total harga tidak boleh kosong.";

        if(empty($tanggal_pesan))
            $errors["tanggal_pesan"] = "Tanggal pesan tidak boleh kosong.";

        if(!empty($total_harga) && $total_harga < 0)
            $errors["total_harga"] = "Total harga tidak boleh minus";

        return $errors;
    }
}