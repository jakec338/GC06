<script type="text/javascript" src="js/categories.js"></script>
<script type="text/javascript">

  $( document ).ready(function() {
      $.ajax({ url: 'backend/categories_backend.php',
       data: {
        '': ''
      },
       type: 'post',
       success: function(output) {
          output = JSON.parse(output);
          if (output.error_code=="0") {
              var total_categories = output.total_categories;
              var total_categories_html = return_total_categories(total_categories);
              $("#categories").html(total_categories_html);
                // $("#success-info").css("display","block");
                // $("#danger-info").css("display","none");
                // $("#success-info").html(output.msg);
            } else {
                // $("#success-info").css("display","none");
                // $("#danger-info").css("display","block");
                // $("#danger-info").html(output.msg);
            }
         }
      });
  });
</script>
<strong class="d-inline-block mb-2 text-primary">Categories</strong>
<div style="margin-left:20px;" id="categories">
</div>
<script src="js/jquery-sortable.js"></script>