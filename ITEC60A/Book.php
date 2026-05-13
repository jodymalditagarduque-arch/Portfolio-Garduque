<?php
class Book{
    public $bookTitle;
    public $author;
    public $borrowersName;
    public $daysBorrowed;

    function __construct($bookTitle, $author, $borrowersName, $daysBorrowed){
        $this->bookTitle = $bookTitle;
        $this->author = $author;
        $this->borrowersName = $borrowersName;
        $this->daysBorrowed = $daysBorrowed;
    }
    function calculateLateFee(){
        if($this->daysBorrowed <= 7){
            $lateFee = 0;
            echo "No Late Fee<br>";
        }
        elseif($this->daysBorrowed >= 8 && $this->daysBorrowed <= 14){
            $lateFee = ($this->daysBorrowed - 7 )* 10 ;
            echo "Late Fee:".$lateFee."<br>";
        }
        else{       
            $lateFee = 70 + ($this->daysBorrowed - 14)* 20  ;
            echo "Late Fee:".$lateFee."<br>";
        }
    }
    function getStatus (){
        if ($this->borrowersName == ""){
            echo "Available";
        }
        else{
            echo "Borrowed";
        }
        
    }
    
}
 


