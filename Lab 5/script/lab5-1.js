window.addEventListener("submit", function(e){
    var needed = document.getElementsByClassName("required");
    var flag=false;
    for (i=0;i<needed.length;i++){
        if (needed[i].type=="checkbox"){
            if (needed[i].checked==false){
                flag=true;
            }
        }
        else {
            if (needed[i].value==""){
                flag=true;
            }
        }
    }
    if (flag){
        e.preventDefault();
        createRed();
        
    }
    
});


function createRed(e){
    var sheet = document.getElementsByClassName("required");
    for (var i = 0; i < sheet.length; i++) {
        if (sheet[i].type=="checkbox"){
            var hold = sheet[i].parentElement;
            hold.style.backgroundColor = "red";
        }
        else{
            sheet[i].style.backgroundColor = "red";
        }
    }
}

window.addEventListener("input", function(e){
    var sheet = document.getElementsByClassName("required");
    for (var i = 0; i < sheet.length; i++) {
        if (sheet[i].type=="checkbox"){
            var hold = sheet[i].parentElement;
            if (sheet[i].checked==true){
                hold.style.backgroundColor="#EBF4FB";
            }   
        }
        else{
            if (sheet[i].value.length!=0 && !sheet[i].value==""){
                sheet[i].style.backgroundColor = "white";
            }
        }
    }
});




