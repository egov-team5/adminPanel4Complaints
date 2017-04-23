<?php
        //error_reporting(E_ALL);
        exec("Rscript ../server/complaintAnalysis.R");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Complaint Analysis </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="js/d3.js"></script>
    <script type="text/javascript" src="js/d3.layout.cloud.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Analysis</a>
            </div>
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Complaints Analysis </a>
                    </li>
                    <li>
                        <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Complaints VS Demographics Analysis</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i>Aging of Complaints</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i>Missing Complaints Analysis</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div id="totalcomplaints" class="huge">26</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                    <span class="pull-left"><br/>Total Complaints</span>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-2 col-md-3">
                        <div class="panel" style="background-color: #ff471a">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div id="complaints" class="huge">26</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                    <span  class="pull-left"><br/>Complaints</span>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div id="readdressed" class="huge">26</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                    <span  class="pull-left">Complaints Readdressed</span>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div id="notreaddressed" class="huge">26</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                    <span  class="pull-left">Complaints Not Readressed</span>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="panel" style="background-color: #9900ff ">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div id="avgresolution" class="huge">26</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                    <span  class="pull-left">Avg Resolution Time</span>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div  id="mode" class="huge">26</div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                    <span class="pull-left"><br/>Mode</span>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                




                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <strong>COMPLAINTS WORD CLOUD</strong>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-lg-12 pull-left" >
                            <div id="vis"></div>
                            <script type="text/javascript" src="js/word-cloud.js"></script>
                    </div>
                </div>
                
                    
                  
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
