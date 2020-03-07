<?php
include("../../connection/conn.php");
include("../../functions/functions.php");

session_start();

if(!isset($_SESSION["sensum_40159215"]))
{
	header("Location: /SensumEmotionalApplication/login/login.php");
}

$responsequery = "SELECT * FROM `Sensum_HealthRecord`
				  INNER JOIN `Sensum_FeedbackType`
				  ON `Sensum_HealthRecord`.`Feedback` = `Sensum_FeedbackType`.`Feedback_Type`
				  INNER JOIN `Sensum_Users`
				  ON `Sensum_HealthRecord`.`User_ID` = `Sensum_Users`.`ID`
				  INNER JOIN `Sensum_Events`
				  ON `Sensum_HealthRecord`.`Event_ID` = `Sensum_Events`.`id`
				  LIMIT 10";
$responsequeryresult = mysqli_query($conn, $responsequery);
$responsecount = mysqli_num_rows($responsequeryresult);
echo $todaysdate = date('Y-m-d H:i:s');
echo $nextdate = date('Y-m-d H:i:s', strtotime("+1 week"));
?>

<!-- https://www.webslesson.info/2016/10/make-simple-pie-chart-by-google-chart-api-with-php-mysql.html -->
<!DOCTYPE html>

<html>
<head>
	<title>Your User Reports</title>
	<!-- Bootstrap core CSS -->
	<link href="/SensumEmotionalApplication/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="/SensumEmotionalApplication/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="/SensumEmotionalApplication/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="/SensumEmotionalApplication/css/landing-page.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
	<script type="text/javascript">  
		google.charts.load('current', {'packages':['corechart']});  
		google.charts.setOnLoadCallback(drawChart);  
		function drawChart()  
		{  
			var data = google.visualization.arrayToDataTable([  
				['Emotion', 'Number'],  
				<?php  
				$todaysdate = date('Y-m-d H:i:s');
				$nextdate = date('Y-m-d H:i:s', strtotime("+1 week"));

				$feedbackquery = "SELECT *, count(*) as number FROM `Sensum_HealthRecord`
									INNER JOIN `Sensum_FeedbackType`
									ON `Sensum_HealthRecord`.`Feedback` = `Sensum_FeedbackType`.`Feedback_Type`
									INNER JOIN `Sensum_Events`
									ON `Sensum_HealthRecord`.`Event_ID` = `Sensum_Events`.`id`
									WHERE `Sensum_HealthRecord`.`User_ID` = 1 AND `Sensum_Events`.`Event_Start` BETWEEN '$todaysdate' AND '$nextdate'
									GROUP BY `Feedback`";
				$result = mysqli_query($conn, $feedbackquery);
				while($row = mysqli_fetch_array($result))  
				{  
					echo "['".$row["Emotion"]."', ".$row["number"]."],";  
				}  
				?>  
				]);  
			var options = {  
				title: 'Weekly Responses Report',  
                      //is3D:true,  
                      pieHole: 0.4  
                  };  
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                  chart.draw(data, options);  
              }  
          </script>
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		  <script>
		        //Jquery code here!
		        $(document).ready(function(){
		           $("#happy").click(function(){
		             $("#report").load("filterhappy.php", {
		             });
		           });
		           $("#sad").click(function(){
		             $("#report").load("filtersad.php", {
		             });
		           });
		           $("#indifferent").click(function(){
		             $("#report").load("filterindifferent.php", {
		             });
		           });
		           $("#more").click(function(){
		             $("#report").load("load-more.php", {
		             });
		           });
		         });
		  </script>
</head>

      <body>
      	<?php
      	carernav();
      	?>
      	<br/> <br/>

      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-lg-6">
      				<h3>Your User Reports!</h3>
      				<div style="width: 600px;">
      				<div id="piechart" style="width: 900px; height: 500px;"></div>  
      				</div>		
      			</div>
      			<div class="col-lg-6">
      				<h3>Report Breakdown</h3>
      				<div class="btn-group" role="group" aria-label="Basic example">
      					<button type="button" class="btn btn-success" id="happy">Show Happy Responses</button>
      					<button type="button" class="btn btn-danger" id="sad">Show Sad Responses</button>
      					<button type="button" class="btn btn-warning" id="indifferent">Show Indifferent Responses</button>
      					<button type="button" class="btn btn-secondary" id="more">View More</button>
      				</div>
      				<table class="table table-sm">
      					<thead>
      						<tr>
      							<th scope="col">#</th>
      							<th scope="col">Event Name</th>
      							<th scope="col">Event Response</th>
      							<th scope="col">Event Start</th>
      							<th scope="col">Event End</th>
      						</tr>
      					</thead>
      					<tbody id="report">
      						<?php
      						$rownumber = 1; 
							if ($responsecount > 0) {
								while ($row = mysqli_fetch_assoc($responsequeryresult)) {
									$eventname = $row['Description'];
									$eventresponse = $row['Emotion'];
									$eventstart = $row['Event_Start'];
									$eventend = $row['Event_End'];
									echo "<tr id='reporttable'>
											<td>$rownumber</td>
											<td>$eventname</td>
											<td>$eventresponse</td>
											<td>$eventstart</td>
											<td>$eventend</td>
		      							</tr>";
		      						$rownumber++;
								}
								# code...
							} else {
								echo "<tr>
								No Results!
		      						</tr>";
							}
							
      						?>

      					</tbody>
      				</table>
      				
      			</div>
      		</div>
      	</div>

      	<!-- Bootstrap core JavaScript -->
  <script src="/SensumEmotionalApplication/vendor/jquery/jquery.min.js"></script>
  <script src="/SensumEmotionalApplication/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      </body>
      </html>



