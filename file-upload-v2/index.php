<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form id="loginForm">

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" minlength="" required>

    <button type="submit">Login</button>
</form>


<script>

let form = document.getElementById("loginForm")

form.addEventListener("submit", async function(e) {

    e.preventDefault()
    
    let response = await fetch("loginScript.php", {
        method: "POST",
        body: new FormData(form)
    })

    let statusCode = await response.status

    console.log(statusCode)

    switch (statusCode) {
        case 200:
            location.href = "admin.php";
            break;
        case 401:
            alert("OOPS I DID IT AGAIN")
            break;
    }
})



</script>
    
</body>
</html>