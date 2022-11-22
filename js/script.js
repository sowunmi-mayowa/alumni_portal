const menuBtn = document.querySelector(".mob-icon");
const menu = document.querySelector(".mob-nav");

menuBtn.addEventListener("click", handleMenu);

function handleMenu(){
	if(menu.style.display == "none"){
		menu.style.display = "block"
	}
	else{
		menu.style.display = "none"
	}
}

