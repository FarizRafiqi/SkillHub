<?php

class PembayaranRequest
{
    public function validate($data): array
    {
        $tanggal = $data["tanggal"];
        $nominal = $data["nominal"];

        $errors = [];

        // rule required
        if (empty($tanggal))
            $errors["tanggal"] = "Tanggal tidak boleh kosong.";

        if (empty($nominal))
            $errors["nominal"] = "Nominal tidak boleh kosong.";

        return $errors;
    }
}


