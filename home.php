<?php
	error_reporting();
	include 'connection.php';

	$id = $_POST['id'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	$subject = $_POST['subject'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$submit = $_POST['submit'];

	if(isset($submit)){
		$insert_sql = "INSERT INTO todo (type, description, subject, date, time) VALUES('".$type."','".$description."','".$subject."','".$date."','".$time."')";
		$insert_query = mysqli_query($conn, $insert_sql);
	}

	$b = $_REQUEST['b'];
	if($b){
		$delete_sql = "DELETE FROM todo WHERE id = '".$b."'";
		$delete_query = mysqli_query($conn, $delete_sql);
	}

	//<link rel="stylesheet" type="text/css" href="styleHome.css">
?>

<html>	
	<head>
<style>
* {
  margin: 0;
  padding: 0;
}

body {
    background-color: #060606;
    color: white;
}

.todolist {
    margin-left: auto;
    margin-right: auto;
}

.headerPomodoro {
    margin-left: 100;
    width: 40%;
}
  
.sidebar a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
  }
  
.sidebar a:hover {
    color: #f1f1f1;
  }

.sidebarDesign {
	width: 20%;
	left: 0.5%;
	position: fixed;
	height: 100%;
	z-index: 1;
	padding: 1px 0;
}

.sidebar {
	padding-top: 5%;
	border-radius: 1%;
	background-color: #1A1D21;
	height: 1120px;

}

.sidebarContent {
	padding-top: 3%;
	padding-left:2%;
    margin-left: 21%;
    margin-right: 1%;
    font-size: 28px;
    background-color: #1A1D21;
    height: 1120px;
    border-radius: 1%;
}

@media screen and (max-height: 450px) {
    .sidebar {padding-top: 2%;}
    .sidebar a {font-size: 18px;}
  }
</style>

		<audio id="alarmAudio"><source src="Assets/alarmNoise.mp3" type="audio/mpeg"></audio>
		<picture id="ringingPicture"><source srcset="Assets/bellRing.png" type="image/png"></picture>
		<picture id="normalPicture"><source srcset="Assets/bell.png" type="image/png"></picture>
		<script src="pomodoroAlarm.js"></script>
	</head>
	<body>
		<div style="padding-top: 2%"></div>
		
  		<div class="sidebarDesign">
			<div class="sidebar">
				<center>
					<h1>Welcome <span id='name'>null</span> to Management<br><span id="date"></span></h1>
					<div style="padding: 5%"></div>
					<a href="#" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a>
				</center>
			</div>
		</div>

		<div class="sidebarContent">
			<div>
				<h2>To-do List</h2>
				<form action="" method="POST" align="center">
					Type of Work: <select name="type" id="type" require>
						<option value="Assignment">Assignment</option>
						<option value="Quiz">Quiz</option>
						<option value="PeTa">PeTa</option>
						<option value="Survey">Survey</option>
						<option value="Personal">Personal</option>
						<option value="General">General</option>
					</select>
					Description: <input type="text" name="description" require>
					Subjects: <select name="subject" id="subject" require>
						<option value="Math">Math</option>
						<option value="Science">Science</option>
						<option value="Filipino">Filipino</option>
						<option value="English">English</option>
						<option value="Science Research">Science Research</option>
						<option value="CLVE">CLVE</option>
						<option value="AP">AP</option>
						<option value="TLE">TLE</option>
						<option value="Music">Music</option>
						<option value="Art">Art</option>
						<option value="PE">PE</option>
						<option value="Club">Club</option>
					</select>
					Date: <input type="date" name="date" require>
					Time: <input type="time" name="time" require>
					<input type="submit" name="submit" value="Add to Todo List">
				</form>
				<div style="padding-top: 20px"></div>
				<table border=1 class="todolist">
					<tr>
						<th>Type of Work</th>
						<th>Description</th>
						<th>Subject</th>
						<th>Date</th>
						<th>Time</th>
						<th></th>
					</tr>
					<?php
						$select_sql = 'SELECT * FROM todo';
						$select_qry = mysqli_query($conn, $select_sql);
						
						$i = 0;
						while($row[$i] = mysqli_fetch_assoc($select_qry)){
							$row[$i]['id'];
					?>	
					<tr>
						<td><?=$row[$i]['type'];?></td>
						<td><?=$row[$i]['description'];?></td>
						<td><?=$row[$i]['subject'];?></td>
						<td><?=$row[$i]['date'];?></td>
						<td><?=$row[$i]['time'];?></td>
						<td><a href="home.php?b=<?=$row[$i]['id'];?>">X</a></td>
					</tr>
					<?php
						$i++;
						}
						$length = count($row)-2;
					?>
				<center><h2><span id="ringingSpan" style="width:24px; height:24px; color:red;">Nothing alarmed<img src="Assets/bell.png" style="width:24px; height:24px;"></span></h2></center>
				</table>
			</div>

			<div style="padding-top: 50px"></div>
			<div class="pomodoro">
				<h1>Take care of Matmat</h1>
				<table class="headerPomodoro">
					<tr>
						<th align="left"><img src="Assets/test.png"  width="30%" height="30%"></th>
						<th>
							<h2>Pomodoro Technique</h2>
							<p>Step 1: Study for 1-3 hours continuously</p>
							<p>Step 2: Take a 5-30 minute break</p><br>
							<p>Everytime you complete a session, you increase Matmat's lifespan by a year</p>
						</th>
					</tr>
					<tr>
						<td><h2>Lifespan of Matmat is: <span id="lifespan">5</span> years<h2></td>
					</tr>
				</table>
				<center>
					<form>
						Study Length: <select name="study" id="study" require>
							<option value="1">1 hour</option>
							<option value="2">2 hours</option>
							<option value="3">3 hours</option>
						</select>
						<button type="button" onclick="pomodoroStudyAlarm()" id="studyButton">Increase Matmat's lifespan</button>
					</form>
					<p>Time Remaining: <span id="h">00</span>:<span id="m">00</span>:<span id="s">00</span></p>
					
					<form>
						Break Length: <select name="break" id="break" require>
							<option value="5">5 minutes</option>
							<option value="20">20 minutes</option>
							<option value="30">30 minutes</option>
						</select>
						<button type="button" onclick="pomodoroBreakAlarm()" id="breakButton">Start your break</button>
					</form>
					<p>Time Remaining: <span id="bH">00:</span><span id="bM">00</span>:<span id="bS">00</span></p>
				</center>
			</div>
		</div>
		<div style="padding-top: 1%"></div>
	</body>
</html>

<script>
   function monthNow() 
   {
		var d = new Date();
		var year = d.getFullYear();
		var monthIndex = d.getMonth() + 1;
		var day = d.getDate();
			
		const monthArray = ["N/A","January", "Febuary", "March","April", "May", "June","July", "August", "September","October","November", "December"];
			
		var month = monthArray[monthIndex];
			
		document.getElementById("date").innerHTML = month + " " + day + ", " + year;
		
		var stringMonth = (monthIndex < 10 ? '0' : '') + monthIndex;
		var stringDay = (day < 10 ? '0' : '') + day;
		
		var currentDate = year + "-" + stringMonth + "-" + stringDay;

		return currentDate;
   }

	function timeNow() 
	{
		var t = new Date();
		var hourTime = t.getHours();
		var minuteTime = t.getMinutes();
		
		if (hourTime < 10)
			hourTime = '0' + hourTime;

		if (minuteTime < 10) 
			minuteTime = '0' + minuteTime;

		var currentTime = hourTime + ":" + minuteTime + ":00.00";
		
		return currentTime;
	}

   async function toDoAlarm() 
   {		
		while(true) 
		{			
			var currentTime = timeNow();
			var currentDate = monthNow();
		<?php
			for($i = 0; $i <= $length; $i++) 
			{
		?>
				var dateList = "<?php echo $row[$i]["date"]; ?>";
				var timeList = "<?php echo $row[$i]["time"]; ?>";
	
				if(currentDate == dateList && currentTime == timeList) 
				{
					var ringingBellSrc = document.getElementById("ringingPicture").querySelector("source").srcset;
					document.getElementById("ringingSpan").innerHTML = 'Alarmed triggerred for <?php echo $row[$i]["time"]; ?> in <?php echo $row[$i]["date"]; ?><img src="' + ringingBellSrc + '" style="width:24px; height:24px;">';

					document.getElementById("alarmAudio").play();
					
					await Sleep(8000);
					
					alert("<?php echo $row[$i]["description"]; ?>");
					
					await Sleep(60000);
				}
				var normalBellSrc = document.getElementById("normalPicture").querySelector("source").srcset;
				document.getElementById("ringingSpan").innerHTML = 'Nothing alarmed<img src="'+ normalBellSrc + '" style="width:24px; height:24px;">';

				await Sleep(1000);
		<?php
			}
		?>
			await Sleep(2000);
		}
	}

	window.onload = function() //Name
	{
		// Grabs the value from localStorage
		var value = localStorage.getItem('usernameInputted');
					
		// Display by using id="**"
		var name = document.getElementById('name');
		name.innerText = value;

		toDoAlarm();
	};
</script>