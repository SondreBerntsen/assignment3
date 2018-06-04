$(document).ready(function (){
  $.ajax({ url: 'controller/ItemController.php',
           data: {item: '2'},
           type: 'post',
           success: function(output) {
             json = JSON.parse(output);
             console.log(json);

               var tmpl = $('#tmplItem').clone();
               tmpl.removeAttr('id');
               tmpl.find('.itemName').html(json.name);
               tmpl.find('.itemDate').html(json.date);
               tmpl.find('.itemDescr').html(json.descr);
               tmpl.find('.nameOwner').html(json.firstName +" "+ json.lastName);

               $('#itemContainer').append(tmpl);

           }
  });


});