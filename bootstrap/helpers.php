<?php

/**
 * Format the given number as Indonesian Rupiah.
 *
 * @param mixed $angka The number to be formatted.
 * @return string The formatted Rupiah string.
 */
function rupiah(mixed $angka){
    $rupiah = "Rp" . number_format($angka,2,',','.');
    return $rupiah;
}
