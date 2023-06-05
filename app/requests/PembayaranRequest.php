<?php

class PembayaranRequest
{
    public function validate($data): array
    {
        $tanggal = $data["tanggal_bayar"];
        $nominal = $data["nominal_bayar"];
        $pengguna = $data["id_pengguna"];
        $pemesanan = $data["id_pemesanan"];

        $errors = [];

        // rule required
        if (empty($pengguna))
            $errors["id_pengguna"] = "Pengguna tidak boleh kosong.";

        if (empty($pemesanan))
            $errors["id_pemesanan"] = "Pemesanan tidak boleh kosong.";

        if (empty($tanggal))
            $errors["tanggal_bayar"] = "Tanggal tidak boleh kosong.";

        if (empty($nominal))
            $errors["nominal_bayar"] = "Nominal tidak boleh kosong.";

        if (!empty($nominal) && $nominal < 0)
            $errors["nominal_bayar"] = "Nominal bayar tidak boleh kurang dari 0.";
        
        return $errors;
    }
}
