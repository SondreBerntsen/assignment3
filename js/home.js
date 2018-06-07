
$(document).ready(function (){
  $.ajax({
    url: 'controller/HomeController.php',
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

        var onclick = 'pushURL('+'"'+json[i].name+'")';
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

     for(i=0; json.length > i; i++){

       var tmpl = $('#itemCardTempl').clone();
       tmpl.removeAttr('id');
       var src = 'storedImages/'+json[i].id+'/image'
       tmpl.find('img').attr('src', src);
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
