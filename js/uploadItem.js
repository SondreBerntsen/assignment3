// runs when document is ready
$(document).ready(function (){
  // function that checks your log in state
  checkLoginState();
  // jquery ajax call for listing categories
  $.ajax({
    // links to listcategories in uploadItemController
    url: 'controller/uploadItemController.php',
    data: {action: 'listCategories'},
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      // iterating over the response from ajax
      for(i=0; i < json.length; i++){
        // template for getting the list of categories into a dropdown option selecttion
        var tmpl = $('#catTempl').clone();
        tmpl.removeAttr('id');
        tmpl.html(json[i].name);
        tmpl.attr('value', json[i].name);
        $('#selectCategory').append(tmpl);
      }
    }
  });
});
// function for uploading new item
function submitItem (){
  // getting the variables we need
  var name = itemName.value;
  var preview = itemPreview.value;
  var descr = itemDescr.value;
  var category = selectCategory.value;
  // we want this to redirect us to the method when we get to the url
  var action = "uploadItemWithImg";
  // nothing happens if the input fields beside image is set
  if($('#itemName').val()==""||$('#itemPreview').val()==""||$('#itemDescr').val()==""){
    $(".alertMsg").css("display", "block");
  }
  else{
    // if image is not set ..
    if( document.getElementById("uploadimg").files.length == 0 ){
      $.ajax( {
        // ..send the info from the rest of the form to uploadItem method in uploadItemController
        url: 'controller/uploadItemController.php',
        data: {action: 'uploadItem',name:name, preview:preview, descr: descr, category:category},
        type: 'post',
        success: function(data, output){
          console.log(data);
          location.href = 'item.php?id='+data;
        }
      });
    }
    else {
      // to send the file data along with the variables, we send it in a FormData
      //https://stackoverflow.com/questions/5392344/sending-multipart-formdata-with-jquery-ajax
      var data = new FormData();
      jQuery.each(jQuery('#uploadimg')[0].files, function(i, file) {
        // we append our variables to the FormData
        data.append('imgfile', file);
        data.append('name', name);
        data.append('preview', preview);
        data.append('descr', descr);
        data.append('category', category);
        data.append('action', action);
      });

      $.ajax( {
        // sending the data to the method uploadItemWithImg in uploadItemController
        url: 'controller/uploadItemController.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data, output){
          console.log(data);
          json = output;
          console.log(data);
          console.log(json);
          // redirects the user to the uploaded item after uploading it
          location.href = 'item.php?id='+data;
        }
      });
    }
  }
}
