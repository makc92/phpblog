<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2013 Jonathan Vollebregt (jnvsor@gmail.com), Rokas Šleinius (raveren@gmail.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

use Kint\Kint;
use Kint\Utils;

if (\defined('KINT_DIR')) {
    return;
}

if (\version_compare(PHP_VERSION, '5.3') < 0) {
    throw new Exception('Kint 3.0 requires PHP 5.3 or higher');
}

\define('KINT_DIR', __DIR__);
\define('KINT_WIN', DIRECTORY_SEPARATOR !== '/');
\define('KINT_PHP56', (\version_compare(PHP_VERSION, '5.6') >= 0));
\define('KINT_PHP70', (\version_compare(PHP_VERSION, '7.0') >= 0));
\define('KINT_PHP72', (\version_compare(PHP_VERSION, '7.2') >= 0));

// Dynamic default settings
Kint::$file_link_format = \ini_get('xdebug.file_link_format');
if (isset($_SERVER['DOCUMENT_ROOT'])) {
    Kint::$app_root_dirs = array(
        $_SERVER['DOCUMENT_ROOT'] => '<ROOT>',
        \realpath($_SERVER['DOCUMENT_ROOT']) => '<ROOT>',
    );
}

Utils::composerSkipFlags();

if ((!\defined('KINT_SKIP_FACADE') || !KINT_SKIP_FACADE) && !\class_exists('Kint')) {
    \class_alias('Kint\\Kint', 'Kint');
}

if (!\defined('KINT_SKIP_HELPERS') || !KINT_SKIP_HELPERS) {
    require_once __DIR__.'/init_helpers.php';
}
