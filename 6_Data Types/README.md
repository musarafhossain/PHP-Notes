# 🧾 Data Types

In other language, you need to specify the exact data format of each variable, but PHP handles that for you.

---

### 🔢 Integer  
It can hold whole number.  
**Ex:** `12`, `0`, `-34`  
```php
$age = 12;
$score = -34;
```

---

### 💧 Float/Double  
It can hold floating point number.  
**Ex:** `25.2654`, `2.12`  
```php
$price = 25.2654;
$rating = 2.12;
```

---

### 📝 String  
It can hold text or group of characters.  
**Ex:** `"Musaraf Hossain"`  
```php
$name = "Musaraf Hossain";
```

---

### ⚙️ Boolean  
It can hold true/false value.  
```php
$isActive = true;
$isDeleted = false;
```

---

### 🗂️ Array  
It can hold multiple values in one single variable.  
```php
$colors = array("Red", "Green", "Blue");
```

---

### 🧱 Object  
It can hold programming objects.  
```php
class Car {
  public $brand = "Toyota";
}
$myCar = new Car();
```

---

### 🔗 Resource  
It is special variable that hold references to resources external to PHP.  
```php
$file = fopen("data.txt", "r");
```

---

### 🚫 NULL  
It can hold only one value – NULL.  
```php
$nothing = NULL;
```