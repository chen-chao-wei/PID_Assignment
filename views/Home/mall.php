<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/PID_Assignment/css/bootstrap.min.css" rel="stylesheet">
    <link href="/PID_Assignment/css/jquery.toast.css" rel="stylesheet">
    <link href="/PID_Assignment/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>mall</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="header" class="header col-md-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="header-link nav-link active" href="/PID_Assignment/home/mall">Home</a>
                    </li>
                    <li class="nav-item">
                        <form id="admin" method="post">
                            <input type="submit" class="btn btn-link" style="margin: 2%;" value="賣家中心" />
                            <!-- <a class="header-link nav-link" type="submit">賣家中心</a>     -->
                            <input type="hidden" name="admin" value="true" />
                        </form>
                    </li>

                    <li class="nav-item dropdown ml-md-auto">
                        <div class="row">
                            <!-- <form id="applyForAdmin" method="post" >
                            <input type="submit" class="btn btn-link" style="margin: 2%;" value="成為賣家" />                            
                            <input type="hidden" name="applyForAdmin" value="true" />                         
                            </form> -->
                            <a id="applyForAdmin" class="header-link nav-link " href="#"> 成為賣家</a>
                            <a class="header-link nav-link " href="#"> 幫助中心</a>
                            <form id="logout" method="post">

                                <input type="hidden" name="logout" value="true" />
                                <?php
                                if (!isset($_SESSION["userName"]) || ($_SESSION["userName"] == "")) {
                                    echo '<a class="header-link nav-link " href="/PID_Assignment/home/login" id="navbarMenuLink">登入 / 註冊</a>';
                                } else {
                                    echo '<input type="submit" class="pull-right btn btn-link" style="margin: 2%;" value="'.$_SESSION['userName'].'/登出" />';
                                }

                                ?>
                            </form>
                            <!-- <a class="nav-link">|</a>
                        <a class="nav-link " href="/PID_Assignment/home/login" id="navbarMenuLink" >登入</a> -->
                        </div>
                        <div class="col">

                        </div>
                        <div class="col">

                        </div>




                    </li>
                </ul>
                <nav class="navbar navbar-expand-lg navbar-light ">

                    <button style="color:white;border-color:white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="fa fa-bars"></span>
                    </button> <a class="" href="#"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> 調皮購物</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <form class="form-inline">
                            <input class="form-control mr-sm-8" type="text" />
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                Search
                            </button>
                            <a class="header-link" href="#">熱門</a>&nbsp;<a class="header-link" href="#">關鍵字</a>
                        </form>
                        <ul class="navbar-nav ml-md-auto">
                            <li class="nav-item active">
                                <form id="shopCart" method="post">
                                    <span class="fa fa-shopping-cart"></span>
                                    <input type="submit" class=" header-link btn btn-link" style="margin: 2%;" value="購物車" />
                                    <input type="hidden" name="shopCart" value="true" />
                                </form>
                                <!-- <h3><a class="fa fa-shopping-cart header-link " href="/PID_Assignment/home/shopCart"> 購物車 <span class="sr-only">(current)</span></a></h3> -->
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="Main-of-this-season" style="height:100px;background-color: whitesmoke;" class="progress">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;height:100px ;margin:.625rem;padding-top: 1.25rem;background-clip:content-box;">
                <h1>本季主打</h1>
            </div>
        </div>
        <div id="div-carousel" class="content row">
            <div class="carousel slide w-100" style="padding-bottom: 1%;margin:.625rem;" id="carousel-46838">
                <ol id="carousel-indicators" class="carousel-indicators">
                    <!-- <li data-slide-to="0" data-target="#carousel-46838" class="active">
                    </li>                     -->
                </ol>
                <div id="carousel-inner" class="carousel-inner">
                    <!-- <div class="carousel-item active">
                        <img class="img-fluid d-block w-100" alt="Carousel Bootstrap First" src="\PID_Assignment\imgs\goods\train\1.jpg" />
                        <div class="carousel-caption">
                            <h4>
                                名稱
                            </h4>
                            <p>
                                描述
                            </p>
                        </div>
                    </div> -->
                </div>
                <h1><a style="color: red;" class="carousel-control-prev" href="#carousel-46838" role="button" data-slide="prev">
                        <span class="fa fa-arrow-circle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a style="color: red;" class="carousel-control-next" href="#carousel-46838" role="button" data-slide="next">
                        <span class="fa fa-arrow-circle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a></h1>

            </div>
        </div>

        <div id="welcome-pakage" style="height:150px ;background-color: whitesmoke;" class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;height:150px ;margin:.625rem;padding-bottom: 1.25rem;background-clip:content-box;">
                <h1>我是廣告</h1>
            </div>
        </div>
        <div id="classic-train" style="height:100px; background-color: whitesmoke;" class="progress">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;height:100px ;margin:.625rem;background-clip:content-box;">
                <h1>經典火車</h1>
            </div>
        </div>
        <!-- <div id="limitedTimeSale" class="carousel slide" data-wrap="false" data-ride="carousel" id="carousel-demo" style="margin:2%;">
            <div id="carousel-header" class="row">
                <label>限時特賣</label>
            </div>
            <div id="carousel-body" class="row">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="\PID_Assignment\imgs\goods\1.jpg" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="\PID_Assignment\imgs\goods\2.jpg" alt="">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="\PID_Assignment\imgs\goods\6.jpg" alt="">
                    </div>

                    <a href="#carousel-demo" class="carousel-control-prev" data-slide="prev">
                        <span style="color:black;" class="fa fa-chevron-left"></span>
                    </a>
                    <a href="#carousel-demo" class="carousel-control-next" data-slide="next">
                        <span style="color:black;" class="fa fa-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div> -->
        <div id="commodity-group-0" class="card-group ">
        </div>

        <div class="row">
            <hr width="100%" style="color:brown ;background-color:brown">
        </div>
        <div id="mall-footer" class="row">
            <hr>
            <address>
                <strong>Twitter, Inc.</strong><br /> 795 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
        </div>
    </div>


    <!-- JavaScript -->
    <script src="/PID_Assignment/js/jquery.js"></script>
    <script src="/PID_Assignment/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/PID_Assignment/js/jquery.toast.js"></script>
    <script>
        $(document).ready(function() {

            k = $("#header").offset().top;
            window.onscroll = function() {

                s = $(document).scrollTop();
                var fh_header = $("#header").height();
                if (s > k) {
                    $("#header").css({
                        position: "fixed",
                        "z-index": 100
                    });
                } else {
                    $("#header").css({
                        position: "static",
                        "z-index": 1,
                        height: fh_header
                    });
                }
                // console.log(s, k);
            };


            function initCommodity() {

                $.ajax({
                    url: '/PID_Assignment/core/upload.php',
                    type: 'GET',
                    dataType: "json",
                    success: function(data) {
                        //$("#showBox").attr("src", data.src);
                        if (data.commodityData != undefined) {
                            //document.getElementById("putForm").reset();
                            console.log(data.commodityData);
                            doCommodityCard(data.commodityData);
                        }
                    },
                    error: function(jqXHR) {
                        console.log(jqXHR);
                    }
                });
            }

            function doCommodityCard(data) {
                $("#commodity-card").empty();
                count = data.length;
                rowCount = 0;
                categoryID = 0;
                categoryIDOneCount = 0;
                categoryIDTwoCount = 0;
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
                            <div id="commodity-card-${categoryIDOneCount}"class="card " value="${data[i]['commodityID']}" onclick="clickCard(this)">
                            <img id ="commodity-img-${categoryIDOneCount}" class="card-img-top" src="..." alt="Card image cap">
                            <div id ="commodity-body-${categoryIDOneCount}" class="card-body">
                            <h5 class="card-title" value="">商品名稱</h5>
                            <p class="card-text">商品描述</p>
                            <p class="card-text">1</p>
                            <p class="card-text"><small class="text-muted">已售出</small></p>
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
                            $("#commodity-body-" + categoryIDOneCount + " p:nth-child(3)").text("$" + data[i]['price']);
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
                                <h4>產品名稱:${data[i]['name']}</h4><p>${data[i]['description']}</p>
                                </div>                                </div>`);
                            } else {
                                $("#carousel-indicators").append(`
                                <li data-slide-to="${categoryIDTwoCount}" data-target="#carousel-46838" >
                                </li>`);
                                $("#carousel-inner").append(` 
                                <div class="carousel-item" value="${data[i]['commodityID']}"onclick="clickCard(this)">
                                    <img class="d-block w-100" alt="" src="data:image/jpeg;base64,${data[i]['img']}" />
                                <div class="carousel-caption">
                                <h4>產品名稱:${data[i]['name']}</h4><p>${data[i]['description']}</p>
                                </div>
                                </div>`);
                            }
                            categoryIDTwoCount += 1;
                        }



                        //console.log($("#commodity-body-" + i + " p").children());
                        console.log("doCommodityCard", data[i]['commodityID']);
                    }
                }

            }
            initCommodity();
            clickCard = function(obj) {
                console.log("clickCard", $(obj).attr("value"));

                value = $(obj).attr("value");
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
                                alert(data.errorMsg);
                                console.log(data.errorMsg);
                            } else {
                                alert(data.successMsg);
                            }

                        },
                        error: function(jqXHR) {
                            console.log(jqXHR);
                        }
                    });
                }
            }

            function checkAdd() {
                var msg = "放入購物車？"
                if (confirm(msg) == true) {
                    return true;
                } else {
                    return false;
                }
            }
            $("#applyForAdmin").on('click', function() {
                $.ajax({
                    url: '/PID_Assignment/core/upload.php',
                    type: 'POST',
                    dataType: "json",
                    data:{
                        action: "applyForAdmin"
                    },
                    success: function(data) {
                        //$("#showBox").attr("src", data.src);
                        if (data.msg != undefined) {
                            //document.getElementById("putForm").reset();
                            alert(data.msg);
                            //doCommodityCard(data.msg);
                        }else if(data.refresh){                            
                            top.location.href="/PID_Assignment/home/login";
                            alert(data.refresh);
                        }
                    },
                    error: function(jqXHR) {
                        console.log(jqXHR);
                    }
                });
                // $.post("/PID_Assignment/core/upload.php", {                    
                //         action: "applyForAdmin"
                //     })
                //     .done(function(data) {
                //         alert(data.msg);
                //     });
                console.log("applyForAdmin");
            })
        })
    </script>


</body>

</html>