# Loops

## while Loop

The `while` loop keeps repeating an action until an associated condition returns false.

**Syntax:**
```php
initialization;
while (condition) {
    block of statement;
    increment/decrement;
}
```

or
```php
initialization;
while (condition) :
    block of statement;
    increment/decrement;
endwhile;
```

![Flowchart](/14_Loops/while.png)

### Code Example
```php
$i = 1;
while ($i <= 5) {
    echo $i . " ";
    $i++;
}
```

**Output:**
```
1 2 3 4 5
```

---

### Nested while Loop

```php
$i = 1;
while ($i <= 3) {
    $j = 1;
    while ($j <= 2) {
        echo "($i, $j) ";
        $j++;
    }
    $i++;
}
```

**Output:**
```
(1, 1) (1, 2) (2, 1) (2, 2) (3, 1) (3, 2)
```

---

## do…while Loop

The `do while` loop is similar to the `while` loop, but the condition is checked **after** the loop body is executed. This ensures that the loop body runs **at least once**.

**Syntax:**
```php
initialization;
do {
    block of statements;
    increment/decrement;
} while (condition);
```

![Flowchart](/14_Loops/do-while.png)

### Code Example
```php
$i = 1;
do {
    echo $i . " ";
    $i++;
} while ($i <= 5);
```

**Output:**
```
1 2 3 4 5
```

---

## for Loop

The `for` loop is frequently used, especially where the loop will run a **fixed number of times**.

**Syntax:**
```php
for (initialization; test condition; increment/decrement) {
    block of statements;
}
```

or
```php
for (initialization; test condition; increment/decrement) :
    block of statements;
endfor;
```

![Flowchart](/14_Loops/for.png)

### Code Example
```php
for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}
```

**Output:**
```
1 2 3 4 5
```

---

### Nested for Loop

The statement block of a `for` loop lies completely inside the block of another loop.

```php
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 2; $j++) {
        echo "($i, $j) ";
    }
}
```

**Output:**
```
(1, 1) (1, 2) (2, 1) (2, 2) (3, 1) (3, 2)
```

---

## break Statement

This statement is used to **exit** a loop or switch block **immediately**.

### Example
```php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break;
    }
    echo $i . " ";
}
```

**Output:**
```
1 2 3 4
```

---

## continue Statement

This statement is used to **skip** the current iteration of a loop.

### Example
```php
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;
    }
    echo $i . " ";
}
```

**Output:**
```
1 2 4 5
```