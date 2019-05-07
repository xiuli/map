<?php
    include "../inc/mysql.php";
    include "../inc/function.php";
    include "../inc/cookie.php";
    mysqli_select_db($s,'map');

    // 根据cookie的用户名，查询用户id
    $username = getUserName();

    if($username == ''){
        echo '<script type="text/javascript">alert("您尚未登录，请登录！");</script>';
        echo '<script type="text/javascript">location.href="/login.html";</script>';
        exit;
    }

    $sql = "select userid from user where username = '$username'"; 
    $result = mysqli_query($s,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $userid = $row['userid'];
    }
    if($userid > 0){ // 是否存在这个用户
        // 通过用户id，查询数据
        $sql = "select start_site,end_site,site from station where userid = '$userid' order by addtime desc";
        $result = mysqli_query($s,$sql);

        $datalist = [];
        while($row = mysqli_fetch_assoc($result)){
            $datalist[] = $row;
        }
        if(count($datalist) == 0){
            $arr = array(
                "message" => '当前用户还未查询',
                "status" => 0
            );
            echo json_encode($arr);
            exit;
        }else{
            $arr = array(
                "message" => '查询成功',
                "data" => $datalist ,
                "status" => 1
            );
            echo json_encode($arr);
            exit;
        }
    }else{
        $arr = array(
            "message" => '用户名不存在',
            "status" => 0
        );
        echo json_encode($arr);
        exit;
    }

    mysqli_close($s);
?>