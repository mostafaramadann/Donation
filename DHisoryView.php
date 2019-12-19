<?php
require_once ("IView.php");
class DHisoryView implements IView
{

    function showView($records)
    {

       echo "
       <head>
        <title>Coordination View</title>
        <meta charset='windows-1252'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='CSS/Table.css'>
        <link rel='stylesheet' href='CSS/Home.css'>
      </head>
    <body>
        <br/>
        <br/>
        <br/>
        <div class='container' style=''>
            <div class='tab tab-1'>
                <table id='table'  style='width: 100%'>
                    <tr>
                        <th>recid</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>";
                    $i=0;
                    while($i<count($records))
                    {
                        echo "<tr>
                                    <td>".$records[$i]['recid']."</td>
                                    <td>".$records[$i]['Event']."</td>
                                    <td>".$records[$i]['Date']."</td>
                                    <td>".$records[$i]['Description']."</td>
                              </tr>";
                        $i++;
                    }
                    echo "</table>
            </div>
            <div class='tab tab-2'>
            <form method='post'>
                Event :<input type='text' name='evnt' id='event'>
                <br/>
                Date :<input type='date' name='date' id='date'>
                <br/>
                Description :<input type='text' name='description' id='description'>
                <button type='submit' name='addc'  >Add</button>
                </br>
                <label>delete record number</label>
                <input type='number' name='recid'>
                <button type='submit' name='delc'>Delete</button>
                </form>
            </div>
        </div>
        <script type='text/javascript' src='javascript/Coordinationtablescript.js'></script>
        
    </body>
       ";
    }
}