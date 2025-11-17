<?php
use PHPUnit\Framework\TestCase;

require_once 'Calculator.php';

/**
 * Unit tests for Calculator class
 */
class CalculatorTest extends TestCase {
    private $calculator;
    
    /**
     * Set up test environment before each test
     */
    protected function setUp(): void {
        $this->calculator = new Calculator();
    }
    
    /**
     * Clean up after each test
     */
    protected function tearDown(): void {
        $this->calculator = null;
    }
    
    // ========== Test Case 1.1 ==========
    /**
     * Test addition of two positive numbers
     */
    public function testAddPositiveNumbers() {
        $result = $this->calculator->add(5, 3);
        echo "\n  🧮 Test 1.1: 5 + 3 = $result";
        $this->assertEquals(8, $result);
    }
    
    // ========== Test Case 1.2 ==========
    /**
     * Test addition of negative numbers
     */
    public function testAddNegativeNumbers() {
        $result = $this->calculator->add(-5, -3);
        echo "\n  🧮 Test 1.2: (-5) + (-3) = $result";
        $this->assertEquals(-8, $result);
    }
    
    // ========== Test Case 1.3 ==========
    /**
     * Test addition with zero
     */
    public function testAddWithZero() {
        $result = $this->calculator->add(5, 0);
        echo "\n  🧮 Test 1.3: 5 + 0 = $result";
        $this->assertEquals(5, $result);
    }
    
    // ========== Test Case 2.1 ==========
    /**
     * Test subtraction of two positive numbers
     */
    public function testSubtractPositiveNumbers() {
        $result = $this->calculator->subtract(10, 3);
        echo "\n  🧮 Test 2.1: 10 - 3 = $result";
        $this->assertEquals(7, $result);
    }
    
    // ========== Test Case 2.2 ==========
    /**
     * Test subtraction of negative numbers
     */
    public function testSubtractNegativeNumbers() {
        $result = $this->calculator->subtract(-5, -3);
        echo "\n  🧮 Test 2.2: (-5) - (-3) = $result";
        $this->assertEquals(-2, $result);
    }
    
    // ========== Test Case 2.3 ==========
    /**
     * Test multiplication of two positive numbers
     */
    public function testMultiplyPositiveNumbers() {
        $result = $this->calculator->multiply(4, 5);
        echo "\n  🧮 Test 2.3: 4 × 5 = $result";
        $this->assertEquals(20, $result);
    }
    
    // ========== Test Case 3.1 ==========
    /**
     * Test multiplication with zero
     */
    public function testMultiplyByZero() {
        $result = $this->calculator->multiply(100, 0);
        echo "\n  🧮 Test 3.1: 100 × 0 = $result";
        $this->assertEquals(0, $result);
    }
    
    // ========== Test Case 3.2 ==========
    /**
     * Test division of two positive numbers
     */
    public function testDividePositiveNumbers() {
        $result = $this->calculator->divide(10, 2);
        echo "\n  🧮 Test 3.2: 10 ÷ 2 = $result";
        $this->assertEquals(5.0, $result);
    }
    
    // ========== Test Case 3.3 ==========
    /**
     * Test division by zero raises exception
     */
    public function testDivideByZeroRaisesException() {
        echo "\n  🧮 Test 3.3: 10 ÷ 0 = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Cannot divide by zero");
        $this->calculator->divide(10, 0);
    }
    
    // ========== Test Case 4.1 ==========
    /**
     * Test power with positive exponent
     */
    public function testPowerPositiveExponent() {
        $result = $this->calculator->power(2, 3);
        echo "\n  🧮 Test 4.1: 2³ = $result";
        $this->assertEquals(8, $result);
    }
    
    // ========== Test Case 4.2 ==========
    /**
     * Test square root of positive number
     */
    public function testSquareRootPositive() {
        $result = $this->calculator->squareRoot(16);
        echo "\n  🧮 Test 4.2: √16 = $result";
        $this->assertEquals(4.0, $result);
    }
    
    // ========== Test Case 4.3 ==========
    /**
     * Test square root of negative number raises exception
     */
    public function testSquareRootNegativeRaisesException() {
        echo "\n  🧮 Test 4.3: √(-4) = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Cannot calculate square root of negative number");
        $this->calculator->squareRoot(-4);
    }
    
    // ========== Test Case 5.1 ==========
    /**
     * Test addition with string input raises exception
     */
    public function testAddWithStringInput() {
        echo "\n  🧮 Test 5.1: 'abc' + 5 = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Inputs must be numeric");
        $this->calculator->add('abc', 5);
    }
    
    // ========== Test Case 5.2 ==========
    /**
     * Test subtraction with string input raises exception
     */
    public function testSubtractWithStringInput() {
        echo "\n  🧮 Test 5.2: 10 - 'xyz' = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Inputs must be numeric");
        $this->calculator->subtract(10, 'xyz');
    }
    
    // ========== Test Case 5.3 ==========
    /**
     * Test multiplication with string input raises exception
     */
    public function testMultiplyWithStringInput() {
        echo "\n  🧮 Test 5.3: 'test' × 3 = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Inputs must be numeric");
        $this->calculator->multiply('test', 3);
    }
    
    // ========== Test Case 5.4 ==========
    /**
     * Test division with string input raises exception
     */
    public function testDivideWithStringInput() {
        echo "\n  🧮 Test 5.4: 20 ÷ 'hello' = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Inputs must be numeric");
        $this->calculator->divide(20, 'hello');
    }
    
    // ========== Test Case 5.5 ==========
    /**
     * Test power with string input raises exception
     */
    public function testPowerWithStringInput() {
        echo "\n  🧮 Test 5.5: 2 ^ 'three' = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Inputs must be numeric");
        $this->calculator->power(2, 'three');
    }
    
    // ========== Test Case 5.6 ==========
    /**
     * Test square root with string input raises exception
     */
    public function testSquareRootWithStringInput() {
        echo "\n  🧮 Test 5.6: √('sixteen') = ERROR (InvalidArgumentException)";
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Input must be numeric");
        $this->calculator->squareRoot('sixteen');
    }
}


