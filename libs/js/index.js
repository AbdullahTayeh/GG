$(document).ready(function () {
    
    
    ////Check if logged in
    // $.ajax({    
    //     type: "POST",
    //     url: "./libs/php/login.php",
        
    //     data: {
    //         uname: loginUsername,
    //         password: loginPassword,
  
    //     },
    //     dataType: "json",
    //     async: false,
    //     success: function (result) {
    //      alert("logged in");

    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {
            
    //         console.log(errorThrown);

    //     }

    // });



});


// $('#login').on('submit', function (e) {
//     e.preventDefault();
//     e.stopPropagation();


//     $.ajax({    
//         type: "POST",
//         url: "./libs/php/login.php",
        
//         data: {
//             uname: loginUsername,
//             password: loginPassword,
  
//         },
//         dataType: "json",
//         async: false,
//         success: function (result) {
//          alert("logged in");

//         },
//         error: function(jqXHR, textStatus, errorThrown) {
            
//             console.log(errorThrown);

//         }

//     });











// });


///Show and hide Login and register page on click 
$("#linkCreateAccount").on("click", function () {
    $('#createAccount').show();
    $('#login').hide();
    $('#linkCreateAccount').hide();
});


$("#linkLogin").on("click", function () {
    $('#login').show();
    $('#createAccount').hide();
    $('#linkCreateAccount').show();
});

/////Adding person to database


$('#createAccount').on('submit', function (e) {
    e.preventDefault();
    e.stopPropagation();


    let signupUsername = document.getElementById('signupUsername').value;
    let signupEmail = document.getElementById('signupEmail').value;
    let signupPw = document.getElementById('signupPw').value;



    $.ajax({
        type: "POST",
        url: "./libs/php/insertProfile.php",

        data: {
            signupUsername: signupUsername,
            signupEmail: signupEmail,
            signupPw: signupPw,

        },
        dataType: "json",
        async: false,
        success: function (result) {
             
            console.log(result);
            $('#login').show();
            $('#createAccount').hide();
            $('#linkCreateAccount').show();


        },
        error: function (jqXHR, textStatus, errorThrown) {


            console.log(errorThrown);

        }

    });

})