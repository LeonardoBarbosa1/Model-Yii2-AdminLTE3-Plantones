<?php

if (!function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */

    function dd($expression, $_ = null)
    {
        var_dump(func_get_args());
        die(1);
    }
}

if (!function_exists('object_get')) {
    /**
     * Get an item from an object using "dot" notation.
     *
     * @param  object $object
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) == '') {
            return $object;
        }
        foreach (explode('.', $key) as $segment) {
            if (!is_object($object) || !isset($object->{$segment})) {
                return value($default);
            }
            $object = $object->{$segment};
        }
        return $object;
    }
}

if (!function_exists('class_basename')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object $class
     * @return string
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;
        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists('loop')) {

    /**
     * @param callable $handle
     * @param integer $count
     * @param int $init
     */
    function loop($handle, $count, $init = 1)
    {
        foreach (range($init, $init + $count - 1) as $i) {
            $handle($i);
        }
    }
}