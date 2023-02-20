// var today = new Date();
// var dd = String(today.getDate()).padStart(2, '0');
// var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
// var yyyy = today.getFullYear();

// today = mm + '/' + dd + '/' + yyyy;



// var day = [today];
// var data = [];

// $.ajax({
//   url: '/getting-every-chart-data',
//   success: function(result){
//     let datas = JSON.parse(result);
//     datas.forEach(_data => {
//       data.push(parseInt(_data.ping))
//     });
//   }
// })

// console.log(data);


function colorise(el, ping){
  if(ping <= 120){
    el.style.color= '#41b367'
  }else if(ping > 120 && ping < 200){
    el.style.color= '#f4a51f'    
  }else if(ping >= 200){
    el.style.color= '#f55a60'
  }
}

//show operator ping
setInterval(() => {
  $.ajax({
    url: '/get-ping-operators',
    success: function (result) {
      let data = JSON.parse(result)
      let iranCell_field = document.querySelectorAll("#irancell");
      console.log("iranCell_field");
      let MCI_field = document.querySelectorAll("#mcci");
      let TCI_field = document.querySelectorAll("#tci");
      let righTel_field = document.querySelectorAll("#rightel");


      iranCell_field.forEach(el => {
        colorise(el, data.iranCell)
        el.innerHTML = data.iranCell + "ms"
      })

      MCI_field.forEach(el => {
        colorise(el, data.MCCI)
        el.innerHTML = data.MCCI + "ms"
      })

      TCI_field.forEach(el => {
        colorise(el, data.TCI)
        el.innerHTML = data.TCI + "ms"
      })

      righTel_field.forEach(el => {
        colorise(el, data.RighTel)
        el.innerHTML = data.RighTel + "ms"
      })
    }
  })
}, 1000)

function zoomButton(val) {
  Line_Chart.zoom(val)
}

function resetZoom(){
  Line_Chart.resetZoom()
}

function addData(chart, label, data) {
  label.forEach(lab => {
    chart.data.labels.push(lab);
  })

  data.forEach(da => {
    chart.data.datasets.forEach((dataset) => {
      dataset.data.push(da);
    });
  })
  chart.update();
}


function removeData(chart) {
  chart.data.labels.pop();
  chart.data.datasets.forEach((dataset) => {
      dataset.data.pop();
  });
  chart.update();
}


let back = document.querySelector("#back");



let item_users =document.querySelectorAll(".item-list");
let boxes_more = document.querySelectorAll(".more-box");

item_users.forEach(user => {
    user.addEventListener("click", () => {
        boxes_more.forEach(box => {
            if(box.getAttribute('box-id') == user.getAttribute("user-id")){
                box.style.display="block"
                back.style.display="block";
                
                back.addEventListener("click", () => {
                    box.style.display="none"
                    back.style.display="none"
                })
            }
        })
    })
})




//show-menu-mobild
let btn_show = document.querySelector("#menu-mobile");
let sidebar = document.querySelector(".sidebar")
btn_show.addEventListener("click", () => {
    sidebar.style.right="0"

    back.style="display: block; background-color: rgba(0, 0, 0, 0.3)"
    back.addEventListener("click", () => {
        sidebar.style.right="-350px"
        back.style="display: none; background-color: transparent"
    })
})