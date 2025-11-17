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
     * @throws InvalidArgumentException If inputs are not numeric
     */
    public function add($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Inputs must be numeric");
        }
        $result = $a + $b;
        $this->history[] = "$a + $b = $result";
        return $result;
    }
    
    /**
     * Subtract b from a
     * @param float $a First number
     * @param float $b Second number
     * @return float Difference of a and b
     * @throws InvalidArgumentException If inputs are not numeric
     */
    public function subtract($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Inputs must be numeric");
        }
        $result = $a - $b;
        $this->history[] = "$a - $b = $result";
        return $result;
    }
    
    /**
     * Multiply two numbers
     * @param float $a First number
     * @param float $b Second number
     * @return float Product of a and b
     * @throws InvalidArgumentException If inputs are not numeric
     */
    public function multiply($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Inputs must be numeric");
        }
        $result = $a * $b;
        $this->history[] = "$a * $b = $result";
        return $result;
    }
    
    /**
     * Divide a by b
     * @param float $a Numerator
     * @param float $b Denominator
     * @return float Quotient of a and b
     * @throws InvalidArgumentException If inputs are not numeric or if b is zero
     */
    public function divide($a, $b) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Inputs must be numeric");
        }
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
     * @throws InvalidArgumentException If inputs are not numeric
     */
    public function power($base, $exponent) {
        if (!is_numeric($base) || !is_numeric($exponent)) {
            throw new InvalidArgumentException("Inputs must be numeric");
        }
        $result = pow($base, $exponent);
        $this->history[] = "$base ^ $exponent = $result";
        return $result;
    }
    
    /**
     * Calculate square root of a number
     * @param float $number Number to calculate square root
     * @return float Square root of the number
     * @throws InvalidArgumentException If input is not numeric or if number is negative
     */
    public function squareRoot($number) {
        if (!is_numeric($number)) {
            throw new InvalidArgumentException("Input must be numeric");
        }
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
