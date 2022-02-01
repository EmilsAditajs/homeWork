<?php
class Dog{
    public string $name;
    public string $sex;
    public string $father = "null";
    public string $mother = "null";
    public function __construct($name,$sex)
    {
        $this->name=$name;
        $this->sex =$sex;
    }
    public function addFather($father){
        $this->father=$father;
    }
    public function addMother($mother){
        $this->mother=$mother;
    }
    public function fathersName(){
        if($this->father != "null"){
            return $this->father;
        }
        else{
            return "unknown";
        }
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getSex(){
        return $this->sex;
    }

    public function HasSameMotherAs($dog, $otherDog)
    {
        if($dog->mother == $otherDog->mother)
        {
            return true;
        }
        return false;
    }
}

class DogTest{
    public array $dogs =[];
    public function __construct()
    {

        $this->dogs[] = new Dog("Max","male");
        $this->dogs[] = new Dog("Rocky","male");
        $this->dogs[] = new Dog("Sparky","male");
        $this->dogs[] = new Dog("Buster","male");
        $this->dogs[] = new Dog("Sam","male");
        $this->dogs[] = new Dog("Lady","female");
        $this->dogs[] = new Dog("Molly","female");
        $this->dogs[] = new Dog("Coco","female");

        $this->dogs[0]->addFather("Rocky");
        $this->dogs[0]->addMother("Lady");

        $this->dogs[7]->addMother("Molly");
        $this->dogs[7]->addFather("Buster");

        $this->dogs[1]->addFather("Sam");
        $this->dogs[1]->addMother("Molly");

        $this->dogs[3]->addMother("Lady");
        $this->dogs[3]->addFather("Sparky");
    }
    public function getFathersName(){

    }
    public function getDogs(){
        return $this->dogs;

    }
}
$test = new DogTest();

var_dump($test);


