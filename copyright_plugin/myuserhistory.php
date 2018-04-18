<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 17:08
 */
//include_once('../../../wp-config.php');
header("Content-type:text/html;charset=utf-8");
function myhistory()
{
    global $wpdb;

    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $history = $wpdb->get_results("SELECT action_post_id FROM `wp_user_history` WHERE `user_id` = '$sql'");
    $m = 0;
    foreach ($history as $a) {
        $historylist[$m] = $a->action_post_id;
        $m++;
    }
    global $sql;
    $a=0;
    $his_tag=array(
        "数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足"
    );
    $c=count($historylist);
    $m=0;

    while($c>0){

        $sql[$a] =$wpdb->get_var( "SELECT class1 FROM `new_wiki` WHERE `wiki_id` = '$historylist[$m]'");
        $his_tag[$a]=$sql[$a];

        $m++;
        $a++;
        $c--;
    }
    $m=0;
    $c=count($historylist);
    while($c>0) {
        if ($historylist[$m]==0 or $his_tag[$m]==null){
            unset ($his_tag[$m]);
        }
        $m++;
        $c--;
    }
    $a=array_count_values($his_tag);
    arsort($a);
    $key=array(null,null,null,null,null);
    $value=array(null,null,null,null,null);
    $key=array_keys($a);
    $key=array_slice($key,0,5);
    $value=array_values($a);
    $value=array_slice($value,0,5);
   return array_merge($key,$value);
}

function mysearch()
{
        global $wpdb;
        $c=get_option('spark_search_user_copy_right');
        $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
        $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM " . SS_TABLE . " WHERE `user` = '$sql'");
        $c = $articulnum;
        $textid=$wpdb->get_results("SELECT id FROM " . SS_TABLE . " WHERE `user` = '$sql'");
        $m=0;
        foreach($textid as $a){
            $textlist2[$m]=$a->id;
            $m++;
        }
        $m=0;
        $a=0;
        global $textlist3;
        global $articul;
        $articul=array(
            "数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足"
        );
        while($c>0)  //$c是该用户一共有多少搜索次数
        {
            $count=$wpdb->get_var("SELECT repeat_count FROM " . SS_TABLE . " WHERE `id` ='$textlist2[$m]'");
            //echo $count;
            while($count>=0) {
                $articul[$a] = $wpdb->get_var("SELECT keywords FROM " . SS_TABLE . " WHERE `id` ='$textlist2[$m]'");
                $count--;
                $a++;
            }
            $m++;
            $c--;
        }
        return $articul;
}

function myaskclass(){

    global $wpdb;
    global $sql;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $ask = $wpdb->get_results("SELECT `ID` FROM `wp_posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type='dwqa-question'");
    $m = 0;
    foreach ($ask as $a) {
        $asklist[$m] = $a->ID;
        $m++;
    }

    $a=0;
    $his_tag=array(
        "数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足"
    );
    $c=count($asklist);
    global $articul;
    $m=0;

    while($c>0)  //$c是该用户一共有多少提问次数
    {
        $articul.= $wpdb->get_var("SELECT post_content FROM `wp_posts` WHERE `ID` ='$asklist[$m]'");

        $m++;
        $c--;
    }
    $jiqixuexinum=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');

    $score=array("机器学习"=>$jiqixuexinum,"计算机视觉"=>$jisuanjishijuenum,"推荐系统"=>$tuijiannum,"电路分析"=>$dianlufenxinum,"单片机"=>$danpianjinum,"数字电路"=>$shuzidianlunum,"通信原理"=>$tongyuannum,"移动通信"=>$tongxinnum,"电磁波"=>$diancinum,"编程语言"=>$bianchengnum,"计算机基础"=>$jisuanjijichunum,"网络"=>$webnum);
    arsort($score);
    $key=array_keys($score);
    $key=array_slice($key,0,5);
    $value=array_values($score);
    $value=array_slice($value,0,5);
    return array_merge($key,$value);

}

function mysearchclass(){

    global $wpdb;
    global $sql;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $search = $wpdb->get_results("SELECT id FROM `wp_search_statistics` WHERE `user` = '$sql'");
    $m = 0;
    foreach ($search as $a) {
        $searchlist[$m] = $a->id;
        $m++;
    }

    $a=0;
    $his_tag=array(
        "数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足"
    );
    $c=count($searchlist);
    global $articul;
    $m=0;

    while($c>0)  //$c是该用户一共有多少搜索次数
    {
        $articul.= $wpdb->get_var("SELECT keywords FROM `wp_search_statistics` WHERE `id` ='$searchlist[$m]'");

        $m++;
        $c--;
    }
    $jiqixuexinum=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');

    $score=array("机器学习"=>$jiqixuexinum,"计算机视觉"=>$jisuanjishijuenum,"推荐系统"=>$tuijiannum,"电路分析"=>$dianlufenxinum,"单片机"=>$danpianjinum,"数字电路"=>$shuzidianlunum,"通信原理"=>$tongyuannum,"移动通信"=>$tongxinnum,"电磁波"=>$diancinum,"编程语言"=>$bianchengnum,"计算机基础"=>$jisuanjijichunum,"网络"=>$webnum);
    arsort($score);
    $key=array_keys($score);
    $key=array_slice($key,0,5);
    $value=array_values($score);
    $value=array_slice($value,0,5);
    return array_merge($key,$value);

}

function myfavoriteclass(){

    global $wpdb;
    global $sql;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $favorite = $wpdb->get_results("SELECT favorite_post_id FROM `wp_favorite` WHERE `user_id` = '$sql'");
    $m = 0;
    foreach ($favorite as $a) {
        $favoritelist[$m] = $a->favorite_post_id;
        $m++;
    }

    $a=0;
    $his_tag=array(
        "数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足"
    );
    $c=count($favoritelist);
    global $articul;
    $m=0;

    while($c>0)  //$c是该用户一共有多少收藏次数
    {
        $articul.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$favoritelist[$m]'");

        $m++;
        $c--;
    }
    $jiqixuexinum=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');

    $score=array("机器学习"=>$jiqixuexinum,"计算机视觉"=>$jisuanjishijuenum,"推荐系统"=>$tuijiannum,"电路分析"=>$dianlufenxinum,"单片机"=>$danpianjinum,"数字电路"=>$shuzidianlunum,"通信原理"=>$tongyuannum,"移动通信"=>$tongxinnum,"电磁波"=>$diancinum,"编程语言"=>$bianchengnum,"计算机基础"=>$jisuanjijichunum,"网络"=>$webnum);
    arsort($score);
    $key=array_keys($score);
    $key=array_slice($key,0,5);
    $value=array_values($score);
    $value=array_slice($value,0,5);
    return array_merge($key,$value);

}

function projectclass(){
    global $wpdb;
    global $sql;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $project=$wpdb->get_results("SELECT ID FROM `$wpdb->posts` WHERE `post_author` ='$sql' and `post_type` ='post'");
    $m = 0;
    foreach ($project as $a) {
        $projectlist[$m] = $a->ID;
        $m++;
    }
    $a=0;
    $his_tag=array(
        "数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足","数据不足"
    );
    $c=count($projectlist);
    global $articul;
    $m=0;

    while($c>0)  //$c是该用户一共有多少项目
    {
        $articul.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$projectlist[$m]'");

        $m++;
        $c--;
    }
    $jiqixuexinum=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');

    $score=array("机器学习"=>$jiqixuexinum,"计算机视觉"=>$jisuanjishijuenum,"推荐系统"=>$tuijiannum,"电路分析"=>$dianlufenxinum,"单片机"=>$danpianjinum,"数字电路"=>$shuzidianlunum,"通信原理"=>$tongyuannum,"移动通信"=>$tongxinnum,"电磁波"=>$diancinum,"编程语言"=>$bianchengnum,"计算机基础"=>$jisuanjijichunum,"网络"=>$webnum);
    arsort($score);
    $key=array_keys($score);
    $key=array_slice($key,0,5);
    $value=array_values($score);
    $value=array_slice($value,0,5);
    return array_merge($key,$value);

}

function myhistory_value()
{
    global $wpdb;

    $c = get_option('spark_search_user_copy_right');
    $sql = $wpdb->get_var("SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $registertime = $wpdb->get_var("SELECT user_registered FROM `$wpdb->users` WHERE `user_login` = '$c'");
    //$registerymd = substr($registertime, 0, 10);
    $basetime = date("Ymd", strtotime($registertime));//得到用户注册时间(基准)
    $basetimechuo=strtotime($basetime);

    $history = $wpdb->get_results("SELECT action_post_id ,action_time, action_post_type FROM `wp_user_history` WHERE `user_id` = '$sql'");
    $m = 0;
    foreach ($history as $a) {
        $historylist[$m] = $a->action_post_id;
        $historytime[$m] = $a->action_time;
        $historytype[$m] = $a->action_post_type;
        $m++;
    }

    $c = count($historylist);
    $m = 0;
    while ($c > 0) {
        $historyyear[$m] = date("Ymd", strtotime($historytime[$m]));
        $historytimechuo[$m] = strtotime($historyyear[$m]);
        $historytimeperiod[$m] = ($historytimechuo[$m] - $basetimechuo) / 86400;
        $m++;
        $c--;
    }//得到时间差数组$histoeytimeperiod

    global $article1, $article2, $article3, $article4, $article5, $article6, $article7;
    $a = 0;
    $his_tag = array(
        "数据不足", "数据不足", "数据不足", "数据不足", "数据不足", "数据不足", "数据不足", "数据不足", "数据不足", "数据不足"
    );

    $c = count($historytime);
    $b=0;

    $c=count($historytimeperiod);
    $a=$historytimeperiod[$c-1];//最近的那一次操作隔了多少天
    $timelong=array(0);
    $timelong1=array_pad($timelong,$a+1,1);//到最近那一次那一天为止，这个数组全设为0
    $timelong2=array_pad($timelong,$a+1,0);
    $timelong3=array_pad($timelong,$a+1,0);
    $timelong4=array_pad($timelong,$a+1,0);
    $timelong5=array_pad($timelong,$a+1,0);
    $timelong6=array_pad($timelong,$a+1,0);
    $timelong7=array_pad($timelong,$a+1,0);
    $timelong8=array_pad($timelong,$a+1,0);
    $timelong9=array_pad($timelong,$a+1,0);
    $timelong10=array_pad($timelong,$a+1,2);
    $timelong11=array_pad($timelong,$a+1,0);
    $timelong12=array_pad($timelong,$a+1,0);

    $m=0;
    $jiqixuexi=0;$jisuanjishijue=0;$tuijian=0;$danpianji=0;$dianlufenxi=0;$shuzidianlu=0;
    $tongyuan=0;$tongxin=0;$dianci=0;$biancheng=0;$jisuanjijichu=0;$web=0;

    while ($c > 0) {
        if($m == 0){
            switch ($historytype[$m]) {
                case "anwser":
                    $article1.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$m]'");
                    break;
                case "ask":
                    $article2.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$m]'");
                    break;
                case "browse":
                    $article3.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$m]'");
                    break;
                case "comment":
                    $article4.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$m]'");
                    break;
                case "publish":
                    $article5.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$m]'");
                    break;
                case "reply":
                    $article6.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$m]'");
                    break;
                default;

            }
        }
        else if($m>0) {
            $n=$m;
            while ($n < count($historytimeperiod)){
                if ($historytimeperiod[$n] == $historytimeperiod[$n - 1]) {
                    switch ($historytype[$n]) {
                        case "anwser":
                            $article1.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$n]'");
                            break;
                        case "ask":
                            $article2.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$n]'");
                            break;
                        case "browse":
                            $article3.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$n]'");
                            break;
                        case "comment":
                            $article4.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$n]'");
                            break;
                        case "publish":
                            $article5.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$n]'");
                            break;
                        case "reply":
                            $article6.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$historylist[$n]'");
                            break;
                        default;

                    }
                }
                $n++;
            }
        }

        $jiqixuexinum1 = substr_count($article1, '聚类') + substr_count($article1, '算法') + substr_count($article1, '贝叶斯') + substr_count($article1, '神经网络') + substr_count($article1, '决策树');
        $jiqixuexinum2 = substr_count($article2, '聚类') + substr_count($article2, '算法') + substr_count($article2, '贝叶斯') + substr_count($article2, '神经网络') + substr_count($article2, '决策树');
        $jiqixuexinum3 = substr_count($article3, '聚类') + substr_count($article3, '算法') + substr_count($article3, '贝叶斯') + substr_count($article3, '神经网络') + substr_count($article3, '决策树');
        $jiqixuexinum4 = substr_count($article4, '聚类') + substr_count($article4, '算法') + substr_count($article4, '贝叶斯') + substr_count($article4, '神经网络') + substr_count($article4, '决策树');
        $jiqixuexinum5 = substr_count($article5, '聚类') + substr_count($article5, '算法') + substr_count($article5, '贝叶斯') + substr_count($article5, '神经网络') + substr_count($article5, '决策树');
        $jiqixuexinum6 = substr_count($article6, '聚类') + substr_count($article6, '算法') + substr_count($article6, '贝叶斯') + substr_count($article6, '神经网络') + substr_count($article6, '决策树');

        $jisuanjishijuenum1 = substr_count($article1, '图像') + substr_count($article1, '识别') + substr_count($article1, '监督') + substr_count($article1, '特征');
        $jisuanjishijuenum2 = substr_count($article2, '图像') + substr_count($article2, '识别') + substr_count($article2, '监督') + substr_count($article2, '特征');
        $jisuanjishijuenum3 = substr_count($article3, '图像') + substr_count($article3, '识别') + substr_count($article3, '监督') + substr_count($article3, '特征');
        $jisuanjishijuenum4 = substr_count($article4, '图像') + substr_count($article4, '识别') + substr_count($article4, '监督') + substr_count($article4, '特征');
        $jisuanjishijuenum5 = substr_count($article5, '图像') + substr_count($article5, '识别') + substr_count($article5, '监督') + substr_count($article5, '特征');
        $jisuanjishijuenum6 = substr_count($article6, '图像') + substr_count($article6, '识别') + substr_count($article6, '监督') + substr_count($article6, '特征');

        $tuijiannum1 = substr_count($article1, '用户') + substr_count($article1, '属性') + substr_count($article1, '冷启动') + substr_count($article1, '推荐') + substr_count($article1, '画像');
        $tuijiannum2 = substr_count($article2, '用户') + substr_count($article2, '属性') + substr_count($article2, '冷启动') + substr_count($article2, '推荐') + substr_count($article2, '画像');
        $tuijiannum3 = substr_count($article3, '用户') + substr_count($article3, '属性') + substr_count($article3, '冷启动') + substr_count($article3, '推荐') + substr_count($article3, '画像');
        $tuijiannum4 = substr_count($article4, '用户') + substr_count($article4, '属性') + substr_count($article4, '冷启动') + substr_count($article4, '推荐') + substr_count($article4, '画像');
        $tuijiannum5 = substr_count($article5, '用户') + substr_count($article5, '属性') + substr_count($article5, '冷启动') + substr_count($article5, '推荐') + substr_count($article5, '画像');
        $tuijiannum6 = substr_count($article6, '用户') + substr_count($article6, '属性') + substr_count($article6, '冷启动') + substr_count($article6, '推荐') + substr_count($article6, '画像');

        $danpianjinum1 = substr_count($article1, '引脚') + substr_count($article1, 'mCookie') + substr_count($article1, 'Arduino') + substr_count($article1, 'pin') + substr_count($article1, '串口') + substr_count($article1, '单片机') + substr_count($article1, 'led');
        $danpianjinum2 = substr_count($article2, '引脚') + substr_count($article2, 'mCookie') + substr_count($article2, 'Arduino') + substr_count($article2, 'pin') + substr_count($article2, '串口') + substr_count($article2, '单片机') + substr_count($article2, 'led');
        $danpianjinum3 = substr_count($article3, '引脚') + substr_count($article3, 'mCookie') + substr_count($article3, 'Arduino') + substr_count($article3, 'pin') + substr_count($article3, '串口') + substr_count($article3, '单片机') + substr_count($article3, 'led');
        $danpianjinum4 = substr_count($article4, '引脚') + substr_count($article4, 'mCookie') + substr_count($article4, 'Arduino') + substr_count($article4, 'pin') + substr_count($article4, '串口') + substr_count($article4, '单片机') + substr_count($article4, 'led');
        $danpianjinum5 = substr_count($article5, '引脚') + substr_count($article5, 'mCookie') + substr_count($article5, 'Arduino') + substr_count($article5, 'pin') + substr_count($article5, '串口') + substr_count($article5, '单片机') + substr_count($article5, 'led');
        $danpianjinum6 = substr_count($article6, '引脚') + substr_count($article6, 'mCookie') + substr_count($article6, 'Arduino') + substr_count($article6, 'pin') + substr_count($article6, '串口') + substr_count($article6, '单片机') + substr_count($article6, 'led');

        $dianlufenxinum1 = substr_count($article1, '电路') + substr_count($article1, '电流') + substr_count($article1, '电阻') + substr_count($article1, '戴维南') + substr_count($article1, '电极') + substr_count($article1, '等效');
        $dianlufenxinum2 = substr_count($article2, '电路') + substr_count($article2, '电流') + substr_count($article2, '电阻') + substr_count($article2, '戴维南') + substr_count($article2, '电极') + substr_count($article2, '等效');
        $dianlufenxinum3 = substr_count($article3, '电路') + substr_count($article3, '电流') + substr_count($article3, '电阻') + substr_count($article3, '戴维南') + substr_count($article3, '电极') + substr_count($article3, '等效');
        $dianlufenxinum4 = substr_count($article4, '电路') + substr_count($article4, '电流') + substr_count($article4, '电阻') + substr_count($article4, '戴维南') + substr_count($article4, '电极') + substr_count($article4, '等效');
        $dianlufenxinum5 = substr_count($article5, '电路') + substr_count($article5, '电流') + substr_count($article5, '电阻') + substr_count($article5, '戴维南') + substr_count($article5, '电极') + substr_count($article5, '等效');
        $dianlufenxinum6 = substr_count($article6, '电路') + substr_count($article6, '电流') + substr_count($article6, '电阻') + substr_count($article6, '戴维南') + substr_count($article6, '电极') + substr_count($article6, '等效');

        $shuzidianlunum1 = substr_count($article1, 'MOS') + substr_count($article1, '半导体') + substr_count($article1, '三极管') + substr_count($article1, '电平') + substr_count($article1, '译码器') + substr_count($article1, '场效应管');
        $shuzidianlunum2 = substr_count($article2, 'MOS') + substr_count($article2, '半导体') + substr_count($article2, '三极管') + substr_count($article2, '电平') + substr_count($article2, '译码器') + substr_count($article2, '场效应管');
        $shuzidianlunum3 = substr_count($article3, 'MOS') + substr_count($article3, '半导体') + substr_count($article3, '三极管') + substr_count($article3, '电平') + substr_count($article3, '译码器') + substr_count($article3, '场效应管');
        $shuzidianlunum4 = substr_count($article4, 'MOS') + substr_count($article4, '半导体') + substr_count($article4, '三极管') + substr_count($article4, '电平') + substr_count($article4, '译码器') + substr_count($article4, '场效应管');
        $shuzidianlunum5 = substr_count($article5, 'MOS') + substr_count($article5, '半导体') + substr_count($article5, '三极管') + substr_count($article5, '电平') + substr_count($article5, '译码器') + substr_count($article5, '场效应管');
        $shuzidianlunum6 = substr_count($article6, 'MOS') + substr_count($article6, '半导体') + substr_count($article6, '三极管') + substr_count($article6, '电平') + substr_count($article6, '译码器') + substr_count($article6, '场效应管');

        $tongyuannum1 = substr_count($article1, '卷积') + substr_count($article1, '互信息') + substr_count($article1, '傅里叶') + substr_count($article1, '傅立叶')
            + substr_count($article1, '信道') + substr_count($article1, '信源') + substr_count($article1, '香农') + substr_count($article1, '噪声')
            + substr_count($article1, '滤波') + substr_count($article1, 'IIR') + substr_count($article1, '量化') + substr_count($article1, 'FIR') + substr_count($article1, '载波');
        $tongyuannum2 = substr_count($article2, '卷积') + substr_count($article2, '互信息') + substr_count($article2, '傅里叶') + substr_count($article2, '傅立叶')
            + substr_count($article2, '信道') + substr_count($article2, '信源') + substr_count($article2, '香农') + substr_count($article2, '噪声')
            + substr_count($article2, '滤波') + substr_count($article2, 'IIR') + substr_count($article2, '量化') + substr_count($article2, 'FIR') + substr_count($article2, '载波');
        $tongyuannum3 = substr_count($article3, '卷积') + substr_count($article3, '互信息') + substr_count($article3, '傅里叶') + substr_count($article3, '傅立叶')
            + substr_count($article3, '信道') + substr_count($article3, '信源') + substr_count($article3, '香农') + substr_count($article3, '噪声')
            + substr_count($article3, '滤波') + substr_count($article3, 'IIR') + substr_count($article3, '量化') + substr_count($article3, 'FIR') + substr_count($article3, '载波');
        $tongyuannum4 = substr_count($article4, '卷积') + substr_count($article4, '互信息') + substr_count($article4, '傅里叶') + substr_count($article4, '傅立叶')
            + substr_count($article4, '信道') + substr_count($article4, '信源') + substr_count($article4, '香农') + substr_count($article4, '噪声')
            + substr_count($article4, '滤波') + substr_count($article4, 'IIR') + substr_count($article4, '量化') + substr_count($article4, 'FIR') + substr_count($article4, '载波');
        $tongyuannum5 = substr_count($article5, '卷积') + substr_count($article5, '互信息') + substr_count($article5, '傅里叶') + substr_count($article5, '傅立叶')
            + substr_count($article5, '信道') + substr_count($article5, '信源') + substr_count($article5, '香农') + substr_count($article5, '噪声')
            + substr_count($article5, '滤波') + substr_count($article5, 'IIR') + substr_count($article5, '量化') + substr_count($article5, 'FIR') + substr_count($article5, '载波');
        $tongyuannum6 = substr_count($article6, '卷积') + substr_count($article6, '互信息') + substr_count($article6, '傅里叶') + substr_count($article6, '傅立叶')
            + substr_count($article6, '信道') + substr_count($article6, '信源') + substr_count($article6, '香农') + substr_count($article6, '噪声')
            + substr_count($article6, '滤波') + substr_count($article6, 'IIR') + substr_count($article6, '量化') + substr_count($article6, 'FIR') + substr_count($article6, '载波');

        $tongxinnum1 = substr_count($article1, '以太网') + substr_count($article1, '衰落') + substr_count($article1, '复用') + substr_count($article1, 'GSM') + substr_count($article1, '4G') + substr_count($article1, '5G') + substr_count($article1, '蜂窝') + substr_count($article1, '基站')
            + substr_count($article1, '多径') + substr_count($article1, '扩频');
        $tongxinnum2 = substr_count($article2, '以太网') + substr_count($article2, '衰落') + substr_count($article2, '复用') + substr_count($article2, 'GSM') + substr_count($article2, '4G') + substr_count($article2, '5G') + substr_count($article2, '蜂窝') + substr_count($article2, '基站')
            + substr_count($article2, '多径') + substr_count($article2, '扩频');
        $tongxinnum3 = substr_count($article3, '以太网') + substr_count($article3, '衰落') + substr_count($article3, '复用') + substr_count($article3, 'GSM') + substr_count($article3, '4G') + substr_count($article3, '5G') + substr_count($article3, '蜂窝') + substr_count($article3, '基站')
            + substr_count($article3, '多径') + substr_count($article3, '扩频');
        $tongxinnum4 = substr_count($article4, '以太网') + substr_count($article4, '衰落') + substr_count($article4, '复用') + substr_count($article4, 'GSM') + substr_count($article4, '4G') + substr_count($article4, '5G') + substr_count($article4, '蜂窝') + substr_count($article4, '基站')
            + substr_count($article4, '多径') + substr_count($article4, '扩频');
        $tongxinnum5 = substr_count($article5, '以太网') + substr_count($article5, '衰落') + substr_count($article5, '复用') + substr_count($article5, 'GSM') + substr_count($article5, '4G') + substr_count($article5, '5G') + substr_count($article5, '蜂窝') + substr_count($article5, '基站')
            + substr_count($article5, '多径') + substr_count($article5, '扩频');
        $tongxinnum6 = substr_count($article6, '以太网') + substr_count($article6, '衰落') + substr_count($article6, '复用') + substr_count($article6, 'GSM') + substr_count($article6, '4G') + substr_count($article6, '5G') + substr_count($article6, '蜂窝') + substr_count($article6, '基站')
            + substr_count($article6, '多径') + substr_count($article6, '扩频');

        $diancinum1 = substr_count($article1, '电荷') + substr_count($article1, '磁场') + substr_count($article1, '线圈') + substr_count($article1, '电势') + substr_count($article1, '麦克斯韦') + substr_count($article1, '通量') + substr_count($article1, '库伦');
        $diancinum2 = substr_count($article2, '电荷') + substr_count($article2, '磁场') + substr_count($article2, '线圈') + substr_count($article2, '电势') + substr_count($article2, '麦克斯韦') + substr_count($article2, '通量') + substr_count($article2, '库伦');
        $diancinum3 = substr_count($article3, '电荷') + substr_count($article3, '磁场') + substr_count($article3, '线圈') + substr_count($article3, '电势') + substr_count($article3, '麦克斯韦') + substr_count($article3, '通量') + substr_count($article3, '库伦');
        $diancinum4 = substr_count($article4, '电荷') + substr_count($article4, '磁场') + substr_count($article4, '线圈') + substr_count($article4, '电势') + substr_count($article4, '麦克斯韦') + substr_count($article4, '通量') + substr_count($article4, '库伦');
        $diancinum5 = substr_count($article5, '电荷') + substr_count($article5, '磁场') + substr_count($article5, '线圈') + substr_count($article5, '电势') + substr_count($article5, '麦克斯韦') + substr_count($article5, '通量') + substr_count($article5, '库伦');
        $diancinum6 = substr_count($article6, '电荷') + substr_count($article6, '磁场') + substr_count($article6, '线圈') + substr_count($article6, '电势') + substr_count($article6, '麦克斯韦') + substr_count($article6, '通量') + substr_count($article6, '库伦');

        $bianchengnum1 = substr_count($article1, '指针') + substr_count($article1, '变量') + substr_count($article1, '类型') + substr_count($article1, '数组') + substr_count($article1, 'PHP') + substr_count($article1, 'php') + substr_count($article1, 'Pyhton') + substr_count($article1, 'python')
            + substr_count($article1, 'html') + substr_count($article1, 'Html') + substr_count($article1, 'js') + substr_count($article1, 'JS') + substr_count($article1, 'javascript') + substr_count($article1, 'css') + substr_count($article1, 'chart');
        $bianchengnum2 = substr_count($article2, '指针') + substr_count($article2, '变量') + substr_count($article2, '类型') + substr_count($article2, '数组') + substr_count($article2, 'PHP') + substr_count($article2, 'php') + substr_count($article2, 'Pyhton') + substr_count($article2, 'python')
            + substr_count($article2, 'html') + substr_count($article2, 'Html') + substr_count($article2, 'js') + substr_count($article2, 'JS') + substr_count($article2, 'javascript') + substr_count($article2, 'css') + substr_count($article2, 'chart');
        $bianchengnum3 = substr_count($article3, '指针') + substr_count($article3, '变量') + substr_count($article3, '类型') + substr_count($article3, '数组') + substr_count($article3, 'PHP') + substr_count($article3, 'php') + substr_count($article3, 'Pyhton') + substr_count($article3, 'python')
            + substr_count($article3, 'html') + substr_count($article3, 'Html') + substr_count($article3, 'js') + substr_count($article3, 'JS') + substr_count($article3, 'javascript') + substr_count($article3, 'css') + substr_count($article3, 'chart');
        $bianchengnum4 = substr_count($article4, '指针') + substr_count($article4, '变量') + substr_count($article4, '类型') + substr_count($article4, '数组') + substr_count($article4, 'PHP') + substr_count($article4, 'php') + substr_count($article4, 'Pyhton') + substr_count($article4, 'python')
            + substr_count($article4, 'html') + substr_count($article4, 'Html') + substr_count($article4, 'js') + substr_count($article4, 'JS') + substr_count($article4, 'javascript') + substr_count($article4, 'css') + substr_count($article4, 'chart');
        $bianchengnum5 = substr_count($article5, '指针') + substr_count($article5, '变量') + substr_count($article5, '类型') + substr_count($article5, '数组') + substr_count($article5, 'PHP') + substr_count($article5, 'php') + substr_count($article5, 'Pyhton') + substr_count($article5, 'python')
            + substr_count($article5, 'html') + substr_count($article5, 'Html') + substr_count($article5, 'js') + substr_count($article5, 'JS') + substr_count($article5, 'javascript') + substr_count($article5, 'css') + substr_count($article5, 'chart');
        $bianchengnum6 = substr_count($article6, '指针') + substr_count($article6, '变量') + substr_count($article6, '类型') + substr_count($article6, '数组') + substr_count($article6, 'PHP') + substr_count($article6, 'php') + substr_count($article6, 'Pyhton') + substr_count($article6, 'python')
            + substr_count($article6, 'html') + substr_count($article6, 'Html') + substr_count($article6, 'js') + substr_count($article6, 'JS') + substr_count($article6, 'javascript') + substr_count($article6, 'css') + substr_count($article6, 'chart');

        $jisuanjijichunum1 = substr_count($article1, '操作系统') + substr_count($article1, 'Linux') + substr_count($article1, 'DOS') + substr_count($article1, '微软') + substr_count($article1, 'CPU') + substr_count($article1, '磁场');
        $jisuanjijichunum2 = substr_count($article2, '操作系统') + substr_count($article2, 'Linux') + substr_count($article2, 'DOS') + substr_count($article2, '微软') + substr_count($article2, 'CPU') + substr_count($article2, '磁场');
        $jisuanjijichunum3 = substr_count($article3, '操作系统') + substr_count($article3, 'Linux') + substr_count($article3, 'DOS') + substr_count($article3, '微软') + substr_count($article3, 'CPU') + substr_count($article3, '磁场');
        $jisuanjijichunum4 = substr_count($article4, '操作系统') + substr_count($article4, 'Linux') + substr_count($article4, 'DOS') + substr_count($article4, '微软') + substr_count($article4, 'CPU') + substr_count($article4, '磁场');
        $jisuanjijichunum5 = substr_count($article5, '操作系统') + substr_count($article5, 'Linux') + substr_count($article5, 'DOS') + substr_count($article5, '微软') + substr_count($article5, 'CPU') + substr_count($article5, '磁场');
        $jisuanjijichunum6 = substr_count($article6, '操作系统') + substr_count($article6, 'Linux') + substr_count($article6, 'DOS') + substr_count($article6, '微软') + substr_count($article6, 'CPU') + substr_count($article6, '磁场');

        $webnum1 = substr_count($article1, '路由器') + substr_count($article1, '网络拓扑') + substr_count($article1, 'OSPFv2') + substr_count($article1, 'SFC') + substr_count($article1, '组播');
        $webnum2 = substr_count($article2, '路由器') + substr_count($article2, '网络拓扑') + substr_count($article2, 'OSPFv2') + substr_count($article2, 'SFC') + substr_count($article2, '组播');
        $webnum3 = substr_count($article3, '路由器') + substr_count($article3, '网络拓扑') + substr_count($article3, 'OSPFv2') + substr_count($article3, 'SFC') + substr_count($article3, '组播');
        $webnum4 = substr_count($article4, '路由器') + substr_count($article4, '网络拓扑') + substr_count($article4, 'OSPFv2') + substr_count($article4, 'SFC') + substr_count($article4, '组播');
        $webnum5 = substr_count($article5, '路由器') + substr_count($article5, '网络拓扑') + substr_count($article5, 'OSPFv2') + substr_count($article5, 'SFC') + substr_count($article5, '组播');
        $webnum6 = substr_count($article6, '路由器') + substr_count($article6, '网络拓扑') + substr_count($article6, 'OSPFv2') + substr_count($article6, 'SFC') + substr_count($article6, '组播');

        $jiqixuexi = $jiqixuexinum1 * 0.2 + $jiqixuexinum2 * 0.1 + $jiqixuexinum3 * 0.1 + $jiqixuexinum4 * 0.2 + $jiqixuexinum5 * 0.3 + $jiqixuexinum6 * 0.1;
        $jisuanjishijue = $jisuanjishijuenum1 * 0.2 + $jisuanjishijuenum2 * 0.1 + $jisuanjishijuenum3 * 0.1 + $jisuanjishijuenum4 * 0.2 + $jisuanjishijuenum5 * 0.3 + $jisuanjishijuenum6 * 0.1;
        $tuijian = $tuijiannum1 * 0.2 + $tuijiannum2 * 0.1 + $tuijiannum3 * 0.1 + $tuijiannum4 * 0.2 + $tuijiannum5 * 0.3 + $tuijiannum6 * 0.1;
        $danpianji = $danpianjinum1 * 0.2 + $danpianjinum2 * 0.1 + $danpianjinum3 * 0.1 + $danpianjinum4 * 0.2 + $danpianjinum5 * 0.3 + $danpianjinum6 * 0.1;
        $dianlufenxi = $dianlufenxinum1 * 0.2 + $dianlufenxinum2 * 0.1 + $dianlufenxinum3 * 0.1 + $dianlufenxinum4 * 0.2 + $dianlufenxinum5 * 0.3 + $dianlufenxinum6 * 0.1;
        $shuzidianlu = $shuzidianlunum1 * 0.2 + $shuzidianlunum2 * 0.1 + $shuzidianlunum3 * 0.1 + $shuzidianlunum4 * 0.2 + $shuzidianlunum5 * 0.3 + $shuzidianlunum6 * 0.1;
        $tongyuan = $tongyuannum1 * 0.2 + $tongyuannum2 * 0.1 + $tongyuannum3 * 0.1 + $tongyuannum4 * 0.2 + $tongyuannum5 * 0.3 + $tongyuannum6 * 0.1;
        $tongxin = $tongxinnum1 * 0.2 + $tongxinnum2 * 0.1 + $tongxinnum3 * 0.1 + $tongxinnum4 * 0.2 + $tongxinnum5 * 0.3 + $tongxinnum6 * 0.1;
        $dianci = $diancinum1 * 0.2 + $diancinum2 * 0.1 + $diancinum3 * 0.1 + $diancinum4 * 0.2 + $diancinum5 * 0.3 + $diancinum6 * 0.1;
        $biancheng = $bianchengnum1 * 0.2 + $bianchengnum2 * 0.1 + $bianchengnum3 * 0.1 + $bianchengnum4 * 0.2 + $bianchengnum5 * 0.3 + $bianchengnum6 * 0.1;
        $jisuanjijichu = $jisuanjijichunum1 * 0.2 + $jisuanjijichunum2 * 0.1 + $jisuanjijichunum3 * 0.1 + $jisuanjijichunum4 * 0.2 + $jisuanjijichunum5 * 0.3 + $jisuanjijichunum6 * 0.1;
        $web = $webnum1 * 0.2 + $webnum2 * 0.1 + $webnum3 * 0.1 + $webnum4 * 0.2 + $webnum5 * 0.3 + $webnum6 * 0.1;

        $jiqixuexivalue[$m] = array($jiqixuexi,$historyyear[$m]);
        $jisuanjishijuevalue[$m] = array($jisuanjishijue,$historyyear[$m]);
        $tuijianvalue[$m] =array($tuijian,$historyyear[$m]);
        $danpianjivalue[$m] = array($danpianji,$historyyear[$m]);
        $dianlufenxivalue[$m] = array($dianlufenxi,$historyyear[$m]);
        $shuzidianluvalue[$m] = array($shuzidianlu,$historyyear[$m]);
        $tongyuanvalue[$m] = array($tongyuan,$historyyear[$m]);
        $tongxinvalue[$m] = array($tongxin,$historyyear[$m]);
        $diancivalue[$m] = array($dianci,$historyyear[$m]);
        $bianchengvalue[$m] = array($biancheng,$historyyear[$m]);
        $jisuanjijichuvalue[$m] = array($jisuanjijichu,$historyyear[$m]);
        $webvalue[$m] = array($web,$historyyear[$m]);

        $timelong1=myarr($historytimeperiod[$m], $a+1, $jiqixuexi, $timelong1);
        $timelong2=myarr($historytimeperiod[$m], $a+1, $jisuanjishijue, $timelong2);
        $timelong3=myarr($historytimeperiod[$m], $a+1, $tuijian, $timelong3);
        $timelong4=myarr($historytimeperiod[$m], $a+1, $danpianji, $timelong4);
        $timelong5=myarr($historytimeperiod[$m], $a+1, $dianlufenxi, $timelong5);
        $timelong6=myarr($historytimeperiod[$m], $a+1, $shuzidianlu, $timelong6);
        $timelong7=myarr($historytimeperiod[$m], $a+1, $tongyuan, $timelong7);
        $timelong8=myarr($historytimeperiod[$m], $a+1, $tongxin, $timelong8);
        $timelong9=myarr($historytimeperiod[$m], $a+1, $dianci, $timelong9);
        $timelong10=myarr($historytimeperiod[$m], $a+1, $biancheng, $timelong10);
        $timelong11=myarr($historytimeperiod[$m], $a+1, $jisuanjijichu, $timelong11);
        $timelong12=myarr($historytimeperiod[$m], $a+1, $web, $timelong12);

        $c--;
        $m++;
    }


    //return $value=array($jiqixuexivalue, $jisuanjishijuevalue, $tuijianvalue, $danpianjivalue, $dianlufenxivalue, $shuzidianluvalue, $tongyuanvalue, $tongxinvalue, $diancivalue,
      // $bianchengvalue, $jisuanjijichuvalue, $webvalue);

    return $value=array($timelong1, $timelong2, $timelong3, $timelong4, $timelong5, $timelong6, $timelong7, $timelong8, $timelong9,
                         $timelong10, $timelong11, $timelong12);

}

function myarr($start, $long, $value, $array){
    $m=0;
    $long=$long-$start;
    while ($long>0){
        $array[$start+$m]=$value;
        $m++;
        $long--;
    }
    return $array;
}