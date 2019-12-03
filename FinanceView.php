<?php
class financeView
{
    public function __construct()
    {
    }
    public static function showView($records)
    {
        include ("Header.php");
            echo "<html lang=\"en\">
            <body>
            <!--<link rel=\"stylesheet\" href=\"Home.css\">-->
            <h1 >Financial Matters</h1>
            <h2 >Table Details About Assests Donated</h2>
            <table  id='table' style=\"width:100%\">
              <tr>
                <th >Assets</th>
                <th>price</th>
                <th>Quantity</th>
              </tr>";
              $i=0;
              while($i<count($records))
              {
                  echo "<tr>
                        <td>".$records[$i]['Asset']."</td>
                        <td>".$records[$i]['price']."</td>
                        <td>".$records[$i]['qty']."</td>
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
            Asset: <input id='asset' type='text' name='asset'/>
            </div>
            <div>
            Price: <input id ='price' type='number' name='price'>
            </div>
             <div>
            Quantity: <input id='qty' type='number' name='qty'>
             </div>
            <button  type='submit' name='add'>Add Record</button>
            </form>
            </div>
            </body>
            </html>";
    }
}
?>

