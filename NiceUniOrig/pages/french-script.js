/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function() {

    $(".myClickable").click(function(e) {
//        $(".bar-container").hide();
        $(".chart-container").hide();
//        $(".single-bar").hide();
        var keyName = $(this).attr("click-data");
        var GraphKeyName = $(this).attr("graph-data");
var GraphKeyNameConverted = GraphKeyName.replace(" ","-");
        console.log(("#c" + GraphKeyNameConverted + "-hide"));
		

        $("#a" + keyName + "-hide").toggle();
        $("#c" + GraphKeyName + "-hide").toggle();
        $("#f" + GraphKeyName + "-hide").toggle();
        $("#g" + GraphKeyName + "-hide").toggle();
        $("#h" + GraphKeyName + "-hide").toggle();
        $("#bar_" + GraphKeyName + "-hide").toggle();
        $("#btn" + GraphKeyName + "-hide").toggle();

    });


    $(".my-bar").click(function(e){
       
        var rd_key = $(this).attr("rd-data");
        $(".list-group").hide();
        console.log("bilal"+rd_key);		
		//code edited by mustafa applied jugar for showing info along with bars -.css({'margin-top':(e.pageY-430)})
        $("#rd" + rd_key + "-hide").css({'margin-top':(e.pageY-350)}).show();
        
    });
    
});
$(function() {
    $("#accordion").accordion({
        collapsible: true,
        heightStyle: "content",
        active: 0
    });
});

  
$(window).load(function(){
$(".show-more a").each(function() {
    var $link = $(this);
    var $content = $link.parent().prev("div.text-content");

    console.log($link);

    var visibleHeight =300;// $content[0].clientHeight;
    var actualHide = $content[0].scrollHeight - 1;

    console.log(actualHide);
    console.log(visibleHeight);

    if (actualHide > visibleHeight) {
        $link.show();
    } else {
        $link.hide();
    }
});

$(".show-more a").on("click", function() {
    var $link = $(this);
    var $content = $link.parent().prev("div.text-content");
    var linkText = $link.text();

    $content.toggleClass("short-text, full-text");

    $link.text(getShowLinkText(linkText));

    return false;
});

function getShowLinkText(currentText) {
    var newText = '';

    if (currentText.toUpperCase() === "SHOW MORE") {
        newText = "Show less";
    } else {
        newText = "Show more";
    }

    return newText;
}
});//]]>    