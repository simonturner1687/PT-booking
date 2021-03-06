<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin | Scott Jose Fitness</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">Scott<span>Jose</span></h1>
            <span class="slogan">admin</span>
            
            <br clear="all" />
            
        </div><!--left-->

    </div><!--topheader-->
    
    
    <div class="header">
        <ul class="headermenu">
            <li><a href="manageblog.php"><span class="icon icon-speech" aria-hidden="true"></span>Manage Blog</a></li>
            <li class="current"><a href="manageretreat.php"><span class="icon icon-pencil" aria-hidden="true"></span>Manage Retreats</a></li>
        </ul>
        
    </div><!--header-->
    
    <div class="vernav">
        <ul>
            <li><a href="newretreat.php">Create New Retreat</a></li>
        </ul>
        <ul>
            <li><a href="manageretreat.php" class="editor">All Retreats </a></li>
            <li><a href="live_retreats.php">Live Retreats</a></li>
            <li><a href="draft_retreats.php">Draft Retreats</a></li>
            <li><a href="archived_retreats.php">Archived Retreats </a></li>
            <li><a href="trash_retreats.php">Trash </a></li>
        </ul>
        <ul>
            <li class="current"><a href="bookedspaces.php">Training Orders</a></li>
            <li><a href="openspaces.php">Retreat Bookings </a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Training Package Orders</h1>
            <?php 
            include '/model/m_events.php';
            $Posts = new Posts();
            $training_orders = $Posts->get_training_orders();?>

            <ul class="hornav ">
                <li class="current"><a href="openspaces.php">Booked packages (<?php echo count($training_orders);?>)</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div class="contentwrapper">

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable blogtable">
            <colgroup>
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />

            </colgroup>
            <thead>
            <tr>
                <th class="head1">ID</th>
                <th class="head0">Name</th>
                <th class="head1">Address</th>
                <th class="head0">Email</th>
                <th class="head1">Package</th>
                <th class="head0">Date Booked</th>
                <th class="head1"></th>
            </tr>
            </thead>
            
                <?php 
                if (empty($training_orders)) 
                {
                    echo '<tbody>
                          <tr><td>There are currently no training orders!</td></tr>';
                          
                } 
                else
                {
                // If we have an array with items
                if (count($training_orders)) {
                    foreach ($training_orders as $trainingArray) {
                      // Show the information about the item
                        echo'
            <tbody>
                <tr>
                    <td class="con1">'.$trainingArray["id"].'</td>
                    <td class="con0"><a href="viewblog.html" class="title">'.$trainingArray["cust_name"].'</a></td>
                    <td class="con1">'.$trainingArray["cust_add"].'</td>
                    <td class="con0">'.$trainingArray["cust_email"].'</td>
                    <td class="con1">'.$trainingArray["item"].'</td>
                    <td class="con0">'.$trainingArray["date"].'</td>

                    <td class="con1 actions aligncenter">
                        <a href="delete.php?id='.$trainingArray["id"].'" class="delete">Delete</a>
                    </td>
                </tr>';
            }
        }
        }
        ?>
            </tbody>
        </table>

             
        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>
