<?php include "libraryData.php";

$a = array($Book1, $Book2, $Book3, $Book4, $Book5, $Book6, $Book7 , $Book8, $Book9, $Book10);
$i = 0;

echo "Library Book Management System<br><br>";

while ($i<10){
    
    
    
    echo "Title of the Book: ";
    echo $a[$i]->bookTitle."<br>";

    echo "Author: ";
    echo $a[$i]->author;

    echo $a[$i]->borrowersName."<br>";
    
    echo "Number of days Borrowed: ";
    echo $a[$i]->daysBorrowed."<br>";

    echo $a[$i]->calculateLateFee();

    echo "Status: ";
    echo $a[$i]->getStatus()."<br>";
   
    
     
    $i++;
    echo "<br>";
}

?>

   