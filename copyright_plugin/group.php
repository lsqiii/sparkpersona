<?php
/**
 * Created by PhpStorm.
 * User: lsq
 * Date: 2018/3/29
 * Time: 16:22
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

require 'groupvalue.php';
require_once('myuserhistory.php');

function sparktest_settings_submenu_page2(){

    $history=myhistory();
    $history0=$history[0]; $history1=$history[1]; $history2=$history[2]; $history3=$history[3]; $history4=$history[4];
    $history5=$history[5]; $history6=$history[6]; $history7=$history[7]; $history8=$history[8]; $history9=$history[9];



    ?>
    <!DOCTYPE html>
    <html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>群组画像</title>
        <script src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>

        <script type="text/javascript">

$(function (){

    tagcloud({
        //参数名: 默认值
        fontsize: 18,       //基本字体大小
        radius: 100,         //滚动半径
        mspeed: "normal",   //滚动最大速度
        ispeed: "normal",   //滚动初速度
        direction: 135,     //初始滚动方向
        keep: true          //鼠标移出组件后是否继续随鼠标滚动
    });

    $('#containerxq1').highcharts({
        chart: {
            polar: true,
            type: 'line'
        },
        title: {
            text: '群组擅长',
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
            name: '群组擅长方向',
            data: [ 2,1,3,3,2, 1,1,3,2,3,1,2],
            pointPlacement: 'on'
        },{
            name: '平均值',
            data: [ 1,2, 3, 1,2,3,1,2,3,1,2,3],
            pointPlacement: 'on'
        }]
    });

    $('#containerb1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '群组兴趣占比'
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
            name: '群组兴趣占比',
            data: [
                ['<?php echo $history0 ?>',   <?php echo $history5?>],
                ['<?php echo $history1 ?>',   <?php echo $history6?>],
                ['<?php echo $history2 ?>',   <?php echo $history7?>],
                ['<?php echo $history3 ?>',   <?php echo $history8?>],
                ['<?php echo $history4 ?>',   <?php echo $history9?>]
            ]
        }]
    });

        oDiv = document.getElementById('biaoqian');

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
    #biaoqian a {font-family: Microsoft YaHei; color:#fff; font-weight:bold; text-decoration:none; padding: 3px 6px; }
    #biaoqian a:hover {border: 1px solid #eee; background: #000; }
    #biaoqian .blue {color:blue;}
    #biaoqian .red {color:red;}
    #biaoqian .yellow {color:yellow;}
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
</STYLE>

    <body style="background-color: #f1f2f7;">

    <div class="container">
        <p style="font-size: 18px;    margin: 8px;">群组画像</p>
            <div class="col-md-6" style="background-color: white;width: 100%">
                <div style="text-align:center;background-color:rgb(300,110,120);margin-top: 22px;width: 93px;height: 93px;margin-left: 40%;border-radius: 50%;border: solid 1px rgb(100,201,202)"><i class="fa fa-user fa-5x " style="color:white;"></i></div>
                <div ><p style="position:relative;text-align:center;font-size:40px;top:20px">火花运营</p></div>
                <br/>
                <br/>
            </div>
        </div>

    <div class="row" style="margin-top: 15px;">
        <div class="col-md-6" style="background-color: white; width: 47%">
            <p style=" margin-top: 20px; margin-left: 10px;">群组基本信息</p>
            <table class="table">
                <tr>
                    <th>组员</th>
                </tr>
                <tr>
                    <td><?php member()?></td>
                </tr>

            </table>

        </div>
        <div id="biaoqian" class="col-md-6" style="background-color: white;width: 47%;">
            <p style="    margin-top: 20px;
    margin-left: 10px;">群组标签</p>
            <div class="tagcloud">
            <a class="red">相同点</a>
            <a class="red">相同点</a>
            <a class="yellow"> 不同点</a>
            <a class="yellow">不同点</a>
            <a class="blue">不喜欢</a>
            <a class="blue">不喜欢</a>
            </div>

        </div>
        </div>

    <div class="row" style="margin-top: 15px;">
        <div   class="col-md-6" style="background-color: white;width: 48%">
            <div id="containerb1" style="min-width:400px;height:400px"></div>
        </div>
        <div class="col-md-6" style="background-color: white; width: 47%">
            <p style=" margin-top: 20px; margin-left: 10px;">群组各成员兴趣</p>
            <table class="table">
                <tr>
                    <th>成员</th>
                    <th>兴趣科目</th>
                </tr>
                <tr>
                    <td>spark_admin</td>
                    <td></td>
                </tr>
                <tr>
                    <td>zyl</td>
                    <td></td>
                </tr>
                <tr>
                    <td>snowcats</td>
                    <td></td>
                </tr>
                <tr>
                    <td>sc316316</td>
                    <td></td>
                </tr>
                <tr>
                    <td>haoyi</td>
                    <td></td>
                </tr>
                <tr>
                    <td>z_范范</td>
                    <td></td>
                </tr>

            </table>

        </div>


    </div>

    <div class="row" style="margin-top: 15px;">
        <div   class="col-md-6" style="background-color: white;width: 48%">
            <div id="containerxq1" style="min-width:400px;height:400px"></div>
        </div>
        <div class="col-md-6" style="background-color: white; width: 47%">
            <p style=" margin-top: 20px; margin-left: 10px;">群组各成员能力</p>
            <table class="table">
                <tr>
                    <th>成员</th>
                    <th>擅长科目</th>
                </tr>
                <tr>
                    <td>spark_admin</td>
                    <td></td>
                </tr>
                <tr>
                    <td>zyl</td>
                    <td></td>
                </tr>
                <tr>
                    <td>snowcats</td>
                    <td></td>
                </tr>
                <tr>
                    <td>sc316316</td>
                    <td></td>
                </tr>
                <tr>
                    <td>haoyi</td>
                    <td></td>
                </tr>
                <tr>
                    <td>z_范范</td>
                    <td></td>
                </tr>

            </table>

        </div>


    </div>




    </div>
    </body>

<?php } ?>