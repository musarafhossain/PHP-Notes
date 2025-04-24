# 🧵 String Interpolation in PHP

**String interpolation** allows you to insert the value of a variable directly inside a **double-quoted string** in PHP.

---

### 📌 Example 1:
```php
<?php
    $value = 10;
    echo "Value is: ", $value;
?>
```

**🔸 Output:**
```
Value is: 10
```

---

### 📌 Example 2:
```php
<?php
    $value = 10;
    echo "Value is: $value";
?>
```

**🔸 Output:**
```
Value is: 10
```

---

## 📏 Rules of String Interpolation

---

### 1. ✅ **Surround variable names with space or use curly braces**

#### ✔ Good:
```php
<?php
    $value = 10;
    echo "$value is good price of the product";
?>
```

**🔸 Output:**
```
10 is good price of the product
```

#### ❌ Bad:
```php
<?php
    $value = 10;
    echo "$valueis good price of the product";
?>
```

**🔸 Output:**
```
 is good price of the product
```
(PHP looks for a variable named `$valueis`, which is undefined.)

---

### 2. ⚠ **When variables are followed by text, use curly braces**

#### ✔ Correct:
```php
<?php
    $name = "Musaraf";
    echo "$name Hossain";
    echo "{$name}Hossain";
?>
```

**🔸 Output:**
```
Musaraf HossainMusarafHossain
```

#### ❌ Incorrect:
```php
<?php
    $name = "Musaraf";
    echo "$nameHossain";
?>
```

**🔸 Output:**
```
 (empty or undefined variable: $nameHossain)
```

---

### 3. ❌ **Avoid Single Quotes for Interpolation**

#### 🚫 Single quotes do **not** interpolate:
```php
<?php
    $value = 10;
    echo 'Apple Price $value';
?>
```

**🔸 Output:**
```
Apple Price $value
```

---

### 💡 Escaping `$` with Backslash

```php
<?php
    $value = 10;
    echo "$value Apple Price \$ten";
?>
```

**🔸 Output:**
```
10 Apple Price $ten
```