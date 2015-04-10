<?php


// cvn2加密 1：加密 0:不加密
const SDK_CVN2_ENC = 0;
// 有效期加密 1:加密 0:不加密
const SDK_DATE_ENC = 0;
// 卡号加密 1：加密 0:不加密
const SDK_PAN_ENC = 0;
 

// 签名证书路径
const SDK_SIGN_CERT_PATH = 'D:/certs/700000000000001new1.cer.pfx';

// 签名证书密码
 const SDK_SIGN_CERT_PWD = '000000';
 
// 验签证书
const SDK_VERIFY_CERT_PATH = 'D:/certs/UPOP_VERIFY.cer';

// 密码加密证书
const SDK_ENCRYPT_CERT_PATH = 'D:/certs/cert_49.cer';

// 验签证书路径
const SDK_VERIFY_CERT_DIR = 'D:/certs/cert_49 (1).cer';

// 前台请求地址
const SDK_FRONT_TRANS_URL = 'http://146.240.25.27:11000/ACP/api/frontTransReq.do';

// 后台请求地址
const SDK_BACK_TRANS_URL = 'http://146.240.25.27:11000/ACP/api/backTransReq.do';

// 批量交易
const SDK_BATCH_TRANS_URL = 'http://146.240.25.27:11000/ACP/api/batchTrans.do';

//批量交易状态查询
const SDK_BATCH_QUERY_URL = 'http://172.17.138.27:10086/gateway/api/batchQueryRequest.do';
//http://146.240.25.27:11000/ACP/api/queryTrans.do

//单笔查询请求地址
const SDK_SINGLE_QUERY_URL = 'http://146.240.25.27:11000/ACP/internal/api/backTransReq.do';

//文件传输请求地址
const SDK_FILE_QUERY_URL = 'http://172.17.138.27:10086/gateway/api/fileTransRequest.do';

// 前台通知地址
const SDK_FRONT_NOTIFY_URL = 'http://127.1:88/upacp_sdk_php/demo/response.php';
// 后台通知地址
const SDK_BACK_NOTIFY_URL = 'http://127.1:88/upacp_sdk_php/demo/response.php';

//文件下载目录 
const SDK_FILE_DOWN_PATH = 'd:\\';

//日志 目录 
const SDK_LOG_FILE_PATH = 'D:/certs/UPOnlineMPIUtilPhp/logs/';

//日志级别
const SDK_LOG_LEVEL = 'INFO';

//有卡交易地址
const SDK_Card_Request_Url = '';

//App交易地址
const SDK_App_Request_Url = '';
	
?>