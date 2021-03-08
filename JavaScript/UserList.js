var addedRowCount = 0;


function addRow() {
    var table = document.getElementById("userTable");
    var userId = table.rows.length;
    if (addedRowCount % 2 == 0)
        table.insertRow(-1).innerHTML = '<tr><td class="tg-odd">' + userId + '</td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><input type="checkbox"></td></tr>';
    else {
        table.insertRow(-1).innerHTML = '<tr><td class="tg-odd">' + userId + '</td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><input type="checkbox"></td></tr>';
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
            for (var l = 0; l < tableRows.length; l++) {
                tableRows[l].cells[7].firstChild.checked = false;
            }
    }
    else {
        if (confirm("Are you sure you want to delete order numbers " + checkedUserNumbers + "?"))
            for (var k = checkedUsers.length - 1; k >= 0; k--)
                table.deleteRow(checkedUsers[k]);
        else
            for (var l = 0; l < tableRows.length; l++) {
                tableRows[l].cells[7].firstChild.checked = false;
            }
    }
}

function editSelectedRows() {
    var table = document.getElementById("userTable");
    var tableRows = table.rows;
    var checkedUsers = [];

    for (var i = 0; i < tableRows.length; i++) {
        var selectedUser = tableRows[i].cells[7].firstChild.checked;
        if (selectedUser)
            checkedUsers.push(i);
    }

    function editRow() {
        var userID = tableRows[checkedUsers].cells[0].fristChild.value;
        document.write(userID);
        var lastName = tableRows[checkedUsers].cells[1].fristChild.value;
        var firstName = tableRows[checkedUsers].cells[2].fristChild.value;
        var tel1 = tableRows[checkedUsers].cells[3].fristChild.value;
        var tel2 = tableRows[checkedUsers].cells[4].fristChild.value;
        var email = tableRows[checkedUsers].cells[5].fristChild.value;
        var address = tableRows[checkedUsers].cells[6].fristChild.value;
        tableRows[checkedUsers].innerHTML = "";//make textboxes in same format as table row expect with variables values gathered above as temporary textbox values
    }

    for (var j = checkedUsers.length - 1; j >= 0; j--)
        table.editRow(checkedUsers[j]);
}