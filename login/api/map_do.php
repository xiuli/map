<?php
    include "../inc/mysql.php";
    include "../inc/function.php";
    include "../inc/cookie.php";
    $start_site = trim(requestPost("start_site"));
    $end_site = trim(requestPost("end_site"));
    $site = trim(requestPost("site"));
    $type = trim(requestPost("type"));

    $username = getUserName();

    if($username == ''){
        echo '<script type="text/javascript">alert("您尚未登录，请登录！");</script>';
        echo '<script type="text/javascript">location.href="/login.html";</script>';
        exit;
    }


    if($type == ''){
        $arr = array(
            "message" => 'type参数不能为空哦',
            "status" => 0
        );
        echo json_encode($arr);
        exit;
    }
    if($type == 'station'){
        if($site == ''){
            $arr = array(
                "message" => '请输入查询信息',
                "status" => 0
            );
            echo json_encode($arr);
            exit;
        }
    }
    if($type == 'change'){
        if($start_site =='' || $end_site ==''){
            $arr = array(
                "message" => '请输入查询信息',
                "status" => 0
            );
            echo json_encode($arr);
            exit;
        }
    }
    if($type != 'change' && $type != 'station'){
        $arr = array(
            "message" => 'type参数不正确哦',
            "status" => 0
        );
        echo json_encode($arr);
        exit;
    }


    mysqli_select_db($s,'map');

    // 根据cookie的用户名，查询用户id
    $sql = "select userid from user where username = '$username'"; 
    $result = mysqli_query($s,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $userid = $row['userid'];
    }
    if($userid > 0){ // 是否存在这个用户
        // 判断数站点信息是否存在
        if($type == 'station'){
            $sql = "select * from station where site = '$site' and userid = '$userid'";
            $result = mysqli_query($s,$sql);

            while($row = mysqli_fetch_assoc($result)){
                if($row['site'] == $site){
                    $arr = array(
                        "message" => '添加失败，该数据已存在',
                        "status" => 0
                    );
                    echo json_encode($arr);
                    exit;
                }
            }
        }
        if($type == 'change'){
            $sql = "select * from station where start_site = '$start_site' and end_site = '$end_site' and userid = '$userid'";
            $result = mysqli_query($s,$sql);

            while($row = mysqli_fetch_assoc($result)){
                if($row['site'] == $site){
                    $arr = array(
                        "message" => '添加失败，该数据已存在',
                        "status" => 0
                    );
                    echo json_encode($arr);
                    exit;
                }
            }
        }

        
        // 通过用户id，插入数据
        $sql = "insert into station (userid, start_site, end_site, site) values ('$userid', '$start_site', '$end_site', '$site')";

        $result = mysqli_query($s,$sql);
        if($result){
            $arr = array(
                "message" => '添加成功',
                "status" => 1
            );
            echo json_encode($arr);
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
        $arr = array(
            "message" => '用户名不存在',
            "status" => 0
        );
        echo json_encode($arr);
        exit;
    }

    mysqli_close($s);
?>