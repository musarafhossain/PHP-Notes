# Chapter 1: Introduction to PHP

## 1.1 What is PHP?
PHP (Hypertext Preprocessor) is a widely-used open-source scripting language designed for web development. It is embedded in HTML and executed on the server, generating dynamic web pages. PHP is particularly suited for creating interactive and database-driven websites.

### Key Features of PHP:
- Open-source and free to use.
- Server-side execution.
- Easy to learn and use.
- Supports multiple databases (MySQL, PostgreSQL, SQLite, etc.).
- Cross-platform (works on Windows, macOS, Linux).
- Compatible with almost all servers (Apache, Nginx, IIS).

---

## 1.2 History of PHP
- **1994**: Rasmus Lerdorf developed PHP as a set of CGI scripts.
- **1995**: PHP/FI (Personal Home Page / Forms Interpreter) was released.
- **1997**: PHP 3 introduced improved syntax and support for databases.
- **2000**: PHP 4 introduced the Zend Engine for better performance.
- **2004**: PHP 5 introduced object-oriented programming (OOP) and MySQLi.
- **2015**: PHP 7 introduced major performance improvements with the Zend Engine 3.0.
- **2020**: PHP 8 introduced Just-In-Time (JIT) compilation and other enhancements.

---

## 1.3 How PHP Works?
1. A user requests a PHP page via a web browser.
2. The request is sent to the web server (Apache, Nginx).
3. The web server processes the PHP script using the PHP interpreter.
4. The output is generated as an HTML response.
5. The HTML response is sent back to the browser.

---

## 1.4 Installing PHP
To run PHP scripts locally, you need a local server environment such as:
- **XAMPP** (Windows, macOS, Linux)
- **WAMP** (Windows)
- **MAMP** (macOS)
- **LAMP** (Linux)

### Steps to Install XAMPP:
1. Download XAMPP from [Apache Friends](https://www.apachefriends.org).
2. Install XAMPP and select PHP, Apache, and MySQL components.
3. Start Apache and MySQL from the XAMPP Control Panel.
4. Open a browser and go to `http://localhost/phpmyadmin` to access the database.

---

## 1.5 Writing Your First PHP Script
### Steps:
1. Open a text editor (VS Code, Sublime, Notepad++).
2. Save the file with a `.php` extension (e.g., `index.php`).
3. Write the following code:
   ```php
   <?php
   echo "Hello, World!";
   ?>
   ```
4. Move the file to the `htdocs` folder (`C:\xampp\htdocs\` for XAMPP users).
5. Open a browser and visit `http://localhost/index.php`.

### Output:
```
Hello, World!
```

---

## 1.6 PHP Syntax
- **PHP Code Block**: Enclosed within `<?php ... ?>`
- **Comments**:
  ```php
  // Single-line comment
  # Another single-line comment
  /* Multi-line 
     comment */
  ```
- **Case Sensitivity**:
  - Function names are NOT case-sensitive.
  - Variable names ARE case-sensitive.

---

## 1.7 Embedding PHP in HTML
You can write PHP inside an HTML file:

```php
<!DOCTYPE html>
<html>
<head>
    <title>PHP Example</title>
</head>
<body>
    <h1>Welcome to PHP</h1>
    <p><?php echo "This is a dynamic message!"; ?></p>
</body>
</html>
```

---

## 1.8 Variables, Data Types, and Constants
### Declaring Variables:
```php
$name = "John";  // String
$age = 25;       // Integer
$price = 19.99;  // Float
$is_admin = true; // Boolean
```

### PHP Data Types:
1. **String** (`"Hello"`, `'World'`)
2. **Integer** (`10`, `-5`)
3. **Float** (`3.14`, `-0.99`)
4. **Boolean** (`true`, `false`)
5. **Array** (`["Apple", "Banana", "Cherry"]`)
6. **Object** (OOP concept, covered later)
7. **NULL** (`$x = NULL;`)

---

### Constants
Constants are like variables, but once they are defined, their value cannot be changed during script execution. PHP has predefined constants and allows you to define your own.

#### Defining Constants:
```php
define("SITE_NAME", "My Website");  // User-defined constant
echo SITE_NAME;  // Outputs: My Website
```

#### Predefined Constants:
PHP has several built-in constants like:
- `PHP_VERSION` – Returns the current PHP version.
- `PHP_OS` – Returns the operating system PHP is running on.
- `PHP_INT_MAX` – Returns the maximum integer value that can be handled by PHP.

Example:
```php
echo PHP_VERSION; // Outputs: 8.0.0 or the current PHP version
```

---

## 1.9 Superglobals (Global Variables in PHP)
PHP has built-in superglobal variables:
- `$_GET` – Collects data from URL parameters.
- `$_POST` – Collects data from form submissions.
- `$_REQUEST` – Collects both GET and POST data.
- `$_SERVER` – Contains information about the server and execution environment.
- `$_SESSION` – Stores session variables.
- `$_COOKIE` – Stores cookies.

Example:
```php
echo $_SERVER['PHP_SELF'];  // Outputs current script name
```

---

## 1.10 Conclusion
In this chapter, we covered:
- What PHP is and its history.
- How PHP works with a web server.
- Installing PHP using XAMPP.
- Writing the first PHP script.
- PHP syntax and embedding PHP in HTML.
- Variables, data types, and superglobals.