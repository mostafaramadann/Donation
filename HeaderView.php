<?php
require_once ("IView.php");
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
            $href = "Login.php";
        }

        if(session_status()==PHP_SESSION_NONE)
        session_start();
        echo "<html lang='en'><!-- Nav menu -->
        <head>
            <title> </title>
            <link href=\"Header.css\" rel=\"stylesheet\"/>
        </head>
        <body>
        <header>
            <ul class=\"navbar\">
                <li><img style=\"width: 25px; height: 25px;\" src=\"Donate.png\"></li>
                <li><a href=\"Home.php\">Home</a></li>
                <li><a href=\"About.php\">About</a></li>
                <li class=\"has-dropdown\"><a href=\"#\">Causes</a></li>
                <li class=\"has-dropdown\"><a href=\"#\">Events</a></li>
                <li class=\"has-dropdown\"><a href=\"#\">Blog</a></li>
                <li><a href=\"#\">Contact</a></li>";

        //anchors are added to this div
        echo "<li class='dropdown'><a href="."'".$href."'".">".$text."</a>
                <div class='dropdown-content'>";
                $i=0;
//                error_reporting(0);
                if(isset($_SESSION['loggedin'])) {
                    while ($i < count($records)) {
                        echo "<a href=" . $records[$i][0] . ">" . $records[$i][1] . "</a>";
                        $i++;
                    }
                }
                  echo "</div>
                </li>";
            if(isset($_SESSION['loggedin']) &&$_SESSION['loggedin']===true)
                echo "<li class='Changable'> <a href='Logout.php'>Logout</a></li>";
       echo "</ul>
        </header>
        </body>
        </html>";
    }

}

