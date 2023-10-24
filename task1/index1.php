<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Programming using PHP - Coursework 1 - Task 1</title>
</head>
<body>
	<header>   
        <h1>Web Programming using PHP - Coursework 1 - Task 1</h1>
	</header>
	<main>


        <!--Your PHP solution code should go here-->
		<?php
			echo '<h2> Task 1</h2>';

			$isbn = '978-0-545-01022-1';

			$withOutDash = str_replace("-","",$isbn);


			echo "<p> The is iSBN is: $isbn</p>";

			echo '<p> This is a '.strlen($withOutDash).' digti ISBN </p>';

			echo "<p> The ISBN check digit is".$isbn[-1]." </p>";

			echo "<p> The ISBN registration group prefix is ".substr($isbn,0,3)."</p>";




		
		?>
    </main> 
</body>

</html>