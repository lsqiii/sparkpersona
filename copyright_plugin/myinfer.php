<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 20:09
 */
header("Content-type:text/html;charset=utf-8");
wp_register_style('fep-style', plugins_url('bootstrap.min.css', __FILE__), array(), '1.6', 'all');
wp_register_style('datepicker-style', plugins_url('dateRange.css', __FILE__), array(), '1.6', 'all');
wp_register_style('main-style', plugins_url('main.css', __FILE__), array(), '1.0', 'all');
wp_register_style('table-style', plugins_url('table.css', __FILE__), array(), '1.6', 'all');
wp_register_style('user-style', plugins_url('user.css', __FILE__), array(), '1.6', 'all');
wp_register_style('tag-style', plugins_url('tagcloud.css', __FILE__), array(), '1.6', 'all');
wp_register_script("jquery-script", plugins_url('js/jquery-3.2.1.js', __FILE__), array('jquery'));
wp_register_script("date-script", plugins_url('js/dateRange.js', __FILE__), array('jquery'));
wp_register_script("tag-script", plugins_url('js/tagcloud.min.js', __FILE__), array('jquery'));
wp_register_script("ui-script", plugins_url('js/jquery-ui.js', __FILE__), array('jquery'));
wp_register_script("time-script", plugins_url('js/active.js', __FILE__), array('jquery'));
wp_register_script("fep-script", plugins_url('js/bootstrap.min.js', __FILE__), array('jquery'));
wp_register_script("collapse-script", plugins_url('js/collapse.js', __FILE__), array('jquery'));
wp_register_script("high-script", plugins_url('js/highcharts.js', __FILE__), array('jquery'));
wp_register_script("highm-script", plugins_url('js/highcharts-more.js', __FILE__), array('jquery'));
//wp_register_script("increment-script", plugins_url('js/user_increment.js', __FILE__),array('jquery'));
wp_register_script("transition-script", plugins_url('js/transition.js', __FILE__), array('jquery'));
if ( is_admin() ) {
    wp_enqueue_script("jquery-script");
    wp_enqueue_script("fep-script");

    wp_enqueue_script("tag-script");
    wp_enqueue_script("time-script");
    wp_enqueue_script("high-script");
    wp_enqueue_script("transition-script");
    wp_enqueue_script("highm-script");
//    wp_enqueue_script("increment-script");
    wp_enqueue_script("collapse-script");
    wp_enqueue_script("date-script");
    wp_enqueue_script("ui-script");

    wp_enqueue_style('fep-style');
    wp_enqueue_style('datepicker-style');
    wp_enqueue_style('main-style');
    wp_enqueue_style('table-style');
    wp_enqueue_style('user-style');
    wp_enqueue_style('tag-style');
}
//require_once('mymodel_drawing.php');
require_once ('myuserhistory.php');
//require_once ('myall_rank.php');

function mygetinterest(){
    global $wpdb;
    //编辑模块
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts`WHERE `post_author` = '$sql'and post_status='publish' and post_type='post'");
    $c = $articulnum;
    $textid=$wpdb->get_results("SELECT ID FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type='post'");
    $m=0;
    foreach($textid as $a){
        $textlist2[$m]=$a->ID;
        $m++;
    }
    $m=0;
    global $textlist3;
    global $articul;
    $articul=0;
    while($c>0)  //$c是该用户一共有多少条编辑次数
    {
        $articul.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$textlist2[$m]'");
        //echo $articultext;
        $m++;
        $c--;
    }
    $jiqixuexinum1=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum1=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum1=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum1=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum1=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum1=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum1=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum1=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum1=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum1=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum1=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum1=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');


    //回答模块
    ////

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts`WHERE `post_author` = '$sql'and post_status='publish' and post_type='dwqa_answer'");
    $c = $articulnum;
    $textid=$wpdb->get_results("SELECT ID,post_parent FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type='dwqa_answer'");
    $m=0;
    foreach($textid as $a){
        $textlist2[$m]=$a->ID;
        $textlist3[$m]=$a->post_parent;
        $m++;
    }
    $m=0;
    global $textlist3;
    global $articul;
    $articul=0;
    while($c>0)  //$c是该用户一共有多少条编辑次数
    {
        $articul.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$textlist2[$m]'");
        $articul.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$textlist3[$m]'");
        //echo $articultext;
        $m++;
        $c--;
    }
    $jiqixuexinum2=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum2=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum2=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum2=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum2=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum2=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum2=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum2=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum2=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum2=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum2=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum2=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');
    //计算加权值
    global $jiqixuexicount,$jisuanjishijuecount,$tuijiancount,$danpianjicount,$dianlufenxicount,$shuzidianlucount,$tongyuancount,$tongxincount,$diancicount,
           $bianchengcount,$jisuanjijichucount,$webcount;
    $jiqixuexicount=$jiqixuexinum1*0.3+$jiqixuexinum2;
    $jisuanjishijuecount=$jisuanjishijuenum1*0.3+$jisuanjishijuenum2;
    $tuijiancount=$tuijiannum1*0.3+$tuijiannum2;
    $dianlufenxicount=$dianlufenxinum1*0.3+$dianlufenxinum2;
    $danpianjicount=$danpianjinum1*0.3+$danpianjinum2;
    $shuzidianlucount=$shuzidianlunum1*0.3+$shuzidianlunum2;
    $tongyuancount=$tongyuannum1*0.3+$tongyuannum2;
    $tongxincount=$tongxinnum1*0.3+$tongxinnum2;
    $diancicount=$diancinum1*0.3+$diancinum2;
    $bianchengcount=$bianchengnum1*0.3+$bianchengnum2;
    $jisuanjijichucount=$jisuanjijichunum1*0.3+$jisuanjijichunum2;
    $webcount=$webnum1*0.3+$webnum2;

    return $score="$jiqixuexicount,$jisuanjishijuecount,$tuijiancount,$dianlufenxicount,$danpianjicount,$shuzidianlucount,$tongyuancount,$tongxincount,$diancicount,$bianchengcount,$jisuanjijichucount,$webcount";

}
function mygetdesire(){
    global $wpdb;
    //问题模块
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts`WHERE `post_author` = '$sql'and post_status='publish' and post_type='dwqa-question'");
    $c = $articulnum;

    $textid=$wpdb->get_results("SELECT ID FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type='dwqa-question'");
    $m=0;
    foreach($textid as $a){
        $textlist2[$m]=$a->ID;
        $m++;
    }
    $m=0;
    global $textlist3;
    global $articul;
    $articul=0;
    while($c>0)  //$c是该用户一共有多少条编辑次数
    {
        $articul.= $wpdb->get_var("SELECT post_content FROM `$wpdb->posts` WHERE `ID` ='$textlist2[$m]'");
        //echo $articultext;
        $m++;
        $c--;
    }
    $jiqixuexinum1=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum1=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum1=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum1=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum1=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum1=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum1=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum1=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum1=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum1=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum1=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum1=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');


    //搜索模块
    ////

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM " . SS_TABLE . " WHERE `user` = '$sql'");
    $c = $articulnum;
    $textid=$wpdb->get_results("SELECT id FROM " . SS_TABLE . " WHERE `user` = '$sql'");
    $m=0;
    foreach($textid as $a){
        $textlist2[$m]=$a->id;
        $m++;
    }

    $m=0;
    global $textlist3;
    global $articul;
    $articul=0;
    while($c>0)  //$c是该用户一共有多少条编辑次数
    {
        $count=$wpdb->get_var("SELECT repeat_count FROM " . SS_TABLE . " WHERE `id` ='$textlist2[$m]'");
        //echo $count;
        while($count>=0)
        {
            $articul.= $wpdb->get_var("SELECT keywords FROM " . SS_TABLE . " WHERE `id` ='$textlist2[$m]'");
            $count--;
        }

        $m++;
        $c--;
    }
    //echo $articul;
    $jiqixuexinum2=substr_count($articul,'聚类')+substr_count($articul,'算法')+substr_count($articul,'贝叶斯')+substr_count($articul,'神经网络')+substr_count($articul,'决策树');
    $jisuanjishijuenum2=substr_count($articul,'图像')+substr_count($articul,'识别')+substr_count($articul,'监督')+substr_count($articul,'特征');
    $tuijiannum2=substr_count($articul,'用户')+substr_count($articul,'属性')+substr_count($articul,'冷启动')+substr_count($articul,'推荐')+substr_count($articul,'画像');
    $danpianjinum2=substr_count($articul,'引脚')+substr_count($articul,'mCookie')+substr_count($articul,'Arduino')+substr_count($articul,'pin')+substr_count($articul,'串口')+substr_count($articul,'单片机')+substr_count($articul,'led');
    $dianlufenxinum2=substr_count($articul,'电路')+substr_count($articul,'电流')+substr_count($articul,'电阻')+substr_count($articul,'戴维南')+substr_count($articul,'电极')+substr_count($articul,'等效');
    $shuzidianlunum2=substr_count($articul,'MOS')+substr_count($articul,'半导体')+substr_count($articul,'三极管')+substr_count($articul,'电平')+substr_count($articul,'译码器')+substr_count($articul,'场效应管');
    $tongyuannum2=substr_count($articul,'卷积')+substr_count($articul,'互信息')+substr_count($articul,'傅里叶')+substr_count($articul,'傅立叶')
        +substr_count($articul,'信道')+substr_count($articul,'信源')+substr_count($articul,'香农')+substr_count($articul,'噪声')
        +substr_count($articul,'滤波')+substr_count($articul,'IIR')+substr_count($articul,'量化')+substr_count($articul,'FIR')+substr_count($articul,'载波');
    $tongxinnum2=substr_count($articul,'以太网')+substr_count($articul,'衰落')+substr_count($articul,'复用')+substr_count($articul,'GSM')+substr_count($articul,'4G')+substr_count($articul,'5G')+substr_count($articul,'蜂窝')+substr_count($articul,'基站')
        +substr_count($articul,'多径')+substr_count($articul,'扩频');
    $diancinum2=substr_count($articul,'电荷')+substr_count($articul,'磁场')+substr_count($articul,'线圈')+substr_count($articul,'电势')+substr_count($articul,'麦克斯韦')+substr_count($articul,'通量')+substr_count($articul,'库伦');
    $bianchengnum2=substr_count($articul,'指针')+substr_count($articul,'变量')+substr_count($articul,'类型')+substr_count($articul,'数组')+substr_count($articul,'PHP')+substr_count($articul,'php')+substr_count($articul,'Pyhton')+substr_count($articul,'python')
        +substr_count($articul,'html')+substr_count($articul,'Html')+substr_count($articul,'js')+substr_count($articul,'JS')+substr_count($articul,'javascript')+substr_count($articul,'css')+substr_count($articul,'chart');
    $jisuanjijichunum2=substr_count($articul,'操作系统')+substr_count($articul,'Linux')+substr_count($articul,'DOS')+substr_count($articul,'微软')+substr_count($articul,'CPU')+substr_count($articul,'磁场');
    $webnum2=substr_count($articul,'路由器')+substr_count($articul,'网络拓扑')+substr_count($articul,'OSPFv2')+substr_count($articul,'SFC')+substr_count($articul,'组播');
    global $jiqixuexicount,$jisuanjishijuecount,$tuijiancount,$danpianjicount,$dianlufenxicount,$shuzidianlucount,$tongyuancount,$tongxincount,$diancicount,
           $bianchengcount,$jisuanjijichucount,$webcount;
    $jiqixuexicount=$jiqixuexinum1*2+$jiqixuexinum2;
    $jisuanjishijuecount=$jisuanjishijuenum1*2+$jisuanjishijuenum2;
    $tuijiancount=$tuijiannum1*2+$tuijiannum2;
    $dianlufenxicount=$dianlufenxinum1*2+$dianlufenxinum2;
    $danpianjicount=$danpianjinum1*2+$danpianjinum2;
    $shuzidianlucount=$shuzidianlunum1*2+$shuzidianlunum2;
    $tongyuancount=$tongyuannum1*2+$tongyuannum2;
    $tongxincount=$tongxinnum1*2+$tongxinnum2;
    $diancicount=$diancinum1*2+$diancinum2;
    $bianchengcount=$bianchengnum1*2+$bianchengnum2;
    $jisuanjijichucount=$jisuanjijichunum1*2+$jisuanjijichunum2;
    $webcount=$webnum1*2+$webnum2;

    return $score="$jiqixuexicount,$jisuanjishijuecount,$tuijiancount,$dianlufenxicount,$danpianjicount,$shuzidianlucount,$tongyuancount,$tongxincount,$diancicount,$bianchengcount,$jisuanjijichucount,$webcount";

}
function mygood(){
    $socre=explode(",",mygetinterest());
    $jiqixuexicount=$socre[0];
    $jisuanjishijuecount=$socre[1];
    $tuijiancount=$socre[2];
    $dianlufenxicount=$socre[3];
    $danpianjicount=$socre[4];
    $shuzidianlucount=$socre[5];
    $tongyuancount=$socre[6];
    $tongxincount=$socre[7];
    $diancicount=$socre[8];
    $bianchengcount=$socre[9];
    $jisuanjijichucount=$socre[10];
    $webcount=$socre[11];
    global $wpdb;
    $jiqixuexiaverage=$wpdb->get_var( "SELECT round(avg(jiqixuexicount),2) FROM ".COUNT_TABLE." ");
    $jisuanjishijueaverage=$wpdb->get_var( "SELECT round(avg(jisuanjishijuecount),2) FROM ".COUNT_TABLE." ");
    $tuijianaverage=$wpdb->get_var( "SELECT round(avg(tuijiancount),2) FROM ".COUNT_TABLE." ");
    $dianlufenxiaverage=$wpdb->get_var( "SELECT round(avg(dianlufenxicount),2) FROM ".COUNT_TABLE." ");
    $danpianjiaverage=$wpdb->get_var( "SELECT round(avg(danpianjicount),2) FROM ".COUNT_TABLE." ");
    $shuzidianluaverage=$wpdb->get_var( "SELECT round(avg(shuzidianlucount),2) FROM ".COUNT_TABLE." ");
    $tongyuanaverage=$wpdb->get_var( "SELECT round(avg(tongyuancount),2) FROM ".COUNT_TABLE." ");
    $tongxinaverage=$wpdb->get_var( "SELECT round(avg(tongxincount),2) FROM ".COUNT_TABLE." ");
    $dianciaverage=$wpdb->get_var( "SELECT round(avg(diancicount),2) FROM ".COUNT_TABLE." ");
    $bianchengaverage=$wpdb->get_var( "SELECT round(avg(bianchengcount),2) FROM ".COUNT_TABLE." ");
    $jisuanjijichuaverage=$wpdb->get_var( "SELECT round(avg(jisuanjijichucount),2) FROM ".COUNT_TABLE." ");
    $webaverage=$wpdb->get_var( "SELECT round(avg(webcount),2) FROM ".COUNT_TABLE." ");
    $average[0]=$jiqixuexiaverage;$average[1]=$jisuanjishijueaverage;$average[2]=$tuijianaverage;$average[3]=$dianlufenxiaverage;$average[4]=$danpianjiaverage;
    $average[5]=$shuzidianluaverage;$average[6]=$tongyuanaverage;$average[7]=$tongxinaverage;$average[8]=$dianciaverage;$average[9]=$bianchengaverage;
    ;$average[10]=$jisuanjijichuaverage;$average[11]=$webaverage;
    for ($i=0;$i<12;$i++){
        if ($socre[$i]>$average[$i])
            $strength[$i]=1;
        else
            $strength[$i]=0;
    }
    $strcount=0;
    for ($i=0;$i<12;$i++){
        if ($strength[$i]==1)
            $strcount++;
    }
    $des=0;
    for ($i=0;$i<12;$i++){
        if ($socre[$i]!=0)
            $des++;
    }
    if($strcount>6)
        $return="全面大神";
    else if(3<=$strcount and $strcount<=6)
        $return="优秀人才";
    else if($strcount<=2)
        $return="还需努力";
    else if($des==0)
        $return="能力很差";
    echo $return;
}
function mygoodornot(){
    $socre=explode(",",mygetinterest());
    $jiqixuexicount=$socre[0];
    $jisuanjishijuecount=$socre[1];
    $tuijiancount=$socre[2];
    $dianlufenxicount=$socre[3];
    $danpianjicount=$socre[4];
    $shuzidianlucount=$socre[5];
    $tongyuancount=$socre[6];
    $tongxincount=$socre[7];
    $diancicount=$socre[8];
    $bianchengcount=$socre[9];
    $jisuanjijichucount=$socre[10];
    $webcount=$socre[11];
    $good = array_search(max($socre), $socre);
    $notgood=array_search(min($socre), $socre);
    switch($good)
    {   case 0:    $goodat="机器学习";    break;
        case 1:    $goodat="计算机视觉";    break;
        case 2:    $goodat="推荐系统";      break;
        case 3:    $goodat="电路分析";      break;
        case 4:    $goodat="单片机";      break;
        case 5:    $goodat="数字电路";        break;
        case 6:    $goodat="通信原理";      break;
        case 7:    $goodat="移动通信";      break;
        case 8:    $goodat="电磁波";      break;
        case 9:    $goodat="编程语言";      break;
        case 10:    $goodat="计算机基础";      break;
        case 11:    $goodat="网络";      break;
       }
    switch($notgood)
    {   case 0:    $ngoodat="机器学习";    break;
        case 1:    $ngoodat="计算机视觉";    break;
        case 2:    $ngoodat="推荐系统";      break;
        case 3:    $ngoodat="电路分析";      break;
        case 4:    $ngoodat="单片机";      break;
        case 5:    $ngoodat="数字电路";        break;
        case 6:    $ngoodat="通信原理";      break;
        case 7:    $ngoodat="移动通信";      break;
        case 8:    $ngoodat="电磁波";      break;
        case 9:    $ngoodat="编程语言";      break;
        case 10:    $ngoodat="计算机基础";      break;
        case 11:    $ngoodat="网络";      break;
    }
    $goodornot[0]=$goodat;
    $goodornot[1]=$ngoodat;
    return $goodornot;
}
function mydesire(){
    $socredesire=explode(",",mygetdesire());
    global $wpdb;
    $jiqixuexiaveraged=$wpdb->get_var( "SELECT round(avg(jiqixuexicount),2) FROM ".COUNTD_TABLE." ");
    $jisuanjishijueaveraged=$wpdb->get_var( "SELECT round(avg(jisuanjishijuecount),2) FROM ".COUNTD_TABLE." ");
    $tuijianaveraged=$wpdb->get_var( "SELECT round(avg(tuijiancount),2) FROM ".COUNTD_TABLE." ");
    $dianlufenxiaveraged=$wpdb->get_var( "SELECT round(avg(dianlufenxicount),2) FROM ".COUNTD_TABLE." ");
    $danpianjiaveraged=$wpdb->get_var( "SELECT round(avg(danpianjicount),2) FROM ".COUNTD_TABLE." ");
    $shuzidianluaveraged=$wpdb->get_var( "SELECT round(avg(shuzidianlucount),2) FROM ".COUNTD_TABLE." ");
    $tongyuanaveraged=$wpdb->get_var( "SELECT round(avg(tongyuancount),2) FROM ".COUNTD_TABLE." ");
    $tongxinaveraged=$wpdb->get_var( "SELECT round(avg(tongxincount),2) FROM ".COUNTD_TABLE." ");
    $dianciaveraged=$wpdb->get_var( "SELECT round(avg(diancicount),2) FROM ".COUNTD_TABLE." ");
    $bianchengaveraged=$wpdb->get_var( "SELECT round(avg(bianchengcount),2) FROM ".COUNTD_TABLE." ");
    $jisuanjijichuaveraged=$wpdb->get_var( "SELECT round(avg(jisuanjijichucount),2) FROM ".COUNTD_TABLE." ");
    $webaveraged=$wpdb->get_var( "SELECT round(avg(webcount),2) FROM ".COUNTD_TABLE." ");
    $average[0]=$jiqixuexiaveraged;$average[1]=$jisuanjishijueaveraged;$average[2]=$tuijianaveraged;$average[3]=$dianlufenxiaveraged;$average[4]=$danpianjiaveraged;
    $average[5]=$shuzidianluaveraged;$average[6]=$tongyuanaveraged;$average[7]=$tongxinaveraged;$average[8]=$dianciaveraged;$average[9]=$bianchengaveraged;
    ;$average[10]=$jisuanjijichuaveraged;$average[11]=$webaveraged;
    for ($i=0;$i<12;$i++){
        if ($socredesire[$i]>$average[$i])
            $strength[$i]=1;
        else
            $strength[$i]=0;
    }
    $des=0;
    for ($i=0;$i<12;$i++){
        if ($socredesire[$i]!=0)
            $des++;
    }
    $strcount=0;
    for ($i=0;$i<12;$i++){
        if ($strength[$i]==1)
            $strcount++;
    }
    if($strcount>6)
        $return="渴望学习";
    else if(2<$strcount and $strcount<=6)
        $return="喜欢学习";
    else if($strcount<=2)
        $return="懈怠学习";
    else if($des==0)
        $return="完全不学习";
    echo $return;
}
function mydesireornot(){
    $socre=explode(",",mygetdesire());
    $phpcount=$socre[0];
    $htmlcount=$socre[1];
    $jscount=$socre[2];
    $mycookiecount=$socre[3];
    $danpianjicount=$socre[4];
    $csscount=$socre[5];
    $sqlcount=$socre[6];
    $duinocount=$socre[7];
    $androidcount=$socre[8];
    $ioscount=$socre[9];
    $pingtaicount=$socre[10];
    $webcount=$socre[11];
    $matlabcount=$socre[12];
    $desire = array_search(max($socre), $socre);
    $notdesire=array_search(min($socre), $socre);
    switch($desire)
    {   case 0:    $goodat="机器学习";    break;
        case 1:    $goodat="计算机视觉";    break;
        case 2:    $goodat="推荐系统";      break;
        case 3:    $goodat="电路分析";      break;
        case 4:    $goodat="单片机";      break;
        case 5:    $goodat="数字电路";        break;
        case 6:    $goodat="通信原理";      break;
        case 7:    $goodat="移动通信";      break;
        case 8:    $goodat="电磁波";      break;
        case 9:    $goodat="编程语言";      break;
        case 10:    $goodat="计算机基础";      break;
        case 11:    $goodat="网络";      break;
    }
    switch($notdesire)
    {   case 0:    $ngoodat="机器学习";    break;
        case 1:    $ngoodat="计算机视觉";    break;
        case 2:    $ngoodat="推荐系统";      break;
        case 3:    $ngoodat="电路分析";      break;
        case 4:    $ngoodat="单片机";      break;
        case 5:    $ngoodat="数字电路";        break;
        case 6:    $ngoodat="通信原理";      break;
        case 7:    $ngoodat="移动通信";      break;
        case 8:    $ngoodat="电磁波";      break;
        case 9:    $ngoodat="编程语言";      break;
        case 10:    $ngoodat="计算机基础";      break;
        case 11:    $ngoodat="网络";      break;
    }
    $goodornot[0]=$goodat;
    $goodornot[1]=$ngoodat;
    return $goodornot;
}
function mylevel(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $level =$wpdb->get_var( "SELECT meta_value FROM `$wpdb->usermeta` WHERE `user_id` = '$sql' and meta_key='wp_user_level'");
    if ($level==10)
        $userlevel="管理员";
    else if($level==7)
        $userlevel="编辑";
    else if($level==2)
        $userlevel="作者";
    else if($level==1)
        $userlevel="投稿者";
    else if($level==0)
        $userlevel="订阅者";
    echo $userlevel;
}
function myyear(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT user_registered FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $useryear=substr($sql, 0, 4);
    $year=date("Y",time());
    if ($useryear!=$year)
        $usertime="往届生";
    else
        $usertime="应届生";
    echo $usertime;
}


function mygroup(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login = '$c'");
    $gpcount = $wpdb->get_results("SELECT COUNT(*) FROM `wp_gp_member` WHERE `user_id` = '$sql'");
    if($gpcount>0){
        $gpnum = $wpdb->get_results("SELECT group_id FROM `wp_gp_member` WHERE `user_id` = '$sql'");
        $m=0;
        foreach($gpnum as $g){
            $groups[$m]=$g->group_id;
            $group = $wpdb->get_var("SELECT group_name FROM wp_gp WHERE ID = '$groups[$m]'");
            echo $group;
            echo "</br>";
            $m++;
        }
    }
}

function myquestionsum(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql= $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login = '$c'");
    $questionnum=$wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_author='$sql' and post_status='publish' and post_type='dwpa-question' ");
    echo $questionnum;
}

function myviewsum(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql= $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login = '$c'");
    $viewnum=$wpdb->get_var("SELECT COUNT(*) FROM wp_user_history WHERE user_id='$sql' and user_action='browse'");
    echo $viewnum;
}

function searchsum(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql= $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login = '$c'");
    $searchnum=$wpdb->get_var("SELECT COUNT(*) FROM " . SS_TABLE . " WHERE `user` = '$sql'");
    echo $searchnum;
}

function myfavorite(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql= $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login = '$c'");
    $favoritenum=$wpdb->get_var("SELECT COUNT(*) FROM wp_favorite WHERE `user_id` = '$sql'");
    echo $favoritenum;
}

function score1(){

}


function myinterest(){
    $socredesire=explode(",",mygetdesire());
    global $wpdb;
    $jiqixuexiaveraged=$wpdb->get_var( "SELECT round(avg(jiqixuexicount),2) FROM ".COUNTD_TABLE." ");
    $jisuanjishijueaveraged=$wpdb->get_var( "SELECT round(avg(jisuanjishijuecount),2) FROM ".COUNTD_TABLE." ");
    $tuijianaveraged=$wpdb->get_var( "SELECT round(avg(tuijiancount),2) FROM ".COUNTD_TABLE." ");
    $dianlufenxiaveraged=$wpdb->get_var( "SELECT round(avg(dianlufenxicount),2) FROM ".COUNTD_TABLE." ");
    $danpianjiaveraged=$wpdb->get_var( "SELECT round(avg(danpianjicount),2) FROM ".COUNTD_TABLE." ");
    $shuzidianluaveraged=$wpdb->get_var( "SELECT round(avg(shuzidianlucount),2) FROM ".COUNTD_TABLE." ");
    $tongyuanaveraged=$wpdb->get_var( "SELECT round(avg(tongyuancount),2) FROM ".COUNTD_TABLE." ");
    $tongxinaveraged=$wpdb->get_var( "SELECT round(avg(tongxincount),2) FROM ".COUNTD_TABLE." ");
    $dianciaveraged=$wpdb->get_var( "SELECT round(avg(diancicount),2) FROM ".COUNTD_TABLE." ");
    $bianchengaveraged=$wpdb->get_var( "SELECT round(avg(bianchengcount),2) FROM ".COUNTD_TABLE." ");
    $jisuanjijichuaveraged=$wpdb->get_var( "SELECT round(avg(jisuanjijichucount),2) FROM ".COUNTD_TABLE." ");
    $webaveraged=$wpdb->get_var( "SELECT round(avg(webcount),2) FROM ".COUNTD_TABLE." ");
    $average[0]=$jiqixuexiaveraged;$average[1]=$jisuanjishijueaveraged;$average[2]=$tuijianaveraged;$average[3]=$dianlufenxiaveraged;$average[4]=$danpianjiaveraged;
    $average[5]=$shuzidianluaveraged;$average[6]=$tongyuanaveraged;$average[7]=$tongxinaveraged;$average[8]=$dianciaveraged;$average[9]=$bianchengaveraged;
    $average[10]=$jisuanjijichuaveraged;$average[11]=$webaveraged;
    for ($i=0;$i<12;$i++) {
        if ($socredesire[$i] > $average[$i]){
            switch($i)
            {   case 0:    $interestat="机器学习";  echo $interestat;  break;
                case 1:    $interestat="计算机视觉";  echo $interestat;  break;
                case 2:    $interestat="推荐系统";  echo $interestat;    break;
                case 3:    $interestat="电路分析";  echo $interestat;    break;
                case 4:    $interestat="单片机";   echo $interestat;   break;
                case 5:    $interestat="数字电路";   echo $interestat;     break;
                case 6:    $interestat="通信原理";   echo $interestat;   break;
                case 7:    $interestat="移动通信";  echo $interestat;    break;
                case 8:    $interestat="电磁波";   echo $interestat;   break;
                case 9:    $interestat="编程语言";   echo $interestat;   break;
                case 10:    $interestat="计算机基础";  echo $interestat;    break;
                case 11:    $interestat="网络";  echo $interestat;    break;
            }

            echo "</br>";
        }
    }
}

function mygetchoice(){
    global $wpdb;
    global $m;
    global $textlist;
    global $textlist3;
    $m=0;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $time =$wpdb->get_results( "SELECT ID FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type = 'dwqa-answer'");
    foreach($time as $a){
        $textlist[$m]=$a->ID;
        $m++;
    }
    $art=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish'and post_type = 'dwqa-answer'");
    $m=0;
    global $count;
    $count=0;
    $articulnum=$wpdb->get_results( "SELECT meta_value FROM `$wpdb->postmeta` WHERE `meta_key` = '_dwqa_best_answer'");
    foreach($articulnum as $b){
        $textlist3[$m]=$b->meta_value;
        for($i=0;$i<$art;$i++) {
            if ($textlist3[$m] == $textlist[$i])
                $count++;
        }
        $m++;
    }
    echo $count;
}

function mygetzan(){
    global $wpdb;
    global $m;
    global $textlist;
    $m=0;
    global $count;
    $count=0;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $time =$wpdb->get_results( "SELECT ID FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type = 'dwqa-answer'");
    foreach($time as $a){
        $textlist[$m]=$a->ID;
        $articulnum=$wpdb->get_var( "SELECT meta_value FROM `$wpdb->postmeta` WHERE `meta_key` = '_dwqa_votes' and post_id='$textlist[$m]'");

        $count+=$articulnum;

        $m++;
    }
    echo $count;
}

function myanswersum(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type = 'dwqa-answer'");
    $c = $articulnum;

    echo $c;
}

function mypublish(){
    global $wpdb;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish'and post_type = 'post'");
    $c = $articulnum;

    echo $c;
}

function mypostcomment(){
    global $wpdb;
    global $m;
    global $textlist;
    global $textlist3;
    $m=0;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $time =$wpdb->get_results( "SELECT ID FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type = 'post'");
    foreach($time as $a){
        $textlist[$m]=$a->ID;
        $m++;
    }
    $art=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish'and post_type = 'post'");
    $m=0;
    global $count;
    $count=0;
    $articulnum=$wpdb->get_results( "SELECT comment_post_ID FROM `$wpdb->comments` ");
    foreach($articulnum as $b){
        $textlist3[$m]=$b->comment_post_ID;
        for($i=0;$i<$art;$i++) {
            if ($textlist3[$m] == $textlist[$i])
                $count++;
        }
        $m++;
    }
    echo $count;
}

function mypostview(){
    global $wpdb;
    global $m;
    global $textlist;
    global $textlist1;
    $m=0;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $time =$wpdb->get_results( "SELECT ID FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type = 'post'");
    foreach($time as $a){
        $textlist[$m]=$a->ID;

        $m++;
    }

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish'and post_type = 'post'");
    $c = $articulnum;
    $m=0;
    global $average;
    $average=0;
    while($c>0){
        $textlist1[$m] =$wpdb->get_var( "SELECT meta_value FROM `$wpdb->postmeta` WHERE `meta_key` = 'project_views'and post_id=$textlist[$m]");
        $m++;
        $c--;
    }
    $c = $articulnum;
    $m=0;
    while($c>0){
        $average+=$textlist1[$m];
        $m++;
        $c--;
    }
    $average=$average/($articulnum+0.1);
    echo sprintf("%.2f", $average);
}

function mypostfavorite(){
    global $wpdb;
    $m=0;
    $c=get_option('spark_search_user_copy_right');
    $sql =$wpdb->get_var( "SELECT ID FROM `$wpdb->users` WHERE `user_login` = '$c'");
    $num =$wpdb->get_results( "SELECT ID FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish' and post_type = 'post'");
    foreach($num as $a){
        $textlist[$m]=$a->ID;

        $m++;
    }

    $articulnum=$wpdb->get_var("SELECT COUNT(*) FROM `$wpdb->posts` WHERE `post_author` = '$sql'and post_status='publish'and post_type = 'post'");
    $c = $articulnum;
    $m=0;
    $sum=0;
    while($c>0){
        $textlist1[$m] =$wpdb->get_var( "SELECT COUNT(*) FROM wp_favorite WHERE favorite_post_id=$textlist[$m]");
        $sum=$sum+$textlist1[$m];
        $m++;
        $c--;
    }
    echo $sum;
}