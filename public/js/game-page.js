setInterval(() => {
    $.ajax({
        url: "/show-ping",
        success: function(result) {
            document.querySelector(".user-ping h6").innerHTML = result + 'ms'
            colorise(document.querySelector(".user-ping h6"), result)
        }
    })
}, 1000)


//show operator ping
setInterval(() => {
    $.ajax({
        url: '/get-ping-operators',
        success: function(result) {
            let data = JSON.parse(result)

            document.querySelector("#tci-game").innerHTML = data.TCI + "ms"
            document.querySelector("#irancell-game").innerHTML = data.iranCell + "ms"
            document.querySelector("#mcci-game").innerHTML = data.MCCI + "ms"
            document.querySelector("#rightel-game").innerHTML = data.RighTel + "ms"

            colorise(document.querySelector("#tci-game"), data.TCI)
            colorise(document.querySelector("#irancell-game"), data.iranCell)
            colorise(document.querySelector("#mcci-game"), data.MCCI)
            colorise(document.querySelector("#rightel-game"), data.RighTel)
        }
    })
}, 1000)