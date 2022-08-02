<?php

namespace Dream\Apply\Client;

const OLD_PREFIX = 'Dream\\DreamApply\\Client\\';
const OLD_PREFIX_LEN = 24; // strlen(OLD_PREFIX_LEN)
const NEW_PREFIX = 'Dream\\Apply\\Client\\';

spl_autoload_register(function ($class) {
    if (strncmp($class, OLD_PREFIX, OLD_PREFIX_LEN) !== 0) {
        return false;
    }

    $newClassName = NEW_PREFIX . substr($class, OLD_PREFIX_LEN);

    if (!class_exists($newClassName)) {
        return false;
    }

    class_alias($newClassName, $class);

    return true;
});
