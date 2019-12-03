<?php
class HRView
{
    public function __construct()
    {

    }
    public function showView($records)
    {
        include ("greetings.php");
        echo "<html lang=\"en\">
            <body>
            <link rel=\"stylesheet\" href=\"Home.css\">
            <link rel='stylesheet' href='Table.css'>
            <h1 >Humane</h1>
            <h2 >Table Details About Current volunteers</h2>
            <table  id='table' style=\"width:100%\">
              <tr>
                <th >Name</th>
                <th>DateofJoin</th>
                <th>Role</th>
              </tr>";
        $i=0;
        while($i<count($records))
        {
            echo "<tr>
                        <td>".$records[$i]['Name']."</td>
                        <td>".$records[$i]['DateofJoin']."</td>
                        <td>".$records[$i]['Role']."</td>
                  </tr>";
            $i++;
        }
        echo "</table>
            <br/>
            <br/>
            <br/>
            <br/>
            <div>
            <form method='post'>
            <div>
            Order: <input id='Name' type='text' name='Name'/>
            </div>
            <div>
            Status: <input id ='DateofJoin' type='text' name='DateofJoin'>
            </div>
             <div>
            Details: <input id='Role' type='text' name='Role'>
             </div>
            <button  type='submit' name='addh'>Add Record</button>
            </form>
            </div>
            </body>
            </html>";
    }
}
?>