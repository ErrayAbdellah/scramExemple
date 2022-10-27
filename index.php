<?php 
	include("scripts.php");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body  >

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="d-flex justify-content-between align-items-lg-center align-items-start">
				
			<nav class="navbar-expand">
				<ol class="navbar-nav ">
					<li class=""><a class="nav-link" href="#">Home </a></li>
					<li class="active"><a class="nav-link" href="#">Features</a></li>
				</ol>
			</nav>
				<div class="">
					<button onclick="CleareForm()" class="btn btn-success rounded-pill"data-bs-toggle="modal" data-bs-target="#modal-task"> Add Task<i class="bi bi-plus"></i></button>
				</div>
			</div>
			<div class="text-center text-lg-start" >
				<h1 class="page-header ">
					Scrum Board 
				</h1>
			</div>
			<div class="row justify-content-around">
				<div class="col-lg-4 col-md-6 col-sm-12 mb-4"  >
					<div class="card bg-secondary "  style="width: 100%; " >
						<div class="card-header bg-secondary text-center text-lg-start" >
							<h4 class="text-light">To do (<span id="to-do-tasks-count">5</span>)</h4>
						</div> 
						<div class="row-cols-1"  id="to-do-tasks" >
							<!-- TO DO TASKS HERE -->
							<?php getTasks(1,0);  ?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-4"    >
					<div  class="card bg-secondary"  style="width: 100%; " >
						<div class="card-header  bg-secondary text-center text-lg-start">
							<h4 class="text-light">In Progress (<span id="in-progress-tasks-count">4</span>)</h4>
						</div>
						<div class="row-cols-1"  id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							<?php getTasks(0,1); ?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 mb-4"  >
					<div   class="card bg-secondary"   style="width: 100%; ">
						<div class="card-header bg-secondary text-center text-lg-start">
							<h4 class="text-light">Done (<span id="done-tasks-count">4</span>)</h4>

						</div>
						<div class="row-cols-1" id="done-tasks">
							<!-- DONE TASKS HERE -->

							<?php 
								
							?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->
		
		
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	
	<!-- TASK MODAL -->
		

	<div class="modal fade"  id="modal-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content "style="background-color: #CAEBF2;">
				<div class=" card-header bg-secondary text-center ">
				<h2 class="text-white ">Add Task</h2>
				</div>
				<div class="modal-body">
					<!--begin form-->
					<form id="formTask">
						<div class="align-items-md-center ">
							<div>
								<label for="formGroupExampleInput" class="form-label">Title</label>
								<input type="text" class="form-control" id="titleIn" placeholder="Example input placeholder" required>
							</div>
							<!-- radion Button -->
							<div>
									<label class="form-label">Type</label>
									<div class="form-check">
										<input class="form-check-input ch" type="radio" value="Feature" name="Type" id="flexRadioDefault1">
										<label class="form-check-label text-secondary-500" for="flexRadioDefault1">
										Feature
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input ch" type="radio" value="Bug" name="Type" id="flexRadioDefault2" checked>
										<label class="form-check-label text-secondary-500" for="flexRadioDefault2">
										Bug
										</label>
									</div>
							</div>
							<!-- end radion Button -->
								<div>
									<label for="formGroupExampleInput" class="form-label">Status</label>
									<select class="form-select" aria-label="Default select example" id="select1" required>
										<option selected>Please select</option>
										<option value="To Do">Todo</option>
										<option value="In Progress">In Progress</option>
										<option value="Done">Done</option>
									</select>
									<label for="formGroupExampleInput" class="form-label">Priority</label>
									<select class="form-select" aria-label="Default select example" id="select2">
										<option selected>Please select</option>
										<option value="High">High</option>
										<option value="Medium">Medium</option>
										<option value="low">low</option>
									</select>
								</div>
								<!-- end select-->
								<div>
										<label for="formGroupExampleInput" class="form-label">Date</label>
									<div>
										<input type="date" class="form-control" id="date" required>
									</div>
								</div>
								<div class="mb-3">
									<label for="exampleFormControlTextarea1" class="form-label">Description</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
								</div>
							<!--end form-->
						</div>
					</form>
					<div class="modal-footer" id="buttonCu">
						<button type="button"data-bs-dismiss="modal" class="btn btn-danger rounded-3 w-25 ">Cancel</button>
						<button type="button" id="sumbit"  onclick="createTask()" class="btn btn-success rounded-3 w-25">Save</button>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	<script src="assets/js/data.js"></script>
	<script src="assets/js/app.js"></script>
</body>
</html>