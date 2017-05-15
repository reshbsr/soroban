<?php
//Продолжительность показа числа:
$timer=$_GET[speed];
//Определение числа слагаемых
$summand=count($numbers);

//Определение правильного ответа
$sum = $rnd->sum($numbers);

//Преобразование массива чисел в массив строк, где в каждую строку записано число
$num_str=$rnd->strform($numbers);

//Преобразование массива в формат json, на выходе получается одна строка
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
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Сложение и вычитание</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="game.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/game.css" rel="stylesheet" type="text/css" />
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
    var speed=<?=$_GET[speed]?>;
    if(speed>=1)
        ion.sound.play(String(numbers[counter]));
    display.innerHTML = numbers[counter++];
    Interval = setInterval(function(){
        if (counter < examples) {
            $("#pre").css('opacity',0);
            setTimeout(function() {$("#pre").css('opacity',1)},10);
            if(speed>=1)
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
                    $("#result_image").attr("src","images/right_smile_text.png");
                    ion.sound.play('right');
                }
                else {
                    var is_right = 0;
                    setTimeout(function() {$("input[name='possible_new_game_by_enter']").val(1);}, 100);
                    $("#task").css('color','orange');
                    $("#result_image").attr("src","images/notright_smile_text.gif");
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
<?php
include "header_game_process.php";
?>
<div style="height: 370px; width: 100%; background: #fff; overflow: hidden">
<div id="pre" style="font-size: 240px; line-height: 1; margin: 0; padding: 0;"><img src="/images/s1.jpg" style="height: 280px; width: auto;margin:auto; display:block;" id="preloader"/></div>
<!-- Поля ввода: Ваш ответ, правильный ответ -->
<div class="col-md-12" id="numbers" style="display:none;">
      <div class="col-md-5 text-center">
        <div class="col-md-12 answers" style="display: none;color:orange;">
            Ваш ответ   </div>
        <div class="col-md-12">
            <input type="text" class="left rounded" style="border: none;box-shadow: none; background-color:#fff; font-size: 200px; line-height: 1;"  id="task" value="" />
        </div>
      </div>
      <div class="col-md-2 text-center" style="margin-top: 70px;">
            <img id="result_image" src="images/blank.png" height="140px"/>
      </div>
      <div class="col-md-5 text-center">
        <div class="col-md-12 answers" style="display: none;color:#0C54A0;">
            Правильный ответ    </div>
        <div class="col-md-12">
            <input type="text" class="left rounded" style="border: none;box-shadow: none;background-color:#fff; font-size: 200px; line-height: 1;"  id="right_answer" value="" readonly=""/>
        </div>
      </div>
</div>
  <!-- КНОПКИ -->
  <div class="time_field" style="display: table; margin: auto;">    
        <div style="text-align:center;display:none;margin:25px 35px;float:left; " id="check_button">
            <input type="button" id="next" value="Проверить" class="game_process_buttons game_process_check" >
        </div>
        <div style="text-align:center;display:none;margin:25px 35px;float:left;" id="repeat_button" >
            <input onclick="location.reload();" type="button" id="repeat" value="Повторить" class="game_process_buttons game_process_repeat">
        </div>
        <div style="text-align:center;margin:25px 35px;float:left;" id="back_button">
            <a href="<?=$_GET[link_exit]?>" class="game_process_buttons game_process_exit">
                Выход
            </a>
        </div>        
  </div>
<input type="hidden" id="result" value = <?=$sum?>>
<input type="hidden" name="possible_pressing_enter" value="0" />
<input type="hidden" name="possible_new_game_by_enter" value="0" />
</div>
<?php
include "footer.php";