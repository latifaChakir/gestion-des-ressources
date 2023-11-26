<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
	integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



<div class="wrapper ">
	<!-- Sidebar  -->
	<nav id="sidebar">
		<div class="sidebar-header ">
			<h3>Ressources Platform</h3>
		</div>

		<ul class="list-unstyled components">
			<p>Menu</p>
			<li>
				<a href="../users/#homeSubmenu" class="nav-link">
					<i class="nav-icon fas fa-table"></i>
					Users
				</a>


			</li>
			<li>
				<a href="../categorie/categorie.php" class="nav-link">
					<i class="nav-icon fas fa-columns"></i>
					Categories</a>
			</li>
			<li>
				<a href="../subCategory/subCategorie.php" class="nav-link">
					<i class="nav-icon far fa-plus-square"></i>
					SubCategories</a>
			</li>
			<li>
				<a href="../ressource/index.php" class="nav-link">
					<i class="nav-icon fas fa-copy"></i>
					Ressources</a>
			</li>
			<li>
				<a href="../statistique/index.php" class="nav-link">
					<i class="nav-icon fas fa-chart-pie"></i>
					Statistiques</a>
			</li>
		</ul>

		<?php
		session_start();

		if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];

			echo '<p>Bienvenue, ' . $username . '!</p>';
		}
		?>

	</nav>

	<!-- Page Content  -->
	<div id="content">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">

				<li class="nav-item">
					<a role="button" id="sidebarCollapse"><i class="fas fa-bars"></i></a>
				</li>
				<ul class="navbar-nav ml-auto">
					<!-- Navbar Search -->
					<li class="nav-item">
						<a class="nav-link" data-widget="navbar-search" href="#" role="button">
							<i class="fas fa-search"></i>
						</a>

					</li>

					<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="far fa-comments"></i>
							<span class="badge badge-danger navbar-badge">3</span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								<div class="media">
									<img src="dist/img/user1-128x128.jpg" alt="User Avatar"
										class="img-size-50 mr-3 img-circle">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											Brad Diesel
											<span class="float-right text-sm text-danger"><i
													class="fas fa-star"></i></span>
										</h3>
										<p class="text-sm">Call me whenever you can...</p>
										<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
									</div>
								</div>
								<!-- Message End -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								<div class="media">
									<img src="dist/img/user8-128x128.jpg" alt="User Avatar"
										class="img-size-50 img-circle mr-3">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											John Pierce
											<span class="float-right text-sm text-muted"><i
													class="fas fa-star"></i></span>
										</h3>
										<p class="text-sm">I got your message bro</p>
										<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
									</div>
								</div>
								<!-- Message End -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								<div class="media">
									<img src="dist/img/user3-128x128.jpg" alt="User Avatar"
										class="img-size-50 img-circle mr-3">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											Nora Silvester
											<span class="float-right text-sm text-warning"><i
													class="fas fa-star"></i></span>
										</h3>
										<p class="text-sm">The subject goes here</p>
										<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
									</div>
								</div>
								<!-- Message End -->
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
						</div>
					</li>
					<!-- Notifications Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="far fa-bell"></i>
							<span class="badge badge-warning navbar-badge">15</span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<span class="dropdown-item dropdown-header">15 Notifications</span>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-envelope mr-2"></i> 4 new messages
								<span class="float-right text-muted text-sm">3 mins</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-users mr-2"></i> 8 friend requests
								<span class="float-right text-muted text-sm">12 hours</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-file mr-2"></i> 3 new reports
								<span class="float-right text-muted text-sm">2 days</span>
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
							role="button">
							<i class="fas fa-th-large"></i>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<!-- Bootstrap Js CDN -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function () {
				$('#sidebarCollapse').on('click', function () {
					$('#sidebar').toggleClass('active');
				});
			});
		</script>

		<style>
			body {
				color: #566787;
				background: #f5f5f5;
				font-family: 'Varela Round', sans-serif;
				font-size: 13px;
			}

			.table-responsive {
				margin: 30px 0;
			}

			.table-wrapper {
				background: #fff;
				padding: 20px 25px;
				border-radius: 3px;
				min-width: 1000px;
				box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			}

			.table-title {
				padding-bottom: 15px;
				background: #435d7d;
				color: #fff;
				padding: 16px 30px;
				min-width: 100%;
				margin: -20px -25px 10px;
				border-radius: 3px 3px 0 0;
			}

			.table-title h2 {
				margin: 5px 0 0;
				font-size: 24px;
			}

			.nav-item {
				list-style: none;
			}

			.table-title .btn-group {
				float: right;
			}

			.table-title .btn {
				color: #fff;
				float: right;
				font-size: 13px;
				border: none;
				min-width: 50px;
				border-radius: 2px;
				border: none;
				outline: none !important;
				margin-left: 10px;
			}

			.table-title .btn i {
				float: left;
				font-size: 21px;
				margin-right: 5px;
			}

			.table-title .btn span {
				float: left;
				margin-top: 2px;
			}

			table.table tr th,
			table.table tr td {
				border-color: #e9e9e9;
				padding: 12px 15px;
				vertical-align: middle;
			}

			table.table tr th:first-child {
				width: 60px;
			}

			table.table tr th:last-child {
				width: 100px;
			}

			table.table-striped tbody tr:nth-of-type(odd) {
				background-color: #fcfcfc;
			}

			table.table-striped.table-hover tbody tr:hover {
				background: #f5f5f5;
			}

			table.table th i {
				font-size: 13px;
				margin: 0 5px;
				cursor: pointer;
			}

			table.table td:last-child i {
				opacity: 0.9;
				font-size: 22px;
				margin: 0 5px;
			}

			table.table td a {
				font-weight: bold;
				color: #566787;
				display: inline-block;
				text-decoration: none;
				outline: none !important;
			}

			table.table td a:hover {
				color: #2196F3;
			}

			table.table td a.edit {
				color: #FFC107;
			}

			table.table td a.delete {
				color: #F44336;
			}

			table.table td i {
				font-size: 19px;
			}

			table.table .avatar {
				border-radius: 50%;
				vertical-align: middle;
				margin-right: 10px;
			}

			.pagination {
				float: right;
				margin: 0 0 5px;
			}

			.pagination li a {
				border: none;
				font-size: 13px;
				min-width: 30px;
				min-height: 30px;
				color: #999;
				margin: 0 2px;
				line-height: 30px;
				border-radius: 2px !important;
				text-align: center;
				padding: 0 6px;
			}

			.pagination li a:hover {
				color: #666;
			}

			.pagination li.active a,
			.pagination li.active a.page-link {
				background: #03A9F4;
			}

			.pagination li.active a:hover {
				background: #0397d6;
			}

			.pagination li.disabled i {
				color: #ccc;
			}

			.pagination li i {
				font-size: 16px;
				padding-top: 6px
			}

			.hint-text {
				float: left;
				margin-top: 10px;
				font-size: 13px;
			}

			/* Custom checkbox */
			.custom-checkbox {
				position: relative;
			}

			.custom-checkbox input[type="checkbox"] {
				opacity: 0;
				position: absolute;
				margin: 5px 0 0 3px;
				z-index: 9;
			}

			.custom-checkbox label:before {
				width: 18px;
				height: 18px;
			}

			.custom-checkbox label:before {
				content: '';
				margin-right: 10px;
				display: inline-block;
				vertical-align: text-top;
				background: white;
				border: 1px solid #bbb;
				border-radius: 2px;
				box-sizing: border-box;
				z-index: 2;
			}

			.custom-checkbox input[type="checkbox"]:checked+label:after {
				content: '';
				position: absolute;
				left: 6px;
				top: 3px;
				width: 6px;
				height: 11px;
				border: solid #000;
				border-width: 0 3px 3px 0;
				transform: inherit;
				z-index: 3;
				transform: rotateZ(45deg);
			}

			.custom-checkbox input[type="checkbox"]:checked+label:before {
				border-color: #03A9F4;
				background: #03A9F4;
			}

			.custom-checkbox input[type="checkbox"]:checked+label:after {
				border-color: #fff;
			}

			.custom-checkbox input[type="checkbox"]:disabled+label:before {
				color: #b8b8b8;
				cursor: auto;
				box-shadow: none;
				background: #ddd;
			}

			/* Modal styles */
			.modal .modal-dialog {
				max-width: 400px;
			}

			.modal .modal-header,
			.modal .modal-body,
			.modal .modal-footer {
				padding: 20px 30px;
			}

			.modal .modal-content {
				border-radius: 3px;
				font-size: 14px;
			}

			.modal .modal-footer {
				background: #ecf0f1;
				border-radius: 0 0 3px 3px;
			}

			.modal .modal-title {
				display: inline-block;
			}

			.modal .form-control {
				border-radius: 2px;
				box-shadow: none;
				border-color: #dddddd;
			}

			.modal textarea.form-control {
				resize: vertical;
			}

			.modal .btn {
				border-radius: 2px;
				min-width: 100px;
			}

			.modal form label {
				font-weight: normal;
			}

			/*
	DEMO STYLE
*/

			@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

			body {
				font-family: 'Poppins', sans-serif;
				background: #fafafa;
			}

			p {
				font-family: 'Poppins', sans-serif;
				font-size: 1.1em;
				font-weight: 300;
				line-height: 1.7em;
				color: #999;
			}

			a,
			a:hover,
			a:focus {
				color: inherit;
				text-decoration: none;
				transition: all 0.3s;
			}

			.navbar {

				background: #fff;
				border: none;
				border-radius: 0;
				margin-bottom: 10px;
				box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
			}

			.navbar-btn {
				box-shadow: none;
				outline: none !important;
				border: none;
			}

			.line {
				width: 100%;
				height: 1px;
				border-bottom: 1px dashed #ddd;
				margin: 40px 0;
			}

			/* ---------------------------------------------------
	SIDEBAR STYLE
----------------------------------------------------- */

			.wrapper {
				display: flex;
				width: 100%;
				align-items: stretch;
			}

			#sidebar {
				min-width: 250px;
				max-width: 250px;
				background: #435d7d;
				color: #fff;
				transition: all 0.3s;
			}

			#sidebar.active {
				margin-left: -250px;
			}

			#sidebar .sidebar-header {
				padding: 20px;
				background: #435d7d;
				border-bottom: 1px solid #47748b;

			}

			#sidebar ul.components {
				padding: 20px 0;
				border-bottom: 1px solid #47748b;
			}

			#sidebar ul p {
				color: #fff;
				padding: 10px;
			}

			#sidebar ul li a {
				padding: 10px;
				font-size: 1.1em;
				display: block;
			}

			#sidebar ul li a:hover {
				color: #7386D5;
				background: #fff;
			}

			#sidebar ul li.active>a,
			a[aria-expanded="true"] {
				color: #fff;
				background: #6d7fcc;
			}

			a[data-toggle="collapse"] {
				position: relative;
			}

			.dropdown-toggle::after {
				display: block;
				position: absolute;
				top: 50%;
				right: 20px;
				transform: translateY(-50%);
			}

			ul ul a {
				font-size: 0.9em !important;
				padding-left: 30px !important;
				background: #6d7fcc;
			}

			ul.CTAs {
				padding: 20px;
			}

			ul.CTAs a {
				text-align: center;
				font-size: 0.9em !important;
				display: block;
				border-radius: 5px;
				margin-bottom: 5px;
			}

			a.download {
				background: #fff;
				color: #7386D5;
			}

			a.article,
			a.article:hover {
				background: #6d7fcc !important;
				color: #fff !important;
			}

			/* ---------------------------------------------------
	CONTENT STYLE
----------------------------------------------------- */

			#content {
				width: 100%;
				padding: 20px;
				min-height: 100vh;
				transition: all 0.3s;
			}

			/* ---------------------------------------------------
	MEDIAQUERIES
----------------------------------------------------- */

			@media (max-width: 768px) {
				#sidebar {
					margin-left: -250px;
				}

				#sidebar.active {
					margin-left: 0;
				}

				#sidebarCollapse span {
					display: none;
				}
			}
		</style>