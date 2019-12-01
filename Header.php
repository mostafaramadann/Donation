<html><!-- Nav menu -->
<head>
    <title> </title>
    <link href="Header.css" rel="stylesheet"/>
</head>
<body>
<header>
    <ul class="navbar">
        <li><img style="width: 25px; height: 25px;" src="Donate.png"></li>
        <li><a href="Home.php">Home</a></li>
        <li><a href="About.php">About</a></li>
        <li class="has-dropdown"><a href="#">Causes</a></li>
        <li class="has-dropdown"><a href="#">Events</a></li>
        <li class="has-dropdown"><a href="#">Blog</a></li>
        <li><a href="#">Contact</a></li>
<!--        --><?php
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        {
            if($_SESSION["username"]!='') {
                $text = $_SESSION["username"];
                $href="#";
//while loop here
                echo "<script src=''>
                       var a = document.createElement('a');
                        a.setAttribute('href','kaza.php');
                        a.innerHTML = 'go here';
                        document.getElementsByClassName('dropdown-content')[0].innerHTML+=a;
                       </script>";
		}
       }
        else
        {
            $text = "Login";
            $href = "Login.php";
        }
        //anchors are added to this div
        echo "<li class='dropdown'><a href="."'".$href."'".">".$text."</a>
                <div class='dropdown-content'>
                  </div>
                </li>";

        if(isset($_SESSION['loggedin']) &&$_SESSION['loggedin']===true)
            echo "<li class='Changable'> <a href='Logout.php'>Logout</a></li>";
//        ?>
        </ul>
</header>
</body>
</html>


