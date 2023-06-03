<?php

class Flasher
{

    public static function setFlash($pesan, $tipe): void
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }

    public static function flash(): void
    {
        if (isset($_SESSION['flash'])) {
            $icon = "";

            if ($_SESSION['flash']['tipe'] === "success") {
                $icon = "<i class='fas fa-check-circle text-4xl mr-3'></i>";
            } else {
                $icon = "<i class='fas fa-times-circle text-4xl mr-3'></i>";
            }

            echo <<<HTML
                <div class="alert alert-{$_SESSION['flash']['tipe']} mb-3">
                    $icon
                    <div class="text-lg">
                      {$_SESSION['flash']['pesan']}
                    </div>
                </div>
            HTML;
            unset($_SESSION['flash']);
        }
    }
}