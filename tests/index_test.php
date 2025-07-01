<?php
require_once __DIR__ . '/../src/function.php';

function assertEqual($expected, $actual, $testName) {
    if ($expected === $actual) {
        echo "[PASS] $testName\n";
    } else {
        echo "[FAIL] $testName: Expected '$expected', got '$actual'\n";
    }
}

function runTests() {
    assertEqual("Hello, John!", sayHello("John"), "sayHello() should return correct greeting");
}

runTests();
?>
