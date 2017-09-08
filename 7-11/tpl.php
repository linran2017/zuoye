
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        tr{
            text-align: center;
        }
    </style>
    <script src="jquery-1.11.3.min.js"></script>
    <script>
        $(function () {
            $('.add').click(function (){
                if($('tr').length>5){
                    alert('最多上传5个图片');
                }else {
                    var obj='<tr><td><div class="form-group"><input type="file" class="form-control" id="exampleInputEmail2" name="up[]"></div></td><td class="new"><button type="button" class="btn btn-primary del">删除这一项</button></td></tr>';
                    $('table').append(obj);
                }
                $('.new').on('click','.del',function () {
                    $(this).parents('tr').remove();
                })
            })
        })
    </script>
</head>
<body>
<div class="container">
   <form action="" method="post" enctype="multipart/form-data">
        <h2 style="width: 500px; text-align: center; margin: 0 auto; margin-top: 50px">上传你的文件</h2>
        <table class="table" width="500" style="margin-top: 10px">
            <tr>
                <td>上传文件</td>
                <td>操作</td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <input type="file" class="form-control" id="exampleInputEmail2" name="up[]">
                    </div>
                </td>
                <td><button type="button" class="btn btn-primary add">增加一项</button></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success">上传</button>
    </form>
   <!-- <form action="" method="post" enctype="multipart/form-data">
        <h2 style="width: 500px; text-align: center; margin: 0 auto; margin-top: 50px">上传你的文件</h2>
        <table class="table" width="500" style="margin: 0 auto margin-top: 10px;">
            <tr>
                <td>上传文件</td>
                <td>操作</td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <input type="file" class="form-control" id="exampleInputEmail2" name="up">
                    </div>
                </td>
                <td><button type="submit" class="btn btn-primary add">上传文件</button></td>
            </tr>
        </table>
    </form>-->
</div>
</body>
</html>
