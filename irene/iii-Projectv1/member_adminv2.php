<?php
// echo "你已經登入了！！";

//登入狀態
// require_once('./checkSession.php');
//連資料庫
require_once('./db.inc.php');
require_once('./selectall.php');

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>會員系統一覽表</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        table {
            table-layout: fixed;
            /* word-wrap: break-word;
            overflow: hidden; */
        }

        tr {
            text-align: center;
            vertical-align: middle;
            word-wrap: break-word;
            overflow: hidden;
        }
    </style>

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
                            <form action="./member_search1.php" method="post">
                                <input type="text" name="search">
                                <button type="submit">search</button>
                            </form>
                        </li>
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
                            <a href="./member_adminv2.php"><strong>會員資料一覽表</strong></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="./member_newv1.php">新增會員</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <form method="POST" action="member_deleteMultiple.php">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>會員資料總表</h5>
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

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">

                                            <thead>
                                                <tr>
                                                    <th>勾選</th>
                                                    <th>帳號</th>
                                                    <th>帳號開通</th>
                                                    <th>姓名</th>
                                                    <th>性別</th>
                                                    <th>大頭照</th>
                                                    <th>生日</th>
                                                    <th>電話</th>
                                                    <th>地址</th>
                                                    <th>黑名單</th>
                                                    <th>VIP</th>
                                                    <th>資料編輯</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //SQL 敘述
                                                $sql = "SELECT `ID`,  `Account`,`AccountActivated`,`Email`, `Pwd`, `Name`, `Gender`, `Img`,`Birthday`, `PhoneNumber`, `Address`,`Blocked`, `VIP`, `VIP_Start`, `VIP_Due`, `Created_at`, `Updated_at`
                                            FROM `member` 
                                            -- ORDER BY `ID` ASC 
                                            -- LIMIT ?, ? ";

                                                //設定繫結值
                                                // $arrParam = [($page - 1) * $numPerPage, $numPerPage];                                    
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();

                                                //資料數量大於 0，則列出所有資料
                                                if ($stmt->rowCount() > 0) {
                                                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    for ($i = 0; $i < count($arr); $i++) {
                                                ?>
                                                        <tr>
                                                            <td style="vertical-align:middle" class="border">
                                                                <input type="checkbox" name="chk[]" class="box" value="<?php echo $arr[$i]['ID']; ?>" />
                                                            </td>
                                                            <td style="vertical-align:middle" class="border"><?php echo $arr[$i]['Account']; ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo $arr[$i]['AccountActivated']; ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo $arr[$i]['Name']; ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo ($arr[$i]['Gender']); ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo ($arr[$i]['Img']); ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo ($arr[$i]['Birthday']); ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo ($arr[$i]['PhoneNumber']); ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo ($arr[$i]['Address']); ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo ($arr[$i]['Blocked']); ?></td>
                                                            <td style="vertical-align:middle" class="border"><?php echo ($arr[$i]['VIP']); ?></td>
                                                            <td style="vertical-align:middle" class="border">
                                                                <div><a href="./member_editv1.php?editId=<?php echo $arr[$i]['ID']; ?>">編輯</a></div>
                                                                <div><a href="./member_delete.php?deleteId=<?php echo $arr[$i]['ID']; ?>">刪除</a></div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td class="border" colspan="17">沒有資料</td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div>
                                            <input type="checkbox" name="allchecked" id="allchecked">全選/反選</input>
                                            <!-- <input type="checkbox" name="sort" id="sort">排序 -->
                                            <button type="submit">刪除</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
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
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>