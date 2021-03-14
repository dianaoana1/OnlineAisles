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
        if (selectedUser){
            checkedUsers.push(i);
        }
    }

    for (var j = 0; j<checkedUsers.length; j++) {
        var selectedRow = checkedUsers[j];
        var row = table.rows[selectedRow].cells
        editRow(row);
    }
}

function editRow(row) {
    var userId = row.item(0).innerHTML;
    var lastName = row.item(1).innerHTML;
    var firstName = row.item(2).innerHTML;
    var tel1 = row.item(3).innerText;
    var tel2 = row.item(4).innerText;
    var email = row.item(5).innerText;
    var address = row.item(6).innerText;

    row[1].innerHTML = "<textarea>" + lastName + "</textarea>";    
    row[2].innerHTML = "<textarea>" + firstName + "</textarea>";   
    row[3].innerHTML = "<textarea>" + tel1 + "</textarea>";   
    row[4].innerHTML = "<textarea>" + tel2 + "</textarea>";   
    row[5].innerHTML = "<textarea>" + email + "</textarea>";   
    row[6].innerHTML = "<textarea>" + address + "</textarea>";   
}