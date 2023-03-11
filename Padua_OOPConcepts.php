<?php
class parentClass {
    private $third;
    private $int;
    private $string;
  
    //setters
    public function setThird($third) {
      $this->third = $third;
    }

    public function setInt($num) {
      $this->int = $num;
    }

    public function setString($str) {
      $this->string = $str;
    }

    //getters 
    public function getThird() {
      return $this->third;
    }

    public function getInt() {
      return $this->int;
    }
    
    public function getString() {
      return $this->string;
    }
  
    //Displayinfo() to show the value of the member variables 
    public function displayInfo() {
        echo "Third member variable: " . $this->third . "<br><br>";  
        echo "Int member variable: " . $this->int . "<br><br>"; 
        echo "String member variable: " . $this->string . "<br><br>"; 
    }
  }

  class childA extends parentClass {  
 
    public function __construct(private $childString) {
      $this->childString = $childString;
    }
  
    public function getchildString() {
      return $this->childString;
    }

    public function printInfo() {
      parentClass::displayInfo();
      echo "childA Info: " . $this->childString . "<br><br>";
    }

  }  
  //---------------------------------------------------------

  class ChildB extends parentClass {
  
    public function __construct(private $childBString) {
        $this->childBString = $childBString;
    }
  
    public function getChildBString() {
        return $this->childBString;
    }
  
    public function printInfo() {
        parentClass::displayInfo();
        echo "ChildB Info: " . $this->childBString . "<br><br>";
    }
}

// ---------------------------------------------------------------
    class ChildC extends ChildB {
  
    public function __construct(private $childCString) {
        $this->childCString = $childCString;
    }
  
    public function getchildCString() {
        return $this->childCString;
    }
  
    public function printInfo() {
      parentClass::displayInfo();
        echo "ChildC Info: " . $this->childCString . "<br><br>";
    }
}

  
  $parentClass = new parentClass();
  $parentClass->setThird("Ito'y First");
  $parentClass->setInt(123);
  $parentClass->setString("Hello World");
  $parentClass->displayInfo();
  
  $ChildA = new childA("ChildA");
  $ChildA->setThird("Ito'y Second");
  $ChildA->setInt(1234);
  $ChildA->setString("Hello World Philippines");  
  $ChildA->displayInfo();
  $ChildA->printInfo();
  
  $ChildB = new ChildB("ChildB");
  $ChildB->setThird("Ito'y Third");
  $ChildB->setInt(12345);
  $ChildB->setString("Hello world Global"); 
  $ChildB->printInfo();

  $ChildC = new ChildC("ChildB");
  $ChildC->setThird("Ito'y Fourth");
  $ChildC->setInt(1234567);
  $ChildC->setString("Hello Global");
  $ChildC->printInfo();

?>