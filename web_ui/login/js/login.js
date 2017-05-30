$(document).ready(function () {
    "use strict";
    $("#submit").click(function () {

        var username = $("#myusername").val(), password = $("#mypassword").val();

        if ((username === "") || (password === "")) {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a username and a password</div>");
        } else {
          console.log("ATTEMPT");
          console.log(username);
          console.log(password);
            $.ajax({
                type: "POST",
                url: "/login/checklogin.php",
                data: {"username": username, "password": password},
                success: function (data) {
                    if(data == "true"){
                      console.log("success");
                      window.location = "/today";
                    }else{
                      console.log("false");
                      triggerWrongLoginWindow();
                      $("#message").html("<p class='text-center'>You may try again</p>");
                    }
                    console.log(data);
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
                }
            });
        }
        return false;
    });
});
