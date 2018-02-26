<script type="text/javascript" src="js/ongoing_auction.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    var email = "<?php echo $_SESSION['logged_in_user'];?>";
    var user_type = "<?php echo $_SESSION['logged'];?>";
    $.ajax({ url: 'backend/ongoing_auctions_backend.php',
       data: {
        'email': email,
        'user_type': user_type
      },
      type: 'post',
      success: function(output) {
        output = JSON.parse(output);
        if (output.error_code=="0") {
          var ongoing_auctions = output.ongoing_auctions;
          var ongoing_auctions_html = return_ongoing_auctions(ongoing_auctions);
          $("#ongoing_auctions").html(ongoing_auctions_html);
        } else {

        }

      }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Ongoing Auctions</strong>
<div id="ongoing_auctions">
</div>