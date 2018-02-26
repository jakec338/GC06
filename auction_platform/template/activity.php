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
          var activities = output.activities;
          var activities_html = return_activities(activities);
          $("#activities").html(activities_html);
        } else {

        }

      }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Activity</strong>
<div id="activities" class="my-3 p-3 bg-white rounded box-shadow">
  <!-- <small class="d-block text-right mt-3"> -->
    <!-- <a href="#">All updates</a> -->
  <!-- </small> -->
</div>