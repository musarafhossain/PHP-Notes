# **Chapter 2: Operators and Expressions in PHP**  

## **2.1 Introduction to Operators**
Operators are symbols that perform operations on variables and values. PHP supports several types of operators, which can be classified as:

1. **Arithmetic Operators**
2. **Assignment Operators**
3. **Comparison Operators**
4. **Logical Operators**
5. **Bitwise Operators**
6. **Increment/Decrement Operators**
7. **Ternary Operator**
8. **String Operators**

---

## **2.2 Arithmetic Operators**
Used for mathematical calculations.

| Operator | Description  | Example (`$a = 10`, `$b = 5`) | Output |
|----------|-------------|-------------------------------|--------|
| `+`      | Addition    | `$a + $b`                     | `15`   |
| `-`      | Subtraction | `$a - $b`                     | `5`    |
| `*`      | Multiplication | `$a * $b`                  | `50`   |
| `/`      | Division    | `$a / $b`                     | `2`    |
| `%`      | Modulus (Remainder) | `$a % $b`            | `0`    |
| `**`     | Exponentiation | `$a ** $b` (10^5)         | `100000` |

### **Example:**
```php
$a = 10;
$b = 5;
echo $a + $b;  // Output: 15
echo $a % $b;  // Output: 0
```

---

## **2.3 Assignment Operators**
Used to assign values to variables.

| Operator | Description       | Example (`$a = 10`) | Equivalent To |
|----------|------------------|-------------------|---------------|
| `=`      | Assign value     | `$a = 10`        | `$a = 10` |
| `+=`     | Add & Assign     | `$a += 5`        | `$a = $a + 5` |
| `-=`     | Subtract & Assign | `$a -= 5`       | `$a = $a - 5` |
| `*=`     | Multiply & Assign | `$a *= 2`       | `$a = $a * 2` |
| `/=`     | Divide & Assign   | `$a /= 2`       | `$a = $a / 2` |
| `%=`     | Modulus & Assign  | `$a %= 3`       | `$a = $a % 3` |

### **Example:**
```php
$a = 10;
$a += 5; // Equivalent to $a = $a + 5
echo $a; // Output: 15
```

---

## **2.4 Comparison Operators**
Used to compare values and return `true` or `false`.

| Operator | Description          | Example (`$a = 10`, `$b = 5`) | Output |
|----------|----------------------|-------------------------------|--------|
| `==`     | Equal                | `$a == $b`                     | `false` |
| `===`    | Identical (Same value & type) | `$a === "10"` | `false` |
| `!=`     | Not equal            | `$a != $b`                     | `true`  |
| `<>`     | Not equal            | `$a <> $b`                     | `true`  |
| `!==`    | Not identical        | `$a !== "10"`                  | `true`  |
| `>`      | Greater than         | `$a > $b`                      | `true`  |
| `<`      | Less than            | `$a < $b`                      | `false` |
| `>=`     | Greater than or equal | `$a >= 10`                     | `true`  |
| `<=`     | Less than or equal   | `$a <= 5`                      | `false` |

### **Example:**
```php
$a = 10;
$b = "10";

echo ($a == $b);  // Output: true (Only compares values)
echo ($a === $b); // Output: false (Compares value and type)
```

---

## **2.5 Logical Operators**
Used to combine multiple conditions.

| Operator | Description | Example (`$x = true`, `$y = false`) | Output |
|----------|------------|-------------------------------------|--------|
| `&&`     | AND (Both true) | `$x && $y` | `false` |
| `||`     | OR (At least one true) | `$x || $y` | `true` |
| `!`      | NOT (Negate condition) | `!$x` | `false` |

### **Example:**
```php
$x = true;
$y = false;

echo ($x && $y);  // Output: false
echo ($x || $y);  // Output: true
echo !$x;         // Output: false
```

---

## **2.6 Bitwise Operators**
Used for bit-level operations.

| Operator | Description | Example (`$a = 5`, `$b = 3`) | Output |
|----------|------------|-----------------------------|--------|
| `&`      | AND | `$a & $b` | `1` |
| `|`      | OR  | `$a | $b` | `7` |
| `^`      | XOR | `$a ^ $b` | `6` |
| `~`      | NOT | `~$a` | `-6` |
| `<<`     | Left Shift | `$a << 1` | `10` |
| `>>`     | Right Shift | `$a >> 1` | `2` |

### **Example:**
```php
$a = 5;  // 101 in binary
$b = 3;  // 011 in binary

echo $a & $b; // Output: 1 (001 in binary)
echo $a | $b; // Output: 7 (111 in binary)
```

---

## **2.7 Increment/Decrement Operators**
Used to increase or decrease a variable’s value.

| Operator | Description | Example (`$a = 5`) | Output |
|----------|------------|---------------|--------|
| `++$a`   | Pre-increment | `++$a` | `6` |
| `$a++`   | Post-increment | `$a++` | `5` (then `6`) |
| `--$a`   | Pre-decrement | `--$a` | `4` |
| `$a--`   | Post-decrement | `$a--` | `5` (then `4`) |

### **Example:**
```php
$a = 5;
echo ++$a; // Output: 6
echo $a--; // Output: 6 (then $a becomes 5)
```

---

## **2.8 Ternary Operator**
A shorthand for `if-else`.

**Syntax:**
```php
condition ? true_value : false_value;
```

### **Example:**
```php
$age = 18;
$result = ($age >= 18) ? "Adult" : "Minor";
echo $result; // Output: Adult
```

---

## **2.9 String Operators**
Used for working with strings.

| Operator | Description | Example (`$a = "Hello"`, `$b = "World"`) | Output |
|----------|------------|------------------------------------------|--------|
| `.`      | Concatenation | `$a . " " . $b` | `"Hello World"` |
| `.= `    | Append       | `$a .= " PHP"` | `"Hello PHP"` |

### **Example:**
```php
$a = "Hello";
$a .= " World";
echo $a; // Output: Hello World
```

---

## **2.10 Conclusion**
In this chapter, we learned about different types of operators in PHP:
- Arithmetic, Assignment, Comparison, Logical, Bitwise
- Increment/Decrement, Ternary, and String Operators.