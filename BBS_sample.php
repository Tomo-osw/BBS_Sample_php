<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_5-1</title>
</head>
<body>
    <?php
        $dsn = 'mysql:dbname=tb250057db;host=localhost';
        $dbuser = 'tb-250057';
        $dbpassword = '3hkdGUuDXh';
        $pdo = new PDO($dsn, $dbuser, $dbpassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        
        $sql = "CREATE TABLE IF NOT EXISTS tbbbs"
        ." ("
        . "id INT AUTO_INCREMENT PRIMARY KEY,"
        . "name char(32),"
        . "comment TEXT,"
        . "date datetime,"
        . "password varchar(255)"
        .");";
        $stmt = $pdo->query($sql);
    
        if (!empty($_POST["submit"])){
            if (!empty($_POST["ch_pass"])){
                $id = $_POST["ch_id"];
                if (!empty($_POST["name"])){
                    if(!empty($_POST["comment"])){
                        if(!empty($_POST["password"])){
                            $sql = 'UPDATE tbbbs SET name=:name,comment=:comment,date=:date,password=:password WHERE id=:id';
                            $stmt = $pdo->prepare($sql);
                            $name = $_POST["name"];
                            $comment = $_POST["comment"];
                            $date = date("Y/m/d H:i:s");
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                            $stmt ->bindParam(':date', $date, PDO::PARAM_STR);
                            $stmt ->bindParam(':password', $password, PDO::PARAM_STR);
                            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                            $stmt->execute();
                        }else{
                            $sql = 'UPDATE tbbbs SET name=:name,comment=:comment,date=:date WHERE id=:id';
                            $stmt = $pdo->prepare($sql);
                            $name = $_POST["name"];
                            $comment = $_POST["comment"];
                            $date = date("Y/m/d H:i:s");
                            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                            $stmt ->bindParam(':date', $date, PDO::PARAM_STR);
                            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                            $stmt->execute();
                        }
                    }else{
                        if(!empty($_POST["password"])){
                            $sql = 'UPDATE tbbbs SET name=:name,date=:date,password=:password WHERE id=:id';
                            $stmt = $pdo->prepare($sql);
                            $name = $_POST["name"];
                            $date = date("Y/m/d H:i:s");
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                            $stmt ->bindParam(':date', $date, PDO::PARAM_STR);
                            $stmt ->bindParam(':password', $password, PDO::PARAM_STR);
                            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                            $stmt->execute();
                        }else{
                            $sql = 'UPDATE tbbbs SET name=:name,date=:date WHERE id=:id';
                            $stmt = $pdo->prepare($sql);
                            $name = $_POST["name"];
                            $date = date("Y/m/d H:i:s");
                            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                            $stmt ->bindParam(':date', $date, PDO::PARAM_STR);
                            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                            $stmt->execute();
                        }
                    }
                }else if(!empty($_POST["comment"])){
                    if(!empty($_POST["password"])){
                        $sql = 'UPDATE tbbbs SET comment=:comment,date=:date,password=:password WHERE id=:id';
                        $stmt = $pdo->prepare($sql);
                        $comment = $_POST["comment"];
                        $date = date("Y/m/d H:i:s");
                        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                        $stmt ->bindParam(':date', $date, PDO::PARAM_STR);
                        $stmt ->bindParam(':password', $password, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        $stmt->execute();
                    }else{
                        $sql = 'UPDATE tbbbs SET comment=:comment,date=:date WHERE id=:id';
                        $stmt = $pdo->prepare($sql);
                        $comment = $_POST["comment"];
                        $date = date("Y/m/d H:i:s");
                        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                        $stmt ->bindParam(':date', $date, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                        $stmt->execute();
                    }
                }else if(!empty($_POST["password"])){
                    $sql = 'UPDATE tbbbs SET date=:date,password=:password WHERE id=:id';
                    $stmt = $pdo->prepare($sql);
                    $date = date("Y/m/d H:i:s");
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $stmt ->bindParam(':date', $date, PDO::PARAM_STR);
                    $stmt ->bindParam(':password', $password, PDO::PARAM_STR);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }else{
                if (!empty($_POST["name"]) && !empty($_POST["comment"])){
                    if(!empty($_POST["password"])){
                        $sql = $pdo -> prepare("INSERT INTO tbbbs (name, comment, date, password) VALUES (:name, :comment, :date, :password)");
                        $sql -> bindParam(':name', $name, PDO::PARAM_STR);
                        $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
                        $sql -> bindParam(':date', $date, PDO::PARAM_STR);
                        $sql -> bindParam(':password', $password, PDO::PARAM_STR);
                        $name = $_POST["name"];
                        $comment = $_POST["comment"]; 
                        $date = date("Y/m/d H:i:s");
                        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                        $sql -> execute();
                    }else{
                        $sql = $pdo -> prepare("INSERT INTO tbbbs (name, comment, date) VALUES (:name, :comment, :date)");
                        $sql -> bindParam(':name', $name, PDO::PARAM_STR);
                        $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
                        $sql -> bindParam(':date', $date, PDO::PARAM_STR);
                        $name = $_POST["name"];
                        $comment = $_POST["comment"]; 
                        $date = date("Y/m/d H:i:s");
                        $sql -> execute();
                    }
                }   
            }
        }else if(!empty($_POST["submit_delete"])){
            if (!empty($_POST["num"] && !empty($_POST["pass_delete"]))){
                $id = $_POST["num"];
                $sql = 'SELECT * FROM tbbbs';
                $stmt = $pdo->query($sql);
                $results = $stmt->fetchAll();
                foreach ($results as $row){
                    if ($row['id'] == $id){
                        if (password_verify($_POST["pass_delete"], $row['password'])){
                            $sql = 'delete from tbbbs where id=:id';
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                            $stmt->execute();   
                        }
                    }
                }
            }
        }else if(!empty($_POST["submit_edit"]) && !empty($_POST["pass_edit"])){
            if (!empty($_POST["num_edit"]) && !empty($_POST["pass_edit"])){  
                $id = $_POST["num_edit"];
                $sql = 'SELECT * FROM tbbbs';
                $stmt = $pdo->query($sql);
                $results = $stmt->fetchAll();
                foreach ($results as $row){
                    if ($row['id'] == $id){
                        if (password_verify($_POST["pass_edit"], $row['password'])){
                            $addname = $row['name'];
                            $addcomment = $row['comment'];
                            $ch_pass = $row['password'];
                            $ch_id = $row['id'];
                        }
                    }
                }
            }
        }
    ?>
    <form action="" method="post">
        <input type="text" name="name" placeholder="氏名を入力してください" value="<?php if(isset($addname)){echo $addname;}?>">
        <input type="text" name="comment" placeholder="投稿内容を入力してください" value="<?php if(isset($addcomment)){echo $addcomment;}?>">
        <input type="text" name="password" placeholder="パスワードを入力してください">
        <input type="hidden" name="ch_pass" value="<?php if(isset($ch_pass)){echo $ch_pass;}?>">
        <input type="hidden" name="ch_id" value="<?php if(isset($ch_id)){echo $ch_id;}?>">
        <input type="submit" name="submit" value="送信"></br>
        <input type="text" name="num" placeholder="削除したい対象番号">
        <input type="text" name="pass_delete" placeholder="削除したい番号のパスワード">
        <input type="submit" name="submit_delete" value="削除"></br>
        <input type="text" name="num_edit" placeholder="編集したい対象番号">
        <input type="text" name="pass_edit" placeholder="編集したい番号のパスワード">
        <input type="submit" name="submit_edit" value="編集"></br>
    </form>
    <?php
        $dsn = 'mysql:dbname=tb250057db;host=localhost';
        $dbuser = 'tb-250057';
        $dbpassword = '3hkdGUuDXh';
        $pdo = new PDO($dsn, $dbuser, $dbpassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        
        $sql = 'SELECT * FROM tbbbs';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll();
        foreach ($results as $row){
            echo $row['id'].',';
            echo $row['name'].',';
            echo $row['comment'].',';
            echo $row['date'].'<br>';
        echo "<hr>";
        }
    
    ?>
    
</body>
</html>
