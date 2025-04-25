# Arrays

- Arrays are collections of data items stored under a single name. 
- Arrays provide a mechanism for declaring and accessing several data items with only one identifier, thereby simplifying the task of data management. 
- We use arrays when we have to deal with multiple data items.

## Types of Arrays

### 1. Numeric/Indexed Array
In this array, index will be represented by a number. By default, numeric array index starts from 0.

**Example:**  
`$num[0] = "Rahul";`

### 2. Associative Array
In this array, index/key will be represented by a string.

**Example:**  
`$fees["Rahul"] = 500;`

### 3. Multidimensional Array
Arrays of Arrays are known as multidimensional arrays.

**Example:**  
`$num[0][0] = 25;`

---

## Numeric Array

### Declaration and Initialization

**Syntax 1:**  
`$array_name[0] = value;`

**Example:**  
```php
$name[0] = "Musaraf Hosssain";
$num[0] = 25;
```

**Syntax 2:**  
`$array_name[] = value;`

**Example:**  
```php
$name[] = "Musaraf Hosssain";
$num[] = 25;
```

**Note:** By default, array starts with index 0.

**Examples:**
```php
$name[0] = "Rahul";
$name[1] = "Sonam";
$name[2] = "Sumit";
$name[3] = "Priti";

// OR
$name[] = "Rahul";
$name[] = "Sonam";
$name[] = "Sumit";
$name[] = "Priti";
```

### Array Function
`array()` function is used to create array.

**Syntax:**  
`$array_name = array("Value1", "Value2", "Value3", ...);`

**Example:**  
```php
$name = array("Rahul", "Sonam", "Sumit", "Priti", "Sameer");
```

**Note:** By default, array starts with index 0.

### => Operator
The `=>` operator lets you create key/index-value pairs in arrays.

**Examples:**
```php
$name = array(1 => "Rahul", "Sonam", "Sumit", "Priti");
$name = array(1 => "Rahul", 4 => "Sonam", 6 => "Sumit", 7 => "Priti");
```

### for loop with Numeric Array
```php
<?php
    $name[0] = "Rahul";
    $name[1] = "Sonam";
    $name[2] = "Sumit";
    $name[3] = "Priti";
    for($i = 0; $i<=3; $i++) {
        echo $name[$i], "<br />";
    }
?>
```

---

## Associative Array

### Declaration and Initialization

**Syntax:**  
`$array_name["Key"] = value;`

**Example:**  
`$fees["Rahul"] = 500;`  
*(Note: "Rahul" is case sensitive)*

**Example:**
```php
$fees["Rahul"] = 500;
$fees["Sonam"] = 300;
$fees["Sumit"] = 600;
$fees["Priti"] = 700;
```

### Array Function
`array()` function is used to create array.

**Syntax:**  
`$array_name = array("key1" => Value1, "key2" => Value2, ...);`

**Example:**  
```php
$fees = array("Rahul" => 500, "Sonam" => 300, "Sumit" => 600, "Priti" => 700);
```

### Modifying Array Element
```php
$name[0] = "Rahul";
$name[1] = "Sonam";
$name[2] = "Sumit";
$name[3] = "Priti";
echo $name[2];
$name[2] = "PHP";
echo $name[2];
```

### for loop with Associative Array
```php
<?php
    $fees["Rahul"] = 500;
    $fees["Sonam"] = 300;
    $fees["Sumit"] = 600;
    $fees["Priti"] = 700;
    $key = array_keys($fees);
    for($i = 0; $i<=3; $i++) {
        echo $key[$i], " ", $fees[$key[$i]], "<br />";
    }
?>
```

---

## Deleting Array Element

```php
$name[0] = "Rahul";
$name[1] = "Sonam";
$name[2] = "Sumit";
$name[3] = "Priti";
echo $name[2];
$name[2] = " ";
echo $name[2];
```

`unset()` function is used to delete an array element.

**Syntax:**  
`unset($array_name[]);`

**Example:**  
`unset($name[2]);`

---

## Copy an Array in Array
We can copy entire array using assignment operator.

```php
$name[0] = "Rahul";
$name[1] = "Sonam";
$name[2] = "Sumit";
$name[3] = "Priti";
$student = $name;
echo $student[3];
```

---

## Array Functions

### count() Function
Returns the number of elements in an array.

**Syntax:**  
`count(array, mode);`

- `array`: Specifies the array
- `mode`: 
  - `0`: Default. Does not count all elements of multidimensional arrays
  - `1`: Counts the array recursively (counts all elements of multidimensional arrays)

### array_keys() Function
Returns an array containing the keys.

**Syntax:**  
`array_keys(array, value, strict)`

- `array`: Specifies an array
- `value`: Only keys with this value are returned
- `strict`:
  - `true`: Returns keys with specified value, depending on type
  - `false`: Default. Not depending on type

### print_r() Function
Displays information in a human-readable way.

**Syntax:**  
`print_r($array_name, Bool_Return);`

- `Return` can be `True` or `False` (default is `False`)
- When `Return` is `True`, `print_r()` will return the information rather than print it.

**Examples:**
```php
$name[0] = "Rahul";
$name[1] = "Sonam";
print_r($name);

$name[0] = "Rahul";
$name[1] = "Sonam";
$results = print_r($name, true);
echo $results;
```

---

## foreach loop with Array
The foreach loop works only on arrays, and is used to loop through each key/value pair.

**Syntax 1:**
```php
foreach($array_name as $value) {
    block of Statement;
}
```

**Syntax 2:**
```php
foreach($array_name as $key => $value) {
    block of Statement;
}
```

Alternative syntax:
```php
foreach($array_name as $value) :
    block of Statement;
endforeach;

foreach($array_name as $key => $value) :
    block of Statement;
endforeach;
```

### Examples:
```php
<?php
    $name[0] = "Rahul";
    $name[1] = "Sonam";
    $name[2] = "Sumit";
    $name[3] = "Priti";
    foreach($name as $value) {
        echo $value, "<br />";
    }
?>

<?php
    $name[0] = "Rahul";
    $name[1] = "Sonam";
    $name[2] = "Sumit";
    $name[3] = "Priti";
    foreach($name as $key => $value) {
        echo $value, "<br />";
    }
?>

foreach($name as $key => $value) :
    echo "Key: $key Value: $value <br />";
endforeach;
```

---

## Array Operators

| Example | Name | Result |
|---------|------|--------|
| `$a + $b` | Union | Union of \$a and \$b |
| `$a == $b` | Equality | TRUE if \$a and \$b have same key/value pairs |
| `$a === $b` | Identity | TRUE if \$a and \$b have same key/value pairs in same order and same types |
| `$a != $b` | Inequality | TRUE if \$a is not equal to \$b |
| `$a <> $b` | Inequality | TRUE if \$a is not equal to \$b |
| `$a !== $b` | Non-identity | TRUE if \$a is not identical to \$b |

**Note about Union:**  
The `+` operator returns the right-hand array appended to the left-hand array; for keys that exist in both arrays, the elements from the left-hand array will be used.

---

## Multidimensional Array
Multidimensional array is arrays of arrays. It can be 2D, 3D, 4D etc.

**Examples:**
- 2D: `$name[][]`
- 3D: `$name[][][]`

### Visual Representation

| Index | Value (Array) |
|-------|---------------|
| 0     | ["Rahul", 500] |
| 1     | ["Sonam", 300] |
| 2     | ["Sumit", 600] |

---

## Comprehensive Array Functions List

| Function | Description |
|----------|-------------|
| `array_change_key_case()` | Changes the case of all keys in an array |
| `array_chunk()` | Split an array into chunks |
| `array_column()` | Return values from a single column |
| `array_combine()` | Creates array using one array for keys and another for values |
| `array_count_values()` | Counts all values of an array |
| `array_diff_assoc()` | Computes difference with additional index check |
| `array_diff_key()` | Computes difference using keys for comparison |
| `array_diff()` | Computes difference of arrays |
| `array_fill_keys()` | Fill array with values, specifying keys |
| `array_fill()` | Fill array with values |
| `array_filter()` | Filters elements using callback function |
| `array_flip()` | Exchanges all keys with their values |
| `array_intersect_assoc()` | Computes intersection with index check |
| `array_intersect_key()` | Computes intersection using keys |
| `array_intersect()` | Computes intersection of arrays |
| `array_key_exists()` | Checks if key exists in array |
| `array_keys()` | Return all keys of an array |
| `array_map()` | Applies callback to elements |
| `array_merge_recursive()` | Merge arrays recursively |
| `array_merge()` | Merge one or more arrays |
| `array_multisort()` | Sort multiple arrays |
| `array_pad()` | Pad array to specified length |
| `array_pop()` | Pop element off end of array |
| `array_product()` | Calculate product of values |
| `array_push()` | Push elements onto end of array |
| `array_rand()` | Pick random entries |
| `array_reduce()` | Reduce array to single value |
| `array_replace_recursive()` | Replace elements recursively |
| `array_replace()` | Replace elements from arrays |
| `array_reverse()` | Return array in reverse order |
| `array_search()` | Search array for value |
| `array_shift()` | Shift element off beginning |
| `array_slice()` | Extract slice of array |
| `array_splice()` | Remove portion and replace |
| `array_sum()` | Calculate sum of values |
| `array_unique()` | Remove duplicate values |
| `array_unshift()` | Prepend elements to beginning |
| `array_values()` | Return all values of array |
| `array_walk_recursive()` | Apply function recursively |
| `array_walk()` | Apply function to every member |
| `array()` | Create an array |
| `arsort()` | Sort in reverse order |
| `asort()` | Sort and maintain index |
| `compact()` | Create array from variables |
| `count()` | Count all elements |
| `current()` | Return current element |
| `each()` | Return current key/value pair |
| `end()` | Set pointer to last element |
| `extract()` | Import variables into symbol table |
| `in_array()` | Check if value exists |
| `key_exists()` | Alias of array_key_exists |
| `key()` | Fetch a key from array |
| `krsort()` | Sort by key in reverse order |
| `ksort()` | Sort array by key |
| `list()` | Assign variables as array |
| `natcasesort()` | Case insensitive natural order |
| `natsort()` | Natural order sort |
| `next()` | Advance internal pointer |
| `pos()` | Alias of current |
| `prev()` | Rewind internal pointer |
| `range()` | Create array with range |
| `reset()` | Set pointer to first element |
| `rsort()` | Sort in reverse order |
| `shuffle()` | Shuffle array |
| `sizeof()` | Alias of count |
| `sort()` | Sort an array |
| `uasort()` | Sort with user function |
| `uksort()` | Sort keys with user function |
| `usort()` | Sort values with user function |