<?php
	error_reporting();
	include 'connection.php';
?>
<html>	
	<head>
		<link rel="stylesheet" type="text/css" href="defaultStyle.css">
		<style>
            /* Input css */
		</style>
        <script src="nameCurrentDate.js"></script>
	</head>
	<body>
		<div style="padding-top: 2%"></div>
		
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
            <p>Input HTML</p>
		</div>
		<div style="padding-top: 1%"></div>
	</body>
</html>