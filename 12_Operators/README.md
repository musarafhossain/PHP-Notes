# 🧮 Operators

---

## 🔢 Arithmatic/Math Operators

| Operators | Meaning      | Example | Result |
|-----------|--------------|---------|--------|
| `+`       | Addition     | 5 + 2   | 7      |
| `-`       | Subtraction  | 5 - 2   | 3      |
| `*`       | Multiplication | 5 * 2 | 10     |
| `/`       | Division     | 10 / 2  | 5      |
| `%`       | Modulus      | 5 % 2   | 1      |

---

### 💻 Code Example:
```php
<?php
    echo 5 + 2;  // 7
    echo 5 - 2;  // 3
    echo 5 * 2;  // 10
    echo 10 / 2; // 5
    echo 5 % 2;  // 1
?>
```

---

## 📝 Assignment Operators

This operator is used to assign value to a variable.

**Example:**
```php
$price = 25.36;
$name = "Musaraf";
$ram = $shyam = $rohan = 10;
```

---

| Operators | Example | Equivalent Expression (`m = 15`) | Result |
|-----------|---------|-------------------------|--------|
| `+=`      | `m += 10` | `m = m + 10`             | 25     |
| `-=`      | `m -= 5`  | `m = m - 5`              | 10     |
| `*=`      | `m *= 2`  | `m = m * 2`              | 30     |
| `/=`      | `m /= 5`  | `m = m / 5`              | 3      |
| `%=`      | `m %= 4`  | `m = m % 4`              | 3      |

---

### 💻 Code Example:
```php
<?php
    $m = 15;
    $m += 10;
    echo $m; // 25
?>
```

---

## 🔍 Relational/Comparison Operators

| Operators | Meaning               | Example    | Result |
|-----------|------------------------|------------|--------|
| `<`       | Less than              | 5 < 2      | False  |
| `>`       | Greater than           | 5 > 2      | True 1 |
| `<=`      | Less than or equal to  | 5 <= 5     | True 1 |
| `>=`      | Greater than or equal to | 5 >= 6   | False  |
| `==`      | Equal to (loose)       | 5 == "5"   | True 1  |
| `!=`      | Not equal              | 5 != 2     | True 1  |
| `===`     | Identical (type + value) | 5 === "5" | False  |
| `<>`      | Not equal (alt)        | 5 <> 6     | True   |
| `!==`     | Not identical          | 5 !== "5"  | True   |
| `<=>`     | Spaceship (PHP 7+)     | 5 <=> 6    | -1 (It returns -1, 0 or 1 when \$a is respectively less than, equal to, or greater than $b)    |

---

### 💻 Code Example:
```php
<?php
    echo 5 < 2;    // false
    echo 5 > 2;    // true
    echo 5 == "5"; // true
    echo 5 === "5"; // false
?>
```

---

## 🧠 Logical Operators

| Operators | Meaning      | Example               | Result |
|-----------|--------------|------------------------|--------|
| `&&`      | Logical AND  | (5<2)&&(5>3)           | False  |
| `\|\|`      | Logical OR   | (5<2)\|\|(5>3)           | True   |
| `!`       | Logical NOT  | !(5==5)                | False  |
| `and`     | Logical AND  | $a = true and false    | false  |
| `or`      | Logical OR   | $a = false or true     | true   |
| `xor`     | Logical XOR  | true xor true          | false  |

---

### 💻 Code Example:
```php
<?php
    echo (5 < 2) && (5 > 3); // false
    echo (5 < 2) || (5 > 3); // true
?>
```

---

## 🔄 Increment and Decrement Operators

| Operators | Meaning |
|-----------|---------|
| `++$a`    | Increment `$a` by 1, then use the new value |
| `$a++`    | Use value of `$a`, then increment by 1 |
| `--$b`    | Decrement `$b` by 1, then use it |
| `$b--`    | Use value of `$b`, then decrement |

---

### 💻 Code Example:
```php
<?php
    $a = 5;
    echo ++$a; // 6
    echo $a++; // 6
    echo $a;   // 7
?>
```

---

## 🔗 String Operators

- `.`   → Concatenation  
- `.=` → Combined Concatenation (append)

---

### 💻 Code Example:
```php
<?php
    $name = "Musaraf";
    $name .= "Hossain";
    echo $name; // MusarafHossain
?>
```

---

## 🧮 Bitwise Operators

Bitwise operators operate on bits and perform bit-by-bit operations.

| Operators | Meaning                  |
|-----------|--------------------------|
| `<<`      | Shift bits left          |
| `>>`      | Shift bits right         |
| `~`       | Bitwise NOT              |
| `&`       | Bitwise AND              |
| `\|`       | Bitwise OR               |
| `^`       | Bitwise XOR              |

---

### 💻 Code Example:
```php
<?php
    echo 5 << 1; // 10
    echo 5 >> 1; // 2
?>
```

---

## 📊 Operator Precedence

The **precedence** of an operator specifies how "tightly" it binds two expressions together.

<div style="background-color: #f5f5dc; display: inline-block; padding: 10px;">
  <img src="/12_Operators/image.png" alt="Operator Precedence Table" style="display: block;">
</div>
