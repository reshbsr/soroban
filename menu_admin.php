    <div class="admin_conteiner">
        <form action="index.php">
            <button type="submit" class="button_admin">
                Главная
            </button>
        </form>
        <form action="user_add.php" method="GET">
            <button type="submit" name="user_add" value="1" class="button_admin">
                Добавить&nbsp;пользователя
            </button>
        </form>
        <form action="user_find_all.php" method="GET">
            <button type="submit" name="user_find_all" value="1" class="button_admin">
                Список&nbsp;пользователей
            </button>   
        </form>

    <form action="user_find.php" method="GET">
        <button type="submit" name="user_find_all" value="1" class="button_admin">
            Найти&nbsp;пользователя
        </button>   
    </form>

    <form action="logs_query_form.php">
        <button type="submit" name="logs_query_form" value="1" class="button_admin">
            История&nbsp;посещений
        </button>  
    </form> 
    </div>
<div class="right-conteiner">
