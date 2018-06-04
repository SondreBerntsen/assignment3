$(document).ready(function (){

  $.ajax({ url: 'controller/uploadItemController.php',
           type: 'post',
           success: function(output) {
             json = JSON.parse(output);
             console.log(json);

              for(i=0; json.length > i; i++){

                var tmpl = $('#catTempl').clone();
                tmpl.removeAttr('id');
                tmpl.html(json[i].name);
                tmpl.attr('value', json[i].name);
                $('#selectCategory').append(tmpl);
              }
           }
  });


});
