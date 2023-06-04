<?php

class LoginRequest
{
    public function validate($data): array
    {
        $email = $data["email"];
        $password = $data["password"];

        $errors = [];

        if (empty($email))
            $errors["email"] = "Email tidak boleh kosong.";

        if (empty($password))
            $errors["password"] = "Password tidak boleh kosong.";

        // rule email
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors["email"] = "Email tidak valid.";

        // rule panjang password min 8
        if (!empty($password) && strlen($password) < 8)
            $errors["password"] = "Panjang password minimal 8 karakter.";

        return $errors;
    }
}
