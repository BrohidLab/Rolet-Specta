<?php

use Webpatser\Uuid\Uuid;

if (!function_exists('generateUuid')) {
    /**
     * @throws Exception
     */
    function generateUuid(): string
    {
        return Uuid::generate(4)->string;
    }
}

if (!function_exists('format_rupiah')) {
    /**
     * @throws Exception
     */
    function format_rupiah($angka): string
    {
        if ($angka >= 1000000) {
            return round($angka / 1000000, 1) . 'M';
        }

        if ($angka >= 1000) {
            return round($angka / 1000, 0) . 'K';
        }

        return (string) $angka;
    }
}
