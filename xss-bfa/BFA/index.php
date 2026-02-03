<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BFA</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <h1><a href="../">◀</a> Brute Force Attacks</h1>

    <form action="force.php" method="POST">
        <input type="text" name="txtInput" placeholder="Password to Guess" value="test" />
        <button type="submit">Brute Force</button>
    </form>

    <img id="loading" style="display: none;" src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="Loading GIF">

    <div id="output"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>

        //Detects when the form is submitted.
        $('form').submit(function(e) {
            e.preventDefault();

            //Calls the backend asynchronously.
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),

                //Shows a loading GIF while waiting for a response.
                beforeSend: function()
                {
                    $('#loading').show();
                },

                //Displays the output and hides the loading GIF when the server is complete.
                success: function(res)
                {
                    $('#loading').hide();
                    $('#output').html(res);
                }
            });
        });

    </script>
</body>

</html>