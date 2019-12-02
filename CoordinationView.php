<?php
echo "<!DOCTYPE html>
<html>
    <head>
        <title>Coordination View</title>
        <meta charset=\"windows-1252\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        
        <style>
            
            .container{overflow: hidden}
            .tab{float: left;}
            .tab-2{margin-left: 50px}
            .tab-2 input{display: block;margin-bottom: 10px}
            tr{transition:all .25s ease-in-out}
            tr:hover{background-color:#EEE;cursor: pointer}
            
        </style>
        
    </head>
    <body>
        
        <div class=\"container\">
            <div class=\"tab tab-1\">
                <table id=\"table\" border=\"1\">
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                    </table>
            </div>
            <div class=\"tab tab-2\">
                Event :<input type=\"text\" name=\"evnt\" id=\"evnt\">
                Date :<input type=\"date\" name=\"date\" id=\"date\">
                Description :<input type=\"text\" name=\"description\" id=\"description\">
                
                <button onclick=\"addHtmlTableRow();\">Add</button>
            </div>
        </div>
        
        <script>
            
            var rIndex,
                table = document.getElementById(\"table\");
            
            // check the empty input
            function checkEmptyInput()
            {
                var isEmpty = false,
                    fname = document.getElementById(\"evnt\").value,
                    lname = document.getElementById(\"date\").value,
                    age = document.getElementById(\"description\").value;
            
                if(evnt === \"\"){
                    alert(\"Event Connot Be Empty\");
                    isEmpty = true;
                }
                else if(date === \"\"){
                    alert(\"Date Connot Be Empty\");
                    isEmpty = true;
                }
                else if(description === \"\"){
                    alert(\"Description Connot Be Empty\");
                    isEmpty = true;
                }
                return isEmpty;
            }
            
            // add Row
            function addHtmlTableRow()
            {
                if(!checkEmptyInput()){
                var newRow = table.insertRow(table.length),
                    cell1 = newRow.insertCell(0),
                    cell2 = newRow.insertCell(1),
                    cell3 = newRow.insertCell(2),
                    evnt = document.getElementById(\"evnt\").value,
                    date = document.getElementById(\"date\").value,
                    description = document.getElementById(\"description\").value;
            
                cell1.innerHTML = evnt;
                cell2.innerHTML = date;
                cell3.innerHTML = description;
                
                selectedRowToInput();
            }
            }
            
            
            function selectedRowToInput()
            {
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                      // get the seected row index
                      rIndex = this.rowIndex;
                      document.getElementById(\"evnt\").value = this.cells[0].innerHTML;
                      document.getElementById(\"date\").value = this.cells[1].innerHTML;
                      document.getElementById(\"description\").value = this.cells[2].innerHTML;
                    };
                }
            }
            selectedRowToInput();
            
        </script>
        
    </body>
</html>";
?>