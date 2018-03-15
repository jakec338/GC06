console.log('loaded');


function showAdmins(){
    console.log('test');
    var admin_div = document.getElementById("admin_accounts_list");
    var seller_div = document.getElementById("seller_accounts_list");
    var buyer_div = document.getElementById("buyer_accounts_list");
    if (admin_div.style.display === "none") {
      admin_div.style.display = "block";
      seller_div.style.display = "none";
      buyer_div.style.display = "none";
    }
  }

  function showSellers(){
    var admin_div = document.getElementById("admin_accounts_list");
    var seller_div = document.getElementById("seller_accounts_list");
    var buyer_div = document.getElementById("buyer_accounts_list");
    if (seller_div.style.display === "none") {
      seller_div.style.display = "block";
      admin_div.style.display = "none";
      buyer_div.style.display = "none";
    }
  }

  function showBuyers(){
    var admin_div = document.getElementById("admin_accounts_list");
    var seller_div = document.getElementById("seller_accounts_list");
    var buyer_div = document.getElementById("buyer_accounts_list");
    if (buyer_div.style.display === "none") {
      buyer_div.style.display = "block";
      admin_div.style.display = "none";
      seller_div.style.display = "none";
    }
  }
  