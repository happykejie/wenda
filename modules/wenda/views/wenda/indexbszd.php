<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;

ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "/vendor/WxpayAPI/lib/WxPay.Api.php";
require_once "/vendor/WxpayAPI/example/WxPay.JsApiPay.php";
require_once '/vendor/WxpayAPI/example/log.php';

//初始化日志
$logHandler= new CLogFileHandler();
$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';

//printf_info($order);

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<?php
require_once "models/WxJsSdk.php";
$jssdk = new WxJsSdk(WX_APPID, WX_APPSECRET);  
$signPackage = $jssdk->GetSignPackage();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>主页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?=Html::cssFile('@web/web/assets/mui/css/mui.min.css')?>
    <!--App自定义的css-->
    <?=Html::cssFile('@web/web/assets/mui/css/app.css')?>
    <?=Html::cssFile('@web/web/assets/mui/css/mui.indexedlist.css')?>
    <?=Html::cssFile('@web/web/assets/mui/css/css/wenda.css')?>

</head>
<body>
    <div id="mui-wrap" class="mui-content" style="overflow-y: auto;  position: relative;">
        <!--<input type="search" class="mui-input-clear mui-indexed-list-search-input" placeholder="输入名称">-->
<div class="mui-indexed-list-search mui-input-row mui-search">

            <div id="look-header" class="row">
                <?php $form=ActiveForm::begin(['id'=>'search','enableAjaxValidation'=>false]); ?>
					<div class="col-md-12">
						<?=$form->field($search,'questiondescription')->textinput(['placeholder'=>'请输入学校、专业、领域等关键词找人']);?>
					</div>
                <?php ActiveForm::end()?>
            </div>
</div>      
	  <div style="padding: 0 10px 10px 10px; background-color: #FFFFFF; position: relative;">
            <div id="segmentedControl" class="segmented-control segmented-control-inverted segmented-control-primary">
                <a class="mui-control-item mui-active" aindex='1' href="#item1">全部
                </a>

                <?php if(count($category)>0):?>
                <?php foreach($category as $v):?>
                <a class="mui-control-item index-nav" aindex='<?=$v->id+1?>' href="#item<?=$v->id+1?>"><?=$v->categoryname;?> </a>
                <?endforeach?>
                <?endif?>
                <a class="doctor-index-a" onclick="segmentedControl()"></a>
            </div>
        </div>
        <div id="tab1" class="mui-slider" style="position: absolute; left: 0; top: 60px; width: 100%; height: 100%; z-index: 999; display: none;">
            <h4 class="doctor-text" onclick="tab1()">切换频道</h4>
            <ul class=" mui-segmented-control mui-segmented-control-inverted mui-segmented-control-primary mui-table-view mui-grid-view mui-grid-9">
                <li class="mui-active active mui-table-view-cell mui-media   mui-col-xs-3 mui-col-sm-3"><a aindex='1' href="#item1" class="mui-control-item  tab-a">全部</a></li>

                <?php if(count($category)>0):?>
                <?php foreach($category as $v):?>
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a aindex='<?=$v->id+1?>' href="#item<?=$v->id+1?>" class="mui-control-item  tab-a"><?=$v->categoryname?></a></li>
                <?endforeach?>
                <?endif?>
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="#" class="mui-control-item  tab-a">&nbsp;    </a></li>
            </ul>
        </div>
        <!--xiala-->
        <!--轮播-->
        <div id="slider" class="mui-slider">
            <div class="mui-slider-group mui-slider-loop">
                <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
                <div class="mui-slider-item mui-slider-item-duplicate">
                    <a id="lasts" href="#">
                        <img src="/web/assets/mui/images/yuantiao.jpg">
                    </a>
                </div>
                <?php if(count($banner)>0):?>
                <?php foreach($banner as $b):?>
                <!-- 第一张 -->
                <div class="mui-slider-item">
                    <a href="http://<?=$b->linkurl;?>">
                        <img src="/../<?=$b->bannerimgpath;?>">
                    </a>
                </div>
                <?endforeach?>
                <?endif?>
                <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
                    <a  id="fists" href="#">
                        <img src="/web/assets/mui/images/shuijiao.jpg">
                    </a>
                </div>
            </div>
            <div id="indicator"  class="mui-slider-indicator">
                <div class="mui-indicator mui-active"></div>
              <!--  <div class="mui-indicator"></div>
                <div class="mui-indicator"></div>
                <div class="mui-indicator"></div>
                <div class="mui-indicator"></div>-->
            </div>
        </div>
        <!-- 全部-->
        <div id="item1" class="mui-control-content mui-active">
            <ul id="wenda-ul" class="wenda-ul mui-table-view mui-table-view-striped mui-table-view-condensed">
                <?php if(isset($askone)):?>
                <li class="mui-table-view-cell">
                    <a href="/wenda/wenda/paywenda?id=<?=$askone->id?>">
                        <div class="mui-table ">
                            <div class="mui-table-cell mui-col-xs-10">
                                <h4>问 : <?=$askone->questiondescription?>?</h4>
                                <p class="mui-ellipsis">
                                    <span><?=$askone->getUseranswer()->nickname?></span>
                                    <label>|</label>
                                    <?=$askone->getUseranswer()->title?>
                                </p>
                                <div class="log-div">
                                    <div class="oa-contact-avatar mui-table-cell mui-pull-left">
                                        <img src="<?=$askone->getUseranswer()->headimgurl?>">
                                    </div>
                                    <button type="button" class="mui-btn wenda-button ta mui-btn-primary" style="">
                                        <img src="/web/assets/mui/images/yuy.png" />
                                        &yen; 0.00偷听
                                    </button>
                                    <div class="quanbu-right-img  icon3 mui-pull-right">
                                        <img src="/web/assets/mui/images/icon3.png" alt="" />
                                        <?=count($askone->getLovelistenquestion())?>人爱听
                                    </div>
                                    <?php if(count($askone->getLove())>0):?>
                                    <div class="quanbu-right-img  icon4 mui-pull-right">
                                        <img src="/web/assets/mui/images/icon4.png" alt="" />
                                        <?=count($askone->getLovelistenquestion())?>人爱听
                                    </div>
                                    <?endif?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <?endif?>

                <?php if(count($items)>0):?>
                <?php foreach($items as $v):?>
                <li class="mui-table-view-cell">
                    <a href="/wenda/wenda/paywenda?id=<?=$v->id?>">
                        <div class="mui-table ">
                            <div class="mui-table-cell mui-col-xs-10">
                                <h4>问 : <?=$v->questiondescription?>?</h4>
								 <!-- class="mui-ellipsis" -->
                                <p class="mui-ellipsis">
                                    <span><?=$v->getUseranswer()->nickname?></span>
                                    <label>|</label>
                                    <?=$v->getUseranswer()->title?>
                                </p>
                                <div class="log-div">
                                    <div class="oa-contact-avatar mui-table-cell mui-pull-left">
                                        <img src="<?=$v->getUseranswer()->headimgurl?>">
                                    </div>
                                    <button type="button" class="mui-btn wenda-button ta1 mui-btn-primary" style="">
                                        <img src="/web/assets/mui/images/yuy.png" />
                                        &yen; 1.00偷听
                                    </button>
                                    <div class="quanbu-right-img  icon3 mui-pull-right">
                                        <img src="/web/assets/mui/images/icon3.png" alt="" />
                                        <?=count($v->getLovelistenquestion())?>人爱听
                                    </div>


                                    <?php if(count($v->getLove())>0):?>
                                    <div class="quanbu-right-img  icon4 mui-pull-right">
                                        <img src="/web/assets/mui/images/icon4.png" alt="" />
                                        <?=count($v->getLovelistenquestion())?>人爱听
                                    </div>
                                    <?endif?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>

                <?endforeach?>
                <?endif?>
                <?php if(count($items)<=0&&!isset($askone)):?>
                <li style="background-color: #efeff4;">
                    <div style="margin-top: 30px;">
                        <div class="face">
                            <img src="/web/assets/mui/images/face.png" />
                        </div>
                        <p class="remind-text">您暂时还没有问题哦！</p>
                        <div class="mui-button-row">
                            <a href="/wenda/lookforpeople/lookforpeople">
                                <button type="button" class="mui-btn-primary remind-button">
                                    去找人
                                </button>
                            </a>
                        </div>
                    </div>
                </li>
                <?endif?>
            </ul>
        </div>

        <?php if(count($category)>0):?>
        <?php foreach($category as $c):?>
        <div id="item<?=$c->id+1?>" class="mui-control-content">
            <ul class="wenda-ul mui-table-view mui-table-view-striped mui-table-view-condensed">
                <?php if(count($items)>0):?>
                <?php foreach($items as $v):?>
                <?php if($v->categoryid==$c->id):?>
                <li class="mui-table-view-cell">
                    <a href="/wenda/wenda/paywenda?id=<?=$v->id?>">
                        <div class="mui-table ">
                            <div class="mui-table-cell mui-col-xs-10">
                                <h4>问 : <?=$v->questiondescription?>?</h4>
                               <!-- class="mui-ellipsis" -->
								<p >
                                    <span><?=$v->getUseranswer()->nickname?></span>
                                    <label>|</label>
                                    <?=$v->getUseranswer()->title?>
                                </p>
                                <div class="log-div">
                                    <div class="oa-contact-avatar mui-table-cell mui-pull-left">
                                        <img src="<?=$v->getUseranswer()->headimgurl?>">
                                    </div>
                                    <button type="button" class="mui-btn wenda-button ta1 mui-btn-primary" style="">
                                        <img src="/web/assets/mui/images/yuy.png" />
                                        &yen; 1.00偷听
                                    </button>
                                    <div class="quanbu-right-img  icon3 mui-pull-right">
                                        <img src="/web/assets/mui/images/icon3.png" alt="" />
                                        <?=count($v->getLovelistenquestion())?>人爱听
                                    </div>
                                    <?php if(count($v->getLove())>0):?>
                                    <div class="quanbu-right-img  icon4 mui-pull-right">
                                        <img src="/web/assets/mui/images/icon4.png" alt="" />
                                        <?=count($v->getLovelistenquestion())?>人爱听
                                    </div>
                                    <?endif?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>


                <?endif?>
                <?endforeach?>
                <?else:?>

                <li style="background-color: #efeff4;">
                    <div style="margin-top: 30px;">
                        <div class="face">
                            <img src="/web/assets/mui/images/face.png" />
                        </div>
                        <p class="remind-text">您暂时还没有问题哦！</p>
                        <div class="mui-button-row">
                            <a href="/wenda/lookforpeople/lookforpeople">
                                <button type="button" class="mui-btn-primary remind-button">去找人</button>
                            </a>
                        </div>
                    </div>
                </li>
                 <?endif?>
            </ul>
        </div>

        <?endforeach?>
        <?endif?>
        </div>
        <?=Html::jsFile('@web/web/assets/mui/js/mui.min.js')?>
        <script type="text/javascript">
            mui.init({
                swipeBack: true, //
                tap: true
            });
            /*轮播播放*/
            var gallery = mui('.mui-slider');
            gallery.slider({
                interval: 5000//自动轮播周期，若为0则不自动播放，默认为0；
            });
            /*轮播播放*/

            function segmentedControl() {
                document.getElementById('tab1').style.display = 'block';
            }
            function tab1() {
                document.getElementById('tab1').style.display = 'none';
            }
            /*变量*/
            var indextmp = null;

            mui("#tab1").on('tap', 'a', function () {
                indextmp = $(this).attr('aIndex') - 1;
                $(this).parent().siblings().removeClass('active');
                $(this).parent().addClass('active');
                $('#segmentedControl .mui-control-item').removeClass('mui-active')
                $($('#segmentedControl .mui-control-item')[indextmp]).addClass('mui-active');
                document.getElementById('segmentedControl').style.display = 'block';
                document.getElementById('tab1').style.display = 'none';
            })

            mui('#segmentedControl').on('tap', '.mui-control-item', function () {
                indextmp = $(this).attr('aIndex') - 1;
                $(this).siblings().removeClass('mui-active');
                $(this).addClass('mui-active');
                $('#tab1 .tab-a').parent().siblings().removeClass('active');
                $($('#tab1 .tab-a')[indextmp]).parent().addClass('active')
            })
            /**/
            $('#tab1').click(function () {

                document.getElementById('tab1').style.display = 'none';
            })

            $('#look-header').click(function () {
                document.getElementById('tab1').style.display = 'none';
            })
            navnone();
            function navnone() {
                var nanlenght = $('.mui-control-item').length;
                for (j = 1 ; j < nanlenght; j++) {
                    $('.mui-control-item')[j];
                }

                $($('.mui-control-item')[5]).css('display', 'none');
                $($('.mui-control-item')[6]).css('display', 'none');
                $($('.mui-control-item')[7]).css('display', 'none');
                $($('.mui-control-item')[8]).css('display', 'none');
                $($('.mui-control-item')[9]).css('display', 'none');
                $($('.mui-control-item')[10]).css('display', 'none');
            }
            /*获取轮播长度 */
            item();
            function item(){
                var lunlength = $('.lun').length;
                for (var i = 0 ; i < lunlength ; i++) {
                    $('.lun')[i];				
                }	
                //额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) 		
                var  a  = $($('.lun')[0]).children().attr('href');
                var img = $($('.lun')[0]).children().children().attr('src');
                $('#fists').attr('href',a);
                $('#fists').children().attr('src',img)
             //额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) 
                var lastsa = ($($('.lun')[lunlength - 1])).children().attr('href');
                var lastsimg = ($($('.lun')[lunlength - 1])).children().children().attr('src');
                $('#lasts').attr('href',lastsa);
                $('#lasts').children().attr('src',lastsimg);	
            }
           
             war();
            function  war(){
                var lunlength = $('.lun').length;
                str = " ";
                for (var k = 0 ; k < lunlength - 1; k++) {
                    str += "<div class=\"mui-indicator\"></div>";
                }
                $('#indicator').append(str);
            }
            /**/
        </script>

    <!--Start 引入分享功能-->
	<?php 
    require(BASE_PATH.'/config/wxfxjs1.php'); ///引入微信分享
    ?> 
    <!--End 结束分享功能-->


</body>
</html>
