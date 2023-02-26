<?php

namespace App\Services;

class SkuGenerator
{
    public static function generate($length = 8)
    {
        // Define characters that can be used in SKU
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        // Get the total number of characters in the character string
        $num_chars = strlen($characters);

        // Initialize SKU variable
        $sku = '';

        // Generate SKU
        for ($i = 0; $i < $length; $i++) {
            $random_char = $characters[rand(0, $num_chars - 1)];
            $sku .= $random_char;
        }

        return $sku;
    }
}
