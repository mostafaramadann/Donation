 <?php
 require_once ("IView.php");
class CoordinationView implements IView
{
    public function __construct()
    {

    }
    public function showView($records)
    {
        echo "<!DOCTYPE html>
<html lang='en'>
    <head>";
    include('HeaderView.php');
        include ('greetings.php');

        echo "<title>Coordination View</title>
        <meta charset=\"windows-1252\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel='stylesheet' href='Table.css'>
        <link rel='stylesheet' href='Home.css'>
      </head>
    <body>
        <br/>
        <br/>
        <br/>
        <div class=\"container\" style=''>
            <div class=\"tab tab-1\">
                <table id=\"table\" border=\"1\" style='width: 100%'>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>";
                    $i=0;
                    while($i<count($records))
                    {
                        echo "<tr>
                                    <td>".$records[$i]['Event']."</td>
                                    <td>".$records[$i]['Date']."</td>
                                    <td>".$records[$i]['Description']."</td>
                              </tr>";
                        $i++;
                    }
                    echo "</table>
            </div>
            <div class=\"tab tab-2\">
            <form method='post'>
                Event :<input type=\"text\" name=\"evnt\" id=\"evnt\">
                <br/>
                Date :<input type=\"date\" name=\"date\" id=\"date\">
                <br/>
                Description :<input type=\"text\" name=\"description\" id=\"description\">
                <button type='submit' name='addc'  >Add</button>
                </form>
            </div>
        </div>
//        <script type=\"text/javascript\" src=\"Coordinationtablescript.js\"></script>
        
    </body>
</html>";
#Commented out
//            <link rel='stylesheet' href='Home.css'>
//        <style>
//
//            .container{overflow: hidden}
//            .tab{float: left;}
//            .tab-2{margin-left: 50px}
//            .tab-2 input{display: block;margin-bottom: 10px}
//            tr{transition:all .25s ease-in-out}
//            tr:hover{background-color:#EEE;cursor: pointer}
//
//        </style>
    }
}
?>
