function testRonny(){
  $("#loadDivRonny").load('controller/HomeController.php'); //The full path of the Award.php file in the web root
   $.post(
      'classes/Award.php'
    ).success(function(resp) {
       json = $.parseJSON(resp);
   });
}

/*
$.ajax({ url: '/controller/HomeController',
         data: {action: 'test'},
         type: 'post',
         success: function(output) {
                      alert(output);
                  }
});
*/
