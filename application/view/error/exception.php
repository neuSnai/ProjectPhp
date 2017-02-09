<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style type="text/css">
        #error{
            width: 70%;
            height: 200px;
            border: 1px solid black;
            margin: 0 auto;
        }
        .header{
            display: inline-block;
            width: 150px;
        }
        .content{
            color: red;

        }
    </style>
</head>
<body>
<div id="error">
    <span class="header">异常信息：</span><span class="content"><?php echo $message?></span><br>
    <span class="header">异常所在文件：</span><span class="content"><?php echo $file?></span><br>
    <span class="header">异常所在行数：</span><span class="content"><?php echo $line?></span>
</div>

</body>
</html>