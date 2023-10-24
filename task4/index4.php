<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Programming using PHP - Coursework 1 - Task 4</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/plain.css" />
</head>
<body>
	<header>   
        <h1>Web Programming using PHP - Coursework 1 - Task 4</h1>
	</header>
	

	<main>
		<h2> Task 4</h2>
		<h3>Module data results for php</h3>
        <!--Your PHP solution code should go here-->
		<?php
			$datasets = fopen("data/p1dataFile.txt","r") or die("unable to openfile!");
			$marks = array();

			while (!feof($datasets)) {
				$line = fgets($datasets);

				$currentMark = explode(",", $line)[1];

				array_push($marks,$currentMark);


			}
			


			function generatePtag($marks){
				$outPut = "<p> Data Serise: [";
				for ($i = 0; $i <sizeof($marks);$i++){
					$outPut.= $marks[$i].",";

				}
				$outPut = substr_replace($outPut,"]",-1);
				return $outPut;



			}


			$paragraph = generatePtag($marks);

			echo $paragraph;

			$sum = array_sum($marks);
			$mean = $sum / count($marks);
			echo "<p>Mean Mark: $mean</p>";


			$min = min($marks);
			$max = max($marks);
			$range = $max - $min;
			echo "<p>Range (max-min mark): $range</p>";


			$gradeCounts = array('A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'F' => 0);
foreach ($marks as $mark) {
    if ($mark >= 70) {
        $gradeCounts['A']++;
    } elseif ($mark >= 60) {
        $gradeCounts['B']++;
    } elseif ($mark >= 50) {
        $gradeCounts['C']++;
    } elseif ($mark >= 40) {
        $gradeCounts['D']++;
    } else {
        $gradeCounts['F']++;
    }
}

$totalCount = count($marks);

	echo "<table>";
	echo "<tr>";
	echo "<th>A</th>";
	echo "<th>B</th>";
	echo "<th>C</th>";
	echo "<th>D</th>";
	echo "<th>F</th>";
	echo "<th>TOTAL</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>{$gradeCounts['A']}</td>";
	echo "<td>{$gradeCounts['B']}</td>";
	echo "<td>{$gradeCounts['C']}</td>";
	echo "<td>{$gradeCounts['D']}</td>";
	echo "<td>{$gradeCounts['F']}</td>";
	echo "<td>{$totalCount}</td>";
	echo "</tr>";
	echo "</table>";



		

			
		?>
    </main> 
</body>
</html>