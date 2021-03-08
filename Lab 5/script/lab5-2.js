

window.addEventListener("load", function(e){

    let elements = document.querySelectorAll('body *');
    for (var i=0;i<elements.length;i++){
        if (elements[i].nodeType!=3){

            let names=document.createTextNode(elements[i].tagName);

            let par=elements[i];
            let newNode=document.createElement('span');


            newNode.style.backgroundColor = "yellow";
            newNode.style.border="1px solid black";
            newNode.appendChild(names);
            
            
        
            par.appendChild(newNode);
 

            newNode.onclick=function(e){
                let parid=newNode.parentElement.id;
                let hold = "The id is: " + parid + "\nThe innerHTML is: " + newNode.innerHTML;
                alert(hold);
                
                
            };

        }
    }

    
});








