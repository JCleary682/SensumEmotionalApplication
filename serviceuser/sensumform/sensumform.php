<?php
session_start();

if(!isset($_SESSION["sensum_40159215"]))
{
    header("Location: /SensumEmotionalApplication/login/login.php");
}

include("../../connection/conn.php");
include("../../functions/functions.php");
// $geteventsquery = "SELECT * FROM `Sensum_Events`";
// $result = mysqli_query($conn, $geteventsquery) or die(mysqli_error($conn));
// $numrows = $result->num_rows;
// printf($numrows);
?>
<html>  
<head>  
  <title>PHP - Sending multiple forms data through jQuery Ajax</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../../css/landing-page.min.css" rel="stylesheet">
  <!--         <link rel="stylesheet" href="style/style.css" /> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script type="text/javascript" src="js/sensumForm.js"></script> -->
  <!-- Could this be the problem????? -->
  <!-- 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
  <script>
        //Jquery code here!
        $(document).ready(function(){
           // var eventCount = 1;
           var eventCount = document.getElementById("Event_ID").value;
           $("#save").click(function(){
             eventCount = eventCount + 1;
             console.log(eventCount);
             $("#eventtab").load("load-events.php", {
               eventNewCount: eventCount
             });
           });
         });
  </script>
   </head>  
   <body>
    <!-- Navbar --> 
    <?php
      usernav();
    ?>
    <!-- Navbar end -->
    <div class="container">
       <br />

       <h3 align="center">Sensum Daily Events</a></h3><br />
       <br />
       <br />
    <div align="center" style="margin-bottom:5px;">
        <button type="button" name="add" id="add" class="btn btn-success btn-xs">View Events</button>
      <br />
      <br />
    </div>
    <!-- Form to run insert script for array of entries -->
    <form method="post" id="user_form">
        <div class="table-responsive-sm">
           <!-- the table targetted by the insert request -->
        <table class="table table-striped table-bordered" id="user_data">
            <tr>
             <th>Event name</th>
             <th>Event Time</th>
             <th>Event Response</th>
             <th>Details</th>
             <th>Remove</th>
           </tr>
         </table>
       </div>
       <div align="center">
         <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
       </div>
     </form>

 <br/>
</div>
<!-- Form to enter values -->
<div id="user_dialog" title="Add Data">

 <!-- Get form entries from database -->
 <?php
 $todaysdate = date('Y-m-d H:i:s');
 $nextdate = date('Y-m-d H:i:s', strtotime("+1 day"));
 $geteventsquery = "SELECT * FROM `Sensum_Events`
                    WHERE `User_ID` = 1 AND `Event_Start` BETWEEN '$todaysdate' AND '$nextdate'";
 $result = mysqli_query($conn, $geteventsquery) or die(mysqli_error($conn));
 $row = mysqli_fetch_assoc($result);
 print_r($result);
 if(mysqli_num_rows($result) > 0){
   $eventid = $row['id'];
   $userid = $row['User_ID'];
   $description = $row['Description'];
   $eventstart = $row['Event_Start'];
   $eventend = $row['Event_End'];
   $eventCount = 0;
   echo "	<div class ='tab' id='eventtab'>
   <input type='hidden' id='User_ID' name='userid' value='$userid'>
   <input type='hidden' id='Event_ID' name='eventid' value='$eventid'>
   <input type='hidden' id='Event_Count' name='eventCount' value='$eventCount'>
   <div class='form-group'>
   <label>Event</label>
   <p>$description</p>
   <input type='hidden' name='eventdescription' id='eventdescription' class='form-control' value='$description' on.input='this.className = '' />
   </div>
   <div class='form-group'>
   <label>Event Start</label>
   <p>$eventstart<p>
   <input type='hidden' name='eventstart' id='eventstart' class='form-control' value='$eventstart' on.input='this.className = '' />
   </div>
   <div class='form-group'>
   <label>Event End</label>
   <p>$eventend<p>
   <input type='hidden' name='eventend' id='eventend' class='form-control' value='$eventend' on.input='this.className = '' />
   </div>
   </div>
   ";
 }
 ?>

     <div class='form-group'>
      <span id='error_emotion' class='text-danger'></span>
      <br/>
      <br/>
      <br/>
      <!-- Fix to weird js error where first value is not being inserted -->
      <label class='dodgybutton' style='display: none'>
       <input class='dodgybutton' style='display: none' type='radio' name='emotion' id='emotion' value='0'>
       <img class='dodgybutton' style ='display: none' src='/SensumEmotionalApplication/img/Happy.png' alt='Happy Face'>
     </label>
     <!-- Fix End -->
     <label>
       <input type='radio' name='emotion' id='emotion' value='1'>
       <img src='/SensumEmotionalApplication/img/Happy.png' alt='Happy Face'>
     </label>
     <label>
       <input type='radio' name='emotion' id='emotion' value='2'>
       <img src='/SensumEmotionalApplication/img/Sad.png' alt='Sad Face'>
     </label>
     <label>
       <input type='radio' name='emotion' id='emotion' value='3'>
       <img src='/SensumEmotionalApplication/img/indifferent.png' alt='Indifferent Face'>
     </label>
    </div>
    <div class='form-group' align='center'>
      <input type='hidden' name='row_id' id='hidden_row_id' />
      <button type='button' name='save' id='save' class='btn btn-info'>Save</button>
    </div>
  </div>
<!-- Alerts for incorrect actions -->
	<!-- <div class='form-group' align='center'>
			<input type='hidden' name='row_id' id='hidden_row_id' />
			<button type='button' name='save' id='save' class='btn btn-info'>Save</button>
		</div> -->
    <div id='action_alert' title='Action'>

    </div>
</body>  
</html>  




<script>  
  $(document).ready(function(){ 
    var count = 0;
     $('#user_dialog').dialog({
      autoOpen:false,
      width:500,
    });
    // Add entries to form
    $('#add').click(function(){
    	$('#user_dialog').dialog('option', 'title', 'Add Data');
    	$('#emotion').val('');
    	$('#error_emotion').text('');
    	$('#save').text('Save');
    	$('#user_dialog').dialog('open');
    });
    // Save entries for form array + validation and display in a table
    $('#save').click(function(){
    	var emotion ='';
      //Needs to take emotion description for event response
      var emotiondescription = '';
    	var error_emotion = '';
    	var eventname = '';
    	var username ='';
    	var eventid = $('#Event_ID').val();
    	var eventdescription = $('#eventdescription').val();
      var userid = $('#User_ID').val();

      if($('input[name=emotion]:checked').val() == '1'){
        emotiondescription = 'Happy';
      } else if($('input[name=emotion]:checked').val() == '2'){
        emotiondescription = 'Sad';
      } else if($('input[name=emotion]:checked').val() == '3'){
        emotiondescription = 'Indifferent';
      } else {
        emotiondescription = '';
      }
    	//Takes Event id
    	//Currently only taking first event id
    	// if($('#Event_ID').val() == '')
    	// {
    	// 	eventid = 'Last Name is required';
    	// 	$('#error_last_name').text(error_last_name);
    	// 	$('#last_name').css('border-color', '#cc0000');
    	// 	eventid = '';
    	// }
    	// else
    	// {
    	// 	eventid = '';
    	// 	$('#error_last_name').text(error_last_name);
    	// 	$('#last_name').css('border-color', '');
    	// 	eventid = $('#Event_ID').val();
    	// }

    	//Takes event description
    	// if($('#eventdescription').val() == '')
    	// {
    	// 	error_last_name = 'Last Name is required';
    	// 	$('#error_last_name').text(error_last_name);
    	// 	$('#last_name').css('border-color', '#cc0000');
    	// 	eventdescription = '';
    	// }
    	// else
    	// {
    	// 	error_last_name = '';
    	// 	$('#error_last_name').text(error_last_name);
    	// 	$('#last_name').css('border-color', '');
    	// 	eventdescription = $('#eventdescription').val();
    	// }
    	
    	//Takes User ID
    	// if($('#User_ID').val() == '')
    	// {
    	// 	error_last_name = 'Last Name is required';
    	// 	$('#error_last_name').text(error_last_name);
    	// 	$('#last_name').css('border-color', '#cc0000');
    	// 	userid = '';
    	// }
    	// else
    	// {
    	// 	error_last_name = '';
    	// 	$('#error_last_name').text(error_last_name);
    	// 	$('#last_name').css('border-color', '');
    	// 	userid = $('#User_ID').val();
    	// }

    	// Validation for radio buttons
    	if($('input[name=emotion]:checked').val() == ''){
    		error_emotion = "Please respond with an emotion";
    		$('#error_emotion').text(error_emotion)
    		$('#emotion').css('border-color', '#cc0000');
    		emotion = '';
    	} else {
    		error_emotion = '';
    		$('#error_emotion').text(error_emotion);
    		$('#emotion').css('border-color', '');
    		emotion = $('input[name=emotion]:checked').val();
    	}

    	if(error_emotion != '')
    	{
    		return false;
    	}
    	else
    	{
    		if($('#save').text() == 'Save')
    		{
    			count = count + 1;
    			output = '<tr id="row_'+count+'">';
    			output += '<td>'+eventdescription+' <input type="hidden" name="hidden_event_name[]" id="event_name'+count+'" class="event_name" value="'+eventid+'" /></td>';
    			output += '<td>'+userid+' <input type="hidden" name="hidden_user_name[]" id="user_name'+count+'" value="'+userid+'" /></td>';
    			output += '<td>'+emotiondescription+' <input type="hidden" name="hidden_emotion[]" id="emotion'+count+'" value="'+emotion+'" /></td>';
    			output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
    			output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    			output += '</tr>';
    			//Appends user data table with above details
    			$('#user_data').append(output);
    		}
    		else
    		{
    			var row_id = $('#hidden_row_id').val();
    			output = '<td>'+eventid+' <input type="hidden" name="hidden_event_name[]" id="event_name'+row_id+'" class="event_name" value="'+eventid+'" /></td>';
    			output += '<td>'+last_name+' <input type="hidden" name="hidden_user_name[]" id="user_name'+row_id+'" value="'+last_name+'" /></td>';
    			output += '<td>'+emotion+' <input type="hidden" name="hidden_emotion[]" id="emotion'+row_id+'" value="'+emotion+'" /></td>';
    			output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
    			output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    			$('#row_'+row_id+'').html(output);
    		}


    		// $('#user_dialog').dialog('close');
    	}
    });
    // View details of each entry upon click
    $(document).on('click', '.view_details', function(){
    	var row_id = $(this).attr("id");
    	var first_name = $('#first_name'+row_id+'').val();
    	var last_name = $('#last_name'+row_id+'').val();
    	$('#first_name').val(first_name);
    	$('#last_name').val(last_name);
    	//Changes text from SAVE to EDIT
    	$('#save').text('Edit');
    	$('#hidden_row_id').val(row_id);
    	$('#user_dialog').dialog('option', 'title', 'Edit Data');
    	$('#user_dialog').dialog('open');
    });
    // Remove entries data
    $(document).on('click', '.remove_details', function(){
    	var row_id = $(this).attr("id");
    	if(confirm("Are you sure you want to remove this row data?"))
    	{
    		$('#row_'+row_id+'').remove();
    	}
    	else
    	{
    		return false;
    	}
    });

    $('#action_alert').dialog({
    	autoOpen:false
    });
    // Runs insert script into form by checking entries on userform
    $('#user_form').on('submit', function(event){
    	event.preventDefault();
    	// Counts each entry
    	var count_data = 0;
    	$('.event_name').each(function(){
    		count_data = count_data + 1;
    	});
    	// if more than 1 entry, run script
    	if(count_data > 0)
    	{
    		var form_data = $(this).serialize();
    		$.ajax({
    			url:"insert.php",
    			method:"POST",
    			data:form_data,
    			success:function(data)
    			{
    				//Removes table rows and opens a dialog alert when successful
    				$('#user_data').find("tr:gt(0)").remove();
    				$('#action_alert').html('<p>Data Inserted Successfully</p>');
    				$('#action_alert').dialog('open');
    			}
    		})
    	}
    	// Else alert user that no entries have been submitted
    	else
    	{
    		$('#action_alert').html('<p>Please Add atleast one data</p>');
    		$('#action_alert').dialog('open');
    	}
    });

});  
</script>