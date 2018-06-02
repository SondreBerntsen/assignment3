var json;
function testRonny(){
  console.log('thingIsClicked');
  $.ajax({ url: 'controller/HomeController',
           data: {action: 'testRonny'},
           type: 'post',
           success: function(output) {
             json = $.parseJSON(output);
             console.log(json);
           }
  });

}

/*
$("#loadDivRonny").load('controller/HomeController.php'); //The full path of the Award.php file in the web root
 $.post(
    'classes/Award.php'
  ).success(function(resp) {
     json = $.parseJSON(resp);
 });
*/
