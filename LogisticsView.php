<?php
class LogisticsView implements IView
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
            <h1 >Logistics</h1>
            <h2 >Table Details About Current needed items to be given away</h2>
            <table  id='table' style=\"width:100%\">
              <tr>
                <th >Order</th>
                <th>Status</th>
                <th>Details</th>
              </tr>";
        $i=0;
        while($i<count($records))
        {
            echo "<tr>
                        <td>".$records[$i]['Order_name']."</td>
                        <td>".$records[$i]['Status']."</td>
                        <td>".$records[$i]['Details']."</td>
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
            Order: <input id='order' type='text' name='order'/>
            </div>
            <div>
            Status: <input id ='status' type='text' name='status'>
            </div>
             <div>
            Details: <input id='details' type='text' name='details'>
             </div>
            <button  type='submit' name='addl'>Add Record</button>
            </form>
            </div>
            </body>
            </html>";
    }
}
?>