<?php
// index_test.php

// Autoload dependencies jika menggunakan Composer
require '../vendor/autoload.php';

// Memasukkan file yang akan diujikan
require '../src/functions.php'; // Misalnya jika ada fungsi dalam file ini

// Menggunakan PHPUnit untuk menjalankan unit tests
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    // Test untuk fungsi tertentu
    public function testAddingNumbers()
    {
        $this->assertEquals(4, add(2, 2)); // Misalnya ada fungsi add
    }

    // Tambahkan lebih banyak tests sesuai kebutuhan
}

// Menjalankan PHPUnit
if (PHPUnit\TextUI\Command::main() === null) {
    exit(1);
}
