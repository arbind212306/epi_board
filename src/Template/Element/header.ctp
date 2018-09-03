<?php 
$session = $this->request->session();
$user = $session->read('Auth.User');
$name = ucfirst($user['first_name']).' '.ucfirst($user['last_name']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spring Board</title>
    <!-- Bootstrap -->
    <!--<link href="css/bootstrap.css" rel="stylesheet">-->
    <?php echo $this->Html->css(['bootstrap', 'style','font-awesome.min']); ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
     <link type="text/css" href="css/style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />
    <!--<link type="text/css" href="css/style.css" rel="stylesheet" />-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.min.js"></script>
    <script src="./js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-light">
    <div id="navbar">
        <nav class="navbar navbar-default navbar-white navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-brand-image" href=""><?php //echo $this->Html->image('logo-quatrro.png'); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- menu section starts here -->
                <?php echo $this->element('menu'); ?>
                <!-- menu section ends here -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-bell-o fa-lg text-blue"></i> <span class="hidden-lg hidden-md hidden-sm text-blue">Notifications</span></a></li>
                    <li><a href="#"><i class="fa fa-question-circle fa-lg text-orange"></i> <span class="hidden-lg hidden-md hidden-sm text-orange">Help</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="inline-block">
                                <img src="http://via.placeholder.com/25x25" class="img-circle">
                            </div>
                            <div class="inline-block padding-left-sm padding-right-md">
                                <span class="text-red"><?= $name ?><i class="fa fa-caret-down"></i></span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <?php $changepassword= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword'])?>
                            <li><a href="<?= $changepassword?>">Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);?>
                            <li><a href="<?= $logout;?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
