$(document).ready(function (){
  checkLoginState();
  //Get the id that is located in the url
   var url = location.href;
   var itemID = url.substring(url.indexOf("=")+1);
  $.ajax({
    url: 'controller/ItemController.php',
    data: {
      action: 'getItemData',
      item: itemID
    },
    type: 'post',
    success: function(output) {
      console.log(output);
      json = JSON.parse(output);

      var container = $('#itemContainer');
      var src = 'storedImages/'+json.id+'/image';
      container.find('.imgInItem').attr('src', src);
      container.find('.itemName').html(json.name);
      container.find('.itemDate').html(json.date);
      container.find('.itemDescr').html(json.descr);
      container.find('.nameOwner').html(json.firstName +" "+ json.lastName);
    }
  });
});

function checkExistingThread(){
  var url = location.href;
  var itemID = url.substring(url.indexOf("=")+1);

  $.ajax({
    url: 'controller/ItemController.php',
    data: {
      action: 'checkExistingThread',
      item: itemID
    },
    type: 'post',
    success: function(output) {
      if(output == 'false'){
        // Toggles message modal so user can create a message
        $('#sendMessageModal').modal('toggle');
      }else{
        location.href = 'messages.php?id='+output;// This has to redirect to user page, set

      }
     }
  });

}

// Called when user clicks 'send' in the message modal
function newMsgThread(){
  var url = location.href;
  var itemID = url.substring(url.indexOf("=")+1);

  $.ajax({
    url: 'controller/ItemController.php',
    data: {
      action: 'newMsgThread',
      item: itemID,
      content: $('#msgContent').val()
    },
    type: 'post',
    success: function(output) {
      console.log(output);
      console.log(page);
      location.href = 'messages.php?id='+output;// This has to redirect to user page, set

    }
  });
}
