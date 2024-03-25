document.addEventListener("DOMContentLoaded", function () {
  var lihatButton = document.getElementById("lihatButton");
  var tambahButton = document.getElementById("tambahButton");

  lihatButton.addEventListener("click", function () {
    alert("Button Lihat Clicked!");
  });

  tambahButton.addEventListener("click", function () {
    alert("Button Tambah Clicked!");
  });
});