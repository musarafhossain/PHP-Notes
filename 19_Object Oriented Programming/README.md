# Object Oriented Programming

# Class

- A PHP class is a group of values with a set of operations to manipulate this values. Classes facilitate modularity and information hiding. Classes are used to define a new data type.

## Rules

- The class name can be any valid label.
- It can't be PHP reserved word.
- A valid class name starts with a letter or underscores, followed by any number of letter, numbers or underscores.
    
## Syntax
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

## Example
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
## Syntax
```php
$object_name = new class_name;  
```
## Creating Object
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

## Accessing class member using object

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

## Syntax
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

## Declaration of Constructors 

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
## Type of Constructor 

- Default Constructor 
- Parameterized Constructor 
    
## Default Constructor 

- A default constructor is a constructor that has no parameters.
```php
class Student{
    function __construct(){  	// Default constructor 
        echo "Default Constructor";
    }
}
$stu = new Student;
```
## Parameterized Constructor 

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
## Syntax:-
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
## Output

```bash
Constructor is called.
Hello from MyClass!
Destructor is called.
```
---

# Inheritance 

- The mechanism of deriving a new class from an old one is called inheritance or derivation. 

![](/19_Object%20Oriented%20Programming/image1.png)

## Super Class and Sub Class 

- The old class is referred to as the Super class and the new one is called the Sub class.

- **Parent Class** - Base Class, or Super Class
- **Child Class** - Derived Class, Extended Class, or Sub Class
    
![](/19_Object%20Oriented%20Programming/image2.png)

## Declaration of Child Class 
```php
class ChildClassName extends ParentClassName { 
    members of Child class 
}; 
```

## Example
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

## Type of Inheritance

- Single Inheritance 

- Multiple Inheritance ❌[ Not available in PHP ]

- Multi-level Inheritance 

- Hierarchical Inheritance 
    
## Single Inheritance 

- If a class is derived from one base class (Parent Class), it is called Single Inheritance. 

![](/19_Object%20Oriented%20Programming/image3.png)

### Syntax: -

```php
class Father { 
    members of class Father 
}; 

class Son extends Father { 
    members of class Son 
}; 

```
### Example: -
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
### Output: -
```bash
Animals make sounds.
Dog barks: Woof! Woof!
```
## Multiple Inheritance ❌

- If a class is derived from more than one parent class, then it is called multiple inheritance. 
- In PHP, there is no multiple inheritance. 

![](/19_Object%20Oriented%20Programming/image4.png)
    
## Multi-level Inheritance  

- In multi-level inheritance, the class inherits the feature of another derived class (Child Class). 

![](/19_Object%20Oriented%20Programming/image5.png)

### Syntax: -

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
### Example: -
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
### Output: -
```bash
Animals eat food.
Dog barks: Woof! Woof!
Puppy weeps: Whine... Whine...
```
### Multi-Level Inheritance with Constructors and Destructors
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
### Output: -
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
## Hierarchical Inheritance   

![](/19_Object%20Oriented%20Programming/image6.png)

### Syntax: -

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
### Example: -
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
### Output: -
```bash
Animal eats food.
Dog barks: Woof!

Animal eats food.
Cat meows: Meow!
```
### Hierarchical Inheritance with Constructors and Destructors
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
### Output: -
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
---

# Visibility Mode/ Access Modifiers

- Public/Default
- Private
- Protected

## Public/Default 

- Public Property or Method Can be accessed from anywhere

### Example
```php
class Father{
    public $a;
    public function displayParent(){
        echo "Parent Function $this->a";
    }  
}
$objF = new Father;
$objF->a = 10;      // accessing public property with object
$objF->displayParent(); // accessing public method with object

class Son extends Father{
    public function displayChild($x){
        $this->a = $x;      // acessing parent class public property
        echo "Child Value is $this->a <br>";
        $this->displayParent(); // accessing parent class public method
    }   
}
$obj = new Son;
$obj->displayChild(20);
```

### Output
```bash
Parent Function 10
Child Value is 20
```

## Private 

- Private Property or Method can be accessed only within same class
- Private Property cannot be access outside class or with object
- In Inheritance, Child Class cannot access Parent's Private Property or Method

### Example

```php
class Father{
    private $a;     // Private Property 
    public function displayParent(){   // private function displayParent()
        echo "Parent Function $this->a";    // can access private property here within same class
    }  
}
$objF = new Father;
$objF->a = 10;      // Error: accessing Private property with object
$objF->displayParent(); // accessing public method with object

class Son extends Father{
    public function displayChild($x){
        $this->a = $x;      // Can't access parent class private property in child class
        echo "Child Value is $this->a <br>";
        $this->displayParent(); // accessing parent class public method
    }   
}
$obj = new Son;
$obj->displayChild(10);
```

## Protected

- Cannot access Protected Property or Method Outside Class or Object
- Protected Property or Class can be accessed within same class and
- Child Class can access Parent's or GrandParent's Protected Property or Method
- For accessing parent's protected property syntax are: 
    - `parent::propertyName`  or `ClassName::propertyName`

### Example - 1 (with child class)

```php
class Father{
    protected $a;     // Protected Property 
    public function displayParent(){   // protected function displayParent()
        echo "Parent Function $this->a";
    }  
}
$objF = new Father;
$objF->a = 10;      // Error: accessing Protected property with object
$objF->displayParent(); // accessing public method with object

class Son extends Father{
    public function displayChild($x){
        $this->a = $x;      // Can access parent class protected property in child class
        echo "Child Value is $this->a <br>";
        $this->displayParent(); // accessing parent class public method
    }   
}
$obj = new Son;
$obj->displayChild(10);
```
### Example - 2 (with grand child class)

```php
class Father{
    protected $a;     // Protected Property 
    protected function displayParent(){   // protected function displayParent()
        echo "Parent Function $this->a";
    }  
}

class Son extends Father{
    
}

class GrandSon extends Son {
    public function displayGrandChild($x){
        $this->a = $x;      // Can access Grandparent class protected property in Grandchild class
        echo "Child Value is $this->a <br>";
        $this->displayParent(); // accessing Grandparent class Protected method
    } 
}
$obj = new GrandSon;
$obj->displayGrandChild(10);
```
### Constructer with protected

```php
class Father{
    public $a;
    protected function __construct($x){
        echo "<br>Parent Constructor Called<br>";
        $this->a = $x;
    }
}
class Son extends Father{
    public $a;
    function __construct($x, $y){
        parent::__construct($x, $y);  // calling Parent Class Constructor inside Child Class constructor
        echo "<br>Child Constructor Called<br>";
        $this->b = $y;
        echo $this->b;
        echo parent::a;
    }
}
$objS = new Son(10, 20);
```
---

# `static` keyword

## Static Variable

- A variable within a function reset every time when we call it. In case if we need, variable values to remain save even outside the function then we have to use static keyword.

### Example
```php
    function display() 
    {
        static $a = 0 ;	 	// Static Variable
        $a++;
        return $a;
    } 
    echo "Calling Static variable's Function <br />";
    echo display() . "<br />";		// $a = 1
    echo display() . "<br />";		// $a = 2
    echo display() . "<br />";		// $a = 3
?>
```

## Static Properties

### Example 
```php
Class Student{
    public static $name;  //define static property
    public function disp($nm) {
        self::$name = $nm; 
        echo “My Name is ” . Self::$name ; 
    }
}
// accessing static property outside class
Student::$name="Jhon Doe";
$stu = new Student;
$stu->disp("Muusaraf Hossain");
```

## Static Methods

- Static methods are class methods they are meant to call on the class, not on an object.
- Call the method without having to first create an object of that class. 

## How to create Static Method ?

- static keyword in front of the function is used to create static method.
### Example
```php 
public static function display(){ 
    echo “Hello World!”; 
}
```

## How to Call static method ?
- As we know object is not required to call a static method so we can call static method using it’s class name followed by scope resolution operator(:\:) followed by function name.
### Example
```php 
Class Student {
    public static function display(){
        echo "Hello World";   
    }
}

Student::display();
```

## Passing Value to Static Method

### Example
```php
Class Student {
    public static function display($nm){
    echo "Musaraf" . $nm ; }
}
Student::display("Hossain");
```

## Static Properties inside static Method
- `self` keyword is used to access the static properties inside static Method. 
- Static properties cannot be accessed through the object using the arrow operator `->`. `$this` is not available inside the method declared as static. Static method cannot access non-static properties.
### Example
```php
class Father{
    // Non-static Property
    public $a = 10; 
    public static $b= 10;
    public static function disp(){
        // Non-Static Property can't be accesed inside static Method
        echo $this->a;  
        echo self::$b;
    }
} 
Father::disp();
```

> **Note:** Non Static Property or Method can't be accessed inside Static Method using `$this`

### Example
```php
class Father{
    public static $a= 10;
    public function disp(){
        // accessing static property inside non-static method  
        echo self::$a; 
    }
} 
$obj = new Father;
$obj->disp();
```
---

# `abstract` keyword

## Abstract Class
- A class that is declared with `abstract` keyword, is known as abstract class in PHP. It can have abstract and non-abstract methods. It needs to be extended and its method implemented. objects of an abstract class cannot be created.

```php
abstract class Test{

}
```

## Abstract Method
- A method that is declared as abstract and does not have implementation is known as abstract method.

```php
abstract function disp();	//no body and abstract
```
### Example
```php
abstract class Father {
    abstract function disp();
}

Class Son extends Father{
    public function disp (){
        echo "Abstract defined";
    }
}
```

## Rules
- We cannot use abstract classes to instantiate objects directly.
- objects of an abstract class cannot be created. 
- The abstract methods of an abstract class must be defined in its subclass.
- If there is any abstract method in a class, that class must be abstract.
- A class can be abstract without having abstract method.
- It is not necessary to declare all methods abstract in a abstract class.
- We cannot declare abstract constructors or abstract static methods.
- If you are extending any abstract class that have abstract method, you must either provide the implementation of the method or make this class abstract.

Sure! Here’s the full explanation with an **example** added so you can understand everything clearly:

---

# `const` keyword

- These are constants designed to be used by **classes**, not **objects**.
- Once you initialize a `const` variable, you **can’t reinitialize** it (it’s fixed forever).
- `const` keyword is used to create **class constants**.
  
Example of declaring:
```php
const mark = 101;
```

- Access **inside** the class using the `self` keyword, like:
  ```php
  self::mark;
  ```
- Access **outside** the class using the **class name**, like:
  ```php
  ClassName::mark;
  ```

### Example:

```php
class Student {
    const MARKS = 101;

    public function showMarks() {
        // Accessing inside the class using self::
        echo "Marks inside class: " . self::MARKS . "<br>";
    }
}

// Accessing outside the class using class name
echo "Marks outside class: " . Student::MARKS . "<br>";

// Creating object
$student = new Student();
$student->showMarks();
```

### Output:
```
Marks outside class: 101
Marks inside class: 101
```

---

# Interface

- An interface is like a class with nothing but abstract methods.
- All methods of an interface must be public. It is also possible to declare a constructor in an interface. 
- It’s possible for interface to have constants(can not be overridden by a class/interface that inherits them). 
- `interface` keyword is used to create an interface in php.

![](/19_Object%20Oriented%20Programming/image7.png)

- Interface don’t have instance variables.
- All methods of an interface is abstract.
- All methods of an interface are automatically (by default) public.
- We can not use the private and protected specifiers when declaring member of an interface. 
- We can not create object of interface. 
- More than one interface can be implemented in a single class.
- A class implements an interface using `implements` keyword. 
- If a class is implementing an interface it has to define all the methods given in that interface.
- If a class does not implement all the methods declared in the interface, the class must be declared abstract. 
- The method signature for the method in the class must match the method signature as it appears in the interface. 
- Any class can use an interface’s constants from the name of the interface like `Test::roll`. 
- Classes that implement an interface can treat the constants as they were inherited. 
- An interface can extend (inherit) an interface. 
- One interface can inherit another interface using `extends` keywords. 
- An Interface can not extends classes. 

## Defining Interface
### Syntax
```php
interface interface_name {
    const properties;
    Method;
} 
```
### Example
```php
interface Father{
    const a;
    public function disp();
} 
```
## Extending Interface

- An interface can extend (inherit) an interface. 
- One interface can inherit another interface using `extends` keywords. 
- An Interface can not extends classes. 

### One Interface extending one Interface
![](/19_Object%20Oriented%20Programming/image8.png)
### Syntax
```php
interface interface_name1{
    const properties;
    Methods;
}

interface interface_name extends interface_name1
{
    const properties;
    Method;
}
```

### One interface can extend more than one interface
![](/19_Object%20Oriented%20Programming/image9.png)
### Syntax
```php
interface Father{

}

interface Mother{

}

interface Son extends Father, Mother{

}
```
## Implementing Class
- More than one interface can be implemented in a single class.
- A class implements an interface using `implements` keyword. 
- If a class is implementing an interface it has to define all the methods given in that interface.
- If a class does not implement all the methods declared in the interface, the class must be declared abstract. 
- The method signature for the method in the class must match the method signature as it appears in the interface. 
- Any class can use an interface’s constants from the name of the interface like `Test::roll`. 
- Classes that implement an interface can treat the constants as they were inherited. 

### one interface can be implemented in a single class
![](/19_Object%20Oriented%20Programming/image10.png)
### Syntax
```php
interface interface_name{
    const properties;
    Methods;
}

class class_name implements interface_name{
    Properties;
    Methods;
}
```
### Example
```php
interface Father{
    const mark = 101;
    public function disp();
}

class Son implements Father{
    public function disp()
    {
        echo Father::mark;
    }
}
```
### More than one interface can be implemented in a single class
![](/19_Object%20Oriented%20Programming/image11.png)
### Syntax
```php
interface Father{

}

interface Mother{

}

class Son implements Father, Mother{

}
```
## Extends and Implements together
### Syntax
```php
class Father{
    properties;
    Methods;
}
interface Mother{
    const properties;
    Methods;
}
class Son extends Father implements Mother{
    properties;
    Methods; 
}
```
### Example
```php
class Father {
    public $sci = 101;
}
interface Mother{
    const math = 102;
    public function disp();
}
interface Uncle{

}
class Son extends Father implements Mother, Uncle  {
    public function disp() {
        echo $this->sci;
        echo Mother::math;
    }
}
$obj = new Son;
$obj->disp();
```

## Interface vs Abstract Class
- An abstract class can have only abstract methods or only non-abstract methods or both, but All methods of an interface are abstract by default.
- An abstract class can declare properties/methods with access specifier, but interface can declare only constant properties(no other type properites) and methods are by default abstract and public.
- A class can inherit only one abstract class and multiple inheritance is not possible for abstract class but A class can implement more than one interface and can achieve multiple inheritance.
- If a class contains even a single abstract method that class must be declared as abstract.
- In an abstract class, you can defined as well as It’s body methods but in the interface you can only define your methods.

# Method Overriding 
- Overriding refers to the ability of a subclass to re-implement a method inherited from a superclass.
### Example
```php
class Father { 
    function disp(){ 
        echo "Super Class"; 
    }
}

class Son extends Father { 
    function disp(){ 
        echo "Son Class"; 
    }
}

class Daughter extends Father { 
    function disp(){ 
        echo "Daughter Class"; 
    }
}
```

- Only inherited methods can be overridden.
- Final and static methods cannot be overridden.
- The overriding method must have same argument list.

# `final` keyword
- `final` keyword is used to create final method or final class.
- A final method cannot be overridden in child class.
- A final class cannot be inherited, It means we can not create sub class of a final class.

## Final Method
### Example
```php
Class Father {
    function display(){
         echo "You can override me because I am not final";
    }
    final function show(){
        echo "I am final so you cannot override me";
    }
}
class Son extends Father {
    function display(){
         echo "Yea I overrided";
    }
}
```

## Final Class
### Example
```php
final class Father {
    function display(){
         echo "Final";
    }
}

class Son extends Father { // ❌ Error: Cannot extend final class
}
```