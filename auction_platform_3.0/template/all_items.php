<script type="text/javascript" src="js/all_items.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
      $.ajax({ url: 'backend/sell_backend.php',
       data: {
        '':''
      },
       type: 'post',
       success: function(output) {
           output = JSON.parse(output);
           if (output.error_code=="0") {
              var your_items = output.selling;
              var other_items = output.sold;
              var your_items_html = return_selling(your_items);
<<<<<<< Updated upstream
              var other_items_html = return_sold(other_items);
=======
              var other_items_html = return_other_items(other_items);
>>>>>>> Stashed changes
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

<strong class="d-inline-block mb-2 text-primary">Your Current Auctions</strong>
<div style="margin-left:20px;" id="your_items">
</div>
<strong class="d-inline-block mb-2 text-primary">Your Past Auctions</strong>
<div style="margin-left:20px;" id="other_items">
</div>
<script src="js/jquery-sortable.js"></script>