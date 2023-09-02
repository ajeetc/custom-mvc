<?php

declare(strict_types=1);

function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die;
}

function pp(mixed $value): void
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die;
}

function e(mixed $value): mixed
{
    return htmlspecialchars((string) $value);
}
