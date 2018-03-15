<script type="text/javascript" src="js/reports.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    var email = "<?php echo $_SESSION['logged_in_user'];?>";
    var user_type = "<?php echo $_SESSION['logged'];?>";
    $.ajax({ url: 'backend/reports_backend.php',
       data: {
        'email': email,
        'user_type': user_type
      },
      type: 'post',
      success: function(output) {
        output = JSON.parse(output);
        if (output.error_code=="0") {
          var reports = output.reports;
          if (reports.length > 0) {
            var reports_html = return_reports_html(reports);
            $("#reports").html(reports_html);
          }
        } else {

        }

      }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Reports</strong>
<div id="reports">
   <?php include("empty_block.php") ?>
</div>