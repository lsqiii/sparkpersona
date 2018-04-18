<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/18
 * Time: 20:52
 */

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
wp_register_script("highchange-script", plugins_url('js/highchartschange.js', __FILE__), array('jquery'));
wp_register_script("jquerymin-script", plugins_url('js/jquery.min.js', __FILE__), array('jquery'));

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
//if ( ! function_exists( 'model' ) ) {
//    require_once('mymodel_drawing.php');
//}


//require_once('active.php');

require 'myinfer.php';
require_once('myuserhistory.php');

function sparktest_settings_submenu_page()
{
//    global $time1;
//    $tag=mytag();
//    $a=history();
    $history=myhistory();
    $history0=$history[0]; $history1=$history[1]; $history2=$history[2]; $history3=$history[3]; $history4=$history[4];
    $history5=$history[5]; $history6=$history[6]; $history7=$history[7]; $history8=$history[8]; $history9=$history[9];
    $favorite=myfavoriteclass();
    $favorite0=$favorite[0]; $favorite1=$favorite[1]; $favorite2=$favorite[2]; $favorite3=$favorite[3]; $favorite4=$favorite[4];
    $favorite5=$favorite[5]; $favorite6=$favorite[6]; $favorite7=$favorite[7]; $favorite8=$favorite[8]; $favorite9=$favorite[9];
    $search=mysearchclass();
    $search0=$search[0]; $search1=$search[1]; $search2=$search[2]; $search3=$search[3]; $search4=$search[4]; $search5=$search[5];
    $search6=$search[6]; $search7=$search[7]; $search8=$search[8]; $search9=$search[9];
    $ask=myaskclass();
    $ask0=$ask[0]; $ask1=$ask[1]; $ask2=$ask[2]; $ask3=$ask[3]; $ask4=$ask[4]; $ask5=$ask[5]; $ask6=$ask[6]; $ask7=$ask[7];
    $ask8=$ask[8]; $ask9=$ask[9];
    $value=myhistory_value();
    $value0=$value[0]; $value1=$value[1]; $value2=$value[2]; $value3=$value[3]; $value4=$value[4]; $value5=$value[5]; $value6=$value[6];
    $value7=$value[7]; $value8=$value[8]; $value9=$value[9]; $value10=$value[10]; $value11=$value[11];
    $project=projectclass();
    $project0=$project[0]; $project1=$project[1]; $project2=$project[2]; $project3=$project[3]; $project4=$project[4];
    $project5=$project[5]; $project6=$project[6]; $project7=$project[7]; $project8=$project[8]; $project9=$project[9];

    $tag=mysearch();
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
    $socred=explode(",",mygetdesire());
    $jiqixuexicountd=$socred[0];
    $jisuanjishijuecountd=$socred[1];
    $tuijiancountd=$socred[2];
    $dianlufenxicountd=$socred[3];
    $danpianjicountd=$socred[4];
    $shuzidianlucountd=$socred[5];
    $tongyuancountd=$socred[6];
    $tongxincountd=$socred[7];
    $diancicountd=$socred[8];
    $bianchengcountd=$socred[9];
    $jisuanjijichucountd=$socred[10];
    $webcountd=$socred[11];
    global $his;
    global $wpdb;

    //$sorcedesire=explode(",",mygetdesire());
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

    ?>
    <!DOCTYPE html>
    <html >
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>用户画像</title>
       <script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>

       <script type="text/javascript">
//           window.onload = function() {

$(function () {

    tagcloud({
        //参数名: 默认值
        fontsize: 18,       //基本字体大小
        radius: 100,         //滚动半径
        mspeed: "normal",   //滚动最大速度
        ispeed: "normal",   //滚动初速度
        direction: 135,     //初始滚动方向
        keep: true          //鼠标移出组件后是否继续随鼠标滚动
    });

    $('#containerb').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '用户浏览量占比'
        },
        tooltip: {
            headerFormat: '{series.name}<br>',
            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '用户浏览量占比',
            data: [
                ['<?php echo $history0 ?>',   <?php echo $history5?>],
                ['<?php echo $history1 ?>',   <?php echo $history6?>],
                ['<?php echo $history2 ?>',   <?php echo $history7?>],
                ['<?php echo $history3 ?>',   <?php echo $history8?>],
                ['<?php echo $history4 ?>',   <?php echo $history9?>]
            ]
        }]
    });

    $('#containerb2').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '用户收藏占比'
        },
        tooltip: {
            headerFormat: '{series.name}<br>',
            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '用户收藏占比',
            data: [
                ['<?php echo $favorite0 ?>',   <?php echo $favorite5?>],
                ['<?php echo $favorite1 ?>',   <?php echo $favorite6?>],
                ['<?php echo $favorite2 ?>',   <?php echo $favorite7?>],
                ['<?php echo $favorite3 ?>',   <?php echo $favorite8?>],
                ['<?php echo $favorite4 ?>',   <?php echo $favorite9?>]
            ]
        }]
    });

    $('#containerb4').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '用户提问占比'
        },
        tooltip: {
            headerFormat: '{series.name}<br>',
            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '用户提问占比',
            data: [
                ['<?php echo $ask0 ?>',   <?php echo $ask5?>],
                ['<?php echo $ask1 ?>',   <?php echo $ask6?>],
                ['<?php echo $ask2 ?>',   <?php echo $ask7?>],
                ['<?php echo $ask3 ?>',   <?php echo $ask8?>],
                ['<?php echo $ask4 ?>',   <?php echo $ask9?>]
            ]
        }]
    });

    $('#containerb5').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '用户搜索占比'
        },
        tooltip: {
            headerFormat: '{series.name}<br>',
            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '用户搜索占比',
            data: [
                ['<?php echo $search0 ?>',   <?php echo $search5?>],
                ['<?php echo $search1 ?>',   <?php echo $search6?>],
                ['<?php echo $search2 ?>',   <?php echo $search7?>],
                ['<?php echo $search3 ?>',   <?php echo $search8?>],
                ['<?php echo $search4 ?>',   <?php echo $search9?>]
            ]
        }]
    });

    $('#containerxq').highcharts({
        chart: {
            polar: true,
            type: 'line'
        },
        title: {
            text: '用户兴趣',
            x: -80
        },
        credits: {
            enabled: false
        },
        pane: {
            size: '80%'
        },
        xAxis: {
            categories: ['机器学习', '计算机视觉', '推荐系统', '电路分析',
                '单片机', '数字电路','通信原理','移动通信','电磁波','编程语言','计算机基础','网络'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },
        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },
        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 70,
            layout: 'vertical'
        },
        series: [{
            name: '用户兴趣方向',
            data: [ <?php echo $jiqixuexicountd?>,<?php echo $jisuanjishijuecountd?>, <?php echo $tuijiancountd?>, <?php echo $dianlufenxicountd ?>,<?php echo $danpianjicountd ?>, <?php echo $shuzidianlucountd ?>,<?php echo $tongyuancountd ?>,<?php echo $tongxincountd ?>,<?php echo $diancicountd ?>,<?php echo $bianchengcountd ?>, <?php echo $jisuanjijichucountd ?>,<?php echo $webcountd ?>],
            pointPlacement: 'on'
        },{
            name: '平均值',
            data: [ <?php echo $jiqixuexiaveraged?>,<?php echo $jisuanjishijueaveraged?>, <?php echo $tuijianaveraged?>, <?php echo $dianlufenxiaveraged ?>,<?php echo $danpianjiaveraged ?>, <?php echo $shuzidianluaveraged ?>,<?php echo $tongyuanaveraged ?>,<?php echo $tongxinaveraged ?>,<?php echo $dianciaveraged ?>,<?php echo $bianchengaveraged ?>, <?php echo $jisuanjijichuaveraged ?>,<?php echo $webaveraged ?>],
            pointPlacement: 'on'
        }]
    });

    var value0 = <?php echo json_encode($value0);?>;
    var value1 = <?php echo json_encode($value1);?>;
    var value2 = <?php echo json_encode($value2);?>;
    var value3 = <?php echo json_encode($value3);?>;
    var value4 = <?php echo json_encode($value4);?>;
    var value5 = <?php echo json_encode($value5);?>;
    var value6 = <?php echo json_encode($value6);?>;
    var value7 = <?php echo json_encode($value7);?>;
    var value8 = <?php echo json_encode($value8);?>;
    var value9 = <?php echo json_encode($value9);?>;
    var value10 = <?php echo json_encode($value10);?>;
    var value11 = <?php echo json_encode($value11);?>;
    $('#containerchange').highcharts(
        {

            chart: {
                zoomType: 'x'
                //type: 'spline'
            },
            title: {
                text: '用户兴趣变化图'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    '鼠标拖动可以进行缩放' : '手势操作进行缩放'
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: {
                    millisecond: '%H:%M:%S.%L',
                    second: '%H:%M:%S',
                    minute: '%H:%M',
                    hour: '%H:%M',
                    day: '%m-%d',
                    week: '%m-%d',
                    month: '%Y-%m',
                    year: '%Y'
                }
            },
            tooltip: {
                dateTimeLabelFormats: {
                    millisecond: '%H:%M:%S.%L',
                    second: '%H:%M:%S',
                    minute: '%H:%M',
                    hour: '%H:%M',
                    day: '%Y-%m-%d',
                    week: '%m-%d',
                    month: '%Y-%m',
                    year: '%Y'
                }
            },
            yAxis: {
                title: {
                    text: '分数'
                }
              //  min: 0
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                name: '机器学习',
                data: value0,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 6, 1),
            }, {
                name: '计算机视觉',
                data: value1,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {
                name: '推荐系统',
                data: value2,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {
                name: '电路分析',
                data: value3,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '单片机',
                data: value4,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '数字电路',
                data: value5,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '通信原理',
                data: value6,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '移动通信',
                data: value7,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '电磁波',
                data: value8,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '编程语言',
                data: value9,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '计算机基础',
                data: value10,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }, {

                name: '网络',
                data: value11,
                    pointInterval: 24 * 3600 * 1000,
                    pointStart: Date.UTC(2017, 5, 1),
            }],


        });

    $('#containersc').highcharts({
        chart: {
            polar: true,
            type: 'line'
        },
        title: {
            text: '用户擅长',
            x: -80
        },
        credits: {
            enabled: false
        },
        pane: {
            size: '80%'
        },
        xAxis: {
            categories: ['机器学习', '计算机视觉', '推荐系统', '电路分析',
                '单片机', '数字电路','通信原理','移动通信','电磁波','编程语言','计算机基础','网络'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },
        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },
        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 70,
            layout: 'vertical'
        },
        series: [{
            name: '用户擅长方向',
            data: [ <?php echo $jiqixuexicount?>,<?php echo $jisuanjishijuecount?>, <?php echo $tuijiancount?>, <?php echo $dianlufenxicount ?>,<?php echo $danpianjicount ?>, <?php echo $shuzidianlucount ?>,<?php echo $tongyuancount ?>,<?php echo $tongxincount ?>,<?php echo $diancicount ?>,<?php echo $bianchengcount ?>, <?php echo $jisuanjijichucount ?>,<?php echo $webcount ?>],
            pointPlacement: 'on',
        }, {
            name: '平均值',
            data: [ <?php echo $jiqixuexiaverage?>,<?php echo $jisuanjishijueaverage?>, <?php echo $tuijianaverage?>, <?php echo $dianlufenxiaverage ?>,<?php echo $danpianjiaverage ?>, <?php echo $shuzidianluaverage ?>,<?php echo $tongyuanaverage ?>,<?php echo $tongxinaverage ?>,<?php echo $dianciaverage ?>,<?php echo $bianchengaverage ?>, <?php echo $jisuanjijichuaverage ?>,<?php echo $webaverage ?>],
            pointPlacement: 'on',
        }]
    });

    $('#containerb3').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '用户参与项目类别占比'
        },
        tooltip: {
            headerFormat: '{series.name}<br>',
            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '用户参与项目类别占比',
            data: [
                ['<?php echo $project0 ?>',   <?php echo $project5?>],
                ['<?php echo $project1 ?>',   <?php echo $project6?>],
                ['<?php echo $project2 ?>',   <?php echo $project7?>],
                ['<?php echo $project3 ?>',   <?php echo $project8?>],
                ['<?php echo $project4 ?>',   <?php echo $project9?>]
            ]
        }]
    });



    var chart2 = new Highcharts.Chart('container2', {
        title: {
            text: '一周用户活跃度变化图',
            x: -20
        },
        credits: {
            enabled: false
        },
        yAxis: {
            title: {
                text: '次数'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {

        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        data: {
            table: 'datatable'
        },
    });







               oDiv = document.getElementById('mokuai1');

               aA = oDiv.getElementsByTagName('a');


               for (i = 0; i < aA.length; i++) {
                   oTag = {};

                   oTag.offsetWidth = aA[i].offsetWidth;
                   oTag.offsetHeight = aA[i].offsetHeight;

                   mcList.push(oTag);
               }

               sineCosine(0, 0, 0);

               positionAll();

               oDiv.onmouseover = function () {
                   active = true;
               };

               oDiv.onmouseout = function () {
                   active = false;
               };

               oDiv.onmousemove = function (ev) {
                   var oEvent = window.event || ev;

                   mouseX = oEvent.clientX - (oDiv.offsetLeft + oDiv.offsetWidth / 2);
                   mouseY = oEvent.clientY - (oDiv.offsetTop + oDiv.offsetHeight / 2);

                   mouseX /= 5;
                   mouseY /= 5;
               }

               setInterval(update, 30);
           })







           var radius = 90;
           var dtr = Math.PI/180;
           var d=300;

           var mcList = [];
           var active = false;
           var lasta = 1;
           var lastb = 1;
           var distr = true;
           var tspeed=10;
           var size=250;

           var mouseX=0;
           var mouseY=0;

           var howElliptical=1;

           var aA=null;
           var oDiv=null;



           function update()
           {
               var a;
               var b;

               if(active)
               {
                   a = (-Math.min( Math.max( -mouseY, -size ), size ) / radius ) * tspeed;
                   b = (Math.min( Math.max( -mouseX, -size ), size ) / radius ) * tspeed;
               }
               else
               {
                   a = lasta * 0.98;
                   b = lastb * 0.98;
               }

               lasta=a;
               lastb=b;

               if(Math.abs(a)<=0.01 && Math.abs(b)<=0.01)
               {
                   return;
               }

               var c=0;
               sineCosine(a,b,c);
               for(var j=0;j<mcList.length;j++)
               {
                   var rx1=mcList[j].cx;
                   var ry1=mcList[j].cy*ca+mcList[j].cz*(-sa);
                   var rz1=mcList[j].cy*sa+mcList[j].cz*ca;

                   var rx2=rx1*cb+rz1*sb;
                   var ry2=ry1;
                   var rz2=rx1*(-sb)+rz1*cb;

                   var rx3=rx2*cc+ry2*(-sc);
                   var ry3=rx2*sc+ry2*cc;
                   var rz3=rz2;

                   mcList[j].cx=rx3;
                   mcList[j].cy=ry3;
                   mcList[j].cz=rz3;

                   per=d/(d+rz3);

                   mcList[j].x=(howElliptical*rx3*per)-(howElliptical*2);
                   mcList[j].y=ry3*per;
                   mcList[j].scale=per;
                   mcList[j].alpha=per;

                   mcList[j].alpha=(mcList[j].alpha-0.6)*(10/6);
               }

               doPosition();
               depthSort();
           }

           function depthSort()
           {
               var i=0;
               var aTmp=[];

               for(i=0;i<aA.length;i++)
               {
                   aTmp.push(aA[i]);
               }

               aTmp.sort
               (
                   function (vItem1, vItem2)
                   {
                       if(vItem1.cz>vItem2.cz)
                       {
                           return -1;
                       }
                       else if(vItem1.cz<vItem2.cz)
                       {
                           return 1;
                       }
                       else
                       {
                           return 0;
                       }
                   }
               );

               for(i=0;i<aTmp.length;i++)
               {
                   aTmp[i].style.zIndex=i;
               }
           }

           function positionAll()
           {
               var phi=0;
               var theta=0;
               var max=mcList.length;
               var i=0;

               var aTmp=[];
               var oFragment=document.createDocumentFragment();

               //随机排序
               for(i=0;i<aA.length;i++)
               {
                   aTmp.push(aA[i]);
               }

               aTmp.sort
               (
                   function ()
                   {
                       return Math.random()<0.5?1:-1;
                   }
               );

               for(i=0;i<aTmp.length;i++)
               {
                   oFragment.appendChild(aTmp[i]);
               }

               oDiv.appendChild(oFragment);

               for( var i=1; i<max+1; i++){
                   if( distr )
                   {
                       phi = Math.acos(-1+(2*i-1)/max);
                       theta = Math.sqrt(max*Math.PI)*phi;
                   }
                   else
                   {
                       phi = Math.random()*(Math.PI);
                       theta = Math.random()*(2*Math.PI);
                   }
                   //坐标变换
                   mcList[i-1].cx = radius * Math.cos(theta)*Math.sin(phi);
                   mcList[i-1].cy = radius * Math.sin(theta)*Math.sin(phi);
                   mcList[i-1].cz = radius * Math.cos(phi);

                   aA[i-1].style.left=mcList[i-1].cx+oDiv.offsetWidth/2-mcList[i-1].offsetWidth/2+'px';
                   aA[i-1].style.top=mcList[i-1].cy+oDiv.offsetHeight/2-mcList[i-1].offsetHeight/2+'px';
               }
           }

           function doPosition()
           {
               var l=oDiv.offsetWidth/2;
               var t=oDiv.offsetHeight/2;
               for(var i=0;i<mcList.length;i++)
               {
                   aA[i].style.left=mcList[i].cx+l-mcList[i].offsetWidth/2+'px';
                   aA[i].style.top=mcList[i].cy+t-mcList[i].offsetHeight/2+'px';

                   aA[i].style.fontSize=Math.ceil(12*mcList[i].scale/2)+8+'px';

                   aA[i].style.filter="alpha(opacity="+100*mcList[i].alpha+")";
                   aA[i].style.opacity=mcList[i].alpha;
               }
           }

           function sineCosine( a, b, c)
           {
               sa = Math.sin(a * dtr);
               ca = Math.cos(a * dtr);
               sb = Math.sin(b * dtr);
               cb = Math.cos(b * dtr);
               sc = Math.sin(c * dtr);
               cc = Math.cos(c * dtr);
           }

       </script>
    </head>

    <STYLE TYPE="text/css">
        body {background:blue;}
        #mokuai {position: absolute;height: 217px;left: 626px;top: 104px;}
        #mokuai a {position:absolute; top:0px; left:0px; font-family: Microsoft YaHei; color:#fff; font-weight:bold; text-decoration:none; padding: 3px 6px; }
        #mokuai a:hover {border: 1px solid #eee; background: #000; }
        #mokuai .blue {color:blue;}
        #mokuai .red {color:red;}
        #mokuai .yellow {color:yellow;}
        #mokuai1 .blue {color:blue;}
        #mokuai1 .red {color:red;}
        #mokuai1 .yellow {color:yellow;}
        #mokuai2 .blue {color:blue;}
        #mokuai2 .red {color:red;}
        #mokuai2 .yellow {color:yellow;}
        /*canvas {border:1px solid #4c4c4c;}*/
        p { font: 18px Microsoft YaHei; color: black; }
        p a { font-size: 14px; color: #ba0c0c; }
        p a:hover { color: red; }
        table {
            border-collapse: collapse;
            width:500px;
            height:300px;
        }
        table, td, th {
            border: 1px solid black;
            text-align:center;
            padding:50px;
        }

      /*  .grid-container{

            width: 100%;
            max-width: 1200px;
        }


        .row:before,
        .row:after {
            content:"";
            display: table ;
            clear:both;
        }

        [class*='col-'] {
            float: left;
            min-height: 1px;
            width: 16.66%;

            padding: 12px;
            background-color: white;
        }

        .col-3{ width: 45%;    }
*/




    </STYLE>

    <body style=" background-color: #f1f2f7; ">

      <div class="container">
          <p style="font-size: 18px;    margin: 8px;">用户画像</p>
        <div class="row">
<!--            <div class="col-md-6" style="background-color: white;box-shadow:-->
<!--         inset 1px -1px 1px #444, inset -1px 1px 1px #444;">-->
            <div class="col-md-6" style="background-color: white;width: 47%">
                <div style="text-align:center;background-color:rgb(100,201,202);margin-top: 22px;width: 93px;height: 93px;margin-left: 40%;border-radius: 50%;border: solid 1px rgb(100,201,202)"><i class="fa fa-user fa-5x " style="color:white;"></i></div>
                <div ><p style="position:relative;text-align:center;font-size:40px;top:20px"><?php echo get_option('spark_search_user_copy_right') ?></p></div>
                <br/>
                <br/>
            </div>
            <div id="mokuai" class="col-md-6" style="background-color: white;margin-left: -30px;width: 47%">
                <p style="    margin-top: 20px;
    margin-left: 10px;">用户标签云</p>
               <a class="red"><?php mygood()?></a>
                <a class="red"><?php echo "擅长"?><?php $goodornot=mygoodornot();echo $goodornot[0];?></a>
                <a class="red"><?php echo "不擅长"?><?php echo $goodornot[1]?></a>
                <a class="yellow"><?php mydesire()?></a>
                <a class="yellow"><?php echo "喜欢"?><?php $desireornot=mydesireornot();echo $desireornot[0];?></a>
                <a class="yellow"><?php echo "不喜欢"?><?php echo $desireornot[1]?></a>
                <a class="blue"><?php mylevel()?></a>
                <a class="blue"><?php myyear()?></a>
                <a class="blue"><?php mygroup()?></a>


            </div>
        </div>
      </div>

    <div class="row" style="margin-top: 15px;">
        <div class="col-md-6" style="background-color: white; width: 47%">
            <p style=" margin-top: 20px; margin-left: 10px;">求知欲</p>
            <table class="table">
                <tr>
                    <th></th>
                    <th>提问</th>
                    <th>浏览</th>
                    <th>搜索</th>
                    <th>收藏</th>
                </tr>
                <tr>
                    <td>次数</td>
                    <td><?php myquestionsum()?></td>
                    <td><?php myviewsum()?></td>
                    <td><?php searchsum()?></td>
                    <td><?php myfavorite()?></td>
                </tr>
                <tr>
                    <td>评分</td>
                    <td></td>
                </tr>

            </table>

        </div>
        <div id="mokuai1" class="col-md-6" style="background-color: white;width: 47%;">
            <p>经常搜索内容</p>
            <div class="tagcloud">
                <a class="red"><?php echo $tag[0]?></a>
                <a class="red"><?php echo $tag[1]?></a>
                <a class="red"><?php echo $tag[2]?></a>
                <a class="yellow"><?php echo $tag[3]?></a>
                <a class="yellow"><?php echo $tag[4]?></a>
                <a class="yellow"><?php echo $tag[5]?></a>
                <a class="blue"><?php echo $tag[6]?></a>
                <a class="blue"><?php echo $tag[7]?></a>
                <a class="blue"><?php echo $tag[8]?></a>
                <a class="blue"><?php echo $tag[9]?></a>
                <a class="red"><?php echo $value[0][1]?></a>

            </div>
        </div>

    </div>
        <div class="row">
            <div class="col-md-6" style="background-color: white;width: 47%">
                <div id="containerb" style="min-width:400px;height:400px"></div>
            </div>
            <div class="col-md-6" style="background-color: white;width: 47%">
                <div id="containerb2" style="min-width:400px;height:400px"></div>
            </div>

            </div>
      <div class="row">
          <div class="col-md-6" style="background-color: white;width: 47%">
              <div id="containerb4" style="min-width:400px;height:400px"></div>
          </div>
          <div class="col-md-6" style="background-color: white;width: 47%">
              <div id="containerb5" style="min-width:400px;height:400px"></div>
          </div>

      </div>

<div>
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-6" style="background-color: white; width:47%">
            <p style=" margin-top: 20px; margin-left: 10px;">兴趣涉猎</p>
            <table class="table">
                <tr>
                    <th><?php myinterest()?></th>
                </tr>

            </table>
        </div>
        <div   class="col-md-6" style="background-color: white;width: 48%">
            <div id="containerxq" style="min-width:400px;height:400px"></div>
        </div>

    </div>

<div class="row">
    <div class="col-md-6" style="background-color: white; width: 47%">
        <table class="table">
            <tr>
                <th></th>
                <th>提问</th>
                <th>回答</th>
                <th>收藏</th>
                <th>搜索</th>
                <th>评分</th>
            </tr>
            <tr>
                <td>机器学习</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>计算机视觉</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>推荐系统</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>电路分析</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>单片机</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>数字电路</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>通信原理</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>移动通信</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>电磁波</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>编程语言</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>计算机基础</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>网络</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div   class="col-md-6" style="background-color: white;margin-left: 30px;width: 48%">
        <div id="containerchange" style="min-width:400px;height:400px"></div>
    </div>
</div>
</div>

    <div class="row" style="margin-top: 15px;">
        <div class="col-md-6" style="background-color: white; width:100%">
            <p style="margin-top: 20px; margin-left: 10px;">能力</p>
            <table class="table">
                <tr>
                    <td><table>
                            <tr>
                                <td></td>
                                <td>次数</td>
                                <td>被点赞</td>
                                <td>被采纳</td>
                            </tr>
                            <tr>
                                <td>回答</td>
                                <td><?php myanswersum()?></td>
                                <td><?php mygetzan()?></td>
                                <td><?php mygetchoice()?></td>
                            </tr>
                        </table></td>
                    <td><table>
                            <tr>
                                <td></td>
                                <td>参与数量</td>
                                <td>评论量</td>
                                <td>平均浏览量</td>
                                <td>被收藏量</td>
                            </tr>
                            <tr>
                                <td>项目</td>
                                <td><?php mypublish()?></td>
                                <td><?php mypostcomment()?></td>
                                <td><?php mypostview()?></td>
                                <td><?php mypostfavorite()?></td>
                            </tr>
                        </table></td>
                </tr>
            </table>
        </div>

    </div>
      <div class="row">
      <div   class="col-md-6" style="background-color: white;width: 48%">
          <div id="containersc" style="min-width:400px;height:400px"></div>
      </div>
      <div class="col-md-6" style="background-color: white;width: 47%">
          <div id="containerb3" style="min-width:400px;height:400px"></div>
      </div>
      </div>

      <div  class="col-md-6" style="background-color: white;margin-left: 40px;width: 47%">
          <label for="start">起始日期：</label><input id="start" name="start" type="date" />
          <div id="emailInfo">请输入起始日期,查询用户七天的活跃度变化</div>
          <div id="container2" style="min-width:400px;height:400px;"></div>
      </div>

    </body>
    </html>
    <?php

}
