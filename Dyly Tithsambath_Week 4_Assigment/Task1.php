<?php
 /*
    Multiple inheritance
    
        Advantage
            - Allow one class to be able to inherit from more than one class.
            - Minimize the amount of duplicate code
        Disadvantage
            - The diamond problem : Occur when a class inherit from more than one classes, And that classes is also have a common baseclass.
              So, That classes will have the same method. And when subclass call one of it class this will cause compile time error.
              But that problem is not occur any more when interface is introduced and multiple inheritance by extends from more than one class is banned.


    The code below illustrate how multiple inheritance can achieve:
 */

    interface Animal {
        public function eat();
        public function sleep();
        public function play();
    }

    interface Pet {

        public function play();
        public function playWithHuman();
        
    }

    class Wolve implements Animal{
        
        public function eat(){
            echo 'eat...'.'<br>';
        }

        public function sleep(){
            echo 'sleep...'.'<br>';
        }

        public function play(){
            echo 'play...'.'<br>';
        }

        public function howling(){
            echo 'howl....'.'<br>';
        }

    }

    class Dog extends Wolve implements Pet{

        public function playWithHuman()
        {
            echo 'hide and seek'.'<br>';
        }

    }

    $dog = new Dog();

    echo '<h2>Dog Class is inherit from Wolve & Pet</h2>'.'<br>';
    $dog->eat();
    $dog->sleep();
    $dog->play();
    $dog->playWithHuman();
    $dog->howling();
?>