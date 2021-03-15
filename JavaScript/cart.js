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

/*
window.onload = function () {
    let button=document.getElementById("add-to-cart");
    button.addEventListener("click",function(e){ 
        e.add()
    });
};

var cart =[];

function add(){
    alert("The item has been added to your cart!")
    var priceItem = parseFloat(document.getElementById("price").substring(
        document.getElementById("price").lastIndexOf("$")+1,
        document.getElementById("price").lastIndexOf("/"))
    );
    var item = new Object();
    item.name= document.getElementById("item");
    item.pictureurl= document.getElementById("image").src;
    item.quantity= document.getElementById("quantity").value;
    item.price= priceItem.value  * item.quatity;
    cart.push(item);

    var item = document.createElement(li);
    item.setAttribute("class", "item");
    item.innerHTML = `
        <p>Item ${cart.length()} </p>
        <tr>
            <td>
            <img src="${cart[cart.length()-1].pictureurl}" width=100px>
            </td>
            <td>
                ${cart[cart.length()-1].name}
            </td>
            <td>
                <input type="button" class="minus" onclick="" value=&#8722; />
            </td>
            <td>
                QTY:${cart[cart.length()-1].quantity}
            </td>
            <td>
                <input type="button" class="plus" onclick="" value=&#43; /> 
            </td><td>
                Price: ${cart[cart.length()-1].price}$

            </td>
            <td>
            <input type="button" class="remover" onclick="" value="Remove" />  
            </td>
        </tr>
    `;
    document.getElementById("shopping-list").appendChild(item);
}
}
*/
function addToCartClicked(event) {
    var button = event.target;
    console.log("clicked!");
    var shopItem = button.parentElement;
    var itemName = shopItem.getElementsByClassName("item")[0].innerText;
    console.log(itemName);
}

//increment button
function increaseQuantity() {
    var quantity = event.target.parentNode.previousSibling.parentNode.children[4].innerHTML++;
    totalCalculators();
}

//decrement button
function decreaseQuantity() {
    var quantity = event.target.parentNode.previousSibling.parentNode.children[4].innerHTML--;
    if (quantity < 2) {
        answer = confirm("Are you sure you want to remove this item from your cart?");
        if (answer) {
            var table = document.getElementById("cartTable");
            var tableRows = table.rows.length;
            var td = event.target.parentNode;
            var tr = td.parentNode;
            tr.parentNode.removeChild(tr);
            if (document.getElementById("cartTable").rows.length == 1) {
                alert("Cart is now empty. Return shopping to refill your cart.");
            }
            for (var i = 1; i <= tableRows; i++) {
                //trying to get table to display a row indicating that the cart is empty (not working...)
                document.getElementById("cartTable").rows[i].cells[0].innerText = i;
            }
        }
        else {
            var quantity = event.target.parentNode.previousSibling.parentNode.children[4].innerHTML++;
        }
    }
    totalCalculators()
}

//deletes item from cart
function deleteItem() {
    var table = document.getElementById("cartTable");
    var tableRows = table.rows.length;
    var td = event.target.parentNode;
    var tr = td.parentNode;
    tr.parentNode.removeChild(tr);
    if (document.getElementById("cartTable").rows.length == 1) {
        alert("Cart is now empty. Return shopping to refill your cart.");
    }
    for (var i = 1; i <= tableRows; i++) {
        document.getElementById("cartTable").rows[i].cells[0].innerText = i;
    }
    totalCalculators()
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
    for (var i = 1; i < tableRows.length; i++) {
        var price = tableRows[i].cells[6].innerText;
        var quantity = tableRows[i].cells[4].innerText;
        total_per_item = parseFloat(price.substring(1)) * quantity;
        subTotal += total_per_item;
    }
    subTotalStr = subTotal.toFixed(2);
    document.getElementById("subtotal").innerText = "$" + subTotalStr;
    return subTotal;
}

function GSTcalculator() {
    var gst = 0;
    gstStr = (subTotalCalculator() * 0.0998).toFixed(2);
    gst = (subTotalCalculator() * 0.0998);
    document.getElementById("GST").innerText = "$" + gstStr;
    return gst;
}

function QSTcalculator() {
    var qst = 0;
    qstStr = (subTotalCalculator() * 0.05).toFixed(2);
    qst = (subTotalCalculator() * 0.05);
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