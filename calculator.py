"""
Simple Calculator Module
Provides basic mathematical operations
"""

class Calculator:
    """A simple calculator class with basic mathematical operations"""
    
    def __init__(self):
        """Initialize calculator with history tracking"""
        self.history = []
    
    def add(self, a, b):
        """
        Add two numbers
        Args:
            a: First number
            b: Second number
        Returns:
            Sum of a and b
        """
        result = a + b
        self.history.append(f"{a} + {b} = {result}")
        return result
    
    def subtract(self, a, b):
        """
        Subtract b from a
        Args:
            a: First number
            b: Second number
        Returns:
            Difference of a and b
        """
        result = a - b
        self.history.append(f"{a} - {b} = {result}")
        return result
    
    def multiply(self, a, b):
        """
        Multiply two numbers
        Args:
            a: First number
            b: Second number
        Returns:
            Product of a and b
        """
        result = a * b
        self.history.append(f"{a} * {b} = {result}")
        return result
    
    def divide(self, a, b):
        """
        Divide a by b
        Args:
            a: Numerator
            b: Denominator
        Returns:
            Quotient of a and b
        Raises:
            ValueError: If b is zero
        """
        if b == 0:
            raise ValueError("Cannot divide by zero")
        result = a / b
        self.history.append(f"{a} / {b} = {result}")
        return result
    
    def power(self, base, exponent):
        """
        Calculate power of a number
        Args:
            base: Base number
            exponent: Exponent value
        Returns:
            base raised to the power of exponent
        """
        result = base ** exponent
        self.history.append(f"{base} ^ {exponent} = {result}")
        return result
    
    def square_root(self, number):
        """
        Calculate square root of a number
        Args:
            number: Number to calculate square root
        Returns:
            Square root of the number
        Raises:
            ValueError: If number is negative
        """
        if number < 0:
            raise ValueError("Cannot calculate square root of negative number")
        result = number ** 0.5
        self.history.append(f"√{number} = {result}")
        return result
    
    def get_history(self):
        """
        Get calculation history
        Returns:
            List of calculation history
        """
        return self.history
    
    def clear_history(self):
        """Clear calculation history"""
        self.history = []
