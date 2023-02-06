    <?php
    include_once('config.php');
    include_once('err_handler.php');
    include_once('db_connect.php');
    include_once('functions.php');

    include_once('find_token.php');

    if(!isset($_GET['type'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр type!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    
    else if(preg_match_all("/^(add_company)$/ui", $_GET['type'])){
        if(!isset($_GET['name'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр name!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        
        $query = "INSERT INTO companies(`name`) VALUES ('".$_GET['name']."')";

        $res_query = mysqli_query($connection, $query);

        if(!$res_query){
            echo ajax_echo(
                "Ошибка!",
                "Ошибка в запросе!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        
        echo ajax_echo(
            "Уcпех!",
            "Новая компания добавлена в бд!",
            false,
            "SUCCESS",
            null
        );
        exit();
    }


    else if(preg_match_all("/^(add_genre)$/ui", $_GET['type'])){
        if(!isset($_GET['name'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр name!",
                true,
                "ERRO",
                null
            );
            exit();
        }

        $query = "INSERT INTO 'genres' (`name`) VALUES ('".$_GET['name']."')";

        $res_query = mysqli_query($connection, $query);

        if(!$res_query){
            echo ajax_echo(
                "Ошибка!",
                "Ошибка в запросе!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        
        echo ajax_echo(
            "Уcпех!",
            "Новый жанр добавлен в бд!",
            false,
            "SUCCESS",
            null
        );
        exit();
    }


    else if(preg_match_all("/^(add_game)$/ui", $_GET['type'])){
        if(!isset($_GET['name'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр name!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        if(!isset($_GET['company_id'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр company_id!",
                true,
                "ERROR",
                null
            );
            exit();
        }

        if(!isset($_GET['year_release'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр date_release!",
                true,
                "ERROR",
                null
            );
            exit();
        }

        if(!isset($_GET['genre_id'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр genre_id!",
                true,
                "ERROR",
                null
            );
            exit();
        }

        if(!isset($_GET['platform_id'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр platform_id!",
                true,
                "ERROR",
                null
            );
            exit();
        }

        $query = "INSERT INTO `games`(`name`,`year_release`,`company_id`,`genre_id`,`platform_id`) VALUES ('".$_GET['name']."','".$_GET['year_release']."','".$_GET['company_id']."', '".$_GET['genre_id']."','".$_GET['platform_id']."')";

        $res_query = mysqli_query($connection, $query);

        if(!$res_query){
            echo ajax_echo(
                "Ошибка!",
                "Ошибка в запросе!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        
        echo ajax_echo(
            "Уcпех!",
            "Новая игра добавлена в бд!",
            false,
            "SUCCESS",
            null
        );
        exit();
    }    


    else if(preg_match_all("/^(update_game_platform_id)$/ui", $_GET['type'])){
        if(!isset($_GET['platform_id'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр platform_id!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        if(!isset($_GET['game_id'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр game_id!",
                true,
                "ERROR",
                null
            );
            exit();
        }

        $query = "UPDATE `games` SET `platform_id`= '".$_GET['platform_id']."' WHERE `games`.`id` = '".$_GET['game_id']."'";

        $res_query = mysqli_query($connection, $query);

        if(!$res_query){
            echo ajax_echo(
                "Ошибка!",
                "Ошибка в запросе!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        
        echo ajax_echo(
            "Уcпех!",
            "Платформа изменена в бд!",
            false,
            "SUCCESS",
            null
        );
        exit();
    } 


    else if(preg_match_all("/^(update_game_company_id)$/ui", $_GET['type'])){
        if(!isset($_GET['company_id'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр company_id!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        if(!isset($_GET['game_id'])){
            echo ajax_echo(
                "Ошибка!",
                "Вы не указали Get параметр game_id!",
                true,
                "ERROR",
                null
            );
            exit();
        }

        $query = "UPDATE `games` SET `company_id`= '".$_GET['company_id']."' WHERE `games`.`id` = '".$_GET['game_id']."'";

        $res_query = mysqli_query($connection, $query);

        if(!$res_query){
            echo ajax_echo(
                "Ошибка!",
                "Ошибка в запросе!",
                true,
                "ERROR",
                null
            );
            exit();
        }
        
        echo ajax_echo(
            "Уcпех!",
            "Компания изменена в бд!",
            false,
            "SUCCESS",
            null
        );
        exit();
    } 


else if(preg_match_all("/^(update_game_genre_id)$/ui", $_GET['type'])){
    if(!isset($_GET['genre_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр genre_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    if(!isset($_GET['game_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр game_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "UPDATE `games` SET `genre_id`= '".$_GET['genre_id']."' WHERE `games`.`id` = '".$_GET['game_id']."'";

    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    
    echo ajax_echo(
        "Уcпех!",
        "Жанр игры изменен в бд!",
        false,
        "SUCCESS",
        null
    );
    exit();
} 


if(preg_match_all("/^(games_by_genre)$/ui", $_GET['type'])){
    
    if(!isset($_GET['genre'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр genre!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "SELECT `games`.`name` FROM `games` INNER JOIN `genres` on `games`.`genre_id` = `genres`.`id` WHERE `genres`.`name` = '".$_GET['genre']."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    

    $arr_res = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_res, $row);
    }

    echo ajax_echo(
        "Уcпех!",
        "Список продукции",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}


if(preg_match_all("/^(games_by_company)$/ui", $_GET['type'])){
    
    if(!isset($_GET['company'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр company!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "SELECT `games`.`name` FROM `games` INNER JOIN `companies` on `games`.`company_id` = `companies`.`id` WHERE `companies`.`name` = '".$_GET['company']."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    

    $arr_res = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_res, $row);
    }

    echo ajax_echo(
        "Уcпех!",
        "Список игр подходящих под требования!",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}


if(preg_match_all("/^(games_by_name)$/ui", $_GET['type'])){
    
    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "SELECT `name` FROM `games` WHERE `name` = '".$_GET['name']."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    

    $arr_res = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_res, $row);
    }

    echo ajax_echo(
        "Уcпех!",
        "Список игр подходящих под требования!",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}


if(preg_match_all("/^(games_by_year)$/ui", $_GET['type'])){
    
    if(!isset($_GET['year_release'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр year_release!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    
    $query = "SELECT `name` FROM `games` WHERE `year_release`= '".$_GET['year_release']."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    

    $arr_res = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_res, $row);
    }

    echo ajax_echo(
        "Уcпех!",
        "Список игр выпущенных в данном году!",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}


if(preg_match_all("/^(games_by_platforms)$/ui", $_GET['type'])){
    
    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    
    $query = "SELECT `games`.`name` FROM `games` INNER JOIN `platforms` on `games`.`platform_id` = `platforms`.`id` WHERE `platforms`.`name`= '".$_GET['name']."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    

    $arr_res = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_res, $row);
    }

    echo ajax_echo(
        "Уcпех!",
        "Список игр подходящих под требования!",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}

if(preg_match_all("/^(users_ip|ip)$/ui", $_GET['type'])){
    $ip = get_ip();
    $query = "INSERT INTO ip_logs (`ip`) VALUES ('".$ip."')";
    $res=mysqli_query($connection, $query);

    $query2 = "SELECT COUNT(id) FROM `ip_logs` WHERE ip = '".$ip."'";
    $res2 =  mysqli_query($connection, $query2);
    
    $arr_res = array();
    $rows = mysqli_num_rows($res2);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res2);
        array_push($arr_res, $row);
    }
    
    echo ajax_echo(
        "Уcпех!",
        "Кол-во запросов с IP адреса",
        false,
        "SUCCESS",
        $arr_res
    );
    exit();
}
