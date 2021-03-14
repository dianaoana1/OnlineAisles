window.onload = function () {
    let button=document.getElementById("add-to-cart");
    button.addEventListener("click",function(e){ 
        e.add()
    });
};

var cart =[];

function add(){
    alert("The item has been added to your cart!")
    var priceItem = document.getElementById("price").substring(
        document.getElementById("price").lastIndexOf("$")+1,
        document.getElementById("price").lastIndexOf("/")
    );
    var item = new Object();
    item.name= document.getElementById("item");
    item.pictureurl= document.getElementById("image").src;
    item.quantity= document.getElementById("quantity").value;
    item.price= priceItem.value;
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

