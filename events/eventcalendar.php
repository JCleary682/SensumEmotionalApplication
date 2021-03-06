<?php
include("../functions/functions.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Fullcalendar scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

	<script>
		$(document).ready(function() {
			var calendar = $('#calendar').fullCalendar({
				editable: true,
				header: {
					left: 'prev next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				events: 'load.php',
				selectable: true,
				selectHelper: true,
				select: function(start, end, allDay)
				{
					var title = prompt("Enter Event Title");
					if(title)
					{
						var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
						var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
						$.ajax({
							url:"insert.php",
							type:"POST", 
							data:{title:title, start:start, end:end},
							success:function()
							{
								calendar.fullCalendar('refetchEvents');
								alert("Added Successfully");
							}
						})
					}
				},
				editable: true,
				eventResize: function(event){
					var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
					var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
					var title = event.title;
					var id = event.id;
					$.ajax({
						url:"update.php",
						type:"POST", 
						data:{title:title, start:start, end:end, id:id},
						success:function(){
							calendar.fullCalendar('refetchEvents');
							alert('Event Update');
						}
					})
				}, 
				eventDrop:function(event)
				{
					var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
					var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
					var title = event.title;
					var id = event.id;
					$.ajax({
						url:"update.php",
						type:"POST",
						data:{title:title, start:start, end:end, id:id},
						success:function()
						{
							calendar.fullCalendar('refetchEvents');
							alert("Event Updated");
						}
					})
				},
				eventClick:function(event)
				{
					if(confirm("Are you sure you would like to remove the event?"))
					{
						var id = event.id;
						$.ajax({
							url:"delete.php",
							type: "POST",
							data:{id:id},
							success:function()
							{
								calendar.fullCalendar('refetchEvents');
								alert("Event Removed");
							}
						});
					}
				},
			});
		});
	</script>

    <title>Hello, world!</title>
  </head>
  <body>
    <div name="container">
      
        <?php
          $navbar = Navbar();
        ?> 
    </div>
    <h1>Hello, world!</h1>

    <br>
    <br>
    <!-- Display Calendar -->

    <div class="container">
    	<div id="calendar"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
  </body>
</html>