<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/PID_Assignment/css/bootstrap.min.css" rel="stylesheet">
    <link href="/PID_Assignment/css/jquery.toast.css" rel="stylesheet">
    <link href="/PID_Assignment/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>admin</title>
    <script src="/PID_Assignment/js/jquery.js"></script>
    <script src="/PID_Assignment/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/PID_Assignment/js/jquery.toast.js"></script>
    <script src="https://d3js.org/d3.v4.js"></script>
    <script src="https://d3js.org/d3-interpolate.v1.min.js"></script>
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav">
                    <li class="nav-item">
                        <form id="admin" method="post">
                            <input type="submit" class="btn btn-link" style="margin: 2%;" value="賣家中心" />
                            <!-- <a class="header-link nav-link" type="submit">賣家中心</a>     -->
                            <input type="hidden" name="admin" value="true" />
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/PID_Assignment/home/mall">回購物中心</a>
                    </li>
                    <li class="nav-item dropdown ml-md-auto">
                        <div class="row">
                            <a class="nav-link " href="#"> 幫助中心</a>
                            <form id="logout" method="post">
                                <input type="hidden" name="logout" value="true" />
                                <input type="submit" class="pull-right btn btn-link" style="margin: 2%;" value="<?= $_SESSION['userName'] ?>/登出" />
                            </form>
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
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <form>
                                    <div id="usersManagement" class="row">


                                    </div>
                                    <div id="formFooter">
                                        <button id="managementButton" type="button" onclick="management()">確認操作</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                                <!-- autocomplete='off' -->
                                <form id="putForm" enctype="multipart/form-data" method="post" action="/PID_Assignment/core/Upload.php" onsubmit="return false">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">商品名稱</label>
                                        <div class="col-10">
                                            <input id="name" name="name" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-2 col-form-label">類別</label>
                                        <div class="col-10">
                                            <select id="category" name="category" class="custom-select" aria-describedby="categoryHelpBlock" required="required">
                                                <option value="1">本季主打</option>
                                                <option value="2">經典火車</option>
                                            </select>
                                            <span id="categoryHelpBlock" class="form-text text-muted">請選擇分類</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quantity" class="col-2 col-form-label">數量</label>
                                        <div class="col-10">
                                            <input id="quantity" name="quantity" placeholder="1" type="text" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-2 col-form-label">價格</label>
                                        <div class="col-10">
                                            <input id="price" name="price" placeholder="$" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-2 col-form-label">商品描述</label>
                                        <div class="col-10">
                                            <textarea id="description" name="description" cols="40" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="Shipping">運費</label>
                                        <div class="col-10">
                                            <input id="Shipping" name="Shipping" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">預覽商品圖片</label>
                                        <div id="previewDiv"></div>
                                        <div class="offset-4 col-10">
                                            <input id="uploadImage" type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-10">
                                            <button id="uploadButton" type="button" class="btn btn-primary" onclick="upload()">確定上架</button>
                                            <button id="cancelButton" type="button" class="btn btn-primary" onclick="cancel()">取消</button>
                                        </div>
                                    </div>
                                </form>
                                <button id="showButton" type="button" class="btn btn-primary" value="">已上架商品</button>

                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                        </div>
                        <div id="my_dataviz"></div>
                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div id="listDiv">

                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript -->

    <script>
        $('#v-pills-home-tab').on('click', function(e) {
            e.preventDefault()
            getMemberInfo();
            $("#listDiv").empty();
            cancel();
        })
        $('#v-pills-profile-tab').on('click', function(e) {
            e.preventDefault()
            $('usersManagement').empty();

        })

        $(document).ready(function() {

            getMemberInfo = function() {
                $("#usersManagement").empty();
                $("#managementButton").text("確認操作");
                document.getElementById('managementButton').onclick = function() {
                    management();
                }
                $.ajax({
                    type: "GET",
                    url: "/PID_Assignment/core/Management.php",
                    dataType: "json",
                    success: function(data) {
                        if (data.users) {
                            doMemberTable(data.users);
                            //console.log(data.users);
                            //console.log(data.users[1]['account']);
                        } else {
                            doMemberTable(data.users);
                        }
                    },
                    error: function(jqXHR) {
                        console.log("get fail");
                    }
                })
            }
            getMemberInfo();
            console.log("ready!");
            //上架商品
            upload = function() {
                var files = new FormData();
                //let formData = getFormData($("#putForm"));
                let input = $("#uploadImage")[0].files[0];
                let name = $("#name").val();
                let category = $("#category").val();
                let quantity = $("#quantity").val();
                let price = $("#price").val();
                let description = $("#description").val();
                files.append('action', "upload");
                files.append('userID', "1");
                files.append('name', name);
                files.append('category', category);
                files.append('quantity', quantity);
                files.append('price', price);
                files.append('description', description);
                files.append('image', input);


                //files.append('formData', formData); 
                //console.log(name);
                $.ajax({
                    url: '/PID_Assignment/core/upload.php',
                    data: files,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                        if (data.sql == undefined) {
                            console.log(data.msg);
                        } else {
                            console.log(data.sql);
                            $("#previewDiv").empty();
                            document.getElementById("putForm").reset();
                            alert("操作成功");
                        }

                        console.log("upload SUCCESS");
                        //$("#putForm").empty();
                    },
                    error: function(jqXHR) {
                        alert("操作失敗");
                        console.log(jqXHR);
                    }
                });
            }
            //取消 上架/編輯
            cancel = function() {
                if ($("#checkEditButton").length > 0) {
                    document.getElementById("putForm").reset();
                    $("#previewDiv").empty();
                    $("#checkEditButton").attr("id", "uploadButton");
                    $("#uploadButton").text("確認上架");
                } else {
                    document.getElementById("putForm").reset();
                    $("#previewDiv").empty();
                }
                console.log($("#checkEditButton").length > 0);
            }
            //編輯商品
            checkEdit = function(commodityID) {
                console.log("checkEdit" + commodityID);
                var files = new FormData();
                //let formData = getFormData($("#putForm"));
                let input = $("#uploadImage")[0].files[0];
                let name = $("#name").val();
                let category = $("#category").val();
                let quantity = $("#quantity").val();
                let price = $("#price").val();
                let description = $("#description").val();
                files.append('action', "edit");
                files.append('userID', "1");
                files.append('commodityID', commodityID);
                files.append('name', name);
                files.append('category', category);
                files.append('quantity', quantity);
                files.append('price', price);
                files.append('description', description);
                if (input != undefined) {
                    files.append('image', input);
                } else {
                    files.append('image', null);
                }
                //files.append('formData', formData); 
                console.log("imagefiles:" + input);
                console.log("allfiles:" + files);
                $.ajax({
                    url: '/PID_Assignment/core/upload.php',
                    data: files,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                        if (data.sql == undefined) {
                            console.log(data.msg);
                        } else {
                            console.log(data.sql);
                            $("#showButton").trigger("click");
                            cancel();
                            alert("操作成功");
                        }
                        console.log("checkEdit SUCCESS");
                        //$("#putForm").empty();
                    },
                    error: function(jqXHR) {
                        alert("操作失敗");
                        console.log(jqXHR);
                    }
                });
                //$("#checkEditButton").attr("id","uploadButton");
            }
            //顯示已上架商品
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
                        action: "showList"
                    },
                    success: function(data) {
                        //$("#showBox").attr("src", data.src);
                        if (data.name != "") {
                            document.getElementById("putForm").reset();
                            showList(data);
                        }

                        console.log("display success" + data.name);
                    },
                    error: function(jqXHR) {
                        console.log(jqXHR);
                    }
                });
            })
            //預覽商品圖
            $("#uploadImage").change(function() {
                $("#previewDiv").empty() // 清空當下預覽
                previewFiles(this.files) // this即為<input>元素
            })
            //自動填寫-編輯商品的表單
            insertForm = function(idName) {
                $.ajax({
                    url: '/PID_Assignment/core/upload.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        commodityID: $(idName).children(0).children(1).children(1)[1].innerText,
                        action: "insertForm"
                    },
                    success: function(data) {
                        if (data.name != "") {
                            document.getElementById("putForm").reset();
                            $("#name").val(data.name);
                            $("#category").val(data.category);
                            $("#quantity").val(data.quantity);
                            $("#price").val(data.price);
                            $("#description").val(data.description);
                            if ($("#uploadButton").length > 0) {
                                document.getElementById('uploadButton').onclick = function() {
                                    checkEdit(data.commodityID);
                                }
                            } else {
                                document.getElementById('checkEditButton').onclick = function() {
                                    checkEdit(data.commodityID);
                                }
                            }

                            $("#uploadButton").attr("id", "checkEditButton");
                            $("#checkEditButton").text("確認編輯");
                            showImage(data.name, "data:image/jpeg;base64," + data.src)
                        }

                        console.log("display success" + data.name);
                    },
                    error: function(jqXHR) {
                        console.log(jqXHR);
                    }
                });
            }
            delCommodity = function(idName) {
                $.ajax({
                    url: '/PID_Assignment/core/upload.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        commodityID: $(idName).children(0).children(1).children(1)[1].innerText,
                        action: "delCommodity"
                    },
                    success: function(data) {
                        alert(data.msg);
                        $("#showButton").trigger("click");
                    },
                    error: function(jqXHR) {
                        console.log(jqXHR);
                    }
                });
            }

            function getFormData($form) {
                var unindexed_array = $form.serializeArray();
                var indexed_array = {};
                $.map(unindexed_array, function(n, i) {
                    indexed_array[n['name']] = n['value'];
                });
                return indexed_array;
            }

            function showImage(fileName, src) {
                $("#previewDiv").empty();
                let image = new Image(250); // 設定寬250px
                image.name = fileName;
                image.src = src; // <img>中src屬性除了接url外也可以直接接Base64字串
                $("#previewDiv").append(image).append(`<p>File: ${image.name}`);
            }
            //生成商品列表div 並填上商品資訊
            function showList(list) {
                console.log(list['name'][4]);
                for (let i = 0; i < list['name'].length; i++) {
                    name = list['name'][i];
                    category = list['category'][i];
                    price = list['price'][i];
                    quantity = list['quantity'][i];
                    commodityID = list['commodityID'][i];
                    src = "data:image/jpeg;base64," + (list['src'][i]); // <img>中src屬性除了接url外也可以直接接Base64字串
                    let idName = "listDivRow"
                    idx = i;
                    nextIdx = i + 1;
                    idName += (idx.toString());
                    if (i < list['name'].length - 1) {
                        var addDiv = $("#listDivRow" + idx).clone(true).attr("id", "listDivRow" + nextIdx)
                        $("#" + idName).after(addDiv);
                    }
                    $('#' + idName + ' #list-header img').attr("src", src);
                    $('#' + idName + ' #list-body-info').append(`
                    <label>商品編號:</label><span class="commodityID">${commodityID}</span><br>
                    <label>商品名稱:</label><span class="name">${name}</span><br>
                    <label>價格:</label><span class="price">${price}</span><br>
                    <label>數量:</label><span class="quantity">${quantity}</span><br>
                    <label>售出:</label><span class="quantitySold">0</span>`);
                    $('#' + idName + ' #list-footer').append(`
                    <button onclick="insertForm(${idName})" value="${idName}">編輯</button>
                    <button onclick="delCommodity(${idName})" value="${idName}">刪除</button>`)

                }
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
            checkDetail = function(e) {
                console.log("checkDetail" + e);
                id = e.value;
                $.ajax({
                    type: "POST",
                    url: "/PID_Assignment/core/Management.php",
                    dataType: "json",
                    data: {
                        userID: id,
                        checkDetail: 1, //$("#tab-info input:nth-child(odd)")
                        action: "getOrder"
                    },
                    success: function(data) {
                        if (data.detail) {
                            console.log(data.detail);
                            doDetailTable($("#tr-member" + id), data.detail);
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
            function doDetailTable(idx, data) {
                $("#managementButton").text("回會員管理");
                document.getElementById('managementButton').onclick = function() {
                    getMemberInfo();
                }
                console.log(idx, data);
                $("#usersManagement").empty();
                let rowElements = [];
                rowElements.push(
                    $("<table id='tab-detail'></table>")
                    .addClass("table ")
                    .append($('<thead></thead>').append(`<tr><th scope="col">訂單編號</th><th scope="col">
                    時間</th><th scope="col">品項</th><th scope="col">單價</th><th scope="col">數量</th><th scope="col">金額</th>
                    <th scope="col">狀態</th><th scope="col">賣家</th></tr>`))
                );
                $("#usersManagement").append(rowElements);
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
                            let tableTotal = $(`<tr><td>總計</td><td></td><td></td><td></td><td>${total}</td><td></td><td></td></tr>`);
                            tableTotal.appendTo("#tab-detail");
                            total = 0;
                        }
                    } else {
                        let tableTotal = $(`<tr class="tableTotal"><td>總計</td><td></td><td></td><td></td><td>${total}</td><td></td><td></td></tr>`);
                        tableTotal.appendTo("#tab-detail");
                    }

                    // idx.after(`<tr id='detail'><td>${value['userID']}</td><td>${value['account']}</td>
                    // <td>${value['datatime']}</td><td>${value['actionName']}</td><td>${value['amount']}</td>
                    // <td>${value['status']}</td><td>${value['sellerID']}</td></tr>`);
                })
            }
            //生成會員管理表
            function doMemberTable(data) {
                let rowElements = [];
                let tableClassArr = ["class='tab-checkRecord'", "class='tab-withdraw'", "class='tab-deposit'"];
                let isAmount = ["-", "$"];
                // let isAmount=1;
                let idx = 0;
                rowElements.push(
                    $("<table id='tab-info'></table>")
                    .addClass("table ")
                    .append($('<thead></thead>').append('<tr><th scope="col">會員編號</th><th scope="col">會員帳號</th><th scope="col">身分證</th><th scope="col">帳號停權</th><th scope="col">訂單明細</th></tr>'))
                );
                $("#usersManagement").append(rowElements);
                var count = 0;
                if (data) {
                    for (let i = 0; i < data.length; i++) {
                        let banHtml;
                        if (data[i]['ban'] == 'N') {
                            banHtml = `<input id='ban${count}' type='radio' value='Y' name='ban${i}'>是<input id='ban${count+1}' type='radio' value='N' name='ban${i}' checked>否`
                        } else {
                            banHtml = `<input id='ban${count}' type='radio' value='Y' name='ban${i}' checked>是<input id='ban${count+1}' type='radio' value='N' name='ban${i}'>否`
                        }
                        count += 2;

                        var tableElements = $("<tr id=tr-member" + data[i]['userID'] + "><td>" + data[i]['userID'] + "</td><td>" + data[i]['account'] + "</td>" +
                            "<td>" + data[i]['personID'] + "</td>" + "<td>" + banHtml + "</td><td>" + "<button id=checkDetailButton type ='button' onclick='checkDetail(this)' value=" + data[i]['userID'] + ">詳細明細</button>" + "</td></tr>")
                        tableElements.appendTo("#tab-info");
                    }
                } else {
                    $("#tab-info").append("<h1>查無會員</h1>");
                }

                console.log($("#tab-info input:nth-child(odd)").length);

            }

            management = function() {
                banArr = [];
                usersArr = [];
                usersCount = $("#tab-info input:nth-child(odd)").length;
                var tr = $('#tab-info').find('tr');
                var len = tr.length;
                for (var i = 0; i < len; i++) {
                    var firstTdText = tr.eq(i).find('td').eq(0).text();
                    usersArr.push(firstTdText);
                }

                for (let i = 0; i < usersCount * 2; i += 2) {
                    ($("#ban" + i).prop('checked')) ? banArr.push(1): banArr.push(0);

                }
                console.log(banArr);
                $.ajax({
                    type: "POST",
                    url: "/PID_Assignment/core/Management.php",
                    dataType: "json",
                    data: {
                        usersID: usersArr,
                        inputBan: banArr, //$("#tab-info input:nth-child(odd)")
                        action: "management"
                    },
                    success: function(data) {
                        if (data.users) {
                            $("#usersManagement").empty();

                            doMemberTable(data.users);
                            alert("操作成功");
                        }
                        console.log(data.users);
                        console.log("management SUCCESS");
                    },
                    error: function(jqXHR) {
                        console.log("management fail");
                    }
                })
            }
            $("#listDiv img").hover(function() {
                $(this).addClass("img-in");
                console.log("in");
            }, function() {
                $(this).removeClass("img-in");
                console.log("out");
            })
            // set the dimensions and margins of the graph
            var margin = {
                    top: 10,
                    right: 30,
                    bottom: 30,
                    left: 60
                },
                width = 460 - margin.left - margin.right,
                height = 400 - margin.top - margin.bottom;

            // append the svg object to the body of the page
            var svg = d3.select("#my_dataviz")
                .append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform",
                    "translate(" + margin.left + "," + margin.top + ")");
            var zoom = d3.zoom()
                .on("zoom", zoomed);
            svg.call(zoom);
            var rect = svg.append("rect")
                .attr("width", width)
                .attr("height", height)
                .style("fill", "none")
                .style("pointer-events", "all");
            $.ajax({
                url: '/PID_Assignment/core/Management.php',
                data: {
                    action: "getOrderToLineChart"
                },
                dataType: "json",
                type: 'POST',
                success: function(data) {
                    if (data.order == undefined) {
                        console.log(data.msg);
                    } else {
                        console.log(data.order);
                        doDrawLineChart(data.order);


                    }
                },
                error: function(jqXHR) {
                    alert("操作失敗");
                    log(jqXHR);
                }
            });
            var data = [{
                    "date": "2020-09-06",
                    "value": "30"
                },
                {
                    "date": "2020-09-07",
                    "value": "10"
                },
                {
                    "date": "2020-09-08",
                    "value": "20"
                }
            ];




            // Now I can use this dataset:
            function doDrawLineChart(data) {
                var x_scale = null;
                var y_scale = null;
                var x_axis = null;
                var xAxis = null;
                var line;
                // Add X axis --> it is a date format
                x_scale = d3.scaleTime()
                    .domain(d3.extent(data, function(d) {
                        console.log(d.date);
                        return d3.timeParse("%Y-%m-%d")(d.date);

                    }))
                    .range([0, width]);
                xAxis = d3.axisBottom(x_scale);
                x_axis = svg.append("g")
                    .attr("transform", "translate(0," + height + ")")
                    .call(xAxis);

                // Add Y axis
                var y_scale = d3.scaleLinear()
                    .domain([0, d3.max(data, function(d) {
                        console.log(d.amount);
                        return +d.amount;
                    })])
                    .range([height, 0]);
                svg.append("g")
                    .call(d3.axisLeft(y_scale));

                // Add the line
                line = svg.append("path")
                    .datum(data)
                    .attr("fill", "none")
                    .attr("stroke", "steelblue")
                    .attr("stroke-width", 1.5)
                    .attr("d", d3.line()
                        .x(function(d) {
                            return x_scale(d3.timeParse("%Y-%m-%d")(d.date))
                        })
                        .y(function(d) {
                            console.log("value", d.amount);
                            return y_scale(d.amount)
                        })
                        .curve(d3.curveBasis)
                    )

            }

            function zoomed() {
                var new_x_scale = d3.event.transform.rescaleX(x_scale);


                x_axis.transition()
                    .duration(0)
                    .call(xAxis.scale(new_x_scale));
                // line.attr("d", d3.line()
                //     .x(function(d) {
                //         return x_scale(new_x_scale(d.date))
                //     }));
                
                console.log(00);

            }
            //Read the data
            //data = test(data);
            //doDrawLineChart(data);

        });
    </script>


</body>

</html>