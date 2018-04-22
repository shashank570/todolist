<?php include('servr.php') ?>
<?php 
	$email=$_SESSION['email'];
        $errors = "";

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
		header("location: index.php");
	}
	
	$db = mysqli_connect("localhost", "root", "", "todo");

	
	if (isset($_POST['submit'])) {

		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$query = "INSERT INTO tasks (task,email) VALUES ('$task','$email')";
			mysqli_query($db, $query);
			header('location: index1.php');
		}
	}	

	
	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
		header('location: index1.php');
	}

	
	$tasks = mysqli_query($db, "SELECT * from tasks where email='$email'");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="ind.css">

	<title>TODO list manager</title>
</head>
<body >

	<div class="header">
		<h2>ToDo List</h2>
	</div>
	<div class="content">

		
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

	
		<?php  if (isset($_SESSION['email'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
			<p> <a href="index1.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
	

		<h2 style="font-style: 'Hervetica'; text-align:center; color:#550080;">List of Tasks</h2>
	


	<form method="post" action="index1.php" class="input_form">
		<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
	
<table>
		<thead>
			<tr>
				<th>N</th>
				<th>Tasks</th>
				<th style="width: 60px;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['task']; ?> </td>
					<td class="delete"> 
						<a href="index1.php?del_task=<?php echo $row['id'] ?>">x</a> 
					</td>
				</tr>
			<?php $i++; } ?>	
		</tbody>
	</table>

</body>
</html>