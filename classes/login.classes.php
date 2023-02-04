<?php


class Login extends DatabaseUsers
{


    protected function getUser($username, $password)
    {

        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ?;');

        if (!$stmt->execute(array($username, $password))) {

            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password, $passHashed[0]["passwod"]);

        if ($checkPass == false) {

            $stmt = null;
            header("location: ../index.php?error=wronngPassword");
            exit();
        }elseif ($checkPass == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? AND password = ?;');

            if (!$stmt->execute(array($username, $passHashed[0]["password"]))) {

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
        }

        $stmt = null;
    }
}

