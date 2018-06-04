
$(document).ready(function (){
  $.ajax({ url: 'controller/HomeController.php',
           data: {action: 'listCategories'},
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
  getURL();
  listItems();
});
var cat;
function listItems(){
  var cateroony = cat;
  $.ajax({ url: 'controller/HomeController.php',
           data: {action: 'listItems', category: cateroony},
           type: 'post',
           success: function(output) {
             json = JSON.parse(output);

             for(i=0; json.length > i; i++){

               var tmpl = $('#itemCardTempl').clone();
               tmpl.removeAttr('id');
               tmpl.attr("href", "item.php?id="+json[i].id);
               tmpl.find('.card-title').html(json[i].name);
               tmpl.find('.dateItem').html(json[i].date);
               tmpl.find('.card-text').html(json[i].descr);

               $('#listOfItems').append(tmpl);
             }

           }
  });
}
function getURL(){
  url = location.href;
  cat = url.substring(url.indexOf("=")+1);
}
function pushURL(category){
  $('#listOfItems').html('');
  window.history.replaceState("Details", "Title", window.location.pathname+'?id='+category);
  getURL();
  listItems();

}
