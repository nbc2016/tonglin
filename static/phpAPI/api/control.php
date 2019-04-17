<?php 
    header('content-type:text/html;charset=utf-8');
    header('Access-Control-Allow-Origin: http://localhost:8080');
    header('Access-Control-Allow-Credentials: true');
    define('HOST','127.0.0.1');
    define('UNAME','root');
    define('PWD','root');
    define('DB','school');
    
    //非查询功能
    function my_exec($sql){
        //1-连接数据库
        @$link=mysqli_connect(HOST,UNAME,PWD,DB);
        //判断
        if(!$link){
            die('数据库连接失败！');
        }
        //2-执行sql语句，判断执行结果
        if(!mysqli_query($link,$sql)){
            //如果失败输出错误信息
            mysqli_close($link);
            return  false; 
        }else {
            mysqli_close($link);
            return true;
        }
        //3-关闭连接
    }

    //查询功能
    function my_query($sql){
        //1-连接数据库
        @$link=mysqli_connect(HOST,UNAME,PWD,DB);
        //判断连接
        if(!$link){
            return false;
        }

        //执行查询
        $res=mysqli_query($link,$sql);
        //判断是否有数据
        if(!$res || mysqli_num_rows($res)==0 ){
            mysqli_close($link);
            return [];
        }
        //保存数据 二维数组的形式
        //获取结果集中所有的数据
        while($row=mysqli_fetch_assoc($res)){
            $arr[]=$row;
        }
        //关闭连接
        mysqli_close($link); 
        //返回数据库的数据
        return $arr;       
    
    }
 ?>
