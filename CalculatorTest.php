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
    
    // ========== Addition Tests ==========
    
    /**
     * Test addition of two positive numbers
     */
    public function testAddPositiveNumbers() {
        $this->assertEquals(8, $this->calculator->add(5, 3));
    }
    
    /**
     * Test addition of negative numbers
     */
    public function testAddNegativeNumbers() {
        $this->assertEquals(-8, $this->calculator->add(-5, -3));
    }
    
    /**
     * Test addition with zero
     */
    public function testAddWithZero() {
        $this->assertEquals(5, $this->calculator->add(5, 0));
    }
    
    /**
     * Test addition of positive and negative numbers
     */
    public function testAddPositiveAndNegative() {
        $this->assertEquals(2, $this->calculator->add(5, -3));
    }
    
    /**
     * Test addition of decimal numbers
     */
    public function testAddDecimals() {
        $this->assertEqualsWithDelta(8.7, $this->calculator->add(5.5, 3.2), 0.0001);
    }
    
    // ========== Subtraction Tests ==========
    
    /**
     * Test subtraction of two positive numbers
     */
    public function testSubtractPositiveNumbers() {
        $this->assertEquals(2, $this->calculator->subtract(5, 3));
    }
    
    /**
     * Test subtraction resulting in negative
     */
    public function testSubtractResultNegative() {
        $this->assertEquals(-2, $this->calculator->subtract(3, 5));
    }
    
    /**
     * Test subtraction with zero
     */
    public function testSubtractWithZero() {
        $this->assertEquals(5, $this->calculator->subtract(5, 0));
    }
    
    /**
     * Test subtraction of negative numbers
     */
    public function testSubtractNegativeNumbers() {
        $this->assertEquals(-2, $this->calculator->subtract(-5, -3));
    }
    
    /**
     * Test subtraction of decimal numbers
     */
    public function testSubtractDecimals() {
        $this->assertEqualsWithDelta(2.3, $this->calculator->subtract(5.5, 3.2), 0.0001);
    }
    
    // ========== Multiplication Tests ==========
    
    /**
     * Test multiplication of two positive numbers
     */
    public function testMultiplyPositiveNumbers() {
        $this->assertEquals(15, $this->calculator->multiply(5, 3));
    }
    
    /**
     * Test multiplication with zero
     */
    public function testMultiplyByZero() {
        $this->assertEquals(0, $this->calculator->multiply(5, 0));
    }
    
    /**
     * Test multiplication with negative number
     */
    public function testMultiplyNegativeNumbers() {
        $this->assertEquals(-15, $this->calculator->multiply(5, -3));
    }
    
    /**
     * Test multiplication of two negative numbers
     */
    public function testMultiplyTwoNegatives() {
        $this->assertEquals(15, $this->calculator->multiply(-5, -3));
    }
    
    /**
     * Test multiplication of decimal numbers
     */
    public function testMultiplyDecimals() {
        $this->assertEqualsWithDelta(17.6, $this->calculator->multiply(5.5, 3.2), 0.0001);
    }
    
    // ========== Division Tests ==========
    
    /**
     * Test division of two positive numbers
     */
    public function testDividePositiveNumbers() {
        $this->assertEquals(2.5, $this->calculator->divide(5, 2));
    }
    
    /**
     * Test division by zero raises exception
     */
    public function testDivideByZeroRaisesException() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Cannot divide by zero");
        $this->calculator->divide(5, 0);
    }
    
    /**
     * Test division with negative numbers
     */
    public function testDivideNegativeNumbers() {
        $this->assertEquals(-2.5, $this->calculator->divide(5, -2));
    }
    
    /**
     * Test division of two negative numbers
     */
    public function testDivideTwoNegatives() {
        $this->assertEquals(2.5, $this->calculator->divide(-5, -2));
    }
    
    /**
     * Test division resulting in decimal
     */
    public function testDivideResultDecimal() {
        $this->assertEqualsWithDelta(1.666666667, $this->calculator->divide(5, 3), 0.001);
    }
    
    /**
     * Test division by 1
     */
    public function testDivideByOne() {
        $this->assertEquals(5, $this->calculator->divide(5, 1));
    }
    
    // ========== Power Tests ==========
    
    /**
     * Test power with positive exponent
     */
    public function testPowerPositiveExponent() {
        $this->assertEquals(8, $this->calculator->power(2, 3));
    }
    
    /**
     * Test power with zero exponent
     */
    public function testPowerZeroExponent() {
        $this->assertEquals(1, $this->calculator->power(5, 0));
    }
    
    /**
     * Test power with negative exponent
     */
    public function testPowerNegativeExponent() {
        $this->assertEqualsWithDelta(0.125, $this->calculator->power(2, -3), 0.0001);
    }
    
    /**
     * Test power with decimal exponent
     */
    public function testPowerDecimalExponent() {
        $this->assertEqualsWithDelta(5.656854249, $this->calculator->power(2, 2.5), 0.001);
    }
    
    /**
     * Test power of negative base
     */
    public function testPowerNegativeBase() {
        $this->assertEquals(-8, $this->calculator->power(-2, 3));
    }
    
    // ========== Square Root Tests ==========
    
    /**
     * Test square root of positive number
     */
    public function testSquareRootPositive() {
        $this->assertEquals(3, $this->calculator->squareRoot(9));
    }
    
    /**
     * Test square root of zero
     */
    public function testSquareRootZero() {
        $this->assertEquals(0, $this->calculator->squareRoot(0));
    }
    
    /**
     * Test square root of negative number raises exception
     */
    public function testSquareRootNegativeRaisesException() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Cannot calculate square root of negative number");
        $this->calculator->squareRoot(-9);
    }
    
    /**
     * Test square root of decimal
     */
    public function testSquareRootDecimal() {
        $this->assertEqualsWithDelta(2.236067977, $this->calculator->squareRoot(5), 0.001);
    }
    
    /**
     * Test square root of 1
     */
    public function testSquareRootOne() {
        $this->assertEquals(1, $this->calculator->squareRoot(1));
    }
    
    // ========== History Tests ==========
    
    /**
     * Test history is initially empty
     */
    public function testHistoryInitiallyEmpty() {
        $this->assertEmpty($this->calculator->getHistory());
    }
    
    /**
     * Test history records operations
     */
    public function testHistoryRecordsOperations() {
        $this->calculator->add(5, 3);
        $this->calculator->subtract(10, 4);
        $history = $this->calculator->getHistory();
        $this->assertCount(2, $history);
        $this->assertStringContainsString('5 + 3', $history[0]);
        $this->assertStringContainsString('10 - 4', $history[1]);
    }
    
    /**
     * Test clear history
     */
    public function testClearHistory() {
        $this->calculator->add(5, 3);
        $this->calculator->clearHistory();
        $this->assertEmpty($this->calculator->getHistory());
    }
    
    /**
     * Test history after multiple operations
     */
    public function testHistoryMultipleOperations() {
        $this->calculator->add(5, 3);
        $this->calculator->multiply(2, 4);
        $this->calculator->divide(10, 2);
        $this->assertCount(3, $this->calculator->getHistory());
    }
    
    // ========== Edge Cases ==========
    
    /**
     * Test very large numbers
     */
    public function testVeryLargeNumbers() {
        $result = $this->calculator->add(999999999, 1);
        $this->assertEquals(1000000000, $result);
    }
    
    /**
     * Test very small decimal numbers
     */
    public function testVerySmallDecimals() {
        $result = $this->calculator->add(0.0001, 0.0002);
        $this->assertEqualsWithDelta(0.0003, $result, 0.0001);
    }
    
    /**
     * Test negative zero
     */
    public function testNegativeZero() {
        $result = $this->calculator->subtract(5, 5);
        $this->assertEquals(0, $result);
    }
    
    /**
     * Test chaining operations
     */
    public function testChainingOperations() {
        $result1 = $this->calculator->add(5, 3);
        $result2 = $this->calculator->multiply($result1, 2);
        $result3 = $this->calculator->subtract($result2, 4);
        $this->assertEquals(12, $result3);
        $this->assertCount(3, $this->calculator->getHistory());
    }
}

/**
 * Integration tests for Calculator
 */
class CalculatorIntegrationTest extends TestCase {
    private $calculator;
    
    protected function setUp(): void {
        $this->calculator = new Calculator();
    }
    
    /**
     * Test complex calculation scenario
     */
    public function testComplexCalculation() {
        // Calculate: ((10 + 5) * 2) / 3 - 5
        $step1 = $this->calculator->add(10, 5);      // 15
        $step2 = $this->calculator->multiply($step1, 2);  // 30
        $step3 = $this->calculator->divide($step2, 3);    // 10
        $step4 = $this->calculator->subtract($step3, 5);  // 5
        
        $this->assertEquals(5, $step4);
        $this->assertCount(4, $this->calculator->getHistory());
    }
    
    /**
     * Test power and square root relationship
     */
    public function testPowerAndSquareRootRelationship() {
        $squared = $this->calculator->power(5, 2);   // 25
        $root = $this->calculator->squareRoot($squared);  // 5
        $this->assertEquals(5, $root);
    }
    
    /**
     * Test history persistence across operations
     */
    public function testHistoryPersistence() {
        $this->calculator->add(1, 2);
        $this->calculator->multiply(3, 4);
        $this->calculator->divide(10, 2);
        $this->calculator->subtract(8, 3);
        $this->calculator->power(2, 3);
        $this->calculator->squareRoot(16);
        
        $history = $this->calculator->getHistory();
        $this->assertCount(6, $history);
    }
}
