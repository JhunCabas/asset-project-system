
<html>
<head>
<meta charset="utf-8">
<link href="css/pure-min.css" rel="stylesheet" type="text/css" />
<link href="css/buttonStyle.css" rel="stylesheet" type="text/css" />
<title>ลงชื่อเข้าใช้ระบบ</title>
</head>
<body>
<div class="containerLogin">
    <div class="login">
    <h1>ลงชื่อเข้าใช้ระบบจัดการครุภัณฑ์มูลค่าต่ำกว่าเกณฑ์</h1>
        <table>
            <tr>
                <td>
                	Username
                </td>
                <td>
                	<input id="uname" type="text" placeholder="Username">
                </td>
			</tr>
                
			<tr>
                <td>
                	Password
                </td>
                <td>
                	<input id="password" type="password" placeholder="password">
                </td>
			</tr>
                
			<tr>
                <td>
                </td>
                <td>
                	<input id="remember" type="checkbox"> Remember me
                </td>
			</tr>    
		</table>
        <center>
        	<input class="button big" type="button" value="เข้าสู่ระบบ" onClick="location.href='main.php'">
        </center>
    </div>
</div>
</body>
</html>