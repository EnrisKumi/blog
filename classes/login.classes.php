<?php


class Login extends DatabaseUsers
{


    protected function getUser($username, $password)
    {

        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($username, $username))) {

            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() === 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password, $passHashed[0]["password"]);

        if ($checkPass == false) {

            $stmt = null;
            header("location: ../index.php?error=wrongPassword");
            exit();
        }elseif ($checkPass == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

            if (!$stmt->execute(array($username, $username, $passHashed[0]["password"]))) {

                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: profile.php?error=profilenotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["isAdmin"] = $user[0]["isAdmin"];

            $stmt = null;
        }

        
    }
}

