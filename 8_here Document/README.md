# here Document

**here document** is another way of displaying text. A *here document* is just some text inserted directly in a PHP page.

---

### 🔧 Syntax:

```php
echo <<< Token
    Your multiline text goes here...
Token;
```

- `Token` is a custom identifier used to begin and end the here document block.
- It **must match exactly** at the beginning and end (case-sensitive and no indentation at the end).

---

### 📌 Example:

```php
echo <<< MYDATA
Welcome to My Site
It is very “important” data
MYDATA;
```