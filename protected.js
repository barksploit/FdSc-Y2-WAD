let enroll = document.querySelectorAll(".enroll")

enroll.forEach(function(el) {
    
    el.addEventListener("click", function(e) {
        
        // This code is run when any of the buttons are clicked

        console.log(e.target.dataset.course)

        let request = {
            course: e.target.dataset.course
        }

        // fetch("login.php", {
        //     method: "POST",
        //     body: JSON.stringify(request)

        // }).then(function(response) {
        //     response.json().then(function(data) {
        //         switch (data.status) {
        //             case "success":
        //                 // login attempt successful
        //                 window.location.href = "dashboard.php";
        //                 break;
        //             case "error":

        //                 Swal.fire({
        //                     icon: "error",
        //                     title: "Oops...",
        //                     text: data.message,
        //                 });

        //                 break;
        //         }
        //     })
        // })

    })

})