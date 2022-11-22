const printBtn = document.getElementById("print-btn");
printBtn.addEventListener("click", handlePrint);
function handlePrint() {
	window.print();
}