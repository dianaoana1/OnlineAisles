var addedRowCount = 0;


function addRow() {
    var table = document.getElementById("orderTable");
    var orderNumber = table.rows.length;
    if (addedRowCount % 2 == 0)
        var row = table.insertRow(-1).innerHTML = '<tr><td class="tg-odd">' + orderNumber + '</td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><input type="checkbox"></td></tr>';
    else {
        var row = table.insertRow(-1).innerHTML = '<tr><td class="tg-even">' + orderNumber + '</td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><input type="checkbox"></td></tr>';
    }
    addedRowCount++;
}


function deleteSelectedRows() {
    var table = document.getElementById("orderTable");
    var tableRows = table.rows;
    var checkedOrders = [];
    var checkedOrderNumbers = "";

    for (var i = 0; i < tableRows.length; i++) {
        var selectedOrder = tableRows[i].cells[5].firstChild.checked;
        if (selectedOrder)
            checkedOrders.push(i);
    }

    for (var j = 0; j < checkedOrders.length; j++) {
        if (checkedOrderNumbers == "")
            checkedOrderNumbers += checkedOrders[j];
        else if (j == checkedOrders.length - 1)
            checkedOrderNumbers += (" and " + checkedOrders[j]);
        else
            checkedOrderNumbers += (", " + checkedOrders[j]);
    }

    if (checkedOrderNumbers.length == 1) {
        if (confirm("Are you sure you want to delete order number " + checkedOrderNumbers + "?"))
            for (var k = checkedOrders.length - 1; k >= 0; k--)
                table.deleteRow(checkedOrders[k]);
        else
            for (var l = 0; l < tableRows.length; l++) {
                tableRows[l].cells[5].firstChild.checked = false;
            }
    }
    else {
        if (confirm("Are you sure you want to delete order numbers " + checkedOrderNumbers + "?"))
            for (var k = checkedOrders.length - 1; k >= 0; k--)
                table.deleteRow(checkedOrders[k]);
        else
            for (var l = 0; l < tableRows.length; l++) {
                tableRows[l].cells[5].firstChild.checked = false;
            }
    }
}




