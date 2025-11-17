<?php
/**
 * Calculator Class
 * Provides basic mathematical operations
 */
class Calculator {
    /**
     * @var array History of calculations
     */
    private $history = [];
    
    /**
     * Add two numbers
     * @param float $a First number
     * @param float $b Second number
     * @return float Sum of a and b
     */
    public function add($a, $b) {
        $result = $a + $b;
        $this->history[] = "$a + $b = $result";
        return $result;
    }
    
    /**
     * Subtract b from a
     * @param float $a First number
     * @param float $b Second number
     * @return float Difference of a and b
     */
    public function subtract($a, $b) {
        $result = $a - $b;
        $this->history[] = "$a - $b = $result";
        return $result;
    }
    
    /**
     * Multiply two numbers
     * @param float $a First number
     * @param float $b Second number
     * @return float Product of a and b
     */
    public function multiply($a, $b) {
        $result = $a * $b;
        $this->history[] = "$a * $b = $result";
        return $result;
    }
    
    /**
     * Divide a by b
     * @param float $a Numerator
     * @param float $b Denominator
     * @return float Quotient of a and b
     * @throws InvalidArgumentException If b is zero
     */
    public function divide($a, $b) {
        if ($b == 0) {
            throw new InvalidArgumentException("Cannot divide by zero");
        }
        $result = $a / $b;
        $this->history[] = "$a / $b = $result";
        return $result;
    }
    
    /**
     * Calculate power of a number
     * @param float $base Base number
     * @param float $exponent Exponent value
     * @return float Base raised to the power of exponent
     */
    public function power($base, $exponent) {
        $result = pow($base, $exponent);
        $this->history[] = "$base ^ $exponent = $result";
        return $result;
    }
    
    /**
     * Calculate square root of a number
     * @param float $number Number to calculate square root
     * @return float Square root of the number
     * @throws InvalidArgumentException If number is negative
     */
    public function squareRoot($number) {
        if ($number < 0) {
            throw new InvalidArgumentException("Cannot calculate square root of negative number");
        }
        $result = sqrt($number);
        $this->history[] = "sqrt($number) = $result";
        return $result;
    }
    
    /**
     * Get calculation history
     * @return array List of calculation history
     */
    public function getHistory() {
        return $this->history;
    }
    
    /**
     * Clear calculation history
     * @return void
     */
    public function clearHistory() {
        $this->history = [];
    }
}
