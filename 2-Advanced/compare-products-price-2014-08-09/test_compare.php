<?php include('database.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>phpmysqlcode</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript">
            $(document).ready(function () {
                $(".detail").click(function () {
                    var p_id = $(this).attr('id');
                    if (p_id != '')
                    {
                        $.ajax({
                            type: "post",
                            url: "compare.php",
                            data: {p_id: p_id, type: 'detail'},
                            cache: false,
                            success: function (data) {
                                $.fancybox(data, {
                                    fitToView: false,
                                    width: 700,
                                    height: 700,
                                    autoSize: true,
                                    closeClick: false,
                                    openEffect: 'none',
                                    closeEffect: 'refresh'
                                });
                            }
                        });
                    }
                });
            });

            function compare()
            {
                var total_check = new Array();
                $('.products:checked').each(function () {
                    total_check.push($(this).val());
                });

                if (total_check != '') {
                    if (total_check.length == '2') {
                        var i = 0;
                        var pidArray = new Object();
                        $('.products:checked').each(function () {
                            total_check.push($(this).val());
                            var id = $(this).attr('id');
                            pidArray[i] = {
                                pid: id
                            };
                            i++;
                        });
                        var data = JSON.stringify(pidArray);
                        $('#wait').show();
                        $.ajax({
                            url: "compare.php",
                            type: "POST",
                            data: {pids: data, type: 'compare'},
                            cache: false,
                            success: function (data) {
                                $('#wait').hide();
                                $.fancybox(data, {
                                    fitToView: false,
                                    width: 700,
                                    height: 500,
                                    autoSize: false,
                                    closeClick: false,
                                    openEffect: 'none',
                                    closeEffect: 'refresh'
                                });
                            }
                        });
                    } else {
                        alert("Please select two products ");
                        return false;
                    }
                } else {
                    alert("Please select minimum two products");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <div class="mybg"><h2 class="head">Demo www.phpmysqlcode.com</h2>
                </div></div>
            <div class="body1">
                <div class="body2">
                    <div class="main_table">
                        <table width="100%">
                            <h1 align="center">Product Compare Demo</h1>
                            <br>
                                <span align="center"><img id="wait" style="display:none;margin-left:300px;" src="image/loading.gif"></span>
                                <tr>
                                    <td width="10%"><a href="javascript:void(0)" onclick="compare();" style="color:green;font-size:15px;"><b>Compare</b></a></td>
                                    <td width="20%">Product Image</td>
                                    <td width="20%">Comany Name</td>
                                    <td width="20%">Price</td>
                                    <td width="20%">Details</td>
                                </tr>
                                <?php $sql = mysql_query("Select * FROM compare");
                                while ($data = mysql_fetch_assoc($sql)) {
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="products[]" class="products" id="<?php echo $data['id']; ?>"></td>
                                        <td><img src="image/<?php echo $data['image']; ?>" width="80" height="80px;"></td>
                                        <td><?php echo $data['company']; ?></td>
                                        <td><?php echo $data['price']; ?></td>
                                        <td><a href="javascript:void(0);" class="detail" id="detail-<?php echo $data['id']; ?>">Details</a></td>
                                    </tr>
<?php } ?>
                        </table>
                    </div>
                </div></div>
        </div>
    </body>
</html>
