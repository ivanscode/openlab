function stateDown(){
  $.ajax({
    url: '/php/update-state.php',
    type: 'get',
    data: { "state": 0},
    success: function(data) {}});
}
function launchAll(){
  var checkInput = false;
  var auto_refresh = setInterval(
    function (){
      if(checkInput==false){
        $('#info').load('index.php #info>table').fadeIn("slow");
      }
    }, 1000); // refresh every 10000 milliseconds

    //Update the state of the PI to the page
    var auto_state = setInterval(
      function (){
        $.ajax({
          url: '/php/update-state.php',
          type: 'get',
          data: { "state": 2},
          success: function(data) {
            if(data=='1'){
              document.getElementById('status_img').src='/img/on.png';
            }else{
              document.getElementById('status_img').src='/img/off.png';
            }
          }});

      }, 1000); // refresh every 10000 milliseconds

    //Force-check if the PI is still running
    var auto_change = setInterval(
        function (){
          stateDown();
        }, 20000);

    //Monitor for incoming new IDs
    var auto_id = setInterval(
      function(){
        $.ajax({
          url: '/php/update-id-state.php',
          type: 'get',
          data: { "id_state": 2},
          success: function(data) {
            if(data=='1'){
              $.ajax({
                url: '/php/update-id-state.php',
                type: 'get',
                data: { "id_state": 3},
                success: function(data) {
                  console.log(data);
                  triggerIdentityWindow(data);
                }});
            }else{
              //Do nothing
            }
          }});
        }, 3000);
}
