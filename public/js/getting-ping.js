//insert data
setInterval(() => {
    $.ajax({
        // type: "POST",
        url: "/add-data",
        // data: {},
        success: function (tekst) {
        },
        error: function (request, error) {
            console.log("ERROR:" + error);
        }
    });
}, 3000)


setInterval(() => {
    $.ajax({
        url: "/show-ping",
        success: function (result) {
            document.querySelectorAll(".my-ping h4").forEach(el => {
                colorise(el, result)
                el.innerHTML = result + "ms"
            })

            colorise(document.querySelector("#ping_dashboard"), result);
            document.querySelector("#ping_dashboard").innerHTML = result + "ms"


            colorise(document.querySelector(".item-ping span"), result);
            document.querySelector(".item-ping span").innerHTML = "(" + result + "ms " + ")"
        }
    })
}, 1000)
