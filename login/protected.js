let enroll = document.querySelectorAll(".enroll")

enroll.forEach(function(el) {
    
    el.addEventListener("click", function(e) {
        
        // This code is run when any of the buttons are clicked

        console.log(e.target.dataset.course)

        let request = {
            course: e.target.dataset.course
        }

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, enroll!"
            }).then((result) => {
            if (result.isConfirmed) {
                
                fetch("enroll.php", {
                    method: "POST",
                    body: JSON.stringify(request),
                })
                
                Swal.fire({
                title: "Enrolled!",
                text: "You have been enrolled in the course.",
                icon: "success"
                });
                
            }
        });

        
    })

})