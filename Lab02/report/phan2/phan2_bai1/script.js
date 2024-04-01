function createTable() {
    deleteTable()
    var myTable = "<table class='table table-bordered'>";
    for (var i = 0; i < 2; i++) {
        myTable += "<tr>";
        for (var j = 0; j < 2; j++) {
            myTable += "<td><input type='text' class='form-control'></td>";
        }
        myTable += "</tr>";
    }
    myTable += "</table>"; 
    document.getElementById("table-container").innerHTML = myTable;
}

function addRow() {
    var myTable = document.querySelector("table");
    var newRow = myTable.insertRow(-1);
    var numCols = myTable.rows[0].cells.length;
    for (var i = 0; i < numCols; i++) {
        var newCell = newRow.insertCell(i);
        newCell.innerHTML = "<input type='text' class='form-control'>";
    }
}

function addCol() {
    var myTable = document.querySelector("table");
    var numRows = myTable.rows.length;
    for (var i = 0; i < numRows; i++) {
        var newCell = myTable.rows[i].insertCell(-1);
        newCell.innerHTML = "<input type='text' class='form-control'>";
    }
}

function deleteRow() {
    var rowIndex = document.getElementById("rowIndex").value - 1;
    var myTable = document.querySelector("table");
    if (rowIndex >= 0 && rowIndex < myTable.rows.length) {
        myTable.deleteRow(rowIndex);
    } 
    else {
        window.alert("Invalid row index!");
    }
}


function deleteCol() {
    var colIndex = document.getElementById("colIndex").value - 1;
    var myTable = document.querySelector("table");
    var numRows = myTable.rows.length;
    if (colIndex >= 0 && colIndex < myTable.rows[0].cells.length) {
        for (var i = 0; i < numRows; i++) {
            myTable.rows[i].deleteCell(colIndex)
        }
    }
    else {
        window.alert("Invalid column index!")
    }
}

function deleteTable() {
    var tableContainer = document.getElementById("table-container");
    var myTable = tableContainer.querySelector("table");
    if (myTable) {
        myTable.remove();
    }
}