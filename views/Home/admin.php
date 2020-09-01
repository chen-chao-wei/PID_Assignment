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
                        <a class="nav-link active" href="#">賣家中心</a>
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
                            <a class="nav-link " href="http://example.com" id="navbarMenuLink">註冊</a>
                            <a class="nav-link">|</a>
                            <a class="nav-link " href="http://example.com" id="navbarMenuLink">登入</a>
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
                <div class="col">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">會員管理</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">我的商品</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


                                <form id="putForm" enctype="multipart/form-data" method="post" action="/PID_Assignment/core/Upload.php" onsubmit="return false">
                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">商品名稱</label>
                                        <div class="col-8">
                                            <input id="name" name="name" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-4 col-form-label">類別</label>
                                        <div class="col-8">
                                            <select id="category" name="category" class="custom-select" aria-describedby="categoryHelpBlock" required="required">
                                                <option value="1">本季主打</option>
                                                <option value="2">經典火車</option>
                                            </select>
                                            <span id="categoryHelpBlock" class="form-text text-muted">請選擇分類</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quantity" class="col-4 col-form-label">數量</label>
                                        <div class="col-8">
                                            <input id="quantity" name="quantity" placeholder="1" type="text" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-4 col-form-label">價格</label>
                                        <div class="col-8">
                                            <input id="price" name="price" placeholder="$" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-4 col-form-label">商品描述</label>
                                        <div class="col-8">
                                            <textarea id="description" name="description" cols="40" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 col-form-label" for="Shipping">運費</label>
                                        <div class="col-8">
                                            <input id="Shipping" name="Shipping" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Example file input</label>
                                        <div id="previewDiv"></div>
                                        <div class="offset-4 col-8">
                                            <input id="uploadImage" type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button id="uploadButton" type="submit" class="btn btn-primary" value="">確定上架</button>
                                            <button id="cancelButton" type="button" class="btn btn-primary" value="">取消</button>
                                        </div>
                                    </div>
                                </form>
                                <button id="showButton" type="button" class="btn btn-primary" value="">已上架商品</button>
                                <div id="listDiv">
                                  
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3"></div>
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
        $("#uploadButton").click(function() {
            var files = new FormData();
            //let formData = getFormData($("#putForm"));
            let input = $("#uploadImage")[0].files[0];
            let name = $("#name").val();
            let category = $("#category").val();
            let quantity = $("#quantity").val();
            let price = $("#price").val();
            let description = $("#description").val();
            files.append('userID', "1");
            files.append('name', name);
            files.append('category', category);
            files.append('quantity', quantity);
            files.append('price', price);
            files.append('description', description);
            files.append('image', input);
            //files.append('formData', formData); 
            console.log(name);
            $.ajax({
                url: '/PID_Assignment/core/upload.php',
                data: files,
                dataType: "json",
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    log(data.sql);
                    log("uploadButton");
                    //$("#putForm").empty();
                },
                error: function(jqXHR) {
                    log(jqXHR);
                }
            });
        })
        $("#showButton").click(function() {
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
            $.ajax({
                url: '/PID_Assignment/core/upload.php',
                type: 'POST',
                dataType: "json",
                data: {
                    userID: "1",
                    action:"showList"
                },
                success: function(data) {
                    //$("#showBox").attr("src", data.src);
                    if (data.name != "") {
                        document.getElementById("putForm").reset();
                        showList(data);
                    }

                    log("display success" + data.name);
                },
                error: function(jqXHR) {
                    log(jqXHR);
                }
            });
        })
        $("#uploadImage").change(function() {
            $("#previewDiv").empty() // 清空當下預覽
            previewFiles(this.files) // this即為<input>元素
        })

        function getFormData($form) {
            var unindexed_array = $form.serializeArray();
            var indexed_array = {};
            $.map(unindexed_array, function(n, i) {
                indexed_array[n['name']] = n['value'];
            });
            return indexed_array;
        }

        function showImage(fileName, src) {
            let image = new Image(250); // 設定寬250px
            image.name = fileName;
            image.src = src; // <img>中src屬性除了接url外也可以直接接Base64字串
            $("#previewDiv").append(image).append(`<p>File: ${image.name}`);
        }

        function showList(list) {
            console.log(list['name'][4]);
            for (let i = 0; i < list['name'].length; i++) {
                name        = list['name'][i];
                category    = list['category'][i];
                price       = list['price'][i];
                quantity    = list['quantity'][i];
                commodityID = list['commodityID'][i];
                src = "data:image/jpeg;base64," + (list['src'][i]); // <img>中src屬性除了接url外也可以直接接Base64字串

                //$("#list-header img").attr("src",src);
                // $("#list-body-info").append(`${name}`);
                // $("#list-body-category").append(`${category}`);
                // $("#list-body-price").append(`${price}`);

                let idName = "listDivRow"
                idx = i;
                nextIdx = i + 1;
                idName += (idx.toString());
                if (i < list['name'].length - 1) {
                    var addDiv = $("#listDivRow" + idx).clone(true).attr("id", "listDivRow" + nextIdx)
                    $("#" + idName).after(addDiv);
                }

                // idName+=(idx.toString());
                $('#' + idName + ' #list-header img').attr("src", src);
                $('#' + idName + ' #list-body-info').append(`
                    <label>商品編號:</label><span class="commodityID">${commodityID}</span><br>
                    <label>商品名稱:</label><span class="name">${name}</span><br>
                    <label>價格:</label><span class="price">${price}</span><br>
                    <label>數量:</label><span class="quantity">${quantity}</span><br>
                    <label>售出:</label><span class="quantitySold">0</span>`);
                $('#' + idName + ' #list-footer').append(`
                    <a onclick="edit(${idName})" value="${idName}">編輯</a>`)

            }
        }
        function edit(idName){
            $.ajax({
                url: '/PID_Assignment/core/upload.php',
                type: 'POST',
                dataType: "json",
                data: {
                    userID: "1",
                    commodityID:$(idName).children(0).children(1).children(1)[1].innerText,
                    action : "edit"
                },
                success: function(data) {
                    //$("#showBox").attr("src", data.src);
                    if (data.name != "") {
                        document.getElementById("putForm").reset();
                        $("#name").val(data.name);
                        $("#category").val(data.category);
                        $("#quantity").val(data.quantity);
                        $("#price").val(data.price);
                        $("#description").val(data.description);
                        
                        showImage(data.name, "data:image/jpeg;base64,"+data.src)
                    }

                    log("display success" + data.name);
                },
                error: function(jqXHR) {
                    log(jqXHR);
                }
            });
            // console.log(typeof idName);
            // console.log($(idName).children(0).children(1).children(1)[1].innerText);
            // console.log($(idName).children(0).children(1).children(1)[4].innerText);
            // console.log($(idName).children(0).children(1).children(1)[7].innerText);
            // console.log($(idName).children(0).children(1).children(1)[10].innerText);
            // console.log($(idName).children(0).children(1).children(1)[13].innerText);
            // let input = $("#uploadImage")[0].files[0];
            //$("#name").val($(idName).children(0).children(1).children(1)[4].innerText);
            // let category = $("#category").val();
            // let quantity = $("#quantity").val();
            // let price = $("#price").val();
            // let description = $("#description").val();
            
        }

        function previewFiles(files) {
            if (files && files.length >= 1) {
                $.map(files, file => {
                    convertFile(file)
                        .then(data => {
                            //console.log(data) // 把編碼後的字串輸出到console
                            showImage(file.name, data)
                            //return data;                  
                        })
                        .catch(err => console.log(err))
                })
            }
        }

        function convertFile(file) {
            return new Promise((resolve, reject) => {
                // 建立FileReader物件
                let reader = new FileReader()
                // 註冊onload事件，取得result則resolve (會是一個Base64字串)
                reader.onload = () => {
                    resolve(reader.result)
                }
                // 註冊onerror事件，若發生error則reject
                reader.onerror = () => {
                    reject(reader.error)
                }
                // 讀取檔案
                reader.readAsDataURL(file)
            })
        }
    </script>


</body>

</html>