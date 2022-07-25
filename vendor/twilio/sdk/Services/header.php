<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $title ;?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../logo/log.jpg" style="border-radius:50%;" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>







	<div class="wrapper static-sidebar">


		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="purple">
				
				<a href="index.php" class="logo">
					<img src="https://<?php echo $bankurl;?>/admin/pages/logo/<?php echo $logo;?>" alt="navbar brand" class="navbar-brand" style="height:30px;width:30px; margin-top:15px; border-radius:50%">
				</a> &nbsp; <span style="color:#fff"><?php echo $name;?> </span> &nbsp;&nbsp;
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-cog"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			
            
            
            
            
            
            
            
            <!-- Navbar Header -->			      
            
            <nav class="navbar navbar-header navbar-expand-lg " data-background-color="purple">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>


					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../../logo/man.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../logo/man.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $uname?></h4>
												<p class="text-muted"><?php echo $email?></p><a href="?v=Details&email=<?php echo $email;?>" class="btn btn-xs btn-secondary btn-sm"><i class="fa fa-user"></i> View Profile</a>
											</div>
										</div>
									</li>
									<li>
																			
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="?v=Settings&email=<?php echo $email;?>"><i class="fa fa-cog"></i> Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="?v=Logout"><i class="fa fa-user"></i> Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>









		<div class="classic-grid" >
			<!-- Sidebar -->
			<div class="sidebar sidebar-style-2" >			
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<img src="<?php echo 'man.png';?>" alt="..." class="avatar-img rounded-circle">
							</div>



							<div class="info">
								<a  href="" >
									<span>
									<?php echo $_SESSION['username'];;?>
										<span class="user-level"><?php echo $email;?></span>
									
									</span>
								</a>
								<div class="clearfix"></div>

								
							</div>
						</div>
						<ul class="nav nav-secondary">
							<li class="nav-item active submenu">
								<a  href="index.php?username=<?php  echo $_SESSION['username']?>&email= <?php  echo $_SESSION['email']?>" >
									<i class="fas fa-home"></i>
									<p>Home</p>
								
								</a>
								
							</li>
							


							<li class="nav-item active submenu">
								<a  href="log-out.php" >
									<i class="fas fa-user"></i>
									<p>Log-Out</p>
								
								</a>
								
							</li>
							


							<li class="nav-item active submenu">
								<a data-toggle="collapse"  href="#base">
									<i class="fas fa-user"></i>
									<p>My Profile</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="base">
									<ul class="nav nav-collapse">
										<li>
											<a href="update.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-user"></i> Update Account</span>
											</a>
										</li>
										<li>
											<a href="security.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-lock"></i> Security</span>
											</a>
										</li>
										

										<li>
											<a href="bdetails.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-cog"></i> Account Details</span>
											</a>
										</li>


										<li>
											<a href="verify.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-users"></i> Verify Account</span>
											</a>
										</li>
										
										
										
									</ul>
								</div>
							</li>



							<li class="nav-item active submenu">
							<a  href="withdraw.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
								<i class="fas fa-th-list"></i>
								<p>Withdrawal</p>
								
							</a>
								</li>



								<li class="nav-item active submenu">
							<a  href="deposit.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
								<i class="fas fa-th-list"></i>
								<p>Deposit</p>
								
							</a>
								</li>

                        <li class="nav-item active submenu">
								<a  href="mypackage.php?Date=<?php  echo date("Y/m/d");?>&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-gift"></i>
									<p>My Package</p>
								
								</a>
								
							</li>




							<li class="nav-item active submenu">
								<a  href="investment.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-gift"></i>
									<p>Investment Packages</p>
								
								</a>
								
							</li>




							<li class="nav-item active submenu">
								<a  href="transaction_log.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-table"></i>
									<p>Transaction Logs</p>
									
								</a>
								</li>


                           



                            <li class="nav-item active submenu">
								<a  href="downlines.php?&refcode=<?php  echo $_SESSION['refcode']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fa fa-users"></i>
									<p>My Downlines</p>
									
								</a>
								
							</li>



							<li class="nav-item active submenu">
								<a href="read.php?&refcode=<?php  echo $_SESSION['refcode']?>&email=<?php  echo $_SESSION['email']?>"><i class="fas fa-book"></i>
									<p>Read Message</p>
									<span class="badge badge-success">4</span>
								</a>
							</li>
					
							<li class="nav-item active submenu">
								<a href="message.php?&refcode=<?php  echo $_SESSION['refcode']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-book"></i>
									<p>Ticket</p>
									<span class="badge badge-success">4</span>
								</a>
							</li>



							
					



						</ul>
					</div>
				</div>
			</div>
			<!-- End Sidebar -->
            <div class="main-panel">
				<div class="content">