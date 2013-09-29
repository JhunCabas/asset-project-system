<?php
//****************************************************************//
//****************************************************************//
//** ชื่อไฟล์ : loginPage.php 
//** คำอธิบาย : ไฟล์นี้เป็น login บนเว็ป
//** Version : 1.0
//** CoddingDate : 13/08/2556
//** Credit : นัฐวุฒิ เผือกทอง 
//****************************************************************//
//****************************************************************//
?>

<div class="containerLogin">
    <div class="login">
    <h1><img src="image/assetBanner.png"></h1>
    <center><font size="5px;">ลงชื่อเข้าใช้ระบบ</font></center>
    <form id="login" class="Login-form" method="post" action="">
            </br>
        <table>
            <tr>
                <td>
                	ชื่อผู้ใช้
                </td>
                <td>
                	<input id="username" name="uname" type="text" placeholder="ชื่อผู้ใช้" >
                </td>
			</tr>
                
			<tr>
                <td>
                	รหัสผ่าน
                </td>
                <td>
                	<input id="password" name="passwd" type="password" placeholder="รหัสผ่าน">
                </td>
                <td>
                	<input name="submitBtm" type="submit" class="button big" value="ลงชื่อเข้าใช้" onclick="validateLogin();"/>
                </td>
			</tr>
		</table>
        </form>
    </div>
</div>