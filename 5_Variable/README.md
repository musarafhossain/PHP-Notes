# 🧮 Variable

- Variables are containers which is used to store information.

---

### 🔹 Type of Variables:  
- Local Variable  
- Global Variable  
- Static Variable  

---

## 🏷️ Variable Declaration  

In PHP, variable names begin with `$` sign, followed by a name.  
Ex: –  
```php
$roll  
$price  
$name
```

---

## 📜 Rules

- Variable starts with `$` sign.  
- Variable name only starts with a letter, an underscore (`_`).  
- Variable name cannot start with a number.  
- It is case sensitive which implies that the variable `num` in lowercase is different from variable `NUM` in uppercase.  
- Do not use Predefined constant name e.g. `PHP_VERSION`, `PHP_OS` etc.  
- Do not use reserved keywords. e.g. `else`, `if` etc.  

---

## 🚀 Variable Initialization

- PHP can store all type of data in variables. Before using a variable in PHP, assign a value to it so PHP will create that variable and store data in it. That means we have to assign data to a variable before attempting to read a variable’s value.  
- Ex: –  
```php
$roll = 256; 
$price = 25.50;  
$name = “Musaraf Hossain”;
```  

> **Note** – If a variable is created without a value, it is automatically assigned a value of `NULL`.