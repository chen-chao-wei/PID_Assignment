<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/RD5_Assignment/css/bootstrap.min.css" rel="stylesheet">
    <link href="/RD5_Assignment/css/jquery.toast.css" rel="stylesheet">
    <link href="/RD5_Assignment/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>mall</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Messages</a>
                    </li>
                    <li class="nav-item dropdown ml-md-auto">
                        <div class="row">
                        <a class="nav-link " href="#"> 幫助中心</a>
                        <a class="nav-link " href="http://example.com" id="navbarMenuLink" >註冊</a>
                        <a class="nav-link">|</a>
                        <a class="nav-link " href="http://example.com" id="navbarMenuLink" >登入</a>
                        </div>
                        <div class="col">
                        
                        </div>
                        <div class="col">
                        
                        </div>
                        
                        
                        
                        
                    </li>
                </ul>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">調皮購物</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                       
                        <form class="form-inline">
                            <input class="form-control mr-sm-8" type="text" />
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                Search
                            </button>
                            <a href="#">熱門</a>&nbsp;<a href="#">關鍵字</a>
                        </form>
                        <ul class="navbar-nav ml-md-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">購物車 <span class="sr-only">(current)</span></a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
                <div class="carousel slide" style="padding-bottom: 1%;" id="carousel-46838">
                    <ol class="carousel-indicators">
                        <li data-slide-to="0" data-target="#carousel-46838">
                        </li>
                        <li data-slide-to="1" data-target="#carousel-46838" class="active">
                        </li>
                        <li data-slide-to="2" data-target="#carousel-46838">
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img class="img-fluid d-block w-100" alt="Carousel Bootstrap First" src="\PID_Assignment\imgs\goods\train\1.jpg" />
                            <div class="carousel-caption">
                                <h4>
                                    First Thumbnail label
                                </h4>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block w-100" alt="Carousel Bootstrap Second" src="\PID_Assignment\imgs\goods\train\2.jpg" />
                            <div class="carousel-caption">
                                <h4>
                                    Second Thumbnail label
                                </h4>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" alt="Carousel Bootstrap Third" src="\PID_Assignment\imgs\goods\train\3.jpg" />
                            <div class="carousel-caption">
                                <h4>
                                    Third Thumbnail label
                                </h4>
                                <p>
                                    Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                </p>
                            </div>
                        </div>
                    </div> <a class="carousel-control-prev" href="#carousel-46838" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-46838" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                </div>
            </div>
        </div>
        <div id="section-header" class="row" style="background-color:gray;margin:auto;padding-bottom: 1.25rem;background-clip:content-box;">
            <label>商品分類</label>
        </div>
        <div id="welcome-pakage" class="row" style="background-color:#925959;margin:auto;padding-bottom: 1.25rem;background-clip:content-box;">
            <label>廣告</label>
        </div>
        <div class="carousel slide" data-wrap="false" data-ride="carousel" id="carousel-demo" style="margin:2%;">
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

        </div>
        <div class="card-group ">
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">商品名稱</h5>
                    <p class="card-text">商品描述</p>
                    <p class="card-text"><small class="text-muted">已售出 ４</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">商品名稱</h5>
                    <p class="card-text">商品描述</p>
                    <p class="card-text"><small class="text-muted">已售出 ４</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">商品名稱</h5>
                    <p class="card-text">商品描述</p>
                    <p class="card-text"><small class="text-muted">已售出 ４</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">商品名稱</h5>
                    <p class="card-text">商品描述</p>
                    <p class="card-text"><small class="text-muted">已售出 ４</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">商品名稱</h5>
                    <p class="card-text">商品描述</p>
                    <p class="card-text"><small class="text-muted">已售出 ４</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">商品名稱</h5>
                    <p class="card-text">商品描述</p>
                    <p class="card-text"><small class="text-muted">已售出 ４</small></p>
                </div>
            </div>
            

        </div>
        <div id="seeMore" class="row" style="padding-top:1.25rem;padding-bottom:1.25rem;">
                <button>查看更多</button>
            </div>
        <div id="mall-footer" class="row">
            <hr>
            <address>
                <strong>Twitter, Inc.</strong><br /> 795 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
        </div>
    </div>


    <!-- JavaScript -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.toast.js"></script>
    <script>
        function log(obj) {
            console.log(obj)
        }
    </script>


</body>

</html>