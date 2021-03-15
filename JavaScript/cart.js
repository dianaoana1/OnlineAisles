if(document.readyState == "loading"){
    document.addEventListener("DOMContentLoader", ready)
}
else{
    ready();
}

function ready(){
    var addToCartButtons = document.getElementsByClassName("add-to-cart");
    for(var i = 0; i < addToCartButtons; i++){
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
function addToCartClicked(event){
    var button = event.target;
    console.log("clicked!");
    var shopItem = button.parentElement;
    var itemName = shopItem.getElementsByClassName("item")[0].innerText;
    console.log(itemName);
}

function increaseQuantity(addClicked) {     //not functional
    // var row = event.target.parentNode.parentNode.id
    quantity = document.getElementById("quantity").innerText;
    // document.getElementById("quantity").innerText= ++quantity;
    document.getElementById("cartTable").rows[target.parentNode.parentNode.id].cells[4].innerText = ++quantity;
    var rowId = event.target.parentNode.parentNode.id; 
    var data = document.getElementById(rowId).querySelectorAll(".row-data");  
              /*returns array of all elements with  
              "row-data" class within the row with given id*/ 
    ++data[4].innerText;
  
}

function decreaseQuantity(subtractClicked) {    //not functional
    quantity = document.getElementById("quantity").innerText;
    document.getElementById("quantity").innerText= --quantity;
}


function deleteItem() {
    var table = document.getElementById("cartTable");
    var tableRows = table.rows.length;
    var td = event.target.parentNode; 
    var tr = td.parentNode; 
    tr.parentNode.removeChild(tr); 
    if (document.getElementById("cartTable").rows.length == 1){
        alert("Cart is now empty. Return shopping to refill your cart.");        
    }
    for (var i = 1; i<=tableRows; i++){
            document.getElementById("cartTable").rows[i].cells[0].innerText = i;
    }
    updateCartTotal()
}

function updateCartTotal(){
    var cartItemContainer = document.getElementsById('cartTable');
    var cartRows = cartItemContainer.document.getElementsbyClassName('cart-row');
    var total=0;
    for(var i =0; i < cartRows .length; i++){
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('item-price')[0];
        var quantityElement = cartRow.getElementsByClassName('item-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace('$',''))
        var quantity = quantityElement.value;
        total = price * quantity * 1.05 *1.0998;
    }
    document.getElementsByClassName('total-price')[0].innerText = total;

}