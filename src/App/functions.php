<?php

declare(strict_types=1);

if (!function_exists('mdd')) {
    function mdd(mixed $value): void
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die;
    }
}

if (!function_exists('pp')) {
    function pp(mixed $value): void
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        die;
    }
}

if (!function_exists('e')) {
    function e(mixed $value): mixed
    {
        return htmlspecialchars((string) $value);
    }
}
