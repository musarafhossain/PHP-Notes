# Object Oriented Programming

## Class

- A PHP class is a group of values with a set of operations to manipulate this values. Classes facilitate modularity and information hiding. Classes are used to define a new data type.

- ### Rules

    - The class name can be any valid label.
    - It can't be PHP reserved word.
    - A valid class name starts with a letter or underscores, followed by any number of letter, numbers or underscores.
    
- ### Syntax
```php
class Classname{
    var $variable_name;         #Data Member / Properties
    var $variable_name;
    
    function Method_name(){     #Methods / Member Function
        Body of Method;
    }
    function Method_name (parameter_list){
        Body of Method;
    }
}
```

- ### Example
```php
class Mobile{
      var $model;        // global variable
      function showModel($number){
            global $model;
            $model = $number;
            echo "Model Number: $model";
       }
}
```
`or`
```php
class Mobile{
     public $model;
     function showModel($number){
        $this->model = $number;
        echo "Model Number: $this->model";
    }
}
```

> **Note:** You can’t assign computed value inside a class.

**Example :-**
```php
class Owner{
    public $name = "Musaraf Hossain";     # right
    public $name = "Musaraf"."Hossain";   # wrong
    function setName ($surname){
        $this -> name = $surname;
    }
}
```

> **Note:** You can’t begin the name of method with a double underscore `__`

**Example :-**
```php
class Owner{
    public $name = "Musaraf Hossain";
    function __setName ($surname){        # wrong
        $this -> name = $surname;
    }
    function setName ($surname){          # right
        $this -> name = $surname;
    }
}
```
---

## Object

- Object is class type variable. Each time you create an object of a class a copy of each variables defined in the class is created. In other words you can say that each object of a class has its own copy of data members defined in the class. Member functions have only one copy and shared by all the objects of that class. All the objects may have their own value of variables. 

- The new Operator is used to create an object.
- ### Syntax
```php
$object_name = new class_name;  
```
- ### Creating Object
```php
class Mobile{
     public $model;
     function showModel($number){
        $this->model = $number;
        echo "Model Number: $this->model";
    }
}
$samsung = new Mobile;
```

- ### Accessing class member using object

    - `->` operator is used to access class member using object.

```php
Object_name->variable_name;
$samsung->model;

Object_name->method_name()
$samsung->showModel();

Object_name->method_name(parameter_list)
$samsung->showModel('A8');
```
---

## `$this` Keyword  

- The `$this` Keyword points to the current object. You use `$this` followed by the `->` operator. In Addition, you omit the `$` in front of the property.

    - ### Syntax
```php    
$this->model;
```

**Example**
```php
class Mobile{
     public $model;
     function showModel ($number){
        $this->model = $number;
        echo "Model Number: $this->model";
    }
}
$samsung = new Mobile;
$samsung->showModel('A8');
```
---

## Constructor

- PHP supports a special type of method called constructor for initializing an object when it is created. This is known as automatic initialization of objects. 
- A class constructor if defined is called whenever a program creates an object of that class. 
- They are invoked directly when an object is created. 
- A constructor should have the same name as the class.
- Constructor have a special name in PHP `__construct`

- ### Declaration of Constructors 

```php
class Student{
      function __construct(){
        echo "Constructor Called";
    }
}
```
`or`
```php
class Student{
      function Student(){
        echo "Constructor Called";
    }
}
```
- ### Type of Constructor 

    - Default Constructor 
    - Parameterized Constructor 
    
- ### Default Constructor 

- A default constructor is a constructor that has no parameters.
```php
class Student{
    function __construct(){  	// Default constructor 
        echo "Default Constructor";
    }
}
$stu = new Student;
```
- ### Parameterized Constructor 

- The constructors that can take the arguments are called parameterized constructors.

```php
class Student{ 
    var $roll;
    function __construct ($enroll){
        $this->roll=$enroll;
    }
}
$stu = new Student(10);
```
- Once you create your own constructor, the default constructor is no longer accessible.
---

## Destructors 

- In PHP destructor are called when you explicitly destroy an object or when all references to the object go out of scope.  
- Destructor have a special name in PHP `__destruct`.
- Destructor do not have any arguments.
- ### Syntax:-
```php
class MyClass {
    public function __construct() {
        echo "Constructor is called.<br>";
    }

    public function sayHello() {
        echo "Hello from MyClass!<br>";
    }

    public function __destruct() {
        echo "Destructor is called.<br>";
    }
}

// Create an object
$obj = new MyClass();
$obj->sayHello();
```
- ### Output

```bash
Constructor is called.
Hello from MyClass!
Destructor is called.
```
---










