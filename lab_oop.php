<?php
// ">>>         PART A         <<<"

class Student
{
    function sayHello()
    {
        echo "Hello! I am a student." . "<br>";
    }
 
}
$student1 = new student();
$student1->sayHello();

// echo ">>>         PART B         <<<"

class StudentInfo
{
    public $name;
    public $studentId;
    public $department;

    function __construct($name, $studentId, $department)
    {
        $this->name = $name;
        $this->studentId = $studentId;
        $this->department = $department;
    }

    function showInfo()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Student ID: " . $this->studentId . "<br>";
        echo "Department: " . $this->department . "<br><br>";
    }
}

$student1 = new StudentInfo(
    "Ali",
    1001,
    "Computer Science"
);
// necho ">>>         PART C         <<<"
// 
/*
    1. Here we created One class.
    2. There we store Two objects $student1 & $student2.
*/

$student2 = new StudentInfo(
    "Ahmad",
    1002,
    "Information System"
);
// This (->) symbol means that= access something belonging to this object.
$student1->showInfo();
$student2->showInfo();

// echo ">>>         PART D        <<<"
class BankAccount
{
    public $ownerName;
    private $balance;

    function __construct($ownerName, $balance)
    {
        $this->ownerName = $ownerName;
        $this->balance = $balance;
    }
    function showBalance()
    {
        echo "Balance: " . $this->balance . "<br><br>";
    }
}
$account1 = new BankAccount(
    "Ahmad", 5000
);
echo "Owner: " . $account1->ownerName . "<br>";
$account1->showBalance();

//   echo $account1->balance;   // Here it does not work because the $balance is private and this access modifier does not work outside the class.

// echo ">>>         PART E         <<<"

class Person 
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function introduce()
    {
    echo "My name is " . $this->name . "<br>"; 
    }
}

class StudentN extends Person 
{
    function study()
    {
        echo $this->name . " is studying." . "<br><br>";
    }
}
 
$student1 = new StudentN("Ali");
$student1->introduce();
$student1->study();

//
/*
    Q1. The Person is the parent class
    Q2. The StudentN is the Child Class
    Q3. The extends keyword create the inheritance relationship
    Q4. The introduce() method was written inside the parent class and inherited in the Student1 class
    Q5. Yes the $student1 can call the introduce() because it inherited
    Q6. Because the Student class inherited the introduce function from the parent class
*/

// echo ">>>      Part G               <<<"
class Vehicle 
{
    protected $brand;
    
    function __construct($brand)
    {
        $this->brand = $brand;
    }

    function start()
    {
        echo "The vehicle is starting. <br>";
    }
}

class Car extends Vehicle 
{
    function showBrand()
    {
        echo "Car brand: " . $this->brand;

    }
}
$car1 = new Car("Toyota");

$car1->start();
$car1->showBrand();



?>