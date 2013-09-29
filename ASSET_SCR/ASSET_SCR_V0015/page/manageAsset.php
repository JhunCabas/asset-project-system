<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : manageAsset.php 
//** คำอธิบาย : ไฟล์นี้เป็น หน้าจัดการครุภัณฑ์
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
?>
	<div class="manage">
            <h1><img src="../image/assetBanner.png"></h1><center>
            <center><font size="5px;">การจัดการครุภัณฑ์</font></center>
            ค้นหาเลขครุภัณฑ์ : <input id='searchAsset' type='text' style='width: 150px;' 
            placeholder='xx/xx-xxxx-xxx' onKeyDown="searchAsset(event);">
            <a class="button big icon search" onclick="searchAsset(event);">ค้นหา</a>
            </br></br>
            <table>
                <tr><td colspan="1"><div id="hdrAssetY" class="manageType"></div></td>
                <td colspan="1"><div id="hdrAssetT" class="manageType"></div></td>
                <td colspan="1"><div id="hdrAssetG" class="manageType"></div></td></tr>
            </table>
            </br><a class="button big icon add" onclick="showAddAsset();">เพิ่มข้อมูลครุภัณฑ์</a>
            </center></br>
        <div id="addAsset" class="manageContent" style="display:none;"></div>
        <div id="showAsset"></div>
	</div>
    
    
 