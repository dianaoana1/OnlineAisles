const bananaFirstPrice=0.33;
const appleFirstPrice=0.89;
const breadFirstPrice=1.99;
const broccoliFirstPrice=3.49;

Date.prototype.getWeek = function () {
    var date = new Date(this.getTime());
    date.setHours(0, 0, 0, 0);
   
    date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  
    var week1 = new Date(date.getFullYear(), 0, 4);
    
    return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
        - 3 + (week1.getDay() + 6) % 7) / 7);
}


function weekDeal() {
    let myDate = new Date();
    myDate.getDay();
    console.log(myDate.getWeek());
    var weekOfMonth = 0;
    if (myDate.getWeek() > 48) {
        weekOfMonth = myDate.getWeek() - 48;
    } else if (myDate.getWeek() > 44) {
        weekOfMonth = myDate.getWeek() - 44;
    }
    else if (myDate.getWeek() > 40) {
        weekOfMonth = myDate.getWeek() - 40;
    }
    else if (myDate.getWeek() > 36) {
        weekOfMonth = myDate.getWeek() - 36;
    }
    else if (myDate.getWeek() > 32) {
        weekOfMonth = myDate.getWeek() - 32;
    }
    else if (myDate.getWeek() > 28) {
        weekOfMonth = myDate.getWeek() - 28;
    }
    else if (myDate.getWeek() > 24) {
        weekOfMonth = myDate.getWeek() - 24;
    }
    else if (myDate.getWeek() > 20) {
        weekOfMonth = myDate.getWeek() - 20;
    }
    else if (myDate.getWeek() > 16) {
        weekOfMonth = myDate.getWeek() - 16;
    }
    else if (myDate.getWeek() > 12) {
        weekOfMonth = myDate.getWeek() - 12;
    }
    else if (myDate.getWeek() > 8) {
        weekOfMonth = myDate.getWeek() - 8;
    }
    else if (myDate.getWeek() > 4) {
        weekOfMonth = myDate.getWeek() - 4;
    }
    console.log(weekOfMonth);
    if (weekOfMonth % 4 == 0) {
        console.log("Deal week 4");
        return 4;
       
    } else if (weekOfMonth % 3 == 0) {
        console.log("Deal week 3");
        return 3;
       
    } else if (weekOfMonth % 2 == 0) {
        console.log("Deal week 2");
        return 2;
        
    } else {
        console.log("Deal week 1");
        return 1;
       
    }
}

function productPriceSet(name1,name2){
 if(weekDeal()==1 && (name1.localeCompare('apple')==0||name2.localeCompare('apple')==0)){
    var adjustedPrice=appleFirstPrice*0.8;
    var rounded=adjustedPrice.toFixed(2);
    var final=rounded=Number(rounded);
   document.getElementById("price_apple").innerHTML="$"+final+"/un";
 }else if(weekDeal()==2&& (name1.localeCompare('banana')==0 ||name2.localeCompare('banana')==0)){
    var adjustedPrice=bananaFirstPrice*0.7;
    var rounded=adjustedPrice.toFixed(2);
    var final=rounded=Number(rounded);
    document.getElementById("price_banana").innerHTML="$"+final+"/un";
 }else if (weekDeal()==3  && (name1.localeCompare('bread')==0 ||name2.localeCompare('bread')==0)){
    var adjustedPrice=breadFirstPrice*0.85;
    var rounded=adjustedPrice.toFixed(2);
    var final=rounded=Number(rounded);
    document.getElementById("price_bread").innerHTML="$"+final;
 }else if (weekDeal()==4 && (name1.localeCompare('broccoli')==0 ||name2.localeCompare('apple')==0)){
    var adjustedPrice=appleFirstPrice*0.8;
    var rounded=adjustedPrice.toFixed(2);
    var final=rounded=Number(rounded);
    document.getElementById("price_broccoli").innerHTML="$"+final+"/un";
 }
}
