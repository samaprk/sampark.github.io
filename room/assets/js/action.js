var height = document.documentElement.clientHeight;
console.log(height);

$("form").css("margin-top",0.1*height);

function Random12() {
    console.log("entered");
    var min = 100000;
    var max = 999999;
    var rand = Math.floor(Math.random()* (max - min + 1)) + min;
    if (min == 1 && max == 30) {rand = 6}
    document.getElementById('display').innerText = rand;
}

$("#gen").click(function(){
    Random12();
});

