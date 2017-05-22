
function triggerRoomWindow(id){
  swal({
    title: 'Change Lab Room',
    type: 'question',
    input: 'number',
    confirmButtonText: 'Submit',
    showCancelButton: true,
  }).then(function(number){
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
    inputPlaceholder: 'Emulsion Lab',
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

function triggerIdentityWindow(id){
  console.log("triggered");
  $.ajax({
    url: '/php/update-id-state.php',
    type: 'get',
    data: { "id_state": 0},
    success: function(response) {}
  });
  swal({
    title: 'Associate New IA',
    type: 'question',
    input: 'email',
    inputPlaceholder: 'john_doe17@milton.edu',
    confirmButtonText: 'Submit',
    showCancelButton: true,
  }).then(function(email){
    $.ajax({
      url: '/php/add-new-id.php',
      type: 'get',
      data: { "id": id, "email": email},
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
      $.ajax({
        url: '/php/update-id-state.php',
        type: 'get',
        data: { "id_state": 0},
        success: function(response) {}
      });
      noChange();
  }
  })
}
function triggerAddViolationsWindow(id){
  swal({
    title: 'Violations',
    type: 'question',
    input: 'text',
    confirmButtonText: 'Submit',
    showCancelButton: true,
  }).then(function(text){
    $.ajax({
      url: '/php/add-new-id.php',
      type: 'get',
      data: { "id": id, "email": text},
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
