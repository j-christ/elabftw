<?php
/********************************************************************************
*                                                                               *
*   Copyright 2012 Nicolas CARPi (nicolas.carpi@gmail.com)                      *
*   http://www.elabftw.net/                                                     *
*                                                                               *
********************************************************************************/

/********************************************************************************
*  This file is part of eLabFTW.                                                *
*                                                                               *
*    eLabFTW is free software: you can redistribute it and/or modify            *
*    it under the terms of the GNU Affero General Public License as             *
*    published by the Free Software Foundation, either version 3 of             *
*    the License, or (at your option) any later version.                        *
*                                                                               *
*    eLabFTW is distributed in the hope that it will be useful,                 *
*    but WITHOUT ANY WARRANTY; without even the implied                         *
*    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR                    *
*    PURPOSE.  See the GNU Affero General Public License for more details.      *
*                                                                               *
*    You should have received a copy of the GNU Affero General Public           *
*    License along with eLabFTW.  If not, see <http://www.gnu.org/licenses/>.   *
*                                                                               *
********************************************************************************/
// start chrono for page generation time
$start = microtime(true);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<meta name="author" content="Nicolas CARPi" />
<link rel="icon" type="image/ico" href="img/favicon.ico" />
<?php
// Random title
$ftw_arr = array();
// Lots of 'For The World' so the other ones appear more rarely
for ($i=0; $i<200; $i++) {
    $ftw_arr[] = 'For The World';
}
// Now the fun ones
$ftw_arr[] = 'For Those Wondering';
$ftw_arr[] = 'For The Worms';
$ftw_arr[] = 'Forever Two Wheels';
$ftw_arr[] = 'Free The Wookies';
$ftw_arr[] = 'Forward The Word';
$ftw_arr[] = 'Forever Together Whenever';
$ftw_arr[] = 'Face The World';
$ftw_arr[] = 'Forget The World';
$ftw_arr[] = 'Free To Watch';
$ftw_arr[] = 'Feed The World';
$ftw_arr[] = 'Feel The Wind';
$ftw_arr[] = 'Feel The Wrath';
$ftw_arr[] = 'Fight To Win';
$ftw_arr[] = 'Find The Waldo';
$ftw_arr[] = 'Finding The Way';
$ftw_arr[] = 'Flying Training Wing';
$ftw_arr[] = 'Follow The Way';
$ftw_arr[] = 'For The Wii';
$ftw_arr[] = 'For The Win';
$ftw_arr[] = 'For The Wolf';
$ftw_arr[] = 'Free The Weed';
$ftw_arr[] = 'Free The Whales';
$ftw_arr[] = 'From The Wilderness';
$ftw_arr[] = 'Freedom To Work';
$ftw_arr[] = 'For The Warriors';
$ftw_arr[] = 'Full Time Workers';
$ftw_arr[] = 'Fabricated To Win';
$ftw_arr[] = 'Furiously Taunted Wookies';
$ftw_arr[] = 'Flash The Watch';
shuffle($ftw_arr);
$ftw = $ftw_arr[0];

echo "<title>".(isset($page_title)?$page_title:"Lab manager")." - eLab ".$ftw."</title>"?>
<!-- CSS -->
<link rel="stylesheet" media="all" href="css/main.css" />
<link rel="stylesheet" media="all" href="js/jquery-ui/themes/smoothness/jquery-ui.min.css" />
<link rel="stylesheet" media="all" href="css/tagcloud.css" />
<link rel="stylesheet" media="all" href="js/jquery-pageslide/jquery.pageslide.css" />
<link rel="stylesheet" media="all" href="css/jquery.rating.css" />
<!-- JAVASCRIPT -->
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<!-- for editable comments -->
<script src="js/jeditable/jquery.jeditable.js"></script>
<!-- for keyboard shortcuts -->
<script src='js/keymaster/keymaster.js'></script>
<!-- for stars rating -->
<script src='js/jquery.rating.min.js'></script>
<!-- common stuff -->
<script src="js/common.min.js"></script>
</head>

<body>
<section id="container">
<noscript><!-- show warning if javascript is disabled -->
<div class="ui-state-error ui-corner-all">
<p><span class='ui-icon ui-icon-alert' style='float:left; margin: 0 5px 0 5px;'></span>
<strong>Javascript is disabled.</strong> Please enable Javascript to view this site in all its glory. Thank You.</p>
</div>
</noscript>

<?php
if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) {
?>
<nav>
<span class='navleft'>
    <a href='index.php'>elab<strong>FTW</strong></a>
    <a href="experiments.php?mode=show"
    <?php
    if ($page_title == 'Experiments') {
        echo " class='selected'";
    }?>
>Experiments</a>
    <a href="database.php?mode=show"
    <?php
    if ($page_title == 'Database') {
        echo " class='selected'";
    }?>
    >Database</a>
    <a href="team.php"
    <?php
    if ($page_title == 'Team') {
        echo " class='selected'";
    }?>
    >Team</a>
    <?php
    echo "<a href='".get_team_config('link_href')."' target='_blank'>".get_team_config('link_name')."</a></span>";
    
    if ($page_title === 'Database') {
        $action_target = 'database.php';
    } else {
        $action_target = 'experiments.php';
    }
    ?>
    <form id='big_search' method='get' action='<?php echo $action_target;?>'>
    <input id='big_search_input' type='search' name='q' size='50' value='<?php
    if (isset($_GET['q'])) {
        echo filter_var($_GET['q'], FILTER_SANITIZE_STRING);
    }
    ?>' /><br><div id='adv_search'><a href='search.php'><img src='img/arrow-right-white.png' alt='' />Advanced search</a></div>
    </form>
    </nav>
<?php
} else {
    echo "<nav><span class='navleft'><a href='index.php'>elab<strong>FTW</strong></a></span></nav>";
}
?>
<div id='real_container'>
<?php
if (isset($_SESSION['auth'])) {
?>
<span style='float:right;text-align:right;'>
    Logged in as <a href='profile.php' title='Profile'><?php echo $_SESSION['username'];?></a><br>
    <a href='ucp.php'><img src='img/settings.png' alt='Settings' title='Settings' /></a> | 
    <a href='logout.php'><img src='img/logout.png' alt='' title='Logout' /></a>
</span>
<?php
}
?>
<!-- TITLE -->
<h2><?php echo $page_title;?></h2>
