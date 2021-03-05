
function checkOrderNum(order_num) {
    var order_num = document.getElementById("orderNum");
    var letters = /^[A-Za-z]+$/;
    if (order_num.value.charAt(0)=="#" && order_num.value.substring(1,6).match(letters) && order_num.value.substring(6).match(letters)) {
        return true;
    }
    else {
       alert('Order number does not follow expected format. Should be of the form #12345AB.');
        return false;
    }
}
document.getElementById("contactUsForm").onsubmit = checkOrderNum;
document.getElementById("contactUsFrom").onblur = checkOrderNum;
