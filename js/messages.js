$(document).ready(function (){
  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'getmsgThreadData'
    },
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      for(i=0; json.length > i; i++){
      var tmpl = $('#msgTmpl').clone();
      tmpl.removeAttr('id');
      tmpl.attr('href', 'messages.php?id='+json[i].id);
      tmpl.find('.msgTitle').html(json[i].name);
      tmpl.find('.msgParticipant').html(json[i].firstName+" "+ json[i].lastName);

      $('#mymessages').append(tmpl);
    }
    }
  });

  $.ajax({
    url: 'controller/msgController.php',
    data: {
      action: 'getMsgThreadDataOther'
    },
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      for(i=0; json.length > i; i++){
      var tmpl = $('#msgTmpl').clone();
      tmpl.removeAttr('id');
      tmpl.attr('href', 'messages.php?id='+json[i].id);
      tmpl.find('.msgTitle').html(json[i].name);
      tmpl.find('.msgParticipant').html(json[i].firstName+" "+ json[i].lastName);

      $('#othermessages').append(tmpl);
    }
    }
  });




});