let form = document.getElementById("form")

form.addEventListener("submit", async function(e) {
    e.preventDefault()

    let name1 = document.getElementById("name1").value 
    let name2 = document.getElementById("name2").value 


    let toEncode = {
        "name1": name1,
        "name2": name2
    }


    let response = await fetch("battle.php", {
        method:"POST",
        body: JSON.stringify(toEncode)
    })

    let data = await response.json()

    let blue = document.getElementById("blue")
    let red = document.getElementById("red")

    blue.style.width = data.name1.percent > 15 ? data.name1.percent + "%" : 15 + "%"
    red.style.width = data.name2.percent > 15 ? data.name2.percent + "%" : 15 + "%"

    document.querySelectorAll(".celebrate").forEach(element => {
        element.style.visibility = "hidden"
    });
    if (data.name1.percent > data.name2.percent) {
        blue.getElementsByClassName("celebrate")[0].style.visibility = "visible"
    } else {
        red.getElementsByClassName("celebrate")[0].style.visibility = "visible"
    }

    blue.getElementsByTagName("h2")[0].innerText = data.name1.name
    red.getElementsByTagName("h2")[0].innerText = data.name2.name

    blue.getElementsByTagName("h3")[0].innerText = data.name1.percent + "%"
    red.getElementsByTagName("h3")[0].innerText = data.name2.percent + "%"

})