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
          var ongoing_auctions_of_user = output.ongoing_auctions_of_user;
          var watching_auctions = output.watching_auctions;
          var ongoing_auctions_html = return_ongoing_auctions(ongoing_auctions,ongoing_auctions_of_user,watching_auctions,user_type);
          $("#ongoing_auctions").html(ongoing_auctions_html);
        } else {

        }

      }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Ongoing Auctions</strong>
<div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
<div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
<div id="ongoing_auctions">
</div>