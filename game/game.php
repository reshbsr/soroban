<?php
include "user_auth.php";

$login=$_SESSION[login];
$event="Сложение и вычитание, старт";
include "../mysqli_connect.php";
$mysqli->query("INSERT INTO event (`login`, `event`) VALUES ('$login', '$event')");
$mysqli->close();

include "rnd.php";
 //Продолжительность показа числа:
$timer=$_GET[timer];
 //Уровень сложности, то есть максимальное количество цифр в числах:
$len=$_GET[level];
 //Количество примеров (то есть количество слагаемых):
$summand=$_GET[examples];
 //Просто. Определяет какие цифры должны обязательно присутствовать в случайных числах.
$cifra_enable[]=0;
$game_type_easy_1=$_GET[game_type_easy_1];
if($game_type_easy_1==1)
	$cifra_enable[]=1;
$game_type_easy_2=$_GET[game_type_easy_2];
if($game_type_easy_2==1)
	$cifra_enable[]=2;
$game_type_easy_3=$_GET[game_type_easy_3];
if($game_type_easy_3==1)
	$cifra_enable[]=3;
$game_type_easy_4=$_GET[game_type_easy_4];
if($game_type_easy_4==1)
	$cifra_enable[]=4;
$game_type_easy_5=$_GET[game_type_easy_5];
if($game_type_easy_5==1)
	$cifra_enable[]=5;
$game_type_easy_6=$_GET[game_type_easy_6];
if($game_type_easy_6==1)
	$cifra_enable[]=6;
$game_type_easy_7=$_GET[game_type_easy_7];
if($game_type_easy_7==1)
	$cifra_enable[]=7;
$game_type_easy_8=$_GET[game_type_easy_8];
if($game_type_easy_8==1)
	$cifra_enable[]=8;
$game_type_easy_9=$_GET[game_type_easy_9];
if($game_type_easy_9==1)
	$cifra_enable[]=9;


 //Малые друзья
$game_type_md_1=$_GET[game_type_md_1];
if($game_type_md_1==1)
	$cifra_enable=[0, 1];
$game_type_md_2=$_GET[game_type_md_2];
if($game_type_md_2==1)
	$cifra_enable=[0, 1, 2];
$game_type_md_3=$_GET[game_type_md_3];
if($game_type_md_3==1)
	$cifra_enable=[0, 1, 2, 3];
$game_type_md_4=$_GET[game_type_md_4];
if($game_type_md_4==1)
	$cifra_enable=[0, 1, 2, 3, 4];

 //Большие друзья
$game_type_bd_1=$_GET[game_type_bd_1];
if($game_type_bd_1==1)
	$cifra_enable=[0, 1];
$game_type_bd_2=$_GET[game_type_bd_2];
if($game_type_bd_2==1)
	$cifra_enable=[0, 1, 2];
$game_type_bd_3=$_GET[game_type_bd_3];
if($game_type_bd_3==1)
	$cifra_enable=[0, 1, 2, 3];
$game_type_bd_4=$_GET[game_type_bd_4];
if($game_type_bd_4==1)
	$cifra_enable=[0, 1, 2, 3, 4];
$game_type_bd_5=$_GET[game_type_bd_5];
if($game_type_bd_5==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5];
$game_type_bd_6=$_GET[game_type_bd_6];
if($game_type_bd_6==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6];
$game_type_bd_7=$_GET[game_type_bd_7];
if($game_type_bd_7==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6, 7];
$game_type_bd_8=$_GET[game_type_bd_8];
if($game_type_bd_8==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6, 7, 8];
$game_type_bd_9=$_GET[game_type_bd_9];
if($game_type_bd_9==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
//Смешанные друзья
$game_type_sd_6=$_GET[game_type_sd_6];
if($game_type_sd_6==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6];
$game_type_sd_7=$_GET[game_type_sd_7];
if($game_type_sd_7==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6, 7];
$game_type_sd_8=$_GET[game_type_sd_8];
if($game_type_sd_8==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6, 7, 8];
$game_type_sd_9=$_GET[game_type_sd_9];
if($game_type_sd_9==1)
	$cifra_enable=[0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
// $rnd2 = new Random();
// $numbers2 = $rnd2->rnd_num($len, $summand, $cifra_enable);
$rnd = new Tasks();
// $numbers = $rnd->simple();
// $numbers = $rnd->small_friends();
$numbers = $rnd->big_friends();
$summand=count($numbers);
// echo "<pre>";
// var_dump($numbers);
// echo "<br>";
// var_dump($numbers2);
// echo "</pre>";
$sum = $rnd->sum($numbers);
$num_str=$rnd->strform($numbers);
$numbers_jsob=json_encode($num_str);
//Настройка звука
if(isset($_GET[sound])){
	$volume=$_GET[sound];
	$_SESSION[checked]="checked";
}
else{
	$volume=1e-323;
	$_SESSION[checked]="";
}
?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Сложение и вычитание</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="game.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/ion.sound.min.js"></script>
<script type="text/javascript">
ion.sound({
	sounds: [
		{name: "beep_long", preload: true},
		{name: "peek", preload: true},
		{name: "right", preload: true},
		{name: "not_right", preload: true}
		,
<?php
	$str_javasript = new SoundStrJavasript("sounds/numbers/", "sounds/");
	$str_sound=$str_javasript->str_javascript($num_str);
?>
	preload: true,
	volume: <?=$volume?>
});
</script>
<script type="text/javascript">
var timer = <?=$timer?>; //время
var count = <?=$summand?>; //Количество слагаемых
var diff = <?=$len?>; //Длина числа
var is_student = 0;
var numbers = <?=$numbers_jsob?>;


$( document ).ready(function() {
	$("#task").val('');
	$("#right_answer").val('');
	$("input[name='possible_new_game_by_enter']").val(0);
	
	setTimeout(function() {$("#preloader").attr("src","images/s2.jpg")}, 230);
	setTimeout(function() {$("#preloader").attr("src","images/s3.jpg")}, 460);
	setTimeout(function() {$("#preloader").attr("src","images/s4.jpg")}, 690);
	setTimeout(function() {$("#preloader").attr("src","images/s5.jpg")}, 920);
	setTimeout(function() {$("#preloader").attr("src","images/s6.jpg")}, 1150);
	setTimeout(function() {$("#preloader").attr("src","images/s7.jpg")}, 1380);
	setTimeout(function() {$("#preloader").attr("src","images/s8.jpg")}, 1610);
	setTimeout(function() {$("#preloader").attr("src","images/s9.jpg")}, 1840);
	setTimeout(function() {$("#preloader").attr("src","images/s10.jpg")}, 2070);
	setTimeout(function() {$("#preloader").attr("src","images/s11.jpg")}, 2300);
	setTimeout(function() {$("#preloader").attr("src","images/s12.jpg")}, 2530);
	setTimeout(function() {$("#preloader").attr("src","images/s13.jpg")}, 2760);
	setTimeout(function() {ion.sound.play('beep_long')}, 2600);
	setTimeout(function() {$("#pre").addClass("number")}, 3800);
	setTimeout(function() {
    examples = <?=$summand?>;
    counter = 0;
    $("#pre").css('opacity',0);
    setTimeout(function() {$("#pre").css('opacity',1)},10);
    display = document.querySelector('#pre');
    ion.sound.play(String(numbers[counter]));
    display.innerHTML = numbers[counter++];
    Interval = setInterval(function(){
        if (counter < examples) {
            $("#pre").css('opacity',0);
            setTimeout(function() {$("#pre").css('opacity',1)},10);
            ion.sound.play(String(numbers[counter]));
            display.innerHTML = numbers[counter++];
        } else {
            clearInterval(Interval);
            $("#pre").remove();
            $("#numbers, .answers, #check_button, #repeat_button").show();
            $("#task").focus();
            $("input[name='possible_pressing_enter']").val(1);   
    
            $(document).keypress(function (e) { 
                if ((e.which == 13) && $("input[name='possible_pressing_enter']").val()==1 && $("input[name='possible_new_game_by_enter']").val()==0) {
                    $("#check_button").click();
                }
            });
            
            $(document).keypress(function (e) { 
                if ((e.which == 13) && $("input[name='possible_new_game_by_enter']").val() == 1 ) {
                    location.reload();
                }
            });  
            $("#check_button").click(function(){
                var result = $("#result").val();
                if($("#task").val() == result){
                    var is_right = 1;
                    setTimeout(function() {$("input[name='possible_new_game_by_enter']").val(1);}, 100);
                    $("#task").css('color','green');
                    $("#result_image").attr("src","images/right_smile.jpg");
                    ion.sound.play('right');
				}
				else {
                    var is_right = 0;
                    setTimeout(function() {$("input[name='possible_new_game_by_enter']").val(1);}, 100);
                    $("#task").css('color','orange');
                    $("#result_image").attr("src","images/notright_smile.jpg");
                    ion.sound.play('not_right');
                }
                $("#right_answer").val(result);
            })         
        }
    }, 1000 * timer)
},3800);

	$("#repeat").click(function(){
        $("#task").val('');
		$("#right_answer").val('');
		$("input[name='possible_new_game_by_enter']").val(0);
    });
	
});
</script>
</head>
<body>
<div id="pre"><img src="/images/s1.jpg" style="height: 520px;width: auto;margin:auto;display:block;" id="preloader"/></div>
<div class="col-md-12" id="numbers" style="display:none;margin-top: 50px;">
  <div class="col-md-5 text-center">
	<div class="col-md-12 answers" style="display: none;color:orange;">
		Ваш ответ	</div>
	<div class="col-md-12">
		<input type="text" class="left rounded" style="border: none;box-shadow: none; background-color:#fff;"  id="task" value="" />
	</div>
  </div>
  <div class="col-md-2 text-center" style="margin-top: 195px;">
		<img id="result_image" src="images/blank.png" height="140px"/>
  </div>
  <div class="col-md-5 text-center">
	<div class="col-md-12 answers" style="display: none;color:#0C54A0;">
		Правильный ответ	</div>
	<div class="col-md-12">
		<input type="text" class="left rounded" style="border: none;box-shadow: none;background-color:#fff;"  id="right_answer" value="" readonly=""/>
	</div>
  </div>
</div>
  <div class="clearfix"></div>
  <div class="time_field" style="display: table; margin: auto;">    
    <div style="text-align:center;display:none;margin:25px 35px;float:left;" id="check_button"><input type="button" id="next" value="Проверить" class="btn btn-primary" style="width: 100px;"></div>
	<div style="text-align:center;display:none;margin:25px 35px;float:left;" id="repeat_button"><input onclick="location.reload();" type="button" id="repeat" value="Повторить" class="btn btn-success"  style="width: 100px;"></div>
    <div style="text-align:center;margin:25px 35px;float:left;" id="back_button"><a href="index.php" class="btn btn-danger" style="width: 100px;">Выход</a></div>        
  </div>
  <input type="hidden" id="result" value = <?=$sum?>>
<input type="hidden" name="possible_pressing_enter" value="0" />
<input type="hidden" name="possible_new_game_by_enter" value="0" />
<div class="">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
	<img src="images/logo.jpg" style="height: 100px; margin: 0 auto; display: block;">
	</div>
	<div class="col-md-3">
	<img src="images/children.png" style="height: 150px;">
	</div>
	</div>
</div>
</body>
</html>