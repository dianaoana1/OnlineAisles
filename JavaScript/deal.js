const bananaFirstPrice = 0.33;
const appleFirstPrice = 0.89;
const breadFirstPrice = 1.99;
const broccoliFirstPrice = 3.49;
function dealChecker() {
    var currPriceBannana = "<?php echo $bananaprice ?>";
    var currPriceApple = "<?php echo $bananaprice ?>";
    var currPriceBread = "<?php echo $bananaprice ?>";
    var currPriceBroccoli = "<?php echo $bananaprice ?>";
    if (currPriceBannana == bananaFirstPrice) {
        bananaChanger();
    }
    if (appleFirstPrice == currPriceApple) {
        appleChanger();
    }
    if (currPriceBread == breadFirstPrice) {
        breadChanger();
    }
    if (broccoliFirstPrice == currPriceBroccoli) {
        broccoliChanger();
    }
    if(currPriceBannana == bananaFirstPrice&&appleFirstPrice == currPriceApple&&currPriceBread == breadFirstPrice&&broccoliFirstPrice == currPriceBroccoli){
        document.getElementById("promo").innerHTML="No deals this Week";
    }
}

function bananaChanger() {
    var idBanana=  document.getElementById("col-banana");
    idBanana.parentNode.removeChild(idBanana);
    document.getElementById("col-banana").style.position="relative";
}
function appleChanger() {
    var idApple=  document.getElementById("col-apple");
    idApple.parentNode.removeChild(idApple);
    document.getElementById("col-banana").style.position="relative";
}
function breadChanger() {
    var idBread=  document.getElementById("col-bread");
    idBread.parentNode.removeChild(idBread);
    document.getElementById("col-banana").style.position="relative";
}
function broccoliChanger() {
    var idBrocc=  document.getElementById("col-broccoli");
    idBrocc.parentNode.removeChild(idBrocc);
    document.getElementById("col-banana").style.position="relative";
}