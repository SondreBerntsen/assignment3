function newMsgTHread(){
  var itemID = url.substring(url.indexOf("=")+1);

  $.ajax({
    url: 'controller/ItemController.php',
    data: {
      action: 'newMsgThread',
      item: itemID
    },
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      console.log(json);
     }
  });

}
