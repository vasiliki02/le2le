<?php
include_once $_SERVER ['DOCUMENT_ROOT'] . '/upacp_sdk_php/demo/SDKConstants.php';
include_once '../func/common.php';
include_once '../func/secureUtil.php';


?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<title>�������߽��ײ���-���</title>
<style type="text/css">
body table tr td {
	font-size: 14px;
	word-wrap: break-word;
	word-break: break-all;
	empty-cells: show;
}
</style>
</head>
<body>
	<table width="800px" border="1" align="center">
		<tr>
			<th colspan="2" align="center">�������߽��ײ���-���׽��</th>
		</tr>
			<?php
			foreach ( $_REQUEST as $key => $val ) {
				?>
			<tr>
			<td width='30%'><?php echo isset($mpi_arr[$key]) ?$mpi_arr[$key] : $key ;?></td>
			<td><?php echo $val ;?></td>
		</tr>
			<?php }?>
			<tr>
			<td width='30%'>��֤ǩ��</td>
			<td><?php			
			if (isset ( $_REQUEST ['signature'] )) {
				
				echo verify ( $_REQUEST ) ? '��ǩ�ɹ�' : '��ǩʧ��';
			} else {
				echo 'ǩ��Ϊ��';
			}
			?></td>
		</tr>

	</table>
</body>
</html>
