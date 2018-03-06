

function showSelling(){
    var sell_div = document.getElementById("selling");
    var sold_div = document.getElementById("sold");
    if (sell_div.style.display === "none") {
      sold_div.style.display = "none";
      sell_div.style.display = "block";
    }
  }

  function showSold(){
    var sell_div = document.getElementById("selling");
    var sold_div = document.getElementById("sold");
    if (sold_div.style.display === "none") {
      sold_div.style.display = "block";
      sell_div.style.display = "none";
    }
  }
  