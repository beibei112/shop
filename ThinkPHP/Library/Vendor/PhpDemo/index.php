<?php
//载入ucpass类
// require_once('lib/Ucpaas.class.php');
// Vendor('PhpDemo.lib.Ucpaas.class.php');

import('Vendor.PhpDemo.lib.Ucpaas'); 

//初始化必填
$options['accountsid']='bc9892e8be9c12fd5d0e5f6b87df2f6b';
$options['token']='a2ba713386139ea99a77ed93733f8590';

//初始化 $options必填
$ucpass = new Ucpaas($options);

//开发者账号信息查询默认为json或xml
header("Content-Type:text/html;charset=utf-8");

//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
$appId = "93d6445c718243eebbee2e60eb7ee43f";
$to = "17600561005";
$templateId = "190451";
$param="1314";

echo $ucpass->templateSMS($appId,$to,$templateId,$param);