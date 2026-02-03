let signinbutton = document.getElementById("signin")
let emailinput = document.getElementById("floatingInput")
let passwordinput = document.getElementById("floatingPassword")
let form = document.getElementById("loginform")

form.addEventListener("submit", function(event) {
    event.preventDefault()


    let request = {
        email: emailinput.value,
        password: passwordinput.value,
    }

    fetch("login.php", {
        method: "POST",
        body: JSON.stringify(request)

    }).then(function(response) {
        response.json().then(function(data) {
            switch (data.status) {
                case "success":
                    // login attempt successful
                    window.location.href = "dashboard.php";
                    break;
                case "error":

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: data.message,
                    });

                    break;
            }
        })
    })


})