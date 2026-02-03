// Short Polling 

/*
setInterval(function() {
    let response = fetch("time.php")

    response.then((data) => {
        return data.text()
    }).then((text) => {
        document.body.prepend(text + '\n')
    })

}, 1000)

*/

// Long Polling

/*

function fetchFruit() {
    let response = fetch("time.php")

    response.then((data) => {
        return data.text()
    }).then((text) => {
        document.body.prepend(text + '\n')
        fetchFruit()
    })
}


fetchFruit()

*/


let fruitSSE = new EventSource("fruit_sse.php")

fruitSSE.onmessage = (event) => {
    document.body.prepend(event.data + '\n')
}