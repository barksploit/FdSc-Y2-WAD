let enroll = document.querySelectorAll(".enroll")

enroll.forEach(function(el) {
    
    el.addEventListener("click", function(e) {
        
        // This code is run when any of the buttons are clicked

        console.log(e.target.dataset.course)

        let request = {
            course: e.target.dataset.course
        }

        fetch("enroll.php", {
            method: "POST",
            body: JSON.stringify(request),
        })
        
    })

})