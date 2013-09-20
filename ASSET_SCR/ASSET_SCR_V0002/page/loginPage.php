<div class="containerLogin">
    <div class="login">
    <h1><img src="image/assetBanner.png"></h1>
    <center><font size="5px;">ลงชื่อเข้าใช้ระบบ</font></center>
    <form id="login-form" name="Login-form" class="Login-form" action="login.php" method="post" onsubmit="return required()">
            </br>
        <table>
            <tr>
                <td>
                	ชื่อผู้ใช้
                </td>
                <td>
                	<input id="uname" name="username" type="text" placeholder="ชื่อผู้ใช้">
                </td>
			</tr>
                
			<tr>
                <td>
                	รหัสผ่าน
                </td>
                <td>
                	<input id="password" name="password" type="password" placeholder="รหัสผ่าน">
                </td>
                <td>
                	<input id="submitBtm" type="submit" class="button big icon lock" value="ลงชื่อเข้าใช้">
                </td>
			</tr>
		</table>
        </form>
    </div>
</div>