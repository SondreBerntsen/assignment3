
$(document).ready(function (){
  $.ajax({ url: 'controller/HomeController.php',
           data: {action: 'listCategories'},
           type: 'post',
           success: function(output) {
             console.log(output);
             json = JSON.parse(output);
             console.log(json);
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
  checkLoginState();
});

var cat;
function listItems(){
  var cateroony = cat;

  $.ajax({
    url: 'controller/HomeController.php',
    data: {
      action: 'listItems',
      category: cateroony
    },
    type: 'post',
    success: function(output) {
    json = JSON.parse(output);
    console.log(json);
             /*
             array = output.split('|');
             console.log(array.length);
             json = JSON.parse(array[0]);
             console.log(array[0]);
             img = 'data:image/jpeg;base64, ' + array[2];

             var tmpl = $('#itemCardTempl').clone();
             tmpl.removeAttr('id');
             tmpl.find('#pleaseWork').attr('src', img);
             tmpl.attr("href", "item.php?id="+json.id);
             tmpl.find('.card-title').html(json.name);
             tmpl.find('.dateItem').html(json.date);
             tmpl.find('.card-text').html(json.previewtxt);

             $('#listOfItems').append(tmpl);
             */
     for(i=0; json.length > i; i++){

       var tmpl = $('#itemCardTempl').clone();
       tmpl.removeAttr('id');
       //tmpl.find('img').attr('src', img);
       tmpl.attr("href", "item.php?id="+json[i].id);
       tmpl.find('.card-title').html(json[i].name);
       tmpl.find('.dateItem').html(json[i].date);
       tmpl.find('.card-text').html(json[i].previewtxt);

       $('#listOfItems').append(tmpl);
     }

    }
  });
}


function getURL(){
  url = location.href;
  console.log(url);
  cat = url.substring(url.indexOf("=")+1);
  if(cat.includes('assignment3')){//FIx tror ikke jeg like dettee, meeeen det fonka fin ja
    cat='none';
  }
}

function pushURL(category){
  $('#listOfItems').html('');
  window.history.replaceState("Details", "Title", window.location.pathname+'?id='+category);
  getURL();
  listItems();

}
