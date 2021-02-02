<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script>
    $(document).on('click', '#delete_button2', function() {
                console.log('123');
                swal({
                        title: "確定真的要刪除嗎?",
                        text: " 一旦刪除，將不可再恢復喔!!!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                            if (willDelete) {
                                swal("刪除成功!", {
                                    icon: "success",
                                    console.log("123")
                                })
                                window.location.href = {
                                    "./member_delete.php ? deleteId = <?php echo $arr[$i]['ID']; ?> ";
                                };
                            } else {
                                swal("沒有刪除任何檔案!");
                            }
                        }
                    });
</script>