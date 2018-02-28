<script type="text/javascript">

  $( document ).ready(function() {
      searchItems("default","");
  });

  $("#searched_item_input").on("keydown",function(e){
     var keyCode = e.which || e.keyCode;
     if(keyCode == 13) {
        searchItems('','');
        return false;
     }
  });
</script>

<strong class="d-inline-block mb-2 text-primary">Items</strong>
<div style="margin-left:20px;" id="searched_items">
</div>
<script src="js/jquery-sortable.js"></script>