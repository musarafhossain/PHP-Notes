# Object Oriented Programming

# Class

- A PHP class is a group of values with a set of operations to manipulate this values. Classes facilitate modularity and information hiding. Classes are used to define a new data type.

- ## Rules

    - The class name can be any valid label.
    - It can't be PHP reserved word.
    - A valid class name starts with a letter or underscores, followed by any number of letter, numbers or underscores.
    
- ## Syntax
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

- ## Example
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

# Object

- Object is class type variable. Each time you create an object of a class a copy of each variables defined in the class is created. In other words you can say that each object of a class has its own copy of data members defined in the class. Member functions have only one copy and shared by all the objects of that class. All the objects may have their own value of variables. 

- The new Operator is used to create an object.
- ## Syntax
```php
$object_name = new class_name;  
```
- ## Creating Object
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

- ## Accessing class member using object

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

# `$this` Keyword  

- The `$this` Keyword points to the current object. You use `$this` followed by the `->` operator. In Addition, you omit the `$` in front of the property.

    - ## Syntax
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

# Constructor

- PHP supports a special type of method called constructor for initializing an object when it is created. This is known as automatic initialization of objects. 
- A class constructor if defined is called whenever a program creates an object of that class. 
- They are invoked directly when an object is created. 
- A constructor should have the same name as the class.
- Constructor have a special name in PHP `__construct`

- ## Declaration of Constructors 

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
- ## Type of Constructor 

    - Default Constructor 
    - Parameterized Constructor 
    
- ## Default Constructor 

- A default constructor is a constructor that has no parameters.
```php
class Student{
    function __construct(){  	// Default constructor 
        echo "Default Constructor";
    }
}
$stu = new Student;
```
- ## Parameterized Constructor 

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

# Destructors 

- In PHP destructor are called when you explicitly destroy an object or when all references to the object go out of scope.  
- Destructor have a special name in PHP `__destruct`.
- Destructor do not have any arguments.
- ## Syntax:-
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
- ## Output

```bash
Constructor is called.
Hello from MyClass!
Destructor is called.
```
---

# Inheritance 

- The mechanism of deriving a new class from an old one is called inheritance or derivation. 

![](/19_Object%20Oriented%20Programming/image1.png)

- ## Super Class and Sub Class 

    - The old class is referred to as the Super class and the new one is called the Sub class.
    
    - **Parent Class** - Base Class, or Super Class
    - **Child Class** - Derived Class, Extended Class, or Sub Class
    
![](/19_Object%20Oriented%20Programming/image2.png)

- ## Declaration of Child Class 
```php
class ChildClassName extends ParentClassName { 
    members of Child class 
}; 
```

- ## Example
```php
// Parent class
class Employee {    
    public $id; 
    public $name; 
    public $age; 
    public $department_Name; 
    public $salary; 
    public $address; 
    function displayName( ); 
    function displayId( ); 
    function raiseSalary($money); 
}

// Child class
class Manager extends Employee { 
    public $nameOfSecretary; 
    function displaySecretaryName(); 
    function raiseSalary($money); 
 }
```

- ## Type of Inheritance

    - Single Inheritance 
    
    - Multiple Inheritance ❌[ Not available in PHP ]
    
    - Multi-level Inheritance 
    
    - Hierarchical Inheritance 
    
- ## Single Inheritance 

    - If a class is derived from one base class (Parent Class), it is called Single Inheritance. 

    ![](/19_Object%20Oriented%20Programming/image3.png)
    
    - ### Syntax: -

    ```php
    class Father { 
        members of class Father 
    }; 

    class Son extends Father { 
        members of class Son 
    }; 

    ```
    - ### Example: -
    ```php
    // Parent class
    class Animal {
        public function sound() {
            echo "Animals make sounds.\n";
        }
    }

    // Child class
    class Dog extends Animal {
        public function bark() {
            echo "Dog barks: Woof! Woof!\n";
        }
    }

    // Create object of Dog
    $myDog = new Dog();

    // Call methods
    $myDog->sound(); // Inherited from Animal
    $myDog->bark();  // Defined in Dog
    ```
    - ### Output: -
    ```bash
    Animals make sounds.
    Dog barks: Woof! Woof!
    ```
- ## Multiple Inheritance ❌

    - If a class is derived from more than one parent class, then it is called multiple inheritance. 
    - In PHP, there is no multiple inheritance. 

    ![](/19_Object%20Oriented%20Programming/image4.png)
    
- ## Multi-level Inheritance  

    - In multi-level inheritance, the class inherits the feature of another derived class (Child Class). 

    ![](/19_Object%20Oriented%20Programming/image5.png)
    
    - ### Syntax: -

    ```php
    class Father { 
        members of class Father 
    }; 
    
    class Son extends Father { 
        members of class Son 
    }; 
    
    class GrandSon extends Son { 
        members of class GrandSon 
    }; 
    ```
    - ### Example: -
    ```php
    // Grandparent class
    class Animal {
        public function eat() {
            echo "Animals eat food.\n";
        }
    }

    // Parent class (inherits from Animal)
    class Dog extends Animal {
        public function bark() {
            echo "Dog barks: Woof! Woof!\n";
        }
    }

    // Child class (inherits from Dog)
    class Puppy extends Dog {
        public function weep() {
            echo "Puppy weeps: Whine... Whine...\n";
        }
    }

    // Create object of Puppy
    $myPuppy = new Puppy();

    // Call methods
    $myPuppy->eat();   // From Animal
    $myPuppy->bark();  // From Dog
    $myPuppy->weep();  // From Puppy
    ```
    - ### Output: -
    ```bash
    Animals eat food.
    Dog barks: Woof! Woof!
    Puppy weeps: Whine... Whine...
    ```
    - ### Multi-Level Inheritance with Constructors and Destructors
        - Each class has its own constructor, and we use `parent::__construct()` to call the parent class's constructor.
    ```php
    // Grandparent class
    class Animal {
        public function __construct() {
            echo "Animal constructor called.\n";
        }

        public function eat() {
            echo "Animals eat food.\n";
        }

        public function __destruct() {
            echo "Animal destructor called.\n";
        }
    }

    // Parent class
    class Dog extends Animal {
        public function __construct() {
            parent::__construct(); // Call Animal constructor
            echo "Dog constructor called.\n";
        }

        public function bark() {
            echo "Dog barks: Woof! Woof!\n";
        }

        public function __destruct() {
            echo "Dog destructor called.\n";
            parent::__destruct(); // Optional, but explicit
        }
    }

    // Child class
    class Puppy extends Dog {
        public function __construct() {
            parent::__construct(); // Call Dog constructor
            echo "Puppy constructor called.\n";
        }

        public function weep() {
            echo "Puppy weeps: Whine... Whine...\n";
        }

        public function __destruct() {
            echo "Puppy destructor called.\n";
            parent::__destruct(); // Optional, but shows chain
        }
    }

    // Create object of Puppy
    $myPuppy = new Puppy();

    // Call methods
    $myPuppy->eat();   // From Animal
    $myPuppy->bark();  // From Dog
    $myPuppy->weep();  // From Puppy
    ```
    - ### Output: -
    ```bash
    Animal constructor called.
    Dog constructor called.
    Puppy constructor called.
    Animals eat food.
    Dog barks: Woof! Woof!
    Puppy weeps: Whine... Whine...
    Puppy destructor called.
    Dog destructor called.
    Animal destructor called.
    ```
- ## Hierarchical Inheritance   

    ![](/19_Object%20Oriented%20Programming/image6.png)
    
    - ### Syntax: -

    ```php
    class Father { 
        members of class Father 
    }; 
    
    class Son extends Father { 
        members of class Son 
    }; 
    
    class Daughter extends Father { 
        members of class Daughter 
    }; 
    ```
    - ### Example: -
    ```php
    // Parent class
    class Animal {
        public function eat() {
            echo "Animal eats food.\n";
        }
    }

    // First child class
    class Dog extends Animal {
        public function bark() {
            echo "Dog barks: Woof!\n";
        }
    }

    // Second child class
    class Cat extends Animal {
        public function meow() {
            echo "Cat meows: Meow!\n";
        }
    }

    // Create Dog object
    $dog = new Dog();
    $dog->eat();  // From Animal
    $dog->bark(); // From Dog

    echo "\n"; // Just to separate outputs

    // Create Cat object
    $cat = new Cat();
    $cat->eat();  // From Animal
    $cat->meow(); // From Cat
    ```
    - ### Output: -
    ```bash
    Animal eats food.
    Dog barks: Woof!

    Animal eats food.
    Cat meows: Meow!
    ```
    - ### Hierarchical Inheritance with Constructors and Destructors
    ```php
    // Parent class
    class Animal {
        public function __construct() {
            echo "Animal constructor called.\n";
        }

        public function eat() {
            echo "Animal eats food.\n";
        }

        public function __destruct() {
            echo "Animal destructor called.\n";
        }
    }

    // First child class
    class Dog extends Animal {
        public function __construct() {
            parent::__construct();
            echo "Dog constructor called.\n";
        }

        public function bark() {
            echo "Dog barks: Woof!\n";
        }

        public function __destruct() {
            echo "Dog destructor called.\n";
            parent::__destruct();
        }
    }

    // Second child class
    class Cat extends Animal {
        public function __construct() {
            parent::__construct();
            echo "Cat constructor called.\n";
        }

        public function meow() {
            echo "Cat meows: Meow!\n";
        }

        public function __destruct() {
            echo "Cat destructor called.\n";
            parent::__destruct();
        }
    }

    // Create Dog object
    echo "--- Dog Object ---\n";
    $dog = new Dog();
    $dog->eat();
    $dog->bark();

    echo "\n";

    // Create Cat object
    echo "--- Cat Object ---\n";
    $cat = new Cat();
    $cat->eat();
    $cat->meow();
    ```
    - ### Output: -
    ```bash
    --- Dog Object ---
    Animal constructor called.
    Dog constructor called.
    Animal eats food.
    Dog barks: Woof!
    Dog destructor called.
    Animal destructor called.

    --- Cat Object ---
    Animal constructor called.
    Cat constructor called.
    Animal eats food.
    Cat meows: Meow!
    Cat destructor called.
    Animal destructor called.
    ```