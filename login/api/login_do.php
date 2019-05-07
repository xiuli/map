<?php
    include "../inc/mysql.php";
    include "../inc/function.php";
    include "../inc/cookie.php";
    $username = trim(requestPost("username"));
    $password = trim(requestPost("password"));
    if ($username == "") {
        $arr = array(
            "message" => '用户名不能为空哦',
            "status" => 0,
        );
        echo json_encode($arr);
        exit;
    }
    if ($password == "") {
        $arr = array(
            "message" => '密码不能为空哦',
            "status" => 0,
        );
        echo json_encode($arr);
        exit;
    }
    mysqli_select_db($s,'map');

    $sql = "select * from user where username = '$username'";
    $result = mysqli_query($s,$sql);
 
    if ($result === false) {
        $arr = array(
            "message" => '网络异常',
            "status" => 0
        );
        echo json_encode($arr);
        mysqli_close($s);
        exit();
    } 

    $arr = [];
    while($row = mysqli_fetch_assoc($result)){
        $arr = $row;
    }
    
    if(count($arr) == 0){ // 判断查询数据是否成功
        $sql_insert = "insert into user (username,password) values ('$username','$password')";
        $result = mysqli_query($s,$sql_insert);
        if($result){  // 结果集布尔值
            $arr = array(
                "message" => '注册成功',
                "status" => 2
            );
            echo json_encode($arr);

            $userinfo = array(
                'username' => $username
            );
            setrawcookie($Web_Cookies, http_build_query($userinfo) , (time() + 3600 * 24 * 30) , "/", $maindomain);

            exit;
        }else{
            $arr = array(
                "message" => '添加失败',
                "status" => 0
            );
            echo json_encode($arr);
            exit;
        }
    }else{
        $sql .= "and password = '$password'";
        $result = mysqli_query($s,$sql);

        $arr = [];
        while($row = mysqli_fetch_assoc($result)){
            $arr = $row;
        }
        if(count($arr) == 0){ 
            $arr = array(
                "message" => '密码不正确',
                "status" => 0
            );
            echo json_encode($arr);
            exit;
        }else{
            $arr = array(
                "message" => '登录成功',
                "status" => 1
            );
            echo json_encode($arr);

            $userinfo = array(
                'username' => $username
            );
            setrawcookie($Web_Cookies, http_build_query($userinfo) , (time() + 3600 * 24 * 30) , "/", $maindomain);
            exit;
        }
    }
    mysqli_close($s);
?>