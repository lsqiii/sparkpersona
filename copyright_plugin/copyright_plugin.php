<?php
/*
    Plugin Name: Copyright plugin
    Plugin URI: http://www.xxxx.com/plugins/
    Description: for copyright
    Version: 1.0.0
    Author: lsq
    Author URI: http://www.xxxx.com/
    License: GPL
*/

    header("Content-type:text/html;charset=utf-8");
    if ( ! function_exists( 'spark_settings_submenu_page' ) ) {
        require_once('myanalyseview.php');
    }
    
    require_once('myinfer.php');
    require_once('group.php');
    add_action('admin_menu', 'sparktest_create_menu1');
    add_action('admin_menu', 'sparktest_create_submenu_page1');
    add_action('admin_menu', 'sparktest_create_submenu_page2');
    
    function sparktest_create_menu1()
    {
        //创建顶级菜单
        add_menu_page('My Plugin2', '用户画像测试','administrator', 'spark analyse test', 'sparktest_settings_menu1');
    }
    
    function sparktest_create_submenu_page1()
    {
        add_submenu_page('spark analyse test', '查看用户画像','查看用户画像', 'administrator', 'sparktest_analyse-submenu-page', 'sparktest_settings_submenu_page');
    }

    function sparktest_create_submenu_page2()
    {
        add_submenu_page('spark analyse test', '群组画像', '群组画像', 'administrator', 'sparktest_analyse-submenu-page2', 'sparktest_settings_submenu_page2');
    }
    
    define('COUNT_TABLE', $wpdb->prefix . 'count_sec');
    define('COUNTD_TABLE', $wpdb->prefix . 'countdesire_sec');
    
    register_activation_hook(__FILE__,'ceshiinstall_table1');
    function ceshiinstall_table1()
    {
        global $wpdb;
        if($wpdb->get_var("show tables like '" . COUNT_TABLE . "'") != COUNT_TABLE) {
            $sql = "CREATE TABLE IF NOT EXISTS " . COUNT_TABLE . " (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user varchar(60) DEFAULT '0' NOT NULL,
            jiqixuexicount float NOT NULL,
            jisuanjishijuecount float NOT NULL,
            tuijiancount float NOT NULL,
            dianlufenxicount float NOT NULL,
            danpianjicount float NOT NULL,
            shuzidianlucount float NOT NULL,
            tongyuancount float NOT NULL,
            tongxincount float NOT NULL,
            diancicount float NOT NULL,
            bianchengcount float NOT NULL,
            jisuanjijichucount float NOT NULL,
            webcount float NOT NULL,
            UNIQUE KEY id (id) );";
            require_once(ABSPATH . 'wp-admin/includes/ungrade.php');
            dbDelta($sql);
        }
    }
    
    register_activation_hook(__FILE__,'ceshiinstall_table2');
    function ceshiinstall_table2 ()
    {
        global $wpdb;
        // $table_name = $wpdb->prefix . "countdesires";
        if ($wpdb->get_var("show tables like  '" . COUNTD_TABLE . "'") != COUNTD_TABLE) {
            $sql = "CREATE TABLE IF NOT EXISTS " . COUNTD_TABLE . " (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user varchar(60) DEFAULT '0' NOT NULL,
            jiqixuexicount float NOT NULL,
            jisuanjishijuecount float NOT NULL,
            tuijiancount float NOT NULL,
            dianlufenxicount float NOT NULL,
            danpianjicount float NOT NULL,
            shuzidianlucount float NOT NULL,
            tongyuancount float NOT NULL,
            tongxincount float NOT NULL,
            diancicount float NOT NULL,
            bianchengcount float NOT NULL,
            jisuanjijichucount float NOT NULL,
            webcount float NOT NULL,
            UNIQUE KEY id (id) );";
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
    

function sparktest_settings_menu1()
{
    ?>
    <?php
    //  update_option('spark_search_user_copy_right', 'root');
    $option =$_POST['option_save'];;//获取选项
    if( $option == '' ){
        //设置默认数据
        $option = 'root';
        update_option('spark_search_user_copy_right', $option);//更新选项
    }
    if(isset($_POST['option_save'])){
        //处理数据
        $option = stripslashes($_POST['spark_search_user_copy_right']);
        
        update_option('spark_search_user_copy_right', $option);//更新选项
    }
        ?>

    <html>
    <body style="background-color:#fif27">
    <div style="text-align:center; background-color:rgb(100,201,202); margin-top:22px; width:93px; height:93px; margin-left:46%; border-radius:50%; border:solid 1px rgb(100,201,202)"><i class="fa fa-user fa-5x" style="color:white;"></i></div>
    <h2 style="    text-align: center;margin: 20px;font-size: 20px;">火花空间用户画像查询</h2>
    <form method="post" name="spark_search_user" id="spark_search_user">
    <input name="spark_search_user_copy_right" class="form-control" placeholder="用户名" size="40" style="    margin-left: 10%; width: 80%;"/>
    
    <p class="submit" style="    text-align: center;">
<button type="submit" class="btn btn-default" name="option_save" ><?php _e('保存用户名'); ?></button>
    </p>
    </form>
    </body>
    </html>
    <?php
}
        ?>
    

