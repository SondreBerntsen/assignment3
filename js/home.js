// Runs on page load
$(document).ready(function (){
  checkLoginState();
  // Ajax call to listCategories.
  $.ajax({
    url: 'controller/HomeController.php',
    data: {action: 'listCategories'},
    type: 'post',
    success: function(output) {
      // Parses JSON output, clones and appends list items for each category
      json = JSON.parse(output);
      for(i=0; json.length > i; i++){
        var tmpl = $('#categoryTmpl').clone();
        tmpl.removeAttr('id');
        tmpl.find('li').html(json[i].name);
        // creates pushURL() onclick with parameter based on category name
        var onclick = 'pushURL('+'"'+json[i].name+'")';
        tmpl.attr('onclick', onclick);
        $('#listOfCategories').append(tmpl);
      }
    }
  });
  // Calls function needed to load the rest of the page
  getURL();
  listItems();
});
// getURL function changes this variable
var cat;
// Lists items based on category. If category is unset, loads last 5 entries.
function listItems(){
  // Ajax call to listItems with category value
  $.ajax({
    url: 'controller/HomeController.php',
    data: {
      action: 'listItems',
      category: cat
    },
    type: 'post',
    success: function(output) {
    // Parses JSON output, clones and appends item cards for each item
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
// Gets URL query value of current page
function getURL(){
  url = location.href;
  cat = url.substring(url.indexOf("=")+1); // Changes cat global var
  if(cat.includes('assignment3')){
    cat='none'; // Changes cat clobal var
  }
}
// Changes URL based on category clicks
function pushURL(category){
  $('#listOfItems').html('');
  window.history.replaceState("Details", "Title", window.location.pathname+'?id='+category);
  // Runs getURL and listItems for the new category value
  getURL();
  listItems();
}
