function dogwatcher() {
  setInterval(function(){ 
    $.ajax({
      url: 'backend/dog_watcher.php', //This php script should actually be run as a daemon depending on the hosted platform
      type: 'POST',
      success: function (output) {
      },
      error : function(error) {
      },
      cache: false,
      contentType: false,
      processData: false
    }); 
  }, 3000);
}