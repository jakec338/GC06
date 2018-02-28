<script type="text/javascript" src="js/completed_auction.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    var email = "<?php echo $_SESSION['logged_in_user'];?>";
    var user_type = "<?php echo $_SESSION['logged'];?>";
    $.ajax({ url: 'backend/completed_auctions_backend.php',
       data: {
        'email': email,
        'user_type': user_type
      },
      type: 'post',
      success: function(output) {
        output = JSON.parse(output);
        if (output.error_code=="0") {
          var completed_auctions = output.completed_auctions;
          var completed_auctions_html = return_completed_auctions(completed_auctions);
          $("#completed_auctions").html(completed_auctions_html);
        } else {

        }

      }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Completed Acutions</strong>
<div id="completed_auctions">
</div>