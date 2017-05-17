function triggerRoomWindow(id){
  swal({
    title: 'Change Lab Room',
    type: 'question',
    input: 'text',
    confirmButtonText: 'Submit',
    showCancelButton: true,
  }).then(function(text){
    $.ajax({
  url: '/php/update_room.php',
  type: 'get',
  data: { "room": text, "id": id},
  success: function(response) {
    swal({
      title: 'Success',
      type: 'success',
      timer: 800,
      showConfirmButton: false
  })
  }
});
  }, function(dismiss){
    if(dismiss === 'cancel'){
      noChange();
  }
  })
}
function noChange(){
  swal({
    title: 'Nothing changed',
    type: 'info',
    timer: 800,
    showConfirmButton: false
})
}
function triggerDescriptionWindow(id){
  swal({
    title: 'Change Lab Description',
    type: 'question',
    input: 'text',
    confirmButtonText: 'Submit',
    showCancelButton: true,
  }).then(function(text){
    $.ajax({
  url: '/php/update-description.php',
  type: 'get',
  data: { "description": text, "id": id},
  success: function(response) {
    swal({
      title: 'Success',
      type: 'success',
      timer: 800,
      showConfirmButton: false
  })
  }
});
  }, function(dismiss){
    if(dismiss === 'cancel'){
      noChange();
  }
  })
}
