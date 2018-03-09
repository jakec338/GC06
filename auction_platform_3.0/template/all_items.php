<script type="text/javascript" src="js/all_items.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
      $.ajax({ url: 'backend/all_items_backend.php',
       data: {
        '':''
      },
       type: 'post',
       success: function(output) {
           output = JSON.parse(output);
           if (output.error_code=="0") {
              var your_items = output.your_items;
              var other_items = output.other_items;
              var your_items_html = return_your_items(your_items);
              var other_items_html = return_other_items(other_items);
              $("#your_items").html(your_items_html);
              $("#other_items").html(other_items_html);
          } else {
              $("#success-info").css("display","none");
              $("#danger-info").css("display","block");
              $("#danger-info").html(output.msg);
          }
       }
    });
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Your Items</strong>
<div style="margin-left:20px;" id="your_items">
</div>
<strong class="d-inline-block mb-2 text-primary">All other Items</strong>
<div style="margin-left:20px;" id="other_items">
</div>
<script src="js/jquery-sortable.js"></script>