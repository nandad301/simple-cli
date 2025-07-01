<?php
// index_test.php

require '../src/functions.php';

// Menguji fungsi helloWorld()
$result = helloWorld();

if ($result === "Hello, World!") {
    echo "Tes berhasil: fungsi helloWorld() bekerja dengan baik.";
} else {
    echo "Tes gagal: fungsi helloWorld() tidak mengembalikan hasil yang diharapkan.";
}
?>
