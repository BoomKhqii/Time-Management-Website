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
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="defaultStyle.css">
		<style>
			.todolist {
				margin-left: auto;
				margin-right: auto;
			}
		</style>
		<script src="nameCurrentDate.js"></script>
	</head>
	<body>
		<div class="sidebarDesign">
			<div class="sidebar">
				<center>
					<h1>Welcome <span id='name'>null</span> to Management<br><span id="date"></span></h1>
					<div style="padding: 5%"></div>
					<a href="todo.php" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a><br>
					<a href="#" class="todoButton">Hot list</a>
				</center>
			</div>
		</div>
		
		<div class="sidebarContent">
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
	</body>
</html>