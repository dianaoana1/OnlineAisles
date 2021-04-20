if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoader", ready)
}
else {
    ready();
}

function ready() {
    var addToCartButtons = document.getElementsByClassName("add-to-cart");
    for (var i = 0; i < addToCartButtons; i++) {
        var button = addToCartButtons[i];
        button.addEventListener('click', addToCartClicked);
    }
}

function add() {
    alert('Item successfully added to cart!');
}


function addToCartClicked(event) {
    var button = event.target;
    console.log("clicked!");
    var shopItem = button.parentElement;
    var itemName = shopItem.getElementsByClassName("item")[0].innerText;
    console.log(itemName);
}

//increment button
function increaseQuantity() {
    event.target.parentNode.previousSibling.parentNode.children[4].value++;
    totalCalculators();
}

//decrement button
function decreaseQuantity(array) {
    var quantity = event.target.parentNode.previousSibling.parentNode.children[4].value--;
    if (quantity < 2) {
        answer = confirm("Are you sure you want to remove this item from your cart?");
        if (answer) {
            deleteItem();
        }
        else {
            var quantity = event.target.parentNode.previousSibling.parentNode.children[4].value++;
        }
    }
    totalCalculators();
    return event.target.parentNode.previousSibling.parentNode.children[2].innerHTML;
}

//deletes item from cart
function deleteItem() {
    
    var table = document.getElementById("cartTable");
    var tableRows = table.rows.length;
    var td = event.target.parentNode;
    var tr = td.parentNode;
    tr.parentNode.removeChild(tr);
    if (tableRows == 2) {
        alert("Cart is now empty. Return shopping to refill your cart.");
        totalCalculators();
    }
    for (var i = 2; i <= tableRows; i++) {
        //document.getElementById("cartTable").rows[i].cells[0].innerText = (i+1);
        totalCalculators();
    }
    totalCalculators();
}

/*
function updateCartTotal(){
    var cartItemContainer = document.getElementById("cartTable");
    var cartRows = cartItemContainer.document.getElementsbyClassName('cart-row');
    var total=0;
    for(var i =0; i < cartRows.length; i++){
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('item-price')[0];
        var quantityElement = cartRow.getElementsByClassName('item-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace('$',''))
        var quantity = quantityElement.value;
        total = price * quantity * 1.05 *1.0998;
    }
    document.getElementsByClassName('total-price')[0].innerText = total;

}*/

function totalCalculators() {
    subTotalCalculator();
    GSTcalculator();
    QSTcalculator();
    estimatedTotalCalculator();
}


function subTotalCalculator() {
    var subTotal = 0;
    var table = document.getElementById("cartTable");
    var tableRows = table.rows;
    for (var i = 2; i < tableRows.length; i++) {
        var price = parseFloat(tableRows[i].cells[4].innerText);
        console.log(price);
        var quantity =tableRows[i].cells[3].firstChild.value;
        console.log(quantity);
        total_per_item = parseFloat(price) * quantity;
        subTotal += total_per_item;
    }
    subTotalStr = subTotal.toFixed(2);
    document.getElementById("subtotal").innerText = "$" + subTotalStr;
    console.log(subTotalStr);
    return subTotal;
}

/*
function subTotalCalculator() {
    var subtotal = 0;
    var table = document.getElementById("cartTable");
    var tableRows = table.rows;
    document.write(tableRows.length);
    for (var i = 1; i < tableRows.length; i++) {
        var price = parseFloat(document.getElementById("price").innerText);
        var quantity = parseFloat(document.getElementById("qty").innerText);
        document.write(price + "\t" + quantity+ "\t");
        var priceperitem = price*quantity;
        document.write(priceperitem);
        subtotal += priceperitem;
    }
    subtotalStr = subtotal.toFixed(2);
    document.getElementById("subtotal").innerHTML = "$" + subtotalStr;
    return subTotal;
}
*/
function GSTcalculator() {
    var gst = 0;
    gstStr = parseFloat((subTotalCalculator() * 0.0998).toFixed(2));
    gst = parseFloat((subTotalCalculator() * 0.0998));
    document.getElementById("GST").innerText = "$" + gstStr;
    return gst;
}

function QSTcalculator() {
    var qst = 0;
    qstStr = parseFloat((subTotalCalculator() * 0.05).toFixed(2));
    qst = parseFloat((subTotalCalculator() * 0.05));
    document.getElementById("QST").innerText = "$" + qstStr;
    return qst;
}

function estimatedTotalCalculator() {
    var shipping = document.getElementById("shipping-cost").innerText;
    var total = 0 ;
    if (shipping == "Free") {
        total = (GSTcalculator() + QSTcalculator() + subTotalCalculator());
    }
    else {
        total = (GSTcalculator() + QSTcalculator() + subTotalCalculator() + parseFloat(shipping.substring(1))); //no tax on shipping???
    }
    document.getElementById("estimatedTotal").innerText = "$" + total.toFixed(2);
}