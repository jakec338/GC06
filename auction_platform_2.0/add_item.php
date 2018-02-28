<?php include('template/include_files.php');?>



<div class="container">
    <?php include ('template/navbar.php');?>
    <<form class="form-signin"> 
      <h1 class="h3 mb-3 font-weight-normal align-center">Add Item Listing</h1>
      <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
      <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>

      <div class="form-label-group">
        <input name="item_description" type="text" id="item_description" class="form-control" placeholder="Item Description" required="" autofocus="">
        <label for="item_description"></label>
      </div>

      <div class="form-group">
        <select class="form-control" id="item_category" name="item_category">
                <option value="" disabled selected hidden>Please Choose...</option>
				<option value="Cats">Cats</option>
				<option value="Furniture">Furniture</option>
				<option value="Clothing">Clothing</option>
				<option value="Cutouts">Cardboard Cut Outs of Louis Theroux</option>
		</select>
        <label for="item_category"></label>
      </div>

      <div class="form-label-group">
        <input name="item_start_price" type="text" id="item_start_price" class="form-control" placeholder="Item Starting Bid" required="" autofocus="">
        <label for="item_start_price"></label>
      </div>

      <div class="form-label-group">
        <input name="item_reserve_price" type="text" id="item_reserve_price" class="form-control" placeholder="Item Reserve Price" required="" autofocus="">
        <label for="item_reserve_price"></label>
      </div>

      <div class="form-label-group">
        <input name="item_end_date" type="text" id="item_end_date" class="form-control" placeholder="Auction end date" required="" autofocus="">
        <label for="item_end_date"></label>
      </div>

      <div class="form-label-group">
        <p>image input here</p>
      </div>
      <br>
      <button onclick="isValidItemAdd()" class="btn btn-lg btn-primary btn-block" type="button">Add Listing!</button>
    </form>
  </div>