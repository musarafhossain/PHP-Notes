# 📢 echo

This statement is used to output the data to the screen or printing text on screen.

**Ex:**
```php
echo "Musaraf Hossain";              // Outputs the string "Musaraf Hossain"
echo 'Musaraf Hossain';              // Outputs the string 'Musaraf Hossain'
echo 25.265;                     // Outputs the number 25.265
echo ("Musaraf Hossain");             // Outputs "Musaraf Hossain" using parentheses (optional)
echo "Visit", "Musaraf Hossain";      // Outputs both strings (echo supports multiple parameters)
echo "Visit" . "Musaraf Hossain";     // Outputs concatenated string "VisitMusaraf Hossain"
```

---

## 🖥️ echo with HTML

```php
echo "<b>Musaraf Hossain</b>";                            // Outputs bold text using HTML <b> tag
echo "<b>" . "Musaraf Hossain" . "</b>";                   // Concatenates and outputs bold text
echo "<u><h1>Visit Musaraf Hossain</h1></u>";             // Outputs underlined heading
```

---

## 🧮 echo with Variables

```php
$value1 = 10;
$value2 = 20;
$sum = $value1 + $value2;

echo $value1;                          // Outputs 10
echo "Value is: ",  $value1;           // Outputs "Value is: 10"
echo "Value is: " . $value1;           // Outputs "Value is: 10" using concatenation
echo $value1 + $value2;                // Outputs sum of $value1 and $value2 (30)
echo "Total" . ($value1 + $value2);    // Outputs "Total30"
echo "<b>Total</b>" . $sum;            // Outputs bold "Total" followed by 30

$name = "Musaraf Hossain";
echo $name;                            // Outputs "Musaraf Hossain"
echo "Welcome to " . $name;            // Outputs "Welcome to Musaraf Hossain"
echo "Dell";                           // Outputs "Dell"
echo "<b>" . $name . "</b>";           // Outputs "Musaraf Hossain" in bold
Echo $name . "<b>and</b>" . $name;     // Outputs "Musaraf Hossain<b>and</b>Musaraf Hossain"
```

> ✍️ **Note:**  
> - Text should be enclosed with **quotes**  
> - HTML Tags should be enclosed with **quotes**

---

# 🖨️ print

This is very similar to echo statement—a way of displaying text.

**Ex:**
```php
print "Musaraf Hossain";                 // Outputs "Musaraf Hossain"
print 'Musaraf Hossain';                 // Outputs 'Musaraf Hossain'
print 25.265;                        // Outputs the number 25.265
print ("Musaraf Hossain");                // Outputs "Musaraf Hossain" with parentheses
print "Visit", "Musaraf Hossain";         // ❌ Error: print doesn't support multiple parameters
print "Visit" . "Musaraf Hossain";        // Outputs "VisitMusaraf Hossain"
print $name;                         // Outputs value of $name ("Musaraf Hossain")
```

> ⚠️ **Note:** Unlike `echo`, `print` can only take **one argument** at a time.