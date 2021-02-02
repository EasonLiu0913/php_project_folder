<?php
// echo "你已經登入了！！";

//登入狀態
// require_once('./checkSession.php');
//連資料庫
require_once('./db.inc.php');
require_once('./checkVIP.php')

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>會員資料編輯</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <!-- 頭像 -->
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="img/profile_small.jpg" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">David Williams</span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">會員系統</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="member_adminv2.php">會員資料一覽表</a></li>
                            <li><a href="member_newv1.php">新增會員</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">歡迎來到會員系統</span>
                        </li>
                        <li>
                            <a href="member_index.php">
                                <i class="fa fa-sign-out"></i> 登出
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- sidebar -->
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>會員系統</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="./member_adminv2.php">會員資料一覽表</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="./member_newv1.php">新增會員</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>會員資料輸入</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form name="myForm" method="POST" action="./member_updateEdit.php" enctype="multipart/form-data">
                                <?php
                                //SQL 敘述
                                $sql = "SELECT `ID`, `Account`, `AccountActivated`, `Email`, `Pwd`, `Name`, `Gender`, `Img`, `Birthday`, `PhoneNumber`, `Address`, `Blocked`, `VIP`, `VIP_Start`, `VIP_Due`
                                FROM `member`  
                                WHERE `ID` = ? ";

                                //設定繫結值
                                $arrParam = [(int) $_GET['editId']];

                                //查詢
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute($arrParam);
                                $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                // echo "<pre>";
                                // print_r($arr);
                                // echo "</pre>";
                                if (count($arr) > 0) {
                                ?>
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">流水號</label>
                                        <div class="col-lg-10">
                                            <input type="text" disabled="" placeholder="<?php echo $arr[0]['ID']; ?>" name="ID" id="ID" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">帳號</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Account" id="Account" value="<?php echo $arr[0]['Account']; ?>" maxlength="50" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">帳號開通情形</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="AccountActivated" id="AccountActivated">
                                                <option value="<?php echo $arr[0]['AccountActivated']; ?>" selected><?php echo $arr[0]['AccountActivated']; ?></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">電子信箱</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="Email" value="<?php echo $arr[0]['Email']; ?>" maxlength="100" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">密碼</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="Pwd" value="<?php echo $arr[0]['Pwd']; ?>" maxlength="100" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">姓名</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Name" id="Name" value="<?php echo $arr[0]['Name']; ?>" maxlength="50" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">性別</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="Gender" id="Gender">
                                                <option value="<?php echo $arr[0]['Gender']; ?>" selected><?php echo $arr[0]['Gender']; ?>(原選項)</option>
                                                <option value="男">男</option>
                                                <option value="女">女</option>
                                                <option value="不便告知">不便告知</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">照片</label>
                                        <div class="col-sm-10">
                                            <?php if ($arr[0]['Img'] !== NULL) { ?>
                                                <img class="w200px" src="./files/<?php echo $arr[0]['Img']; ?>" />
                                            <?php } ?>
                                            <input type="file" name="Img" id="Img" class="form-control"></div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">生日</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="Birthday" id="Birthday" value="<?php echo $arr[0]['Birthday']; ?>" maxlength="10" maxlength="50" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">電話</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="PhoneNumber" id="PhoneNumber" value="<?php echo $arr[0]['PhoneNumber']; ?>" maxlength="50" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">地址</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Address" id="Address" value="<?php echo $arr[0]['Address']; ?>" maxlength="50" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">黑名單</label>
                                        <div class="col-sm-10">
                                            <select name="Blocked" id="Blocked" class="form-control m-b">
                                                <option selected value="<?php echo $arr[0]['Blocked']; ?>"><?php echo $arr[0]['Blocked']; ?>(原選項)</option>
                                                <option value="NO">NO</option>
                                                <option value="YES">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">VIP</label>
                                        <div class="col-sm-10">
                                            <select name="VIP" id="VIP" class="form-control m-b">
                                                <option selected value="<?php echo $arr[0]['VIP']; ?>"><?php echo $arr[0]['VIP']; ?>(原選項)</option>
                                                <option value="NO">NO</option>
                                                <option value="YES">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="VIP_Start_div" class="form-group  row">
                                        <label class="col-sm-2 col-form-label">VIP起始日</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="VIP_Start" id="VIP_Start" value="<?php echo $arr[0]['VIP_Start']; ?>" maxlength="50" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div id="VIP_Due_div" class="form-group  row">
                                        <label class="col-sm-2 col-form-label">VIP到期日</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="VIP_Due" id="VIP_Due" value="<?php echo $arr[0]['VIP_Due']; ?>" maxlength="50" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary btn-sm" type="submit" name="smb">更新</button>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <td class="border" colspan="6">沒有資料</td>
                                    </tr>
                                <?php
                                } ?>
                                <input type="hidden" name="editId" value="<?php echo (int) $_GET['editId']; ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>
        </div>
    </div>



    <!-- Mainly scripts -->
    <!-- <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Custom and plugin javascript -->
    <!-- <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script> -->

    <!-- Page-Level Scripts -->
    <!-- <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });
    </script> -->

</body>
<html>