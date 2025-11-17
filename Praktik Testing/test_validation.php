<?php
require_once 'Calculator.php';

echo "=== TEST VALIDASI INPUT STRING ===\n\n";

$calc = new Calculator();

// Test 1: Addition dengan string
echo "Test 1: Penjumlahan dengan string 'abc'\n";
try {
    $result = $calc->add('abc', 5);
    echo "❌ GAGAL: Harusnya error tapi tidak\n";
} catch (InvalidArgumentException $e) {
    echo "✅ BERHASIL: " . $e->getMessage() . "\n";
}

// Test 2: Subtraction dengan string
echo "\nTest 2: Pengurangan dengan string 'xyz'\n";
try {
    $result = $calc->subtract(10, 'xyz');
    echo "❌ GAGAL: Harusnya error tapi tidak\n";
} catch (InvalidArgumentException $e) {
    echo "✅ BERHASIL: " . $e->getMessage() . "\n";
}

// Test 3: Multiplication dengan string
echo "\nTest 3: Perkalian dengan string 'test'\n";
try {
    $result = $calc->multiply('test', 3);
    echo "❌ GAGAL: Harusnya error tapi tidak\n";
} catch (InvalidArgumentException $e) {
    echo "✅ BERHASIL: " . $e->getMessage() . "\n";
}

// Test 4: Division dengan string
echo "\nTest 4: Pembagian dengan string 'hello'\n";
try {
    $result = $calc->divide(20, 'hello');
    echo "❌ GAGAL: Harusnya error tapi tidak\n";
} catch (InvalidArgumentException $e) {
    echo "✅ BERHASIL: " . $e->getMessage() . "\n";
}

// Test 5: Power dengan string
echo "\nTest 5: Pangkat dengan string 'three'\n";
try {
    $result = $calc->power(2, 'three');
    echo "❌ GAGAL: Harusnya error tapi tidak\n";
} catch (InvalidArgumentException $e) {
    echo "✅ BERHASIL: " . $e->getMessage() . "\n";
}

// Test 6: Square root dengan string
echo "\nTest 6: Akar kuadrat dengan string 'sixteen'\n";
try {
    $result = $calc->squareRoot('sixteen');
    echo "❌ GAGAL: Harusnya error tapi tidak\n";
} catch (InvalidArgumentException $e) {
    echo "✅ BERHASIL: " . $e->getMessage() . "\n";
}

// Test 7: Input numerik valid (harus berhasil)
echo "\n\n=== TEST INPUT VALID ===\n\n";

echo "Test 7: Penjumlahan 5 + 3\n";
try {
    $result = $calc->add(5, 3);
    echo "✅ BERHASIL: 5 + 3 = $result\n";
} catch (Exception $e) {
    echo "❌ GAGAL: " . $e->getMessage() . "\n";
}

echo "\nTest 8: Pembagian 10 / 2\n";
try {
    $result = $calc->divide(10, 2);
    echo "✅ BERHASIL: 10 / 2 = $result\n";
} catch (Exception $e) {
    echo "❌ GAGAL: " . $e->getMessage() . "\n";
}

echo "\n=== SEMUA TEST SELESAI ===\n";
