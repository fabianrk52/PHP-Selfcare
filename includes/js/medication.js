 
function createLine(){
    var meds = ["Acamol","KalBeten","Civofen"];
    var link=["/acamol.html","#","#"];
    var color=["blue","red","yellow"];
    var line=document.createElement("a");
    line.className="list-group-item list-group-item-action";
    line.style.backgroundcolor=color[];
    text.innerText=meds[i];
    return line;
}


(function(){
	var content = document.getElementById("main"); 
    var el=document.createElement("div");  
    el.className="list-group textInBox"; 
  	for(var i=0;i<3;i++){
  		line = createLine(i);   
  		el.appendChild(line); 		
  	}
    content.appendChild(el);
})();