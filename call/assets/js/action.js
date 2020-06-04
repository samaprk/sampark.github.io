var height = document.documentElement.clientHeight;
console.log(height);

$("#header, #feature").css("height",0.09*height);
// $("#feature").css("height",0.09*height);
$(".button-grp .row").css("height",0.08*height);

$("#float").css("bottom",height/300);

var panel = 0.64*height;
var n = $("#call-active img").length;

if(n <= 9){
    switch(n){
        case 1: $("#call-active img").css("width","100%"); break; 
        case 2:
        case 3:
        case 4: $("#call-active img").css("width","50%"); break;
        case 5:
        case 6:
        case 7:
        case 8:
        case 9: $("#call-active img").css("width","33%"); break;
    }
    
    switch(n){
        case 1: 
        case 2: $("#call-active img").css("height",panel); break;
        case 3:
        case 4: 
        case 5:
        case 6: $("#call-active img").css("height",panel/2); break;
        case 7:
        case 8:
        case 9: $("#call-active img").css("height",panel/3); break;
    }
}
else{
    console.log("bigger");
}
