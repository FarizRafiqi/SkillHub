<?php

class KursusRequest
{
    public function validate($data): array
    {
        $nama = $data["nama"];

        $errors = [];

        // rule required
        if (empty($nama))
            $errors["nama"] = "Nama tidak boleh kosong.";

        if (!isset($data["id_kategori"]))
            $errors["id_kategori"] = "Kategori tidak boleh kosong.";

        if (!isset($data["id_pengguna"]))
            $errors["id_pengguna"] = "Pengguna tidak boleh kosong.";

        if (empty($data["total_jam_belajar"]))
            $errors["total_jam_belajar"] = "Total jam belajar tidak boleh kosong.";

        if (empty($data["harga"]))
            $errors["harga"] = "Harga tidak boleh kosong.";

        // rule string alfabet
        if (!empty($nama) && !isAlpha($nama))
            $errors["nama"] = "Nama harus berisi karakter alfabet.";

        if (!empty($data["total_jam_belajar"]) && $data["harga"] < 0)
            $errors["harga"] = "Harga tidak boleh minus.";

        if (!empty($data["harga"]) && $data["total_jam_belajar"] < 0)
            $errors["total_jam_belajar"] = "Total jam belajar tidak boleh minus.";



        return $errors;
    }
}
