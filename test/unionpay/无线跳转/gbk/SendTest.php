<?php
//include './gbk/Front/FrontDeal.php';
//include './gbk/front/AuthDeal.php';
include_once '../func/secureUtil.php';
include_once '../func/encryptParams.php';
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>����ҳ��</title>
<style type="text/css">
body table tr td {
	font-size: 14px;
	word-wrap: break-word;
	word-break: break-all;
	empty-cells: show;	
}
</style>
<script type="text/javascript">  

    function test()  
    {  
    	window.location.href="FrontReceive.php";
    	   	       
    }
    function showValue(){
    	pwd.value = "";     
        for (i=0;i<cus.length;i++){
        if(cus[i].checked)
        	pwd.value+=cus[i].checked?cus[i].value+' ':'';
       }    
      }
    
}
</script> 
</head>
<body>
 <form action="BackReceive.php" method="post">
 <table width="900px" border="1" align="center">
 <tr><td align="left" colspan="2" >��������</td></tr>
<tr><td width="30%">�汾��</td><td><input type="text"  name="flags[version]"   value="5.0.0"/></td></tr>
<tr><td width="30%">���뷽ʽ</td><td><input type="text"  name="flags[encoding]" value="GBK"/></td></tr>
<tr><td width="30%">֤��ID</td><td>
<input type="text"  name="flags[certId]"   value="<?=getSignCertId()?>"/></td></tr>
<tr><td width="30%">ǩ����</td><td><input type="text"  name="flags[signature]" value=""/></td></tr>
<tr><td width="30%">ǩ������</td><td><input type="text" name="flags[signMethod]" value=""/></td></tr>
<tr><td width="30%">��������</td><td><input type="text" name="flags[txnType]" value=""/></td></tr>
<tr><td width="30%">��������</td><td><input type="text" name="flags[txnSubType]" value=""/></td></tr>
<tr><td width="30%">��Ʒ����</td><td><input type="text" name="flags[bizType]" value=""/></td></tr>
<tr><td width="30%">��������</td><td><input type="text" name="flags[channelType]" value=""/></td></tr>
<tr><td width="30%" >�ֿ����Ƿ������Ϣ<td>
<input type="checkbox" name="arr[SDK_PAN_ENC]"  value="" checked="true"/>���� 
<input type="checkbox" name="arr[SDK_CVN2_ENC]" value="" checked="true"/>CVN2
<input type="checkbox" name="arr[SDK_DATE_ENC]" value="" checked="true"/>��Ч��</td></tr>
<tr><td width="30%">ǰ̨��ַ</td><td><input type="text" name="flags[frontUrl]" value=""/></td></tr>
<tr><td width="30%">��̨��ַ</td><td><input type="text" name="flags[backUrl]"  value=""/></td></tr>
<tr><td width="30%">��������</td><td><input type="text" name="flags[accessType]" value=""/></td></tr>
<tr><td width="30%">�̻�ID</td><td><input type="text" name="flags[merId]"  	value="898340183980105"/></td></tr>
<tr><td width="30%">�̻�������</td><td><input type="text" name="flags[orderId]" value=""/></td></tr>
<tr><td width="30%" >��������ʱ��</td><td><input type="text" name="flags[txnTime]"  value="20141124145900"/></td></tr>
<tr><td width="30%">���ױ���</td><td><input type="text" name="flags[currencyCode]" value=""/></td></tr>
<tr><td width="30%">���׽��</td><td><input type="text" name="flags[txnAmt]" value=""/></td></tr>
<tr><td width="30%">��������</td><td><input type="text" name="flags[accessType]" value=""/></td></tr>
<tr><td width="30%">�յ���������</td><td><input type="text" name="flags[acqInsCode]"  	value=""/></td></tr>
<tr><td width="30%">�̻����</td><td><input type="text" name="flags[merCatCode]" value=""/></td></tr>
<tr><td width="30%">�̻�����</td><td><input type="text" name="flags[merName]" value=""/></td></tr>
<tr><td width="30%">�̻����</td><td><input type="text" name="flags[currencyCode]" value=""/></td></tr>
<tr><td width="30%">�����̻�����</td><td><input type="text" name="flags[txnAmt]" value=""/></td></tr>
<tr><td width="30%">�����̻�����</td><td><input type="text" name="flags[accessType]" value=""/></td></tr>
 <tr><td width="30%">Ĭ��֧����ʽ</td><td><input type="text" name="flags[defaultPayType]" value=""/></td></tr>
<tr><td width="30%">֧��������</td><td><input type="text" name="flags[payCardType]" value=""/></td></tr>
<tr><td width="30%">�˻�����</td><td><input type="text" name="flags[accType]" value=""/></td></tr>
<tr><td width="30%">�˺�</td><td><input type="text" name="flags[accNo]" value=""/></td></tr>
<tr><td width="30%">�˵���</td><td><input type="text" name="flags[billNo]" value=""/></td></tr>
<tr><td width="30%">�˵�����</td><td><input type="text" name="flags[billType]" value=""/></td></tr>
<tr><td width="30%">�󶨱�ʶ��</td><td><input type="text" name="flags[bindId]" value=""/></td></tr>
<tr><td width="30%">������Ϣ��</td><td><input type="text" name="flags[riskRateInfo]" value=""/></td></tr>
<tr><td width="30%">���κ�</td><td><input type="text" name="flags[batchNo]" value=""/></td></tr>
<tr><td width="30%">�ܽ��</td><td><input type="text" name="flags[totalAmt]" value=""/></td></tr>
<tr><td width="30%">�ܱ���</td><td><input type="text" name="flags[totalQty]" value=""/></td></tr>
<tr><td width="30%">������</td><td><input type="text" name="flags[reserved]" value=""/></td></tr>
<tr><td width="30%">�ն˺�</td><td><input type="text" name="flags[termId]" value=""/></td></tr>
<tr><td width="30%">������ʱʱ����</td><td><input type="text" name="flags[orderTimeoutInterval]" value=""/></td></tr>
<tr><td width="30%">Ĭ��֧����ʽ</td><td><input type="text" name="flags[supPayType]" value=""/></td></tr>
<tr><td width="30%">֧����ʽ</td><td><input type="text" name="flags[payType]" value=""/></td></tr>
<tr><td width="30%">Ԥ��Ȩ��</td><td><input type="text" name="fla[gspreAuthId]" value=""/></td></tr>
<tr><td width="30%">������������</td><td><input type="text" name="flags[issInsCode]" value=""/></td></tr>
<tr><td width="30%">������ʡ</td><td><input type="text" name="flags[issInsProvince]" value=""/></td></tr>
<tr><td width="30%">��������</td><td><input type="text" name="flags[issInsCity]" value=""/></td></tr>
<tr><td width="30%">����������</td><td><input type="text" name="flags[issInsName]" value=""/></td></tr>
<tr><td width="30%">���</td><td><input type="text" name="flags[balance]" value=""/></td></tr>
<tr><td width="30%">��������</td><td><input type="text" name="flags[districtCode]" value=""/></td></tr>
<tr><td width="30%">���ӵ�������</td><td><input type="text" name="flags[additionalDistrictCode]" value=""/></td></tr>
<tr><td width="30%">�˵��·�</td><td><input type="text" name="flags[billMonth]" value=""/></td></tr>
<tr><td width="30%">�˵���ѯҪ��</td><td><input type="text" name="flags[billQueryInfo]" value=""/></td></tr>
<tr><td width="30%">�˵�����</td><td><input type="text" name="flags[billDetailInfo]" value=""/></td></tr>
<tr><td width="30%">�˵����</td><td><input type="text" name="flags[billAmt]" value=""/></td></tr>
<tr><td width="30%">�˵�������</td><td><input type="text" name="flags[billAmtSign]" value=""/></td></tr>
<tr><td width="30%">����Ϣ����</td><td><input type="text" name="flags[bindInfoQty]" value=""/></td></tr>
<tr><td width="30%">����Ϣ��</td><td><input type="text" name="flags[bindInfoList]" value=""/></td></tr>
<tr><td width="30%">�ļ�����</td><td><input type="text" name="flags[fileType]" value=""/></td></tr>
<tr><td width="30%">�ļ���</td><td><input type="text" name="flags[fileName]" value=""/></td></tr>
<tr><td width="30%">�����ļ�����</td><td><input type="text" name="flags[fileContent]" value=""/></td></tr>
<tr><td width="30%">�̻�ժҪ</td><td><input type="text" name="flags[merNote]" value=""/></td></tr>
<tr><td width="30%">��������ʶ��ģʽ</td><td><input type="text" name="flags[issuerIdentifyMode]" value=""/></td></tr>
<tr><td width="30%">�ֿ���IP</td><td><input type="text" name="flags[customerIp]" value=""/></td></tr>
<tr><td width="30%">��ѯ��ˮ��</td><td><input type="text" name="flags[queryId]" value=""/></td></tr>
<tr><td width="30%">ԭ���ײ�ѯ��ˮ��</td><td><input type="text" name="flags[origQryId]" value=""/></td></tr>
<tr><td width="30%">ϵͳ���ٺ�</td><td><input type="text" name="flags[traceNo]" value=""/></td></tr>
<tr><td width="30%">�ļ���������</td><td><input type="text" name="flags[traceTime]" value=""/></td></tr>
<!--<tr><td width="30%">��������</td><td><input type="text" name="flags[settleDate]" value=""/></td></tr>
  <tr><td width="30%">�������</td><td><input type="text" name="flags[settleCurrencyCode]" value=""/></td></tr>
 <tr><td width="30%">������</td><td><input type="text" name="flags[settleAmt]" value=""/></td></tr>
 <tr><td width="30%">�һ�����</td><td><input type="text" name="flags[exchangeDate]" value=""/></td></tr>
<tr><td width="30%">��Ӧʱ��</td><td><input type="text" name="flags[respTime]" value=""/></td></tr>
 <tr><td width="30%">Ӧ����</td><td><input type="text" name="flags[respCode]" value=""/></td></tr>
<tr><td width="30%">Ӧ����Ϣ</td><td><input type="text" name="flags[respMsg]" value=""/></td></tr>-->
<tr><td width="30%">���󷽱�����</td><td><input type="text" name="flags[reqReserved]" value=""/></td></tr>
<tr><td width="30%">��֤��ʶ</td><td><input type="text" name="flags[checkFlag]" value=""/></td></tr>
<tr><td width="30%">��ͨ״̬</td><td><input type="text" name="flags[activateStatus]" value=""/></td></tr>
<tr><td width="30%">����֤��ID</td><td><input type="text" name="flags[encryptCertId]" value=""/></td></tr>
<tr><td width="30%">�ն���Ϣ��</td><td><input type="text" name="flags[userMac]" value=""/></td></tr>
<!--  <tr><td width="30%">��������</td><td><input type="text" name="flags[relationTxnType]" value=""/></td></tr>-->
<tr><td width="30%">�ļ�ʱ��</td><td><input type="text" name="flags[traceTime]" value=""/></td></tr>

<tr><td><input type="submit" id="submit" value="BackSend"  /></td>
    <td><input type="button" id="button1" value="FrontSend"  onclick="test()"/></td>
</tr>

</table>
</form>	

</body>
</html>