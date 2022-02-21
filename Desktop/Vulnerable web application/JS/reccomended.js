$(document).ready(function() {

    if ($('.content').height() > $('.container').height()) {
        setInterval(function () {

            start();
       }, 3000); 
   
    }
});

function animateContent(direction) {  
    var animationOffset = $('.container').height() - $('.content').height();
    if (direction == 'up') {
        animationOffset = 0;
    }
	
    console.log("animationOffset:"+animationOffset);
    $('.content').animate({ "marginTop": (animationOffset)+ "px"},60000);
}

function up(){
    animateContent("up")
}
function down(){
    animateContent("down")
}

function start(){
 setTimeout(function () {
    down();
}, 2000);
 setTimeout(function () {
    up();
}, 2000);
   setTimeout(function () {
    console.log("wait...");
}, 2000);
}    