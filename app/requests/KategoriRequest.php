<?php

class KategoriRequest
{
    public function validate($data): array
    {
        $nama = $data["nama"];

        $errors = [];

        // rule required
        if (empty($nama))
            $errors["nama"] = "Nama tidak boleh kosong.";

        return $errors;
    }
}
