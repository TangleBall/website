<?php
$PageToLoad = "home";

if (isset($_GET['Page']))
    $PageToLoad = $_GET['Page'];

$ValidPages = array();
$ValidPages['home'] = 'Home';
$ValidPages['wiki'] = array('Name' => 'Wiki', 'URL' => 'http://www.tangleball.org.nz/wiki/');
$ValidPages['blog'] = array('Name' => 'Blog', 'URL' => 'http://tumblr.tangleball.org.nz/');
$ValidPages['mailinglist'] = array('Name' => 'Mailing List', 'URL' => 'http://www.tangleball.org.nz/mailman/listinfo/discussion');
$ValidPages['findus'] = array('Name' => 'Where to Find Us', 'URL' => 'http://tumblr.tangleball.org.nz/FindUs');
$ValidPages['about'] = 'About';
$ValidPages['contact'] = 'Contact';

if (!array_key_exists($PageToLoad, $ValidPages))
    $PageToLoad = 'home';

if ($PageToLoad == 'home') {
    if (isset($_GET['Article']))
        $ArticleToLoad = $_GET['Article'];
}

$TopNavigationList = '';
foreach ($ValidPages as $PageID => $PageInfo) {
    $ClassesToLoad = '';
    if ($PageID == $PageToLoad)
        $ClassesToLoad = ' class="active"';

    if (is_array($PageInfo)) {
        $URL = $PageInfo['URL'];
        $PageName = $PageInfo['Name'];
        
    } else {
        $URL = 'index.php?Page=' . $PageID;
        $PageName = $PageInfo;
    }

    $TopNavigationList .= '<li' . $ClassesToLoad . '><a href="' . $URL . '">' . $PageName . '</a></li>';
}

$ValidArticles = array();
$ValidArticles['main'] = 'Main';
$ValidArticles['people'] = 'People';
$ValidArticles['projects'] = 'Projects';


if (!array_key_exists($ArticleToLoad, $ValidArticles))
    $ArticleToLoad = 'main';

$SideNavigationList = '';
foreach ($ValidArticles as $ArticleID => $ArticleName) {
    $ClassesToLoad = '';
    if ($ArticleID == $ArticleToLoad)
        $ClassesToLoad = ' class="active"';

    //$SideNavigationList .= '<li'.$ClassesToLoad.'><a href="index.php?Article='.$ArticleID.'">'.$ArticleName.'</a></li>';
}


echo <<<Page

Page;
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Tangleball</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Tangleball Website">
        <meta name="author" content="Max">

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>
        <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">


        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="/ico/favicon.png">
        
        
        <script src="/js/jquery-2.0.2.min.js"></script>
        <!--
        <script src="/js/bootstrap-transition.js"></script>
        <script src="/js/bootstrap-alert.js"></script>
        <script src="/js/bootstrap-modal.js"></script>
        <script src="/js/bootstrap-dropdown.js"></script>
        <script src="/js/bootstrap-scrollspy.js"></script>
        <script src="/js/bootstrap-tab.js"></script>
        <script src="/js/bootstrap-tooltip.js"></script>
        <script src="/js/bootstrap-popover.js"></script>
        <script src="/js/bootstrap-button.js"></script>
        <script src="/js/bootstrap-collapse.js"></script>
        <script src="/js/bootstrap-carousel.js"></script>
        <script src="/js/bootstrap-typeahead.js"></script>
        -->
        
        
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Tangleball.org.nz</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            Logged in as <a href="#" class="navbar-link">Username</a>
                        </p>
                        <ul class="nav">
<?= $TopNavigationList ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header">Sidebar</li>
<?= $SideNavigationList ?>


                            <li class="nav-header">@tangleball</li>
                            <li>
                                <a class="twitter-timeline" href="https://twitter.com/tangleball" data-widget-id="344911837340512256">Tweets by @tangleball</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                            </li>
                            
                            <!--li class="nav-header">Events at Tangleball</li>
                            <li>
                                <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=tangleball%40gmail.com&amp;color=%232F6309&amp;ctz=Pacific%2FAuckland" style=" border-width:0 " width="200" height="600" frameborder="0" scrolling="no"></iframe>
                            </li-->

                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->

                <div class="span9">
                    <div class="hero-unit">
                        <h1>Tangleball</h1>
                        <p>Tangleball is an Auckland-based "Hackerspace" or "Makerspace". We provide a place for creative people to collaborate on building their ideas and aim to nurture both technical and artistic ideas. The best way to get in contact with us is by vising the space on a Tuesday evening (from 19:00).</p>
                        <!-- p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p -->
                    </div>

                    <div class="row-fluid">

                        <div class="span4">
                            <h2>3D Printing</h2>
                            <p>A working 3D printer, and a resident expert is available. Work is being done on adding more.</p>
                            <p><a class="btn" href="#">(Coming soon) View details &raquo;</a></p>
                        </div><!--/span-->

                        <div class="span4">
                            <h2>Screen Printing</h2>
                            <p>Bring a Shirt, an Idea, with some help and printing magic join the two together.</p>
                        </div><!--/span-->

                        <div class="span4">
                            <h2>Electronics</h2>
                            <p>We have fun experimenting with electronics. Come an join in the fun.</p>
                        </div><!--/span-->

                    </div><!--/row-->

                    <div class="row-fluid">

                        <div class="span4">
                            <h2>Woodworking</h2>
                            <p>Tools and bench-space is available for working on different project, you can even find people who know what they are doing.</p>
                        </div><!--/span-->

                        <div class="span4">
                            <h2>Coding</h2>
                            <p>Game dev evenings, raspberry pi and other events.</p>
                        </div><!--/span-->

                        <div class="span4">
                            <h2>Brewing and Cooking</h2>
                            <p>We do cook and bake... From time to time.</p>
                        </div><!--/span-->

                    </div><!--/row-->

                </div><!--/span-->
            </div><!--/row-->


            <hr>

            <footer>
                <p><span style="-moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1); transform: scaleX(-1); display: inline-block;">&copy;</span> Tangleball 2013</p>
            </footer>

        </div><!--/.fluid-container-->
    </body>
</html>
