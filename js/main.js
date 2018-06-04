function checkLoginState(page){

  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'checkLoginState'},
           type: 'post',
           success: function(output) {
             json = JSON.parse(output);

             for(i=0; json.length > i; i++){

               var tmpl = $('#categoryTmpl').clone();
               tmpl.removeAttr('id');
               tmpl.find('li').html(json[i].name);

               var onclick = 'pushURL('+'"'+json[i].name+'")'; // FY FAEN I SVARTE HELVETE
               tmpl.attr('onclick', onclick);
               $('#listOfCategories').append(tmpl);
             }
           }
  });

}
