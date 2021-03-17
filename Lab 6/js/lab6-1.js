/* jQuery and JavaScript code here for lab6-1.html */


$(document).ready(function() {
    $("#pageTitle").html("Lab 6 - DOM Manipulation with jQuery");
    var type=$("#msgArea").prop("class");
    $("#msgArea").attr("placeholder","My class is "+type);
    $(".btn-primary").css("background-color", "red");
    $("body").css("background-color","ivory");
    var hold=$(".center-icons").prop("class");
    $(".center-icons").attr("class",hold+" selected");
    $(".panel").on({
        click: function(e){
            $("#message").html("You clicked in the panel");
        },
        mousemove: function(e){
            $("#message").html("x="+e.pageX+" y="+e.pageY);
        },
        mouseleave:function(e){
            $("#message").html("The mouse has left");
        }
    });
    var newimg=$('<img src="images/art/thumbs/13030.jpg">');
    $("#panel-2").append(newimg);

    $(".img-responsive").on({
        mouseenter: function(e){
            var alt = $(this).attr('alt');
            var src = $(this).attr('src');
            var newsrc = src.replace("small","medium");
            
            var preview = $('<div id="preview" style="display:block"></div>');
            var image = $('<img src="' + newsrc + '">');
            var caption = $('<p>' + alt + '</p>');
            preview.append(image);
            preview.append(caption);
            $(this).after(preview);
            $(this).addClass("gray");

        },
        mouseleave: function(e){
            $("#preview").remove();
            $(this).removeClass("gray");
        }
    });



});