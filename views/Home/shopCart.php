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
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.toast.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/PID_Assignment/home/admin">賣家中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PID_Assignment/home/mall">回購物中心</a>
                    </li>
                    <li class="nav-item dropdown ml-md-auto">
                        <div class="row">
                            <a class="nav-link " href="#"> 幫助中心</a>
                            <a class="nav-link " href="/PID_Assignment/home/login" id="navbarMenuLink">登入 / 註冊</a>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div id="listDiv">

                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <script>
            $(document).ready(function() {

                checkShopCart = function(id) {
                    console.log("checkDetail" + id);

                    $.ajax({
                        type: "POST",
                        url: "/PID_Assignment/core/Upload.php",
                        dataType: "json",
                        data: {
                            userID: 2,
                            action: "checkShopCart"
                        },
                        success: function(data) {
                            if (data.shopCartList) {
                                console.log(data.shopCartList);
                                //doDetailTable($("#tr-member" + id), data.detail);
                                //doMemberTable(data.detail);
                                showList(data.shopCartList);
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
                checkShopCart(2);
                
            })



            function showList(list) {
                console.log(list);
                $("#listDiv").empty();
                $("#listDiv").append(`
                        <div id="listDivRow0" class="row" style="margin:1%">
                            <div id="list-header" class="col-md-5 ">
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
                    userID = list[i]['userID'];
                    datatime = list[i]['datatime'];
                    price = list[i]['amount'];
                    quantity = 1;
                    sellerID = list[i]['sellerID'];
                    //src = "data:image/jpeg;base64," + (list['src'][i]); // <img>中src屬性除了接url外也可以直接接Base64字串
                    let idName = "listDivRow"
                    idx = i;
                    nextIdx = i + 1;
                    idName += (idx.toString());
                    if (i < count - 1) {
                        var addDiv = $("#listDivRow" + idx).clone(true).attr("id", "listDivRow" + nextIdx)
                        $("#" + idName).after(addDiv);
                    }
                    //$('#' + idName + ' #list-header img').attr("src", src);
                    $('#' + idName + ' #list-body-info').append(`
                    <label>商品編號:</label><span class="userID">${userID}</span><br>
                    <label>商品名稱:</label><span class="datatime">${datatime}</span><br>
                    <label>價格:</label><span class="price">${price}</span><br>
                    <label>數量:</label><span class="quantity">${quantity}</span><br>
                    <label>售出:</label><span class="sellerID">${sellerID}</span>`);
                    $('#' + idName + ' #list-footer').append(`
                    <button onclick="insertForm(${idName})" value="${idName}">編輯</button>`)

                }
            }
        </script>
</body>

</html>