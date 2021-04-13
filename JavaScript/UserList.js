var addedRowCount = 0;

//add users
function addRow() {
    var table = document.getElementById("userTable");
    var userId = table.rows.length;
    if (addedRowCount % 2 == 0)
        table.insertRow(-1).innerHTML = '<tr><td class="tg-odd">' + userId + '</td><td class="tg-odd"><input type="text" id = "last" required></input></td><td class="tg-odd"><input type="text" id = "first" required></input></td><td class="tg-odd"><input type="text" id = "phone1" required></input></td><td class="tg-odd"><input type="text" id = "phone2" required></input></td><td class="tg-odd"><input type="text" id = "email_add" required></input></td><td class="tg-odd"><input type="text" id = "addr" required></input></td><td class="tg-odd">*unsaved*</td></tr>';
    else {
        table.insertRow(-1).innerHTML = '<tr><td class="tg-odd">' + userId + '</td><td class="tg-even"><input type="text" id = "last" required></input></td><td class="tg-even"><input type="text" id = "first" required></input></td><td class="tg-even"><input type="text" id = "phone1" required></input></td><td class="tg-even"><input type="text" id = "phone2" required></input></td><td class="tg-even"><input type="text" id = "email_add" required></input></td><td class="tg-even"><input type="text" id = "addr" required></input></td><td class="tg-even">*unsaved*</td></tr>';
    }
    addedRowCount++;
}


//delete users
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

//edit users
function editSelectedRows() {
    var table = document.getElementById("userTable");
    var tableRows = table.rows;
    var checkedUsers = [];

    for (var i = 0; i < tableRows.length; i++) {
        var selectedUser = tableRows[i].cells[7].firstChild.checked;
        if (selectedUser) {
            checkedUsers.push(i);
        }
    }

    for (var j = 0; j < checkedUsers.length; j++) {
        var selectedRow = checkedUsers[j];
        var row = table.rows[selectedRow].cells
        editRow(row);
    }
    checkedUsers = null;
}

function editRow(row) {
    var lastName = row.item(1).innerHTML;
    var firstName = row.item(2).innerHTML;
    var tel1 = row.item(3).innerText;
    var tel2 = row.item(4).innerText;
    var email = row.item(5).innerText;
    var address = row.item(6).innerText;

    row[1].innerHTML = '<input type="text" id = "last" value = ' + lastName + ' required></input>';
    row[2].innerHTML = '<input type="text" id = "first" value = ' + firstName + ' required></input>';
    row[3].innerHTML = '<input type="text" id = "phone1" value = ' + tel1 + ' required></input>';
    row[4].innerHTML = '<input type="text" id = "phone2" value = ' + tel2 + ' required></input>';
    row[5].innerHTML = '<input type="text" id = "email_add" value = ' + email + ' required></input>';
    row[6].innerHTML = '<input type="text" id = "addr" value = "' + address + '" required></input>';
    row[7].innerHTML = '*unsaved*';
}

function saveChanges() {
    var table = document.getElementById("userTable");
    var tableRows = table.rows;

    for (var i=1; i<tableRows.length; i++) {
        row = tableRows[i].cells;
        if (row.item(7).innerHTML == ("*unsaved*")){
            var lastName = document.getElementById("last").value;
            var firstName = document.getElementById("first").value;
            var tel1 = document.getElementById("phone1").value;
            var tel2 = document.getElementById("phone2").value;
            var email = document.getElementById("email_add").value;
            var address = document.getElementById("addr").value;

            row[1].innerHTML = lastName;
            row[2].innerHTML = firstName;
            row[3].innerHTML = '<a href="' + tel1 + '">' + tel1 + '</a>'
            row[4].innerHTML = '<a href="' + tel2 + '">' + tel2 + '</a>'
            row[5].innerHTML = '<a href="mailto:"' + email + '>' + email + '</a>';
            row[6].innerHTML = address;
            row[7].innerHTML = '<input type="checkbox" unchecked>';
        }
    }
}

function openForm() {
    document.getElementById("editUserForm").style.display = "block";
}

function closeForm() {
    document.getElementById("editUserForm").style.display = "none";
}