var addRowCounter=0;

function addProductRow() {
    var table = document.getElementById("productTable");
    if (addRowCounter % 2 == 0)
        table.insertRow(-1).innerHTML = '<tr><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><textarea type="text" id="myText"></textarea></td><td class="tg-odd"><input type="checkbox"></td></tr>';
    else {
        table.insertRow(-1).innerHTML = '<tr><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><textarea type="text" id="myText"></textarea></td><td class="tg-even"><input type="checkbox"></td></tr>';
    }
    addRowCounter++;
}


function deleteProductRows() {
    var table = document.getElementById("productTable");
    var tableRows = table.rows;
    var checkedProducts = [];
    var checkedProductNumbers = "";

    for (var i = 0; i < tableRows.length; i++) {
        var selectedProduct = tableRows[i].cells[5].firstChild.checked;
        if (selectedProduct)
            checkedProducts.push(i);
    }

    for (var j = 0; j < checkedProducts.length; j++) {
        if (checkedProductNumbers == "")
        checkedProductNumbers += checkedProducts[j];
        else if (j == checkedProducts.length - 1)
        checkedProductNumbers += (1+checkedProducts[j]);
        else
        checkedProductNumbers += (2+checkedProducts[j]);
    }

    if (checkedProductNumbers.length == 1) {
        if (confirm("Are you sure to delete this product from the list?"))
            for (var k = checkedProducts.length - 1; k >= 0; k--)
                table.deleteRow(checkedProducts[k]);
        else
            for (var l = 0; l < tableRows.length; l++) {
                tableRows[l].cells[7].firstChild.checked = false;
            }
    }
    else {
        if (confirm("Are you sure to delete these product from the list?"))
            for (var k = checkedProducts.length - 1; k >= 0; k--)
                table.deleteRow(checkedProducts[k]);
        else
            for (var l = 0; l < tableRows.length; l++) {
                tableRows[l].cells[7].firstChild.checked = false;
            }
    }
} 

    /*document.getElementById("delete").addEventListener("click", function() {
        var tableRef = document.getElementById('productTable');
        var tableRows = tableRef.rows;
        var checkedIndexes = [];
        for (var i = 1; i < tableRows.length; i++) {
          var checkboxSelected = tableRows[i].cells[5].firstChild.checked;
          if (checkboxSelected) {
            checkedIndexes.push(i);
          }
        }
      
        for (var k = 0; k < checkedIndexes.length; k++) {
            tableRef.deleteRow(checkedIndexes[k]-k);
          }
      });*/


      function editProductRows() {
        var table = document.getElementById("productTable");
        var tableRows = table.rows;
        var checkedProducts = [];
    
        for (var i = 0; i < tableRows.length; i++) {
            var selectedProduct = tableRows[i].cells[5].firstChild.checked;
            if (selectedProduct){
                checkedProducts.push(i);
            }
        }
        for (var j = 0; j<checkedProducts.length; j++) {
            var selectedRow = checkedProducts[j];
            var row = table.rows[selectedRow].cells
            editRow(row);
        }
    }
    
    function editRow(row) {
        var productName = row.item(0).innerHTML;
        var type = row.item(1).innerHTML;
        var price = row.item(2).innerText;
        var quantity = row.item(3).innerText;
        var description = row.item(4).innerText;
        
    
        row[0].innerHTML = "<textarea>" + productName + "</textarea>";    
        row[1].innerHTML = "<textarea>" + type + "</textarea>";   
        row[2].innerHTML = "<textarea>" + price + "</textarea>";   
        row[3].innerHTML = "<textarea>" + quantity + "</textarea>";   
        row[4].innerHTML = "<textarea>" + description + "</textarea>";   
        
    }
