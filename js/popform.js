 document.getElementById("openFormButton").addEventListener("click", function() {
  document.getElementById("popupForm").style.display = "block";
  document.querySelector(".overlay").style.display = "block";
});

document.getElementById("closeFormButton").addEventListener("click", function() {
  document.getElementById("popupForm").style.display = "none";
  document.querySelector(".overlay").style.display = "none";
}); 