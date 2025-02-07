# **Chapter 4: Functions in PHP**  

## **4.1 Introduction to Functions**
A function is a reusable block of code that performs a specific task. Functions **reduce redundancy** and make code **modular and maintainable**.

### **Advantages of Using Functions**
✅ Code Reusability  
✅ Better Code Organization  
✅ Easier Debugging and Maintenance  

There are **two types** of functions in PHP:
1. **Built-in Functions** (e.g., `strlen()`, `date()`, `array_push()`)
2. **User-defined Functions** (created by the programmer)

---

## **4.2 User-Defined Functions**
You can define your own functions using the `function` keyword.

### **Syntax:**
```php
function functionName() {
    // Code to execute
}
```

### **Example:**
```php
function greet() {
    echo "Hello, Welcome to PHP!";
}
greet(); // Output: Hello, Welcome to PHP!
```

---

## **4.3 Function with Parameters**
Functions can accept **parameters** (values passed into the function).

### **Syntax:**
```php
function functionName($param1, $param2) {
    // Code using $param1 and $param2
}
```

### **Example:**
```php
function addNumbers($a, $b) {
    echo $a + $b;
}
addNumbers(5, 10); // Output: 15
```

---

## **4.4 Function with Return Value**
A function can return a value using the `return` keyword.

### **Example:**
```php
function multiply($x, $y) {
    return $x * $y;
}
$result = multiply(4, 5);
echo "Multiplication Result: " . $result; // Output: 20
```

---

## **4.5 Default Arguments**
A function can have **default parameter values**, used if no value is passed.

### **Example:**
```php
function greet($name = "Guest") {
    echo "Hello, $name!";
}
greet();         // Output: Hello, Guest!
greet("John");   // Output: Hello, John!
```

---

## **4.6 Variable-Length Arguments (`...` Operator)**
PHP allows functions to accept **any number of arguments** using the `...` (spread operator).

### **Example:**
```php
function sum(...$numbers) {
    return array_sum($numbers);
}
echo sum(10, 20, 30, 40); // Output: 100
```

---

## **4.7 Recursive Functions**
A **recursive function** is a function that calls itself until a **base condition** is met.

### **Example: Factorial Calculation**
```php
function factorial($n) {
    if ($n == 0) {
        return 1;
    }
    return $n * factorial($n - 1);
}
echo factorial(5); // Output: 120
```

---

## **4.8 Conclusion**
In this chapter, we covered:
- **User-defined functions**
- **Functions with parameters and return values**
- **Default and variable arguments**
- **Recursive functions**