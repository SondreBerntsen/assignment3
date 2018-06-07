$(document).ready(function (){
  checkLoginState();
  // Ajax call to getMyItems function. Lists conversation where user is the owner
  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'getMyItems'
    },
    type: 'post',
    success: function(output) {
      // Parses JSON output
      json = JSON.parse(output);
      // Clones and append a conversation template for each conversation the user where user is owner
      for(i=0; json.length > i; i++){
        var tmpl = $('#convTmpl').clone();
        tmpl.removeAttr('id');
        // Creates onclick function for the current conversation ID
        var onclick = 'pushURLMsg('+'"'+json[i].id+'")';
        tmpl.attr('onclick', onclick);
        tmpl.find('.msgTitle').html(json[i].name);
        tmpl.find('.msgParticipant').html(json[i].firstName+" "+ json[i].lastName);
        $('#mymessages').append(tmpl);
      }
    }
  });
  // Ajax call to getOther function. Lists conversation where user is not the owner
  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'getOther'
    },
    type: 'post',
    success: function(output) {
      // Parses JSON output
      json = JSON.parse(output);
      // Clones and append a conversation template for each conversation the user where user is not the owner
      for(i=0; json.length > i; i++){
        var tmpl = $('#convTmpl').clone();
        tmpl.removeAttr('id');
        // Creates onclick function for the current conversation ID
        var onclick = 'pushURLMsg('+'"'+json[i].id+'")';
        tmpl.attr('onclick', onclick);
        tmpl.find('.msgTitle').html(json[i].name);
        tmpl.find('.msgParticipant').html(json[i].firstName+" "+ json[i].lastName);
        $('#othermessages').append(tmpl);
      }
    }
  });
  // Loads messages if user is redirected to the page with a specific conversation ID, or if user has navigated back and forth between pages.
  getURLMsg();
  listMessages();
});

var threadID; // Value is changed by getURLMsg function
function listMessages(){
  // Ajax call with threadID to listMessages function
  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'listMessages',
      threadID: threadID
    },
    type: 'post',
    success: function(output) {
      // Parses JSON output
      json = JSON.parse(output);

      // Stores and deletes userID from JSON data
      user = json.user;
      delete json.user;

      // Empties current content
      $('.msgList').html('');
      // Clones and appends message template for each output element.
      for(i=0; i < Object.keys(json).length; i++){
        // If sender == userID, append a different card.
        if(json[i].sender == user){
          var tmpl = $('#myMsg').clone();
          tmpl.removeAttr('id');
        }else{
          var tmpl = $('#theirMsg').clone();
          tmpl.find('.senderName').html(json[i].firstName);
          tmpl.removeAttr('id');
        }
        tmpl.find('p').html(json[i].content);
        $('.msgList').append(tmpl);
      }
    }
  });
}

function newMessage(){
  threadID = threadID;
  // Checks if form value is empty
  if(!$('#messageContent').val()){
    console.log('no message data');
  }else{
    // Ajax call with message content and threadID to newMessage function.
    $.ajax({
      url: 'controller/msgController.php',
      data: {
        action: 'newMessage',
        message: $('#messageContent').val(),
        thread: threadID
      },
      type: 'post',
      success: function(output) {
        // Updates message list after new DB insertion.
        listMessages();
        // Deletes previous form value.
        $('#messageContent').val('');
      }
    });
  }
}
// Gets URL and current threadID, if any
function getURLMsg(){
  url = location.href;
  threadID = url.substring(url.indexOf("=")+1);
  if(threadID.includes('assignment3')){//FIx tror ikke jeg like dettee, meeeen det fonka fin ja
    threadID='none';
  }
  if(threadID != 'none'){
    // Lists messages if threadID != none
    listMessages(threadID);
  }
}
// Changes URL based on conversation clicks
function pushURLMsg(threadID){
  window.history.replaceState("Details", "Title", window.location.pathname+'?id='+threadID);
  getURLMsg();
}
