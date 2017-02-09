<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户管理</title>
    <base href="<?php echo base_url();?>">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/tableStyle.css">
    <style type="text/css">
        body{
            padding:50px 100px 50px 100px;
        }
        #currentPage{
            color: red;
        }
        a{
            text-decoration: none;
        }
        a:hover{
            color: red;
        }
    </style>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>姓名</th>
        <th>用户名</th>
        <th>年龄</th>
        <th>操作</th>
    </tr>
    </thead>
    <?php
    if(!$users)
        echo '<span style="color: red;">没有数据</span>';
    else{
        foreach($users as $user){
            ?>
            <tbody>
            <tr>
                <td><?php echo $user->name;?></td>
                <td><?php echo $user->username;?></td>
                <td><?php echo $user->age;?></td>
                <td>
                    <a href="UserController/detail/<?php echo $user->id?>">详情</a>
                    <a href="UserController/del/<?php echo $user->id?>">删除</a>
                </td>
            </tr>
            </tbody>
        <?php }}?>
</table>


</body>
</html>