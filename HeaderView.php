<?php
require_once ("IView.php");
if(session_status()==PHP_SESSION_NONE)
    session_start();
if(session_status()==PHP_SESSION_ACTIVE&&isset($_SESSION['id']))
require_once ("greetings.php");
class HeaderView implements IView
{
    function showView($records)
    {
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        {
            if($_SESSION["username"]!='') {
                $text = $_SESSION["username"];
                $href="#";
            }
        }
        else
        {
            $text = "Login";
            $href = "LoginController.php";
        }

        if(session_status()==PHP_SESSION_NONE)
        session_start();
        echo "<html lang='en'><!-- Nav menu -->
        <head>
            <title> </title>
            <link href=\"CSS/Header.css\" rel=\"stylesheet\"/>
        </head>
        <body>
        <header>
            <ul class=\"navbar\">
                <li><img style=\"width: 25px; height: 25px;\" src='images/Donate.png'></li>
                <li><a href=\"HomeController.php\">Home</a></li>
                <li class=\"has-dropdown\"><a href=\"#\">Causes</a></li>
                <li class=\"has-dropdown\"><a href=\"#\">Events</a></li>
                <li class=\"has-dropdown\"><a href=\"#\">Blog</a></li>
                <li><a href=\"#\">Contact</a></li>
                ";

        //anchors are added to this div
        echo "<li class='dropdown'><a href="."'".$href."'".">".$text."</a>
                <div class='dropdown-content'>";

                $i=0;
                error_reporting(0);
                if(isset($_SESSION['loggedin'])) {
                    while ($i < count($records)) {
                        echo "<a href=" . $records[$i][0] . ">" . $records[$i][1] . "</a>";
                        $i++;
                    }
                }
                  echo "</div>
                </li>";

            if(isset($_SESSION['loggedin']) &&$_SESSION['loggedin']===true) {
               if(isset($_SESSION['notifications'])&&(int)$_SESSION['notifications']==0) {
                    $src = "images/notificationsOff.jpg";
                }
                elseif(isset($_SESSION['notifications'])&&(int)$_SESSION['notifications']==1) {
                    $src = "images/notificationsOn.jpg";
               }

                echo  "<li><img alt ='notification' style='width:25px; height:25px;' src=".$src."> </li>";
                echo "<li class='Changable'> <a href='Logout.php'>Logout</a></li>";
            }
       echo "</ul>
        </header>
        </body>
        </html>";
    }

}

