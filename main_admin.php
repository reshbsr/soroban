<?php
include "admin_auth.php";

$game=$_GET[game];
if($game){
  header("Location:game/index.php");
}
include "admin_header.php";
?>   
     <a href="game" class="button_link">  
      <button type="button" name="game" value="1" class="button">
        Игра:&nbsp;Сложение&nbsp;и&nbsp;вычитание
      </button>
    </a>
    <img src="images/children.png" class="img">
<?php
include "admin_footer.php";

