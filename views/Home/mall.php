<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/PID_Assignment/css/bootstrap.min.css" rel="stylesheet">
    <link href="/PID_Assignment/css/jquery.toast.css" rel="stylesheet">
    <link href="/PID_Assignment/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/PID_Assignment/css/alert.css">     -->


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
                        <a class="header-link nav-link" href="mall.php?admin=">賣家中心</a>
                    </li>

                    <li class="nav-item dropdown ml-md-auto">
                        <div class="row">
                            <!-- <form id="applyForAdmin" method="post" >
                            <input type="submit" class="btn btn-link" style="margin: 2%;" value="成為賣家" />                            
                            <input type="hidden" name="applyForAdmin" value="true" />                         
                            </form> -->
                            <a id="applyForAdmin" class="header-link nav-link " href="#"> 成為賣家</a>
                            <a class="header-link nav-link fa fa-question-circle d-flex align-items-center" href="#"> 幫助中心</a>
                            <?php
                            if (!isset($_SESSION["userName"]) || ($_SESSION["userName"] == "")) {
                                echo '<a class="header-link nav-link " href="/PID_Assignment/home/login" id="navbarMenuLink">登入 / 註冊</a>';
                            } else {
                                echo '<a class="header-link nav-link" href="mall.php?logout=">' . $_SESSION['userName'] . ' / 登出 </a>';
                            }
                            ?>

                        </div>

                    </li>
                </ul>
                <nav class="navbar navbar-expand-lg navbar-light ">

                    <button style="color:white;border-color:white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="fa fa-bars"></span>
                    </button> <a class="" href="#"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> 調皮購物</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <form class="form-inline">
                            <input id="search" class="form-control mr-sm-8" type="text" />
                            <button style="background-color: #1491fd; border-style: solid; border-color: #fff;" class="btn  my-2 my-sm-0" type="submit">
                                Search
                            </button>
                            <a class="header-link" href="#">熱門</a>&nbsp;<a class="header-link" href="#">關鍵字</a>
                        </form>
                        <ul class="navbar-nav ml-md-auto">
                            <li class="nav-item active">

                                <h3><a class="fa fa-shopping-cart header-link " href="mall.php?shopCart="> 購物車 <span class="sr-only">(current)</span></a></h3>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="container" class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div id="Main-of-this-season" class="d-flex align-items-center justify-content-center" style="margin:.625rem;height:100px ;background-color:rgb(236 95 45);color: #fff;">
                    <h1>本季主打</h1>
                </div>
                <div id="div-carousel" class="content row">
                    <div class="carousel slide w-100 shadow-sm" data-interval="3000" data-ride="carousel" style="padding-bottom: 1%;margin:.625rem;" id="carousel-46838">
                        <ol id="carousel-indicators" class="carousel-indicators">

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
                <div id="classic-train" class="d-flex align-items-center justify-content-center" style="margin:.625rem;height:100px ;background-color:rgb(255 128 76);color: #fff;">
                    <h1>經典火車</h1>
                </div>

                <div id=commodity-content>
                    <div id="commodity-group-0" class="card-group ">
                    </div>
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
            <div class="col-md-2">
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="color:rgb(255, 187, 0);background-color:rgb(238, 78, 46);" role="document">
            <div class="modal-content" style="border:none;color:rgb(255, 187, 0);background-color:rgb(238, 78, 46);">
                <div class="">
                    <button type="button" class="pull-right close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex justify-content-center">
                    <h1 style="color:white"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> 調皮購物</h1>

                </div>
                <div class="modal-header d-flex justify-content-center" style="border:none;">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">2020商城最低價日</h5>

                </div>
                <div class="modal-body d-flex justify-content-center font-weight-bold" style="border:none;">
                    全館原價起..
                </div>
                <div class="modal-footer d-flex justify-content-center" style="border:none;">
                    <button type="button" style="color:rgb(254, 99, 51);background-color:#fff;" class="btn font-weight-bold" data-dismiss="modal">逛逛去</button>

                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="/PID_Assignment/js/jquery.js"></script>
    <script src="/PID_Assignment/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/PID_Assignment/js/jquery.toast.js"></script>
    <style class="mall-search-style"></style>
    <script src="/PID_Assignment/js/alert.js"></script>
    <script>
        window.alert = function(name) {
            var iframe = document.createElement("IFRAME");
            iframe.style.display = "none";
            iframe.setAttribute("src", 'data:text/plain,');
            document.documentElement.appendChild(iframe);
            window.frames[0].window.alert(name);
            iframe.parentNode.removeChild(iframe);
        }

        var wConfirm = window.confirm;
        window.confirm = function(message) {
            try {
                var iframe = document.createElement("IFRAME");
                iframe.style.display = "none";
                iframe.setAttribute("src", 'data:text/plain,');
                document.documentElement.appendChild(iframe);
                var alertFrame = window.frames[0];
                var iwindow = alertFrame.window;
                if (iwindow == undefined) {
                    iwindow = alertFrame.contentWindow;
                }
                var result = iwindow.confirm(message);
                iframe.parentNode.removeChild(iframe);
                return result;
            } catch (exc) {
                return wConfirm(message);
            }
        }

        function showToast(heading, message) {
            $.toast({
                text: message, // Text that is to be shown in the toast
                heading: heading, // Optional heading to be shown on the toast
                icon: 'warning', // Type of toast icon
                showHideTransition: 'fade', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left', // Text alignment i.e. left, right or center
                loader: true, // Whether to show loader or not. True by default
                loaderBg: '#9ec600', // Background color of the toast loader
                beforeShow: function() {}, // will be triggered before the toast is shown
                afterShown: function() {}, // will be triggered after the toat has been shown
                beforeHide: function() {}, // will be triggered before the toast gets hidden
                afterHidden: function() {} // will be triggered after the toast has been hidden
            });
        }

        $(document).ready(function() {

            $("#exampleModalCenter").modal({
                show: true
            });
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
                        height: "107px" //fh_header
                    });
                }
                // console.log(s, k);
            };

            $("#search").on('change paste keyup', function() {
                var value = $(this).val().toLowerCase();

                if (!value) {
                    $('.mall-search-style').html('');
                } else {
                    console.log(value);
                    $('.mall-search-style').html(
                        '#commodity-content .card-group > div:not([data-title*="' + value + '"]) {display: none;}'
                    );
                }


            });

            function initCommodity() {

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

            function checkAdd() {
                let msg ="加入購物車？"
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
                    data: {
                        action: "applyForAdmin"
                    },
                    success: function(data) {
                        //$("#showBox").attr("src", data.src);
                        if (data.msg != undefined) {
                            //document.getElementById("putForm").reset();
                            alert(data.msg);
                            //doCommodityCard(data.msg);
                        } else if (data.refresh) {
                            top.location.href = "/PID_Assignment/home/login";
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