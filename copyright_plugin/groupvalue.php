<?php
/**
 * Created by PhpStorm.
 * User: lsq
 * Date: 2018/3/29
 * Time: 17:05
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

function member(){
    global $wpdb;
    $group = $wpdb->get_var("SELECT ID FROM wp_gp WHERE group_name = '火花运营'");
    $gpmember = $wpdb->get_results("SELECT user_id FROM `wp_gp_member` WHERE `group_id` = '$group'");
    $m=0;
    foreach($gpmember as $g){
        $gpmember[$m]=$g->user_id;
        $group = $wpdb->get_var("SELECT user_login FROM wp_users WHERE ID = '$gpmember[$m]'");
        echo $group;
        echo "</br>";
        $m++;
    }

}