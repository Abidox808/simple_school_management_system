// Get the modal
var edit = document.getElementById("editModal");

// Get the button that opens the modal
var btn0 = document.getElementById("edit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn0.onclick = function() {
  edit.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  edit.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == edit) {
        edit.style.display = "none";}
});

// Get the modal
var remove = document.getElementById("removeModal");

// Get the button that opens the modal
var btn1 = document.getElementById("remove");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
  remove.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  remove.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == remove) {
        remove.style.display = "none";}
});

// Get the modal
var add = document.getElementById("addModal");

// Get the button that opens the modal
var btn2 = document.getElementById("add");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
btn2.onclick = function() {
  add.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  add.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
    if (event.target == add) {
        add.style.display = "none";}
});