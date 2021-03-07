var addedRowCount = 0;


function addRow() {
    var table = document.getElementById("userTable");
    var userId = table.rows.length;
    if (addedRowCount % 2 == 0)
        table.insertRow(-1).innerHTML = '<tr><td class="tg-odd">' + userId + '</td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><input type="checkbox"></td></tr>';
    else {
        table.insertRow(-1).innerHTML = '<tr><td class="tg-odd">' + userId + '</td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><input type="checkbox"></td></tr>';
    }
    addedRowCount++;
}


function deleteSelectedRows() {
    var table = document.getElementById("userTable");
    var tableRows = table.rows;
    var checkedUsers = [];
    var checkedUserNumbers = "";

    for (var i = 0; i < tableRows.length; i++) {
        var selectedUser = tableRows[i].cells[7].firstChild.checked;
        if (selectedUser)
            checkedUsers.push(i);
    }

    for (var j = 0; j < checkedUsers.length; j++) {
        if (checkedUserNumbers == "")
            checkedUserNumbers += checkedUsers[j];
        else if (j == checkedUsers.length - 1)
            checkedUserNumbers += (" and " + checkedUsers[j]);
        else
            checkedUserNumbers += (", " + checkedUsers[j]);
    }

    if (checkedUserNumbers.length == 1) {
        if (confirm("Are you sure you want to delete order number " + checkedUserNumbers + "?"))
            for (var k = checkedUsers.length - 1; k >= 0; k--)
                table.deleteRow(checkedUsers[k]);
        else
            location.reload();
    }
    else {
        if (confirm("Are you sure you want to delete order numbers " + checkedUserNumbers + "?"))
            for (var k = checkedUsers.length - 1; k >= 0; k--)
                table.deleteRow(checkedUsers[k]);
        else
            location.reload();
    }
}