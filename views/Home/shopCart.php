<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/PID_Assignment/css/bootstrap.min.css" rel="stylesheet">
    <link href="/PID_Assignment/css/jquery.toast.css" rel="stylesheet">
    <link href="/PID_Assignment/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>shopCart</title>
    <script src="/PID_Assignment/js/jquery.js"></script>
    <script src="/PID_Assignment/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/PID_Assignment/js/jquery.toast.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="otherHeader col-md-12">
                <ul class=" nav">
                    <li class="nav-item">
                        <a class="header-link nav-link" href="mall.php?admin=">賣家中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="header-link nav-link" href="/PID_Assignment/home/mall">回購物中心</a>
                    </li>

                    <li class="nav-item dropdown ml-md-auto">
                        <div class="row">
                            <a class="header-link nav-link fa fa-question-circle d-flex align-items-center" href="#"> 幫助中心</a>
                            <a class="header-link nav-link" href="mall.php?logout="><?=$_SESSION['userName']?> / 登出 </a>
                        </div>
                        
                    </li>
                </ul>
            </div>
        </div>
        <div class="body row">
            <div class="col-md-2">
                <div class="col">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">我的購物車</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">歷史紀錄</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div id="listDiv">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div id="userOrder" class="row">


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2">
            </div>

        </div>
        <script>
            $(document).ready(function() {
                //確認購物車清單
                checkShopCart = function() {
                    $.ajax({
                        type: "POST",
                        url: "/PID_Assignment/core/Upload.php",
                        dataType: "json",
                        data: {
                            action: "checkShopCart"
                        },
                        success: function(data) {
                            if (data.shopCartList) {
                                console.log(data.shopCartList);
                                //doDetailTable($("#tr-member" + id), data.detail);
                                //doMemberTable(data.detail);
                                showList(data.shopCartList);
                            } else {
                                $("#listDiv").empty();
                                $("#listDiv").append(`<h1>查無商品</>`);
                                console.log(data.errorMsg);
                            }
                            //$("#tr-member"+id).after("<tr id='detail'></tr>")             
                        },
                        error: function(jqXHR) {
                            console.log(jqXHR);
                        }
                    })
                }
                checkShopCart();

                //展示購物車清單
                function showList(list) {
                    console.log(list);
                    $("#listDiv").empty();
                    $("#listDiv").append(`                        
                        <div id="listDivRow0" class="shadow-sm p-3 mb-5 bg-white rounded row" style="margin:1%">                        
                            <div id="list-check" class="col-md-2 ">
                            
                            </div>
                        <div id="list-header" class="col-md-3 ">
                            <img class="img-fluid" src="">
                        </div>
                        <div id="list-body" class="col-md-5">
                            <div id="list-body-info" >

                            </div>
                        </div>
                            <div id="list-footer" class="col-md-2">
                                
                            </div>
                        </div>`)
                    count = list.length;
                    for (let i = 0; i < count; i++) {
                        commodityID = list[i]['commodityID'];
                        name = list[i]['name'];
                        price = list[i]['price'];
                        quantity = 1;
                        sellerID = list[i]['sellerID'];
                        src = "data:image/jpeg;base64," + (list[i]['img']); // <img>中src屬性除了接url外也可以直接接Base64字串
                        let idName = "listDivRow"
                        idx = i;
                        nextIdx = i + 1;
                        idName += (idx.toString());
                        if (i < count - 1) {
                            var addDiv = $("#listDivRow" + idx).clone(true).attr("id", "listDivRow" + nextIdx)
                            $("#" + idName).after(addDiv);
                        }
                        $('#' + idName + ' #list-header img').attr("src", src);
                        $('#' + idName + ' #list-check').append(`
                    <input name="checkBuy" type="checkbox" value ="${commodityID}" style="width:30%;height:30%;margin-left:2.25rem;margin-top:2.25rem;"class="form-check-input">                            
                    <label class="form-check-label"style="margin-left:2.55rem" for="checkbox">
                    選取                            
                    </label>
                    `);
                        $('#' + idName + ' #list-body-info').append(`
                    <label>賣家編號:</label><span class="userID">${sellerID}</span><br>
                    <label>商品名稱:</label><span class="datatime">${name}</span><br>
                    <label>價格:</label><span id="price${commodityID}" value ="${price}" class="price">${price}</span><br>
                    <label>數量:&nbsp;</label><button id="minus" name = "${commodityID}"value="${quantity}"onclick="minus(this)">-</button><input class="w-25" name="${commodityID}"id="inputQuantity${commodityID}" type="text" value="${quantity}" onkeydown="" onkeyup="changePrice(this),value=value.replace(/[^\\d]/g,'')"><button id="plus" name = "${commodityID}"value="${quantity}"onclick="plus(this)">+</button><br>
                    <label>售出:</label><span class="sellerID">${sellerID}</span>`);
                        $('#' + idName + ' #list-footer').append(`
                    <button onclick="delShopCart(this)" value="${commodityID}">刪除</button>`)
                        if (i == count - 1) {
                            $('#' + idName + ' #list-body-info').append(`<br><button onclick="buy(this)">直接購買</button`);
                        }
                    }
                }


                plus = function(obj) {                   
                    let $inputQuantity = obj.name;
                    let value = $("#inputQuantity" + obj.name).val();
                    $("#inputQuantity" + obj.name).val(++value);
                    price = $("#price" + obj.name).attr("value");
                    $("#price" + obj.name).text(price * value);
                    console.log("plus",value,$(obj.name));
                    
                }
                minus = function(obj) {
                    
                    let $inputQuantity = obj.name;
                    let value = $("#inputQuantity" + obj.name).val();
                    if(value>0){
                        $("#inputQuantity" + obj.name).val(--value);
                    }                    
                    price = $("#price" + obj.name).attr("value");
                    $("#price" + obj.name).text(price * value);
                    //console.log("plus",value,$(obj.name));
                }
                changePrice = function(obj){
                    price = $("#price" + obj.name).attr("value");
                    $("#price" + obj.name).text(price * obj.value);
                    console.log(obj.value);
                }
                buy = function(obj) {
                    var chk_value = []; //定義一個陣列
                    var chk_quantity = [];
                    $('input[name="checkBuy"]:checked').each(function() { //遍歷每一個名字為checkBuy的核取方塊，其中選中的執行函式  
                        chk_value.push($(this).val()); //將選中的值新增到陣列chk_value中  
                        chk_quantity.push($("#inputQuantity" + chk_value[chk_value.length - 1]).val());
                        console.log(chk_quantity);
                    });
                    console.log(chk_value);
                    if (chk_value.length > 0) {
                        $.ajax({
                            type: "POST",
                            url: "/PID_Assignment/core/Upload.php",
                            dataType: "json",
                            data: {
                                quantity: chk_quantity,
                                commodityID: chk_value,
                                action: "buy"
                            },
                            success: function(data) {
                                if (data.successMsg) {
                                    console.log(data.successMsg);
                                    alert(data.successMsg);
                                    checkShopCart();
                                    checkDetail();
                                } else {
                                    alert(data.errorMsg);
                                    checkShopCart();
                                    console.log(data.errorMsg);
                                }
                                //$("#tr-member"+id).after("<tr id='detail'></tr>")             
                            },
                            error: function(jqXHR) {
                                console.log(jqXHR);
                            }
                        })
                    }

                }
                delShopCart = function(obj) {
                    $.ajax({
                        type: "POST",
                        url: "/PID_Assignment/core/Upload.php",
                        dataType: "json",
                        data: {
                            commodityID: obj.value,
                            action: "delShopCart"
                        },
                        success: function(data) {
                            if (data.successMsg) {
                                console.log(data.successMsg);
                                alert(data.successMsg);
                                checkShopCart();
                            } else {
                                alert(data.errorMsg);
                                checkShopCart();
                                console.log(data.errorMsg);
                            }
                            //$("#tr-member"+id).after("<tr id='detail'></tr>")             
                        },
                        error: function(jqXHR) {
                            console.log(jqXHR);
                        }
                    })
                }
                checkDetail = function() {
                    console.log("checkDetail");

                    $.ajax({
                        type: "POST",
                        url: "/PID_Assignment/core/upload.php",
                        dataType: "json",
                        data: {
                            action: "getOrder"
                        },
                        success: function(data) {
                            if (data.detail) {
                                console.log(data.detail);
                                doDetailTable(data.detail);
                                //doMemberTable(data.detail);

                            } else {
                                alert(data.errorMsg);
                                console.log(data.errorMsg);
                            }
                            //$("#tr-member"+id).after("<tr id='detail'></tr>")             
                        },
                        error: function(jqXHR) {
                            console.log(jqXHR);
                        }
                    })
                }
                //查看用戶訂單
                function doDetailTable(data) {

                    console.log(data);
                    $("#userOrder").empty();
                    let rowElements = [];
                    rowElements.push(
                        $("<table id='tab-detail'></table>")
                        .addClass("table ")
                        .append($('<thead></thead>').append(`<tr><th scope="col">訂單編號</th><th scope="col">
                    時間</th><th scope="col">品項</th><th scope="col">單價</th><th scope="col">數量</th><th scope="col">金額</th>
                    <th scope="col">狀態</th><th scope="col">賣家</th></tr>`))
                    );
                    $("#userOrder").append(rowElements);
                    let nowOrderID = 0;
                    let total = 0;
                    console.log(data.length);
                    count = data.length - 1;
                    $.each(data, function(key, value) {
                        total += value['amount'];
                        nowOrderID = value['orderID'];

                        var tableElements = $(`<tr id='detail'><td>${value['orderID']}</td>
                     <td>${value['datatime']}</td><td>${value['name']}</td><td>${value['price']}</td><td>${value['quantity']}</td>
                     <td>${value['amount']}</td><td>未出貨</td><td>${value['sellerID']}</td></tr>`);
                        tableElements.appendTo("#tab-detail");
                        if (key != count) {
                            if (nowOrderID != data[key + 1]['orderID']) {
                                let tableTotal = $(`<tr><td>總計</td><td></td><td></td><td></td><td></td><td>${total}</td><td></td><td></td></tr>`);
                                tableTotal.appendTo("#tab-detail");
                                total = 0;
                            }
                        } else {
                            let tableTotal = $(`<tr class="tableTotal"><td>總計</td><td></td><td></td><td></td><td></td><td>${total}</td><td></td><td></td></tr>`);
                            tableTotal.appendTo("#tab-detail");
                        }

                    })
                }
                checkDetail();

            })
        </script>
</body>

</html>