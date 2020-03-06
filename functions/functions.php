<?php 
function userNav(){
  echo "
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='navbar-brand' href='#'>Sensum Magic Mirror</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
        <ul class='navbar-nav ml-auto'>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-info' href='/SensumEmotionalApplication/serviceuser/serviceuserhome.php'>Home</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-primary' href='/SensumEmotionalApplication/serviceuser/userevents/eventcalendar.php'>View Events</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-danger' href='/SensumEmotionalApplication/serviceuser/sensumform/sensumform.php'>Daily Walkthrough</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-success' href='/SensumEmotionalApplication/serviceuser/reports/reports.php'>View Reports</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-warning' href='/SensumEmotionalApplication/serviceuser/settings/settings.php'>Your Settings</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-primary' href='/SensumEmotionalApplication/login/logout.php'>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  ";
}

function carerNav(){
  echo "
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <a class='navbar-brand' href='#'>Sensum Magic Mirror</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
        <ul class='navbar-nav ml-auto'>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-info' href='/SensumEmotionalApplication/carer/carerhome.php'>Home</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-primary' href='/SensumEmotionalApplication/carer/carerevents/eventcalendar.php'>View Events</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-danger' href='/SensumEmotionalApplication/carer/responses/responses.php'>User Responses</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-success' href='/SensumEmotionalApplication/carer/carerreports/carerreports.php'>View Reports</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-warning' href='/SensumEmotionalApplication/carer/carersettings/settings.php'>Your Settings</a>
          </li>
          <li class='nav-item mx-2'>
            <a class='nav-link rounded bg-primary' href='/SensumEmotionalApplication/login/logout.php'>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  ";
}


function getEventsSensum(){

  $geteventsquery = "SELECT * FROM `Sensum_Events`";
  $result = mysqli_query($conn, $geteventsquery) or die(mysqli_error($conn));

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $description = $row["Description"];
      $eventstart = $row["Event_Start"];
      $eventend = $row["Event_End"];
      echo "<div class='tab'> tab:
              <p>$description</p>
              <p>$eventstart</p>
              <p>$eventend</p>
              <p><input type='text' name='' id='' on.input='this.className = '''></p>
              <p><input type='text' name='' id='' on.input='this.className = '''></p>
            </div>";
    }
  }
}


function stepGenerator(){
	for ($i=0; $i < 6; $i++) { 
		# code...
		echo "<span class='step'></span>";
	}
}

?>