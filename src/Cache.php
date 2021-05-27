<?php declare(strict_types = 1);

namespace Apitin\Cache;

use Closure;

abstract class Cache
{
    static $cache = [];

    public static function has(string $key): bool
    {
        return isset( static::$cache[$key] );
    }

    public static function get(string $key, Closure $warm)
    {
        if (!static::has($key)) {

            static::set($key, $warm());

        }

        return static::$cache[$key] ?? null;
    }

    public static function set(string $key, $value): void
    {
        static::$cache[$key] = $value;
    }
}