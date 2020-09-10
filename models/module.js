export function doCommodityCard(data) {
    $("#commodity-card").empty();
    let count = data.length;
    let rowCount = 0;
    let categoryID = 0;
    let categoryIDOneCount = 0;
    let categoryIDTwoCount = 0;
    if (count > 1) {

        for (let i = 0; i < count; i++) {
            if (data[i]['category'] == "2") {
                let idName = "commodity-card-"
                let nextIdx = i + 1;
                let commodityImg = "#commodity-img-" + i;
                let commodityBody = $("#commodity-body-" + i);
                let commodityDiv =
                    idName += i.toString();
                if (categoryIDOneCount > 0 && categoryIDOneCount % 5 == 0) {
                    $("#commodity-group-" + rowCount).after(`<div id="commodity-group-${++rowCount}" class="card-group "></div>`)
                    console.log("row", rowCount);
                }
                $("#commodity-group-" + rowCount).append(`
                <div id="commodity-card-${categoryIDOneCount}"class="card " data-title="${data[i]['name']} ${data[i]['description']}" value="${data[i]['commodityID']}" onclick="clickCard(this)">
                <img id ="commodity-img-${categoryIDOneCount}" class="card-img-top" src="..." alt="Card image cap">
                <div id ="commodity-body-${categoryIDOneCount}" class="card-body">
                <h5 class="card-title" value="">商品名稱</h5>
                <p class="card-text">商品描述</p>
                <div class="row">
                    <div class= "col-md-7"><p class="card-price-text">1</p></div>
                    <div class= "col-md-5"><p class="pull-right card-text"><small class="text-muted">已售出</small></p></div>
                </div>
                </div>
                </div>`)
                if (i < count - 1) {
                    // var addCard = $("#commodity-card-" + i).clone(true).attr("id", "commodity-card-" + nextIdx)
                    // $("#" + idName).after(addCard);
                    //console.log("doCommodityCard", count);
                }

                $("#commodity-img-" + categoryIDOneCount).attr("src", "data:image/jpeg;base64," + data[i]['img']);
                $("#commodity-body-" + categoryIDOneCount + " h5").text("產品名稱:" + data[i]['name']);
                $("#commodity-body-" + categoryIDOneCount + " h5").attr("value", data[i]['commodityID']);
                $("#commodity-body-" + categoryIDOneCount + " p:first").text("商品介紹:" + data[i]['description']);
                $("#commodity-body-" + categoryIDOneCount + " > div > div:nth-child(1) > p").text("$" + data[i]['price']);
                $("#commodity-body-" + categoryIDOneCount + " p").children(1).text("存貨" + data[i]['quantity']);
                categoryIDOneCount++;
            } else {
                console.log("docarousel");
                if (categoryIDTwoCount == 0) {
                    $("#carousel-indicators").append(`
                    <li data-slide-to="${categoryIDTwoCount}" data-target="#carousel-46838" class="active" >
                    </li>`);
                    $("#carousel-inner").append(`
                    <div class="carousel-item active"  value="${data[i]['commodityID']}"onclick="clickCard(this)">
                        <img class="d-block w-100 " alt="" src="data:image/jpeg;base64,${data[i]['img']}" />
                    <div class="carousel-caption">
                    <h4>商品名稱:${data[i]['name']}</h4><p>描述:${data[i]['description']}</p>
                    </div>                                </div>`);
                } else {
                    $("#carousel-indicators").append(`
                    <li data-slide-to="${categoryIDTwoCount}" data-target="#carousel-46838" >
                    </li>`);
                    $("#carousel-inner").append(` 
                    <div class="carousel-item" value="${data[i]['commodityID']}"onclick="clickCard(this)">
                        <img class="d-block w-100" alt="" src="data:image/jpeg;base64,${data[i]['img']}" />
                    <div class="carousel-caption">
                    <h4>產品名稱:${data[i]['name']}</h4><p>描述:${data[i]['description']}</p>
                    </div>
                    </div>`);
                }
                categoryIDTwoCount += 1;
            }



            //console.log($("#commodity-body-" + i + " p").children());
            //console.log("doCommodityCard", data[i]['commodityID']);
        }
    }

}
export function initCommodity() {

    $.ajax({
        url: '/PID_Assignment/core/upload.php',
        type: 'GET',
        dataType: "json",
        success: function(data) {
            //$("#showBox").attr("src", data.src);
            if (data.commodityData != undefined) {
                //document.getElementById("putForm").reset();
                //console.log(data.commodityData);
                doCommodityCard(data.commodityData);
            }
        },
        error: function(jqXHR) {
            console.log(jqXHR);
        }
    });
}
export function clickCard(obj) {
    console.log("clickCard", $(obj).attr("value"));
    let value = $(obj).attr("value");
    if (checkAdd()) {
        $.ajax({
            url: '/PID_Assignment/core/upload.php',
            type: 'POST',
            dataType: "json",
            data: {
                action: "addToShopCart",
                commodityID: value,
                quantity: 1
            },
            success: function(data) {
                //$("#showBox").attr("src", data.src);
                if (data.errorMsg != undefined) {
                    //showToast("Hint", data.errorMsg);
                    alert(data.errorMsg);
                    console.log(data.errorMsg);
                } else {
                    //showToast("Hint", data.successMsg);
                    alert(data.successMsg);
                }

            },
            error: function(jqXHR) {
                console.log(jqXHR);
            }
        });
    }
}

export function checkAdd() {
    let msg ="加入購物車？"
    if (confirm(msg) == true) {
        return true;
    } else {
        return false;
    }
}


export function aFunction(){
    console.log("tesssst");
}
