# Conditional Statement

## if statement

It is used to execute an instruction or block of instructions only if a condition is fulfilled or True.  
Syntax:
```php
if (condition/expression)
   statement;
```

If more than one statement:
```php
if (condition/expression) {
    block of statements;
}
```
`or`
```php
if (condition/expression) :
    block of statements;
endif;
```

### Nested if statement
```php
if (condition) {
    block of statements;
    if (condition) {
        block of statements;
    }
    if (condition) {
        block of statements;
    }
}

if (condition) {
    block of statements;
}
```
`or`
```php
if (condition) :
    block of statements;
    if (condition) :
        block of statements;
    endif;

    if (condition) :
        block of statements;
    endif;
endif;

if (condition) :
    block of statements;
endif;
```

### If statement with logical operator
```php
if ( (condition1) && (condition2) ) {
   block of statements;
}
```

### Realworld Example
```php
$age = 22;
if ($age >= 18) {
    echo "You are eligible to vote.";
}
```

**Output:**
```
You are eligible to vote.
```

---

## If else statement

`if… else` is used when a different sequence of instructions is to be executed depending on the logical value(True/False) of the condition.  
Syntax:
```php
if (condition)
    statement_1;
else
    statement_2;
Statement_3;
```

`or`

```php
if (condition) {
     Block of Statement ;
} else {
     Block of Statement ;
}
Statement_3;
```

### Nested if else statement
```php
if (condition_1) {
    if (condition_2) {
        statements_1_Block;
    } else {
        statements_2_Block;
    }
} else {
    statements_3_Block;
}
Statements_4_Block;
```

`or`
```php
if (condition_1) :
    if (condition_2) :
        statements_1_Block;
    else :
        statements_2_Block;
    endif;
else :
    statements_3_Block;
endif;
Statements_4_Block;
```

### Realworld Example
```php
$marks = 85;
if ($marks >= 90) {
    echo "Grade: A";
} else if ($marks >= 75) {
    echo "Grade: B";
} else {
    echo "Grade: C";
}
```

**Output:**
```
Grade: B
```

---

## else if statement

To show a multi-way decision based on several conditions, we use `else if`.

```php
if (condition_1) {
    statements_1_Block;
} elseif (condition_2) {
    statement_2_Blocks;
} elseif (condition_n) {
    statements_n_Block;
} else {
    statements_x;
}
```

`or`
```php
if (condition_1) :
    statements_1_Block;

elseif (condition_2) :
    statement_2_Blocks;

elseif (condition_n) :
    statements_n_Block;

else :
    statements_x;
endif;
```

### Realworld Example
```php
$day = 4;
if ($day == 1) {
    echo "Monday";
} elseif ($day == 2) {
    echo "Tuesday";
} elseif ($day == 3) {
    echo "Wednesday";
} else {
    echo "Other Day";
}
```

**Output:**
```
Other Day
```

---

## Ternary or Conditional Operator

It works similar as `if else`.  
Syntax:
```php
Variable = Condition ? Expression1 : Expression2;
```
If Condition is `True` → returns `Expression1`  
If Condition is `False` → returns `Expression2`  
Ex:
```php
$result = (5 > 1) ? "Greater" : "Less";
```

### Realworld Example
```php
$age = 15;
echo ($age >= 18) ? "Adult" : "Minor";
```

**Output:**
```
Minor
```

---

## Switch Statement

Check several possible constant values for an expression.

```php
switch(expression) {
    case expression1:
        block of statements 1;
        break;
    case expression2:
        block of statements 2;
        break;
    ...
    default:
        default block of instructions;
}
```

`or`
```php
switch(expression) :
    case expression1:
        block of statements 1;
        break;
    case expression2:
        block of statements 2;
        break;
    ...
    default:
        default block of instructions;
endswitch;
```

### Realworld Example
```php
$fruit = "apple";
switch ($fruit) {
    case "banana":
        echo "It's banana.";
        break;
    case "apple":
        echo "It's apple.";
        break;
    default:
        echo "Unknown fruit.";
}
```

**Output:**
```
It's apple.
```