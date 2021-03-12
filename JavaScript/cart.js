window.onload = function () {
    let button=document.getElementById("add-to-cart");
    button.addEventListener("click",function(e){ 
        e.add()
        displayCart()
    });
};

var cart =[];

function add(){
    var priceItem = document.getElementById("price").substring(
        document.getElementById("price").lastIndexOf("$")+1,
        document.getElementById("price").lastIndexOf("/")
    );
    var item = {
        name: document.getElementById("item"),
        pictureurl: document.getElementById("image").src,
        quantity: document.getElementById("quantity"),
        price: priceItem
    }
    cart.push(item);
}

