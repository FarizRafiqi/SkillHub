<?php

class PenggunaRequest
{
    public function validate($data, $isIgnore = false): array
    {
        $nama = $data["nama"];
        $email = $data["email"];
        $password = $data["password"];

        $errors = [];

        // rule required
        if (empty($nama))
            $errors["nama"] = "Nama tidak boleh kosong.";

        if (empty($email))
            $errors["email"] = "Email tidak boleh kosong.";

        if (empty($password) && $isIgnore)
            $errors["password"] = "Password tidak boleh kosong.";

        if(!isset($data["id_peran"]))
            $errors["id_peran"] = "Peran tidak boleh kosong.";

        // rule string alfabet
        if (!empty($nama) && !isAlpha($nama))
            $errors["nama"] = "Nama harus berisi karakter alfabet.";

        // rule email
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors["email"] = "Email tidak valid.";

        // rule panjang password min 8
        if (!empty($password) && strlen($password) < 8)
            $errors["password"] = "Panjang password minimal 8 karakter.";

        return $errors;
    }
}