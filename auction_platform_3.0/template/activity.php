<script type="text/javascript" src="js/activity.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    var email = "<?php echo $_SESSION['logged_in_user'];?>";
    var user_type = "<?php echo $_SESSION['logged'];?>";
    $.ajax({ url: 'backend/activity_backend.php',
       data: {
        'email': email,
        'user_type': user_type
      },
      type: 'post',
      success: function(output) {
        output = JSON.parse(output);
        if (output.error_code=="0") {
          var activities = output.bidding_activities;
          var bided_items = output.bided_items;
          var watching_auctions_info = output.watching_auctions_info;
          var watching_auctions_activities = output.watching_auctions_activities;
          var sold_items = output.sold_items;
          var sold_items_activities = output.sold_items_activities;
          if (bided_items.length > 0 || sold_items.length > 0 || watching_auctions_info.length >0 ) {
            var activities_html = return_activities(activities,bided_items,
                                  watching_auctions_info,watching_auctions_activities,
                                  sold_items,sold_items_activities);
            $("#activities").html(activities_html);
          }
        } else {

        }

      }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Activity</strong>

<div id="activities" class="my-3 p-3 bg-white rounded box-shadow">
  <?php include("empty_block.php") ?>
</div>