"""
Unit Tests for Calculator Module
Tests all mathematical operations and edge cases
"""

import unittest
from calculator import Calculator


class TestCalculator(unittest.TestCase):
    """Test cases for Calculator class"""
    
    def setUp(self):
        """Set up test fixture - called before each test method"""
        self.calc = Calculator()
    
    def tearDown(self):
        """Clean up after each test method"""
        self.calc = None
    
    # ==================== ADDITION TESTS ====================
    
    def test_add_positive_numbers(self):
        """Test addition of two positive numbers"""
        result = self.calc.add(5, 3)
        self.assertEqual(result, 8)
    
    def test_add_negative_numbers(self):
        """Test addition of two negative numbers"""
        result = self.calc.add(-5, -3)
        self.assertEqual(result, -8)
    
    def test_add_with_zero(self):
        """Test addition with zero"""
        result = self.calc.add(5, 0)
        self.assertEqual(result, 5)
    
    def test_add_floating_point(self):
        """Test addition of floating point numbers"""
        result = self.calc.add(2.5, 3.5)
        self.assertAlmostEqual(result, 6.0)
    
    def test_add_mixed_signs(self):
        """Test addition of positive and negative numbers"""
        result = self.calc.add(10, -3)
        self.assertEqual(result, 7)
    
    # ==================== SUBTRACTION TESTS ====================
    
    def test_subtract_positive_numbers(self):
        """Test subtraction of positive numbers"""
        result = self.calc.subtract(10, 3)
        self.assertEqual(result, 7)
    
    def test_subtract_negative_numbers(self):
        """Test subtraction of negative numbers"""
        result = self.calc.subtract(-5, -3)
        self.assertEqual(result, -2)
    
    def test_subtract_with_zero(self):
        """Test subtraction with zero"""
        result = self.calc.subtract(5, 0)
        self.assertEqual(result, 5)
    
    def test_subtract_resulting_negative(self):
        """Test subtraction resulting in negative number"""
        result = self.calc.subtract(3, 10)
        self.assertEqual(result, -7)
    
    def test_subtract_floating_point(self):
        """Test subtraction of floating point numbers"""
        result = self.calc.subtract(5.5, 2.3)
        self.assertAlmostEqual(result, 3.2, places=1)
    
    # ==================== MULTIPLICATION TESTS ====================
    
    def test_multiply_positive_numbers(self):
        """Test multiplication of positive numbers"""
        result = self.calc.multiply(4, 5)
        self.assertEqual(result, 20)
    
    def test_multiply_negative_numbers(self):
        """Test multiplication of two negative numbers"""
        result = self.calc.multiply(-4, -5)
        self.assertEqual(result, 20)
    
    def test_multiply_mixed_signs(self):
        """Test multiplication of positive and negative numbers"""
        result = self.calc.multiply(4, -5)
        self.assertEqual(result, -20)
    
    def test_multiply_by_zero(self):
        """Test multiplication by zero"""
        result = self.calc.multiply(100, 0)
        self.assertEqual(result, 0)
    
    def test_multiply_floating_point(self):
        """Test multiplication of floating point numbers"""
        result = self.calc.multiply(2.5, 4)
        self.assertEqual(result, 10.0)
    
    # ==================== DIVISION TESTS ====================
    
    def test_divide_positive_numbers(self):
        """Test division of positive numbers"""
        result = self.calc.divide(10, 2)
        self.assertEqual(result, 5.0)
    
    def test_divide_negative_numbers(self):
        """Test division of negative numbers"""
        result = self.calc.divide(-10, -2)
        self.assertEqual(result, 5.0)
    
    def test_divide_mixed_signs(self):
        """Test division of positive and negative numbers"""
        result = self.calc.divide(10, -2)
        self.assertEqual(result, -5.0)
    
    def test_divide_by_zero(self):
        """Test division by zero raises ValueError"""
        with self.assertRaises(ValueError) as context:
            self.calc.divide(10, 0)
        self.assertEqual(str(context.exception), "Cannot divide by zero")
    
    def test_divide_floating_point(self):
        """Test division resulting in floating point"""
        result = self.calc.divide(7, 2)
        self.assertEqual(result, 3.5)
    
    def test_divide_zero_by_number(self):
        """Test zero divided by any number"""
        result = self.calc.divide(0, 5)
        self.assertEqual(result, 0.0)
    
    # ==================== POWER TESTS ====================
    
    def test_power_positive_exponent(self):
        """Test power with positive exponent"""
        result = self.calc.power(2, 3)
        self.assertEqual(result, 8)
    
    def test_power_zero_exponent(self):
        """Test power with zero exponent"""
        result = self.calc.power(5, 0)
        self.assertEqual(result, 1)
    
    def test_power_negative_exponent(self):
        """Test power with negative exponent"""
        result = self.calc.power(2, -2)
        self.assertEqual(result, 0.25)
    
    def test_power_fractional_exponent(self):
        """Test power with fractional exponent"""
        result = self.calc.power(4, 0.5)
        self.assertEqual(result, 2.0)
    
    def test_power_negative_base(self):
        """Test power with negative base"""
        result = self.calc.power(-2, 3)
        self.assertEqual(result, -8)
    
    # ==================== SQUARE ROOT TESTS ====================
    
    def test_square_root_positive_number(self):
        """Test square root of positive number"""
        result = self.calc.square_root(16)
        self.assertEqual(result, 4.0)
    
    def test_square_root_zero(self):
        """Test square root of zero"""
        result = self.calc.square_root(0)
        self.assertEqual(result, 0.0)
    
    def test_square_root_negative_number(self):
        """Test square root of negative number raises ValueError"""
        with self.assertRaises(ValueError) as context:
            self.calc.square_root(-4)
        self.assertEqual(str(context.exception), 
                        "Cannot calculate square root of negative number")
    
    def test_square_root_perfect_square(self):
        """Test square root of perfect square"""
        result = self.calc.square_root(25)
        self.assertEqual(result, 5.0)
    
    def test_square_root_non_perfect_square(self):
        """Test square root of non-perfect square"""
        result = self.calc.square_root(2)
        self.assertAlmostEqual(result, 1.414, places=3)
    
    # ==================== HISTORY TESTS ====================
    
    def test_history_records_operations(self):
        """Test that operations are recorded in history"""
        self.calc.add(5, 3)
        self.calc.subtract(10, 2)
        history = self.calc.get_history()
        self.assertEqual(len(history), 2)
        self.assertIn("5 + 3 = 8", history)
        self.assertIn("10 - 2 = 8", history)
    
    def test_history_initially_empty(self):
        """Test that history is empty on initialization"""
        history = self.calc.get_history()
        self.assertEqual(len(history), 0)
        self.assertEqual(history, [])
    
    def test_clear_history(self):
        """Test clearing calculation history"""
        self.calc.add(5, 3)
        self.calc.multiply(2, 4)
        self.calc.clear_history()
        history = self.calc.get_history()
        self.assertEqual(len(history), 0)
    
    def test_history_multiple_operations(self):
        """Test history with multiple different operations"""
        self.calc.add(1, 2)
        self.calc.multiply(3, 4)
        self.calc.divide(10, 2)
        history = self.calc.get_history()
        self.assertEqual(len(history), 3)
    
    # ==================== EDGE CASES ====================
    
    def test_large_numbers(self):
        """Test operations with large numbers"""
        result = self.calc.add(1000000, 2000000)
        self.assertEqual(result, 3000000)
    
    def test_very_small_decimals(self):
        """Test operations with very small decimal numbers"""
        result = self.calc.add(0.0001, 0.0002)
        self.assertAlmostEqual(result, 0.0003, places=4)
    
    def test_chained_operations(self):
        """Test multiple chained operations"""
        result1 = self.calc.add(5, 3)
        result2 = self.calc.multiply(result1, 2)
        result3 = self.calc.subtract(result2, 4)
        self.assertEqual(result3, 12)
        self.assertEqual(len(self.calc.get_history()), 3)


class TestCalculatorIntegration(unittest.TestCase):
    """Integration tests for Calculator class"""
    
    def test_calculator_workflow(self):
        """Test complete calculator workflow"""
        calc = Calculator()
        
        # Perform multiple operations
        calc.add(10, 5)
        calc.subtract(20, 8)
        calc.multiply(4, 3)
        calc.divide(100, 4)
        calc.power(2, 4)
        calc.square_root(16)
        
        # Verify history
        history = calc.get_history()
        self.assertEqual(len(history), 6)
        
        # Clear and verify
        calc.clear_history()
        self.assertEqual(len(calc.get_history()), 0)


if __name__ == '__main__':
    # Run tests with verbose output
    unittest.main(verbosity=2)
