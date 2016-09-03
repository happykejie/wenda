<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>΢��JS-SDK Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <link rel="stylesheet" href="http://demo.open.weixin.qq.com/jssdk/css/style.css?ts=1420774989">
</head>
<body ontouchstart="">
<div class="wxapi_container">
    <div class="wxapi_index_container">
      <ul class="label_box lbox_close wxapi_index_list">
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-basic">�����ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-share">�����ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-image">ͼ��ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-voice">��Ƶ�ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-smart">���ܽӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-device">�豸��Ϣ�ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-location">����λ�ýӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-webview">��������ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-scan">΢��ɨһɨ�ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-shopping">΢��С��ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-card">΢�ſ�ȯ�ӿ�</a></li>
        <li class="label_item wxapi_index_item"><a class="label_inner" href="#menu-pay">΢��֧���ӿ�</a></li>
      </ul>
    </div>
    <div class="lbox_close wxapi_form">
      <h3 id="menu-basic">�����ӿ�</h3>
      <span class="desc">�жϵ�ǰ�ͻ����Ƿ�֧��ָ��JS�ӿ�</span>
      <button class="btn btn_primary" id="checkJsApi">checkJsApi</button>

      <h3 id="menu-share">�����ӿ�</h3>
      <span class="desc">��ȡ������������Ȧ����ť���״̬���Զ���������ݽӿ�</span>
      <button class="btn btn_primary" id="onMenuShareTimeline">onMenuShareTimeline</button>
      <span class="desc">��ȡ�����������ѡ���ť���״̬���Զ���������ݽӿ�</span>
      <button class="btn btn_primary" id="onMenuShareAppMessage">onMenuShareAppMessage</button>
      <span class="desc">��ȡ��������QQ����ť���״̬���Զ���������ݽӿ�</span>
      <button class="btn btn_primary" id="onMenuShareQQ">onMenuShareQQ</button>
      <span class="desc">��ȡ����������Ѷ΢������ť���״̬���Զ���������ݽӿ�</span>
      <button class="btn btn_primary" id="onMenuShareWeibo">onMenuShareWeibo</button>

      <h3 id="menu-image">ͼ��ӿ�</h3>
      <span class="desc">���ջ���ֻ������ѡͼ�ӿ�</span>
      <button class="btn btn_primary" id="chooseImage">chooseImage</button>
      <span class="desc">Ԥ��ͼƬ�ӿ�</span>
      <button class="btn btn_primary" id="previewImage">previewImage</button>
      <span class="desc">�ϴ�ͼƬ�ӿ�</span>
      <button class="btn btn_primary" id="uploadImage">uploadImage</button>
      <span class="desc">����ͼƬ�ӿ�</span>
      <button class="btn btn_primary" id="downloadImage">downloadImage</button>

      <h3 id="menu-voice">��Ƶ�ӿ�</h3>
      <span class="desc">��ʼ¼���ӿ�</span>
      <button class="btn btn_primary" id="startRecord">startRecord</button>
      <span class="desc">ֹͣ¼���ӿ�</span>
      <button class="btn btn_primary" id="stopRecord">stopRecord</button>
      <span class="desc">���������ӿ�</span>
      <button class="btn btn_primary" id="playVoice">playVoice</button>
      <span class="desc">��ͣ���Žӿ�</span>
      <button class="btn btn_primary" id="pauseVoice">pauseVoice</button>
      <span class="desc">ֹͣ���Žӿ�</span>
      <button class="btn btn_primary" id="stopVoice">stopVoice</button>
      <span class="desc">�ϴ������ӿ�</span>
      <button class="btn btn_primary" id="uploadVoice">uploadVoice</button>
      <span class="desc">���������ӿ�</span>
      <button class="btn btn_primary" id="downloadVoice">downloadVoice</button>

      <h3 id="menu-smart">���ܽӿ�</h3>
      <span class="desc">ʶ����Ƶ������ʶ�����ӿ�</span>
      <button class="btn btn_primary" id="translateVoice">translateVoice</button>

      <h3 id="menu-device">�豸��Ϣ�ӿ�</h3>
      <span class="desc">��ȡ����״̬�ӿ�</span>
      <button class="btn btn_primary" id="getNetworkType">getNetworkType</button>

      <h3 id="menu-location">����λ�ýӿ�</h3>
      <span class="desc">ʹ��΢�����õ�ͼ�鿴λ�ýӿ�</span>
      <button class="btn btn_primary" id="openLocation">openLocation</button>
      <span class="desc">��ȡ����λ�ýӿ�</span>
      <button class="btn btn_primary" id="getLocation">getLocation</button>

      <h3 id="menu-webview">��������ӿ�</h3>
      <span class="desc">�������Ͻǲ˵��ӿ�</span>
      <button class="btn btn_primary" id="hideOptionMenu">hideOptionMenu</button>
      <span class="desc">��ʾ���Ͻǲ˵��ӿ�</span>
      <button class="btn btn_primary" id="showOptionMenu">showOptionMenu</button>
      <span class="desc">�رյ�ǰ��ҳ���ڽӿ�</span>
      <button class="btn btn_primary" id="closeWindow">closeWindow</button>
      <span class="desc">�������ع��ܰ�ť�ӿ�</span>
      <button class="btn btn_primary" id="hideMenuItems">hideMenuItems</button>
      <span class="desc">������ʾ���ܰ�ť�ӿ�</span>
      <button class="btn btn_primary" id="showMenuItems">showMenuItems</button>
      <span class="desc">�������зǻ�����ť�ӿ�</span>
      <button class="btn btn_primary" id="hideAllNonBaseMenuItem">hideAllNonBaseMenuItem</button>
      <span class="desc">��ʾ���й��ܰ�ť�ӿ�</span>
      <button class="btn btn_primary" id="showAllNonBaseMenuItem">showAllNonBaseMenuItem</button>

      <h3 id="menu-scan">΢��ɨһɨ</h3>
      <span class="desc">����΢��ɨһɨ�ӿ�</span>
      <button class="btn btn_primary" id="scanQRCode0">scanQRCode(΢�Ŵ������)</button>
      <button class="btn btn_primary" id="scanQRCode1">scanQRCode(ֱ�ӷ��ؽ��)</button>

      <h3 id="menu-shopping">΢��С��ӿ�</h3>
      <span class="desc">��ת΢����Ʒҳ�ӿ�</span>
      <button class="btn btn_primary" id="openProductSpecificView">openProductSpecificView</button>

      <h3 id="menu-card">΢�ſ�ȯ�ӿ�</h3>
      <span class="desc">�������ӿ�ȯ�ӿ�</span>
      <button class="btn btn_primary" id="addCard">addCard</button>
      <span class="desc">�����������ŵ�Ŀ�ȯ�б�����ȡ�û�ѡ���б�</span>
      <button class="btn btn_primary" id="chooseCard">chooseCard</button>
      <span class="desc">�鿴΢�ſ����еĿ�ȯ�ӿ�</span>
      <button class="btn btn_primary" id="openCard">openCard</button>

      <h3 id="menu-pay">΢��֧���ӿ�</h3>
      <span class="desc">����һ��΢��֧������</span>
      <button class="btn btn_primary" id="chooseWXPay">chooseWXPay</button>
    </div>
  </div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"> </script>
<script>
  wx.config({
      debug: false,
      appId: 'wxf8b4f85f3a794e77',
      timestamp: 1420774989,
      nonceStr: '2nDgiWM7gCxhL8v0',
      signature: '1f8a6552c1c99991fc8bb4e2a818fe54b2ce7687',
      jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onRecordEnd',
        'playVoice',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
      ]
  });
</script>
<script src="http://demo.open.weixin.qq.com/jssdk/js/api-6.1.js?ts=1420774989"> </script>
</html>