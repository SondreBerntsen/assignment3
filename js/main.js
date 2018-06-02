
function testRonny(){
  $.ajax({ url: 'controller/HomeController.php',
           data: {action: 'testRonny'},
           type: 'post',
           success: function(output) {
           console.log(JSON.parse(output));
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
