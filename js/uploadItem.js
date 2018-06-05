function submitItem (){
  var name = itemName.value;
  var preview = itemPreview.value;
  var descr = itemDescr.value;
  var category = selectCategory.value;


  if( document.getElementById("uploadimg").files.length == 0 ){
    alert("imgfile is empty");


    $.ajax( {
      url: 'controller/uploadItemController.php',
      data: {name:name, preview:preview, descr: descr, category:category},
      type: 'post',
      success: function(data, output){
        console.log(data, output);
        json = output, data;
        console.log(json);
      }
    });
} else {

  var data = new FormData();
  jQuery.each(jQuery('#uploadimg')[0].files, function(i, file) {
    data.append('imgfile', file);
    data.append('name', name);
    data.append('preview', preview);
    data.append('descr', descr);
    data.append('category', category);
  });

  $.ajax( {
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
      console.log(json);
    }
  });


}
  //https://stackoverflow.com/questions/5392344/sending-multipart-formdata-with-jquery-ajax


 /*$.ajax( {

    url: 'controller/uploadItemController.php',
    data: {imgfile: imgfile, name: name, descr: descr, preview: preview,fname: fname, fsize: fsize, ftype: ftype},
    type: 'post',
    success: function(output) {
      json = output;
      console.log(json);*/





  /*  }

  });*/
}

$(document).ready(function (){

  $.ajax( {
    url: 'controller/getCategoriesController.php',
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);
      //console.log(json);

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
