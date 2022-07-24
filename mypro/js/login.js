// checkbox
function check() {
    var show = document.getElementById("password");
    if (show.type == "password") {
        show.type = "text";
    } else {
        show.type = "password";
    }
}

// Validation start

$(document).ready(function() {

    $.validator.setDefaults({
        submitHandler: function() {

        }
    });

    $("#signin-form").validate({

        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3,
                maxlength: 10
            }
        },
        messages: {
            email: {
                required: "Email is must!",
                email: "Enter valid email!"
            },
            password: {
                required: "Password is must!",
                minlength: "Minimum length is 3",
                maxlength: "Maximum length is 10"
            }
        }
    });

    // Ajax start

    $("#signin").click(function() {

        const email = $("#email").val();
        const password = $("#password").val();

        if (email == '' || password == '') {
            alert("Please fill all the fields!");
        } else {

            $.ajax({
                url: "./php/login.php",
                type: "post",
                data: $("#signin-form").serialize(),
                dataType: "JSON",
                success: function(d) {
                    if (d.status == 'success') {
                        window.location = "home.html";
                    } else if (d.status == 'emailError') {
                        $("#emailError").html("Given Email is not found!");
                        $("#emailError").css("color", "red");
                    } else {
                        $("#passError").html("Incorrect Password!");
                        $("#passError").css("color", "red");
                    }
                    // $("#signin-form")[0].reset();
                }

            });

        }

    });
});