<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Programming using PHP - Coursework 1 - Task 3</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/plain.css" />
</head>
<body>
	<header>   
        <h1>Web Programming using PHP - Coursework 1 - Task 3</h1>
	</header>
	<main>
        <!--Your PHP solution code should go here-->
		<?php

		
		$data = [
			['artist'=>'Frankie Laine','title' =>'I Believe','dateIn'=>'23/01/1953','dateOut'=>'29/05/1953'],
			['artist'=>'Wet Wet Wet','title'=>'Love Is All Around','dateIn'=>'06/08/1994','dateOut'=>'21/11/1994'],
			['artist'=>'Drake (featuring Wizkid and Kyla)','title'=>'One Dance','dateIn'=>'05/12/2016','dateOut'=>'20/03/2017'],
			['artist'=>'Queen','title'=>'Bohemian Rhapsody','dateIn'=>'19/10/1975','dateOut'=>'27/01/1976'],
			['artist'=>'Ed Sheeran','title'=>'Shape of You','dateIn'=>'01/06/2017','dateOut'=>'09/09/2017'],
			['artist'=>'Slim Whitman','title'=>'Rose Marie','dateIn'=>'30/05/1955','dateOut'=>'17/08/1955'],
			['artist'=>'Luis Fonsi & Daddy Yankee(feat Justin Bieber)','title'=>'Despacito','dateIn'=>'21/09/2017','dateOut'=>'08/12/2017'],
			['artist'=>'Tones and I','title'=>'Dance Monkey','dateIn'=>'14/02/2019','dateOut'=>'01/05/2019'],
			['artist'=>'Ed Sheeran','title'=>'Bad Habits','dateIn'=>'01/04/2021','dateOut'=>'18/06/2021'],
			['artist'=>'David Whitfield','title'=>'Cara Mia','dateIn'=>'25/07/1954','dateOut'=>'05/10/1954'],
			['artist'=>'Whitney Houston','title'=>'I Will Always Love You','dateIn'=>'04/01/1992','dateOut'=>'14/03/1992'],
			['artist'=>'Rihanna (featuring Jay/Z)','title'=>'Umbrella','dateIn'=>'01/10/2007','dateOut'=>'11/12/2007'],
			['artist'=>'Bryan Adams','title'=>'(Everything I Do) I Do It for You','dateIn'=>'12/03/1991','dateOut'=>'04/07/1991'],
			['artist'=>'Harry Styles','title'=>'As It Was','dateIn'=>'25/05/2022','dateOut'=>'05/08/2022']
		];
		
		
		foreach ($data as &$entry) {
			$dateIn = strtotime(str_replace('/', '-', $entry['dateIn']));
			$dateOut = strtotime(str_replace('/', '-', $entry['dateOut']));
			$weeks = floor(($dateOut - $dateIn) / (7 * 24 * 60 * 60)); 
			$entry['weeks'] = $weeks;
		}
		
		
		usort($data, function($a, $b) {
			return $b['weeks']-$a['weeks'] ;
		});
		
		function generateChartHTML($data) {
			
			usort($data, function ($a, $b) {
				return $b['weeks'] - $a['weeks'];
			});
		
			$uniqueWeeks = array_unique(array_column($data, 'weeks'));
		
			
			echo '<ul>';
			foreach ($uniqueWeeks as $weeks) {
				echo '<li>' . $weeks . ' weeks in chart';
				echo '<ol type="i">';
				
				
				$filteredData = array_filter($data, function ($entry) use ($weeks) {
					return $entry['weeks'] === $weeks;
				});
				usort($filteredData, function ($a, $b) {
					return strtotime(str_replace('/', '-', $a['dateIn'])) - strtotime(str_replace('/', '-', $b['dateIn']));
				});
		
				foreach ($filteredData as $entry) {
					echo '<li>Artist/Song: ' . $entry['artist'] . '/' . $entry['title'] . '. Entered chart: ' . date('jS F Y', strtotime(str_replace('/', '-', $entry['dateIn']))) . '</li>';
				}
				
				echo '</ol>';
				echo '</li>';
			}
			echo '</ul>';
		}
		
		
		generateChartHTML($data);
	
		
		?>
    </main> 
</body>
</html>