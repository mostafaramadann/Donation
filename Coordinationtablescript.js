var rIndex,
    table = document.getElementById("table");

// check the empty input
function checkEmptyInput()
{
    var isEmpty = false,
        evnt = document.getElementById("evnt").value,
    date = document.getElementById("date").value,
    description= document.getElementById("description").value;

    if(evnt === ""){
    alert("Event Connot Be Empty");
    isEmpty = true;
}
else if(date === ""){
alert("Date Connot Be Empty");
isEmpty = true;
}
else if(description === ""){
alert("Description Cannot Be Empty");
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
            evnt = document.getElementById("evnt").value,
        date = document.getElementById("date").value,
        description = document.getElementById("description").value;

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
            document.getElementById("evnt").value = this.cells[0].innerHTML;
            document.getElementById("date").value = this.cells[1].innerHTML;
            document.getElementById("description").value = this.cells[2].innerHTML;
        };
    }
}
selectedRowToInput();
