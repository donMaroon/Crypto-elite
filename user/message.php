
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Messages Crypto Elite</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="#999">

                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="../" class="simple-text">
                            <img class="img-responsive" alt="logo" src="../images/logo-dark.png">
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="./">
                                <i class="pe-7s-graph" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="pe-7s-user" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">User Profile</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="message.php">
                                <i class="pe-7s-mail" style="color: #fd961a;" ></i>
                                <p style="color: #fd961a;">Messages</p>
                            </a>
                        </li>
                        <li>
                            <a href="wallet.php">
                                <i class="pe-7s-wallet" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Wallet</p>
                            </a>
                        </li>
                        <li>
                            <a href="packages.php">
                                <i class="pe-7s-photo-gallery" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Upgrade</p>
                            </a>
                        </li>
                        <li>
                            <a href="mypackages.php">
                                <i class="pe-7s-photo-gallery" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">My Package</p>
                            </a>
                        </li>
                        <li>
                            <a href="withdrawal.php">
                                <i class="pe-7s-cash" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Withdrawals</p>
                            </a>
                        </li>
                        <li class="active-pro">
                            <a href="logout.php">
                                <i class="pe-7s-user" style="color: #fd961a;"></i>
                                <p style="color: #fd961a;">Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid" style="background: #000;">
                        <div class="navbar-header" style="background: #000;">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" style="color: #fd961a;" href="#">Messages</a>
                        </div>
                        <div class="collapse navbar-collapse">
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card" style="height:500px;max-height:500px;">
                                    <div class="header">
                                        <h4 class="title">General Messages</h4>
                                        <p class="category">These are the messages was sent to all users.</p>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <th>Sender</th>
                                            <th>Message Title</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <center><h3>No Opened Message.</h3></center>                                                        </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card" style="height:500px;max-height:500px;">
                                    <div class="header">
                                        <h4 class="title">Unopened Messages</h4>
                                        <p class="category">These are the messages you're yet to read.</p>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <th>Sender</th>
                                            <th>Message Title</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <center><h3>No Unopened Message.</h3></center>                                                        </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="card" style="height:500px;max-height:500px;">
                                    <div class="header">
                                        <h4 class="title">Opened Messages</h4>
                                        <p class="category">These are the messages you've read.</p>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <th>Sender</th>
                                            <th>Message Title</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <center><h3>No Opened Message.</h3></center>                                                        </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right">
                            &copy; 2010 <a>Crypto Elite</a>
                        </p>
                    </div>
                </footer>


            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>


</html>

