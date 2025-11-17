# Calculator PHP - Unit Testing with PHPUnit

Aplikasi kalkulator sederhana dalam PHP dengan unit testing menggunakan PHPUnit.

## Struktur File

- `Calculator.php` - Class kalkulator utama dengan 7 fungsi matematika
- `CalculatorTest.php` - 39 unit test cases menggunakan PHPUnit
- `composer.json` - Dependency management untuk PHPUnit
- `phpunit.xml` - Konfigurasi PHPUnit
- `run_calculator.php` - Aplikasi kalkulator interaktif

## Fitur Calculator

1. **add(a, b)** - Penjumlahan
2. **subtract(a, b)** - Pengurangan
3. **multiply(a, b)** - Perkalian
4. **divide(a, b)** - Pembagian (dengan exception handling untuk pembagian nol)
5. **power(base, exponent)** - Pangkat
6. **squareRoot(number)** - Akar kuadrat (dengan exception handling untuk bilangan negatif)
7. **getHistory()** - Mendapatkan riwayat perhitungan
8. **clearHistory()** - Menghapus riwayat perhitungan

## Instalasi

### 1. Install Composer (jika belum ada)

Download dari [getcomposer.org](https://getcomposer.org/)

### 2. Install PHPUnit

```bash
composer install
```

atau jika belum ada composer.lock:

```bash
composer require --dev phpunit/phpunit ^10.0
```

## Menjalankan Unit Test

### Menjalankan semua test:

```bash
./vendor/bin/phpunit
```

atau di Windows:

```bash
vendor\bin\phpunit
```

### Menjalankan dengan verbose output:

```bash
vendor\bin\phpunit --verbose
```

### Menjalankan dengan code coverage:

```bash
vendor\bin\phpunit --coverage-html coverage-report
```

### Menjalankan test specific:

```bash
vendor\bin\phpunit --filter testAddPositiveNumbers
```

## Test Coverage

Total: **39 test cases**

### Breakdown per kategori:

1. **Addition Tests (5 tests)**
   - Positive numbers
   - Negative numbers
   - With zero
   - Positive and negative mix
   - Decimal numbers

2. **Subtraction Tests (5 tests)**
   - Positive numbers
   - Result negative
   - With zero
   - Negative numbers
   - Decimal numbers

3. **Multiplication Tests (5 tests)**
   - Positive numbers
   - By zero
   - Negative numbers
   - Two negatives
   - Decimal numbers

4. **Division Tests (6 tests)**
   - Positive numbers
   - Division by zero (exception test)
   - Negative numbers
   - Two negatives
   - Result decimal
   - Division by one

5. **Power Tests (5 tests)**
   - Positive exponent
   - Zero exponent
   - Negative exponent
   - Decimal exponent
   - Negative base

6. **Square Root Tests (5 tests)**
   - Positive number
   - Zero
   - Negative number (exception test)
   - Decimal
   - Square root of one

7. **History Tests (4 tests)**
   - Initially empty
   - Records operations
   - Clear history
   - Multiple operations

8. **Edge Cases (4 tests)**
   - Very large numbers
   - Very small decimals
   - Negative zero
   - Chaining operations

### Integration Tests:
- Complex calculation
- Power and square root relationship
- History persistence

## Menjalankan Aplikasi Calculator

```bash
php run_calculator.php
```

## Contoh Output Test

```
PHPUnit 10.x.x by Sebastian Bergmann and contributors.

Runtime:       PHP 8.x.x
Configuration: phpunit.xml

.......................................                           39 / 39 (100%)

Time: 00:00.123, Memory: 6.00 MB

OK (39 tests, 45 assertions)
```

## Exception Handling

Calculator class menangani error dengan exception:

1. **Division by zero** - Melempar `InvalidArgumentException`
2. **Square root of negative** - Melempar `InvalidArgumentException`

## Requirements

- PHP >= 8.0
- Composer
- PHPUnit >= 10.0

## Author

Tester: Deva

## License

Educational purposes
