<?php
$hostName = 'localhost';
$userName = 'root';
$passWords = 'fjm123456';
date_default_timezone_set('prc');

$conn = mysql_connect($hostName,$userName,$passWords);
if(!$conn){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('signup',$conn);
$signtime= date('H:i:s',time());

if(!empty($_POST[username])){
	$sql="INSERT INTO sign_up_list (name, phonenum,class,signtime)VALUES
('$_POST[username]','$_POST[phonenum]','$_POST[class]','$signtime')";
mysql_query($sql,$conn);   //这里是添加数据。
}

//读取数据
$p = $_GET["p"];
if(empty($p)) $p = 0;
$to_p= $p+8;

$sql = 'select name,signtime from sign_up_list order by openid desc';   //读取所有签到同学。

$result = mysql_query($sql,$conn);

?>
<title>阳江一中97届20周年同学聚会</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">

<style>
body{
background-image:url(img/bg_list_more.png);
background-size: 100% 100%;
position:relative;
}
#div{
width:65%;
position:absolute;
height:54.5%;
left:50%;
margin-left:-32.5%;
top:26.6%;
overflow-y:auto;
}
#div ul{
list-style-type: none;
padding:0;
}
#div ul li{
width:100%;
height:35px;
line-height:35px;
font-size:15px;
border-bottom:1px solid #C0A665;
}
#div ul li .pull-left{
float:left;
}
#div ul li .pull-right{
float:right;
}

#div ul li .pull-righ fontstyle{
	font-size:1.2rem;
	font-family: "Microsoft YaHei";
	color:#787575;
}

input[type="submit"]{
        -webkit-transform: scale(0.4);
        background:url(img/bt_ack.png);
        width:300px;
        height:75px;
        border:none;
        outline:medium;
    }
</style>
<script>

</script>
</head>

<body>
<div id="div">
    <?php
		echo '<ul>';
        while($info = mysql_fetch_row($result)){
            echo '<li>';
            foreach($info as $key => $value){
				if($key%2==0){
					echo '<span class="pull-left">'.'<font class="fontstyle">'.$value.'</font>'.'</span>';
				}else{
					echo '<span class="pull-right">'.'<font class="fontstyle">'.$value.'</font>'.'</span>';
				}
            }
            echo '</li>';
        }
		echo '</ul>';
    ?>
</div>
<div style=" position:absolute;left: 10%;top:85%;">
    <input type="submit" value="" onclick="WeixinJSBridge.invoke('closeWindow',{},function(res){});">
</div>
</body>
<?php
mysql_free_result($result);
mysql_close($conn);
?>
</html>