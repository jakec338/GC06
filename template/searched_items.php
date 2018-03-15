<script type="text/javascript">

  $( document ).ready(function() {
      searchItems("default","");
      $("#num_items").change(function(){
          searchItems('default','');
      });
  });

  $("#searched_item_input").on("keydown",function(e){
     var keyCode = e.which || e.keyCode;
     if(keyCode == 13) {
        searchItems('','');
        return false;
     }
  });
</script>
<div class="row">
  <div class="col-md-1">
    <strong class="d-inline-block mb-2 text-primary">Items</strong>
  </div>
  <div class="col-md-2">
    <select class="form-control" id="num_items" class="select">
      <option>
        Number of items
      </option>
      <option>
        3
      </option>
      <option>
        5
      </option>
      <option>
        10
      </option>
      <option>
        All
      </option>
    </select>
  </div>
</div>
<br/>
<div style="margin-left:20px;" id="searched_items">
</div>
<script src="js/jquery-sortable.js"></script>