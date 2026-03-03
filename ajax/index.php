<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div id="number">1</div>

<button onclick="addOne()">Plus One</button>

<button onclick="makeSyncRequest()">Make Request</button>


<script>

function addOne() {
    let banana = document.getElementById('number')

    banana.innerText = banana.innerText+1
}
function makeSyncRequest() {


let request = fetch(`users.php?page=${currentPage}`)
document.getElementById("spinner").style.display = "block";
request.then(function(response) {
    response.json().then(users => {
        document.getElementById("spinner").style.display = "none";
    })
})


}

async function makeAsyncRequest() {
    let request = await fetch("wait.php")

    let text = await request.text();

    console.log(text)
}
makeAsyncRequest()


</script>


    
</body>
</html>