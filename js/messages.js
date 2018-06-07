$(document).ready(function (){
  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'getMyItems'
    },
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      for(i=0; json.length > i; i++){
        var tmpl = $('#convTmpl').clone();
        tmpl.removeAttr('id');

        var onclick = 'pushURLMsg('+'"'+json[i].id+'")';
        tmpl.attr('onclick', onclick);
        tmpl.find('.msgTitle').html(json[i].name);
        tmpl.find('.msgParticipant').html(json[i].firstName+" "+ json[i].lastName);

        $('#mymessages').append(tmpl);
      }
    }
  });

  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'getOther'
    },
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      for(i=0; json.length > i; i++){
        var tmpl = $('#convTmpl').clone();
        tmpl.removeAttr('id');

        var onclick = 'pushURLMsg('+'"'+json[i].id+'")';
        tmpl.attr('onclick', onclick);
        tmpl.find('.msgTitle').html(json[i].name);
        tmpl.find('.msgParticipant').html(json[i].firstName+" "+ json[i].lastName);

        $('#othermessages').append(tmpl);
      }
    }
  });
  getURL();
  checkLoginState();
});


var threadID;
function listMessages(){

  var threaderoony = threadID;
  console.log(threaderoony);
  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'listMessages',
      threadID: threaderoony
    },
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      user = json.user;
      delete json.user;
      console.log(json);
      console.log(Object.keys(json).length);

      $('.msgList').html(''); //Empties current content
      for(i=0; i < Object.keys(json).length-1; i++){
        console.log(user);
        console.log(json[i].sender);
        if(json[i].sender == user){
          console.log('appended own msg');
          var tmpl = $('#myMsg').clone();
          tmpl.removeAttr('id');
        }else{
          console.log('appended their msg');
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

function getURL(){
  url = location.href;
  threadID = url.substring(url.indexOf("=")+1);
  if(threadID.includes('assignment3')){//FIx tror ikke jeg like dettee, meeeen det fonka fin ja
    threadID='none';
  }
  if(threadID != 'none'){
    listMessages(threadID);
  }
}


function pushURLMsg(threadID){
  window.history.replaceState("Details", "Title", window.location.pathname+'?id='+threadID);
  getURL();
  //listMessages();
}
