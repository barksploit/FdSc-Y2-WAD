<?php


session_start();


if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form id="avatar">

    <label>Profile Picture</label>

    <img src="https://placehold.co/400x400">

    <label>Upload Profile Picture:</label>

    <input type="file" id="file" name="file">

    <button type="submit">Set Profile Picture</button>

</form>

<script>

    let avatarForm = document.getElementById("avatar")

    avatarForm.addEventListener("submit", async function(e) {

        e.preventDefault()

        let response = await fetch("fileUpload.php", {
            method: "POST",
            body: new FormData(avatarForm),
        })

        let statusCode = response.status

        switch (statusCode) {
            case 200: 
                //Fetch and display new profile Picture

                


                break;
            case 400:
                // Upload failed
        }
    })


</script>


    
</body>
</html>