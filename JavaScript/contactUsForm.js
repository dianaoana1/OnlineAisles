window.onload = function () {
    let submitButton=document.getElementById("submitButton");
    submitButton.addEventListener("click",function(e){ 
        e.preventDefault();
        checkItemName(); 
        checkOrderNum();
    });
};


function checkOrderNum() {
    var order_num = document.getElementById("orderNum").value;
    const regexp2=new RegExp("^#{1}[0-9]{5}[A-Za-z]{2}$");
    console.log(regexp2.test(order_num));
    if(order_num.length==0){
        alert("Please enter the order number");
    }else  if (regexp2.test(order_num)) {
        return true;
    }
    else {
       alert('Order number does not follow expected format. Should be of the form #12345AB.');
        return false;
    }
   
}
function checkItemName(){
    var item_Name = document.getElementById("itemNm").value;

    const regexp= new RegExp("[0-9]");
    console.log(item_Name);
    console.log(regexp.test(item_Name));
    if(item_Name.length==0){
        console.log("there is nothing");
        alert("Please enter an item name");
        return false;
    }else if(regexp.test(item_Name)){
        alert("Not a good item name . Please enter a real item name");  
        return false;
    }else{
       return true;
    }
}

/*
document.getElementById("contactUsForm").onsubmit = checkOrderNum;
document.getElementById("contactUsForm").onblur = checkOrderNum;
document.getElementById("contactUsForm").onsubmit = checkItemName;
document.getElementById("contactUsForm").onblur = checkItemName;
*/
