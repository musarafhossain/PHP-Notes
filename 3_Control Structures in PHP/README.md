# **Chapter 3: Control Structures in PHP**  

## **3.1 Introduction to Control Structures**
Control structures determine the flow of execution in a PHP program. They help in decision-making and executing blocks of code repeatedly. The main control structures in PHP are:

1. **Conditional Statements** (If-Else, Switch)
2. **Loops** (For, While, Do-While, Foreach)
3. **Jump Statements** (Break, Continue)

---

## **3.2 If-Else Statements**
The `if` statement allows conditional execution of a block of code.

### **Syntax:**
```php
if (condition) {
    // Code executed if condition is true
}
```

### **If-Else Example:**
```php
$age = 18;
if ($age >= 18) {
    echo "You are an adult.";
} else {
    echo "You are a minor.";
}
```
**Output:** `You are an adult.`

---

### **3.2.1 Elseif Statement**
Used when there are multiple conditions to check.

### **Syntax:**
```php
if (condition1) {
    // Code executed if condition1 is true
} elseif (condition2) {
    // Code executed if condition2 is true
} else {
    // Code executed if none of the conditions are true
}
```

### **Example:**
```php
$marks = 85;
if ($marks >= 90) {
    echo "Grade: A";
} elseif ($marks >= 80) {
    echo "Grade: B";
} elseif ($marks >= 70) {
    echo "Grade: C";
} else {
    echo "Grade: F";
}
```
**Output:** `Grade: B`

---

## **3.3 Switch Statement**
The `switch` statement is used to execute one block of code based on the value of a variable.

### **Syntax:**
```php
switch (variable) {
    case value1:
        // Code to execute if variable == value1
        break;
    case value2:
        // Code to execute if variable == value2
        break;
    default:
        // Code to execute if no cases match
}
```

### **Example:**
```php
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start of the work week!";
        break;
    case "Friday":
        echo "Weekend is near!";
        break;
    default:
        echo "Have a great day!";
}
```
**Output:** `Start of the work week!`

---

## **3.4 Loops in PHP**
Loops execute a block of code multiple times.

### **Types of Loops:**
1. **For Loop**
2. **While Loop**
3. **Do-While Loop**
4. **Foreach Loop** (for arrays)

---

## **3.4.1 For Loop**
The `for` loop is used when the number of iterations is known.

### **Syntax:**
```php
for (initialization; condition; increment/decrement) {
    // Code to execute
}
```

### **Example:**
```php
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}
```
**Output:**
```
Number: 1
Number: 2
Number: 3
Number: 4
Number: 5
```

---

## **3.4.2 While Loop**
The `while` loop executes a block of code **as long as the condition is true**.

### **Syntax:**
```php
while (condition) {
    // Code to execute
}
```

### **Example:**
```php
$x = 1;
while ($x <= 5) {
    echo "Number: $x <br>";
    $x++;
}
```
**Output:** Same as `for` loop.

---

## **3.4.3 Do-While Loop**
The `do-while` loop **executes at least once**, even if the condition is false.

### **Syntax:**
```php
do {
    // Code to execute
} while (condition);
```

### **Example:**
```php
$y = 1;
do {
    echo "Number: $y <br>";
    $y++;
} while ($y <= 5);
```
**Output:** Same as `for` loop.

---

## **3.4.4 Foreach Loop (for Arrays)**
The `foreach` loop is used to iterate over arrays.

### **Syntax:**
```php
foreach ($array as $value) {
    // Code to execute
}
```

### **Example:**
```php
$colors = ["Red", "Green", "Blue"];
foreach ($colors as $color) {
    echo "Color: $color <br>";
}
```
**Output:**
```
Color: Red
Color: Green
Color: Blue
```

---

## **3.5 Break and Continue Statements**
Used to control loop execution.

### **Break Statement**
- Stops execution of the loop.
- Used inside `for`, `while`, `do-while`, and `switch`.

```php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        break;
    }
    echo "Number: $i <br>";
}
```
**Output:**
```
Number: 1
Number: 2
```

---

### **Continue Statement**
- Skips the rest of the current iteration and moves to the next.

```php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;
    }
    echo "Number: $i <br>";
}
```
**Output:**
```
Number: 1
Number: 2
Number: 4
Number: 5
```

---

## **3.6 Conclusion**
In this chapter, we covered:
- **Conditional Statements** (`if-else`, `switch`)
- **Loops** (`for`, `while`, `do-while`, `foreach`)
- **Jump Statements** (`break`, `continue`)