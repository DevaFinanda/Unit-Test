<?php
require_once 'Calculator.php';

/**
 * Interactive Calculator Application
 */
class CalculatorApp {
    private $calculator;
    private $running = true;
    
    public function __construct() {
        $this->calculator = new Calculator();
    }
    
    /**
     * Display main menu
     */
    private function printMenu() {
        echo "\n";
        echo "========================================\n";
        echo "         KALKULATOR SEDERHANA          \n";
        echo "========================================\n";
        echo "1. Penjumlahan (+)\n";
        echo "2. Pengurangan (-)\n";
        echo "3. Perkalian (*)\n";
        echo "4. Pembagian (/)\n";
        echo "5. Pangkat (^)\n";
        echo "6. Akar Kuadrat (sqrt)\n";
        echo "7. Tampilkan Riwayat\n";
        echo "8. Hapus Riwayat\n";
        echo "9. Keluar\n";
        echo "========================================\n";
    }
    
    /**
     * Get number input from user
     * @throws InvalidArgumentException If input is not numeric
     */
    private function getNumber($prompt) {
        echo $prompt;
        $input = trim(fgets(STDIN));
        if (!is_numeric($input)) {
            throw new InvalidArgumentException("Input harus berupa angka, bukan '$input'");
        }
        return floatval($input);
    }
    
    /**
     * Execute addition operation
     */
    private function performAddition() {
        try {
            $a = $this->getNumber("Masukkan bilangan pertama: ");
            $b = $this->getNumber("Masukkan bilangan kedua: ");
            $result = $this->calculator->add($a, $b);
            echo "\nHasil: $a + $b = $result\n";
        } catch (InvalidArgumentException $e) {
            echo "\nError: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Execute subtraction operation
     */
    private function performSubtraction() {
        try {
            $a = $this->getNumber("Masukkan bilangan pertama: ");
            $b = $this->getNumber("Masukkan bilangan kedua: ");
            $result = $this->calculator->subtract($a, $b);
            echo "\nHasil: $a - $b = $result\n";
        } catch (InvalidArgumentException $e) {
            echo "\nError: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Execute multiplication operation
     */
    private function performMultiplication() {
        try {
            $a = $this->getNumber("Masukkan bilangan pertama: ");
            $b = $this->getNumber("Masukkan bilangan kedua: ");
            $result = $this->calculator->multiply($a, $b);
            echo "\nHasil: $a * $b = $result\n";
        } catch (InvalidArgumentException $e) {
            echo "\nError: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Execute division operation
     */
    private function performDivision() {
        $a = $this->getNumber("Masukkan bilangan pertama: ");
        $b = $this->getNumber("Masukkan bilangan kedua: ");
        try {
            $result = $this->calculator->divide($a, $b);
            echo "\nHasil: $a / $b = $result\n";
        } catch (InvalidArgumentException $e) {
            echo "\nError: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Execute power operation
     */
    private function performPower() {
        try {
            $base = $this->getNumber("Masukkan bilangan dasar: ");
            $exponent = $this->getNumber("Masukkan pangkat: ");
            $result = $this->calculator->power($base, $exponent);
            echo "\nHasil: $base ^ $exponent = $result\n";
        } catch (InvalidArgumentException $e) {
            echo "\nError: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Execute square root operation
     */
    private function performSquareRoot() {
        $number = $this->getNumber("Masukkan bilangan: ");
        try {
            $result = $this->calculator->squareRoot($number);
            echo "\nHasil: sqrt($number) = $result\n";
        } catch (InvalidArgumentException $e) {
            echo "\nError: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Display calculation history
     */
    private function showHistory() {
        $history = $this->calculator->getHistory();
        echo "\n========================================\n";
        echo "         RIWAYAT PERHITUNGAN           \n";
        echo "========================================\n";
        if (empty($history)) {
            echo "Tidak ada riwayat perhitungan.\n";
        } else {
            foreach ($history as $index => $entry) {
                echo ($index + 1) . ". $entry\n";
            }
        }
        echo "========================================\n";
    }
    
    /**
     * Clear calculation history
     */
    private function clearHistory() {
        $this->calculator->clearHistory();
        echo "\nRiwayat perhitungan telah dihapus.\n";
    }
    
    /**
     * Main application loop
     */
    public function run() {
        echo "\nSelamat datang di Kalkulator Sederhana!\n";
        
        while ($this->running) {
            $this->printMenu();
            echo "Pilih operasi (1-9): ";
            $choice = trim(fgets(STDIN));
            
            switch ($choice) {
                case '1':
                    $this->performAddition();
                    break;
                case '2':
                    $this->performSubtraction();
                    break;
                case '3':
                    $this->performMultiplication();
                    break;
                case '4':
                    $this->performDivision();
                    break;
                case '5':
                    $this->performPower();
                    break;
                case '6':
                    $this->performSquareRoot();
                    break;
                case '7':
                    $this->showHistory();
                    break;
                case '8':
                    $this->clearHistory();
                    break;
                case '9':
                    echo "\nTerima kasih telah menggunakan kalkulator!\n";
                    $this->running = false;
                    break;
                default:
                    echo "\nPilihan tidak valid. Silakan pilih 1-9.\n";
            }
            
            if ($this->running) {
                echo "\nTekan Enter untuk melanjutkan...";
                fgets(STDIN);
            }
        }
    }
}

// Run the application
if (php_sapi_name() === 'cli') {
    $app = new CalculatorApp();
    $app->run();
}
