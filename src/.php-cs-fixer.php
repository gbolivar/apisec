<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/database',
        __DIR__ . '/routes',
        __DIR__ . '/config',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setRules([
        '@PSR12' => true, // Aplicar reglas de PSR-12
        'array_syntax' => ['syntax' => 'short'], // Arrays cortos
        'ordered_imports' => ['sort_algorithm' => 'alpha'], // Ordenar imports alfabéticamente
        'no_unused_imports' => true, // Eliminar imports no usados
        'single_quote' => true, // Usar comillas simples
        'trailing_comma_in_multiline' => ['elements' => ['arrays']], // Coma al final en arrays multilinea
        'phpdoc_align' => ['align' => 'left'], // Alinear PHPDoc
        'not_operator_with_successor_space' => true, // Espacio después de not (!)
        'binary_operator_spaces' => ['default' => 'align'], // Alinear operadores binarios
    ])
    ->setFinder($finder);
