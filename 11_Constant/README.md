# 🔒 Constant

Whose value can’t be modified.  
`define()` function is used to create a constant.

---

### 🔧 Syntax:
```php
define (“constant_variable”, value, case-insensitive);
```

---

### 📌 Example:
```php
define (“pi”, 3.141592);              // Here “pi” is case-sensitive
define (“pi”, 3.141592, TRUE);        // Here “pi” is non-case-sensitive
define (“site”, “MusarafHossain”);
```

---

```php
<?php
    define(“pi”, 3.141592, TRUE);
    echo PI;
    echo pi;
    echo “Value of PI is ”, pi;
?>
```

### 🖨 Output:
```
3.141592
3.141592
Value of PI is 3.141592
```

---

## 📜 Rules

- No need to start constant variable name with `$` sign.  
- Name only starts with a letter and an underscore (`_`).  
- Variable name cannot start with a number.  
- It is **case sensitive**, which implies that the variable `num` in lowercase is different from variable `NUM` in uppercase. But we can make it case insensitive.  
- Constants are automatically **global** and can be used across the entire script.  
- Can’t use **Predefined constant names** e.g., `PHP_VERSION`, `PHP_OS` etc.  
- Can’t use **reserved keywords**, e.g., `else`, `if` etc.
