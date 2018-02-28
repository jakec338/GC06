<script type="text/javascript" src="js/recommended_item.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    var email = "<?php echo $_SESSION['logged_in_user'];?>";
    var user_type = "<?php echo $_SESSION['logged'];?>";
    $.ajax({ url: 'backend/recommendation_backend.php',
       data: {
        'email': email,
        'user_type': user_type
      },
      type: 'post',
      success: function(output) {
        output = JSON.parse(output);
        if (output.error_code=="0") {
          var recommendations = output.recommended_items;
          var recommendation_items = return_recommended_items(recommendations);
          $("#recommended_items").html(recommendation_items);
        } else {

        }

      }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Recommended For You</strong>
<div id="recommended_items">
</div>
