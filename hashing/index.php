<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>


    form {
        display: flex;
        flex-direction: column;
        width: 200px;
        margin: auto;
        margin-top: 100px;
    }

    h1 {
        font-size: 150px;
        text-align: center;
        margin-top: 50px;
        font-family: Arial, sans-serif;
        color: #333;
        word-break: break-all;
    }


    </style>
</head>
<body>

    <form>
        <input id="string" type="text">
        <button type="button" id="button">Hash</button>
    </form>

    <h1 id="hash"></h1>


    <script>

        // $("button").click(function() {
        //     alert("HELLO")
        // })


        // Get element with ID button and add click event listener
        document.getElementById("button").addEventListener("click", function() {


        // document.getElementById("string").value
        // INCLUDE THIS IN THE REQUEST BODY
            let result = fetch("hash.php", {
                method: "POST",
                headers: {
                "Content-Type": "application/x-www-form-urlencoded",},
                body: "string=" + encodeURIComponent(document.getElementById("string").value)
            })

            result.then(function(response) {
                response.text().then(function(text) {
                    document.getElementById("hash").innerText = text
                })

            })





        })


  


    </script>
    
</body>
</html>