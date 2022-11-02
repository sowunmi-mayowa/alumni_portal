const menuBtn = document.querySelector(".mob-icon");
const menu = document.querySelector(".mob-nav");
let printBtn = document.getElementById("print-btn");

///menuBtn.addEventListener("click", handleMenu);
 printBtn.addEventListener("click", handlePrint);

// function handleMenu(){
// 	if(menu.style.display == "none"){
// 		menu.style.display = "block"
// 	}
// 	else{
// 		menu.style.display = "none"
// 	}
// }

function handlePrint() {
	window.print();
}