var slideIndex = 1;
const bananaFirstPrice=0.33;
const appleFirstPrice=0.89;
const breadFirstPrice=1.99;
const broccoliFirstPrice=3.49;
window.onload = function () {
    showSlides(slideIndex);
};

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}
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
function dealSetter(){
    if (weekDeal() == 1 ) {
        document.getElementById("text2"  ).innerHTML = "This Weeks Deal " + "<a  href=../html/articles/apple.html ><i> click here</i></a>";
        document.getElementById("current-promotion").innerHTML = "This week's deal is the apple we currently have an offer of 20% off</br> so the price of apples is now :";
        document.getElementById("current-price").innerHTML=" ̶0̶.̶8̶9̶/̶u̶n̶ 0.70$"
       
    } else if (weekDeal() == 2) {
        document.getElementById("text3").innerHTML = "This Weeks Deal " + "<a href=../html/articles/Banana.html><i> click here</i></a>";
        document.getElementById("current-promotion").innerHTML = "This week's deal is the banana they are currently 30% off pick them</br> while we still have stock. The price of bananas is now:";
        document.getElementById("current-price").innerHTML=" ̶ ̶0̶.̶3̶3̶  0.23$"
    } else if (weekDeal() == 3 ) {
        document.getElementById("text4").innerHTML = "This Weeks Deal" + "<a href=../html/articles/bread.html><i> click here</i></a>";
        document.getElementById("current-promotion").innerHTML = "This week's deal is bread it is currently on sale for 15% off</br>  order our homemade bread. The price of the bread is now :";
        document.getElementById("current-price").innerHTML=" ̶1̶.̶9̶9̶ 1.69$"
    } else if (weekDeal() == 4 ) {
        document.getElementById("text5").innerHTML = "This Weeks Deal" + "<a href=../html/articles/broccoli.html><i> click here</i></a>";
        document.getElementById("current-promotion").innerHTML = "This week's deal is now the broccoli it is currently on sale for 20% off</br> order this good green vegetable for the price of the bread is now :";
        document.getElementById("current-price").innerHTML=" ̶13̶.̶4̶9̶/̶u̶n̶ 2.80$"
    }
}