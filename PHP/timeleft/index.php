<html>
	<head>
		<style type="text/css">
		#graph-excerpt {
			width: 49%;
			float:left;

			margin-top: 50px;

			font-size: 10pt;
			font-family: 'Helvetica Neue', sans-serif;
			font-weight:300;
			letter-spacing: 0.1em;
			line-height:150%;
		}
		#date {
			font-size: 8pt;
			font-weight: 700;
			letter-spacing: 0.2em;
			text-transform: uppercase;
			text-align: right;
		}
		#graph-excerpt p {
			max-width:250px;
			margin-left: 200px;
		}
		#graph-container {
			width:50%;
			float:right;

			margin-top: 50px;
		}
		.cell {
			width: 6px;
			height:6px;
			margin: 0;
			padding: 0;
			margin-left:1px;
			margin-bottom: 1px;
		}
		.decade-label {
			font-size: 8pt;
			font-family: 'Helvetica Neue', sans-serif;
			font-weight:300;
			letter-spacing: .2em;
		}
		.decade-label>span {
			text-align: right;
			float:right;
			margin:3px;
		}
		.cell-current {
			background-color:#f00;

			display:inline-block;
		}
		.cell-past {
			background-color:#c2c2c2;
			display:inline-block;
		}
		.cell-future {
			background-color:#e2e2e2;
			display:inline-block;
		}

		.grid {
			width:466px;
			height:70px;
			margin-bottom: 7px;
		}
		.col-9-10 {
			width:416px;
			float:left;
		}
		.grid::after{
			clear:both;
		}
		.col-1-10 {
			width:50px;
			float:left;
		}
		</style>
	</head>
	<body>
		<?php
			// For example
			$then = "1950-01-01";

			//Convert it into a timestamp.
			$then = strtotime($then);

			//Get the current timestamp.
			$now = time();

			//Calculate the difference.
			$difference = $now - $then;

			//Convert seconds into weeks.
			$weeks = floor($difference / (60*60*24) / 7);

			// echo $weeks . '/' . 52*80;


			// spit out the goodstuff
		?>
		<div id="graph-excerpt">
			<p>To the right is a graph of my life - estimated at 80 years. Each cell represents one week; each line, a year. The red cell is my current week in life. The darker grey cells, ones already passed.</p>
			<p>At first glance it seems very pessimistic, to count down the days of one's life. This could be made more optimistic by instead counting up; marking important weeks with special colors, eg. "I have started studying Japanese over two years ago already".</p>
			<p id="date">7 Jan 2016</p>
		</div>
		<?php
			echo '<div id="graph-container">';

			$years = 0;
			echo '<div class="decade grid">';
			echo '<div class="decade-label col-1-10"><span>00s</span></div>';
			echo '<div class="decade-graph col-9-10">';
			for ($j=0; $j < 80; $j++) { 
				for ($i=0; $i < 52; $i++) {
					$isFilled = (($i + $j * 52) < $weeks);
					$isRed = (($i + $j * 52) == $weeks - 1);
					if ($isFilled) {
						if ($isRed) {
							echo '<span class="cell cell-current"></span>';
						} else {
							echo '<span class="cell cell-past"></span>';
						}
					} else {
						echo '<span class="cell cell-future"></span>';
					}
				}
				echo '<br/>';

				$years++;
				if (($years % 10) == 0) {
					
					echo '</div></div>';
					if ($years < 80) {
						echo '<div class="decade grid">';
						echo '<div class="decade-label col-1-10"><span>'.($years).'s</span></div>';
						echo '<div class="decade-graph col-9-10">';
					}
				}
			}

			echo '</div></div>';



			
		?>
	</body>
</html>