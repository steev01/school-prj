<?php
      
      // connect to database
     $conn = mysqli_connect('localhost', 'steev', 'steev1234', 'sch_pr');


        // check connection
     if (!$conn) {
     	 echo 'connection error: '  . mysqli_connect_error();
     }

?>