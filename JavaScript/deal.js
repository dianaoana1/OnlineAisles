


var bananaFirstPrice = 0.33;
var appleFirstPrice = 0.89;
var breadFirstPrice = 1.99;
var broccoliFirstPrice = 3.49;

function firstPriceSetter(){
    document.getElementById("initial-price-apple").innerHTML = appleFirstPrice;
    document.getElementById("initial-price-banana").innerHTML = bananaFirstPrice;
    document.getElementById("initial-price-bread").innerHTML = breadFirstPrice;
    document.getElementById("initial-price-brocc").innerHTML = broccoliFirstPrice;
                    
}
function newPriceSetter(){

}
function dealChecker() {
   /* var currPriceBannana = "<?php echo $bananaprice ?>";
    var currPriceApple = "<?php echo $appleprice ?>";
    var currPriceBread = "<?php echo $breadprice ?>";
    var currPriceBroccoli = "<?php echo $bananaprice ?>";*/
    var idArr = [];
    if (currPriceBannana == bananaFirstPrice && appleFirstPrice == currPriceApple && currPriceBread == breadFirstPrice && broccoliFirstPrice == currPriceBroccoli) {
        id3 = document.getElementById("row1");
        id3.parentNode.removeChild(id3);
        id4 = document.getElementById("promo");
        document.getElementById("promo").innerHTML = "No deals this Week";
    } else {
        if (currPriceBannana == bananaFirstPrice) {
            idArr.push(document.getElementById("col-banana"));
        } if (currPriceApple == appleFirstPrice) {
            idArr.push(document.getElementById("col-apple"));
        } if (currPriceBread = breadFirstPrice) {
            idArr.push(document.getElementById("col-bread"));
        } if (currPriceBroccoli == broccoliFirstPrice) {
            idArr.push(document.getElementById("col-broccoli"));
        }
        for (var i = 0; i < idArr.length; i++) {
            if (idArr[i] !== null) {
                idCancer[i].parentNode.removeChild(idCancer[i]);
            }
        }
    }
}