<?php

if (! function_exists('uuid')) {
    /**
     * Create a v4 uuid.
     *
     * @return string
     */
    function uuid()
    {
        $uuid = openssl_random_pseudo_bytes(16);
        // set variant
        $uuid[8] = chr(ord($uuid[8]) & 0x39 | 0x80);
        // set version
        $uuid[6] = chr(ord($uuid[6]) & 0xf | 0x40);

        return preg_replace(
            '/(\w{8})(\w{4})(\w{4})(\w{4})(\w{12})/',
            '$1-$2-$3-$4-$5',
            bin2hex($uuid)
        );
    }
}

if (! function_exists('is_uuid')) {
    /**
     * Validate an uuid.
     *
     * @param  string  $uuid
     * @param  string  $version
     * @return boolean
     */
    function is_uuid($uuid, $version = '[1-5]')
    {
        $pattern = "/^[0-9a-f]{8}-[0-9a-f]{4}-{$version}[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i";

        return !! preg_match($pattern, $uuid);
    }
}
