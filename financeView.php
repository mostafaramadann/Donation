<?php
include ("Header.php");
?>
<html lang="en">
<body>
<h1>Financial Matters</h1>
<h2>Table Details About Assests Donated</h2>
<table  id='table' style="width:100%">
  <tr>
    <th>Assets</th>
    <th>price</th>
    <th>Quantity</th>
  </tr>
</table>
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
<button onclick='addrecord()' type='submit' name='add'>Add Record</button> 
</form>
</div>
<script>

</script>
<?php
if(isset($_POST['submit']))
{
    #FinanceController.
}
?>
</body>
</html>
