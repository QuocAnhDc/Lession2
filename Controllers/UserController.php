<?php


class UserController extends BaseController
{
    private $user;
    public function __construct()
    {
        $this->loadModel('User');
        $this->user = new User();
    }

    // url cac pages
    public function indexPage()
    {
        return $this->view('pages.loginpage');
    }
    public function adminPage()
    {
        $users  = $this->user->getAll();
        $content = 'admin.index';
        return $this->view('pages.adminpage', [
            'user' => $users,
            'content' => $content,
        ]);
    }
    public function userPage($id)
    {
        $content = 'user.index';
        $user = $this->user->findById($id);
        return $this->view('pages.userpage', [
            'user' => $user,
            'content' => $content,
        ]);
    }
    public function registerPage()
    {
        return $this->view('pages.register');
    }

    // function thuc hien cac chuc nang login, logout, register, view, update, delete user
    public function login()
    {
        session_start();

        // session_start();
        if (isset($_POST["login"])) {
            $username = $_POST["pUsername"];
            $password = $_POST["pPassword"];
            $data = $this->user->login($username, $password);
            $count = mysqli_num_rows($data);
            $inforUser = $data->fetch_assoc();
        }
        if ($count >= 1) {
            $_SESSION["userid"] = $inforUser["id"];
            $user_id = $inforUser["id"];
            if (!empty($_POST["remember"])) {
                setcookie("username", $_POST["pUsername"], time() + (6 * 60 * 60));
                setcookie("password", $_POST["pPassword"], time() + (6 * 60 * 60));
            } else {
                if (isset($_COOKIE["username"])) {
                    setcookie("username", "");
                }
                if (isset($_COOKIE["password"])) {
                    setcookie("password", "");
                }
            }
            if ($inforUser['role'] == 'ADMIN_ROLE') {
                header("Location: http://localhost/lession2/index.php?controller=user&&action=adminPage");
            } else {
                header('Location: http://localhost/lession2/index.php?controller=user&&action=userPage&id=' . $user_id);
            }
        } else {
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION["userid"] = "";
        session_destroy();
        header("Location: http://localhost/lession2/index.php?controller=user&&action=indexPage");
    }

    public function register()
    {
        try {
            if (isset($_POST['register'])) {
                $username = $_POST['pUsername'];
                $password = $_POST['pPassword'];
                $email = $_POST['pEmail'];

                $data = [
                    'username' => $username,
                    'password' =>  $password,
                    'email' =>  $email
                ];
            }

            $this->user->store($data);
            header("Location: http://localhost/lession2/index.php?controller=user&&action=registerPage&message=success");
        } catch (Exception $e) {
            header("Location: http://localhost/lession2/index.php?controller=user&&action=registerPage&message=fail");
        }
    }

    public function update()
    {
        if (isset($_POST['update_user'])) {
            $uUserName = $_POST['uUsername'];
            $uPassword = $_POST['uPassword'];
            $uEmail = $_POST['uEmail'];
            $uRole = $_POST['uRole'];
            $uId = $_POST['uId'];

            $data = [
                'username' => $uUserName,
                'password' =>  $uPassword,
                'email' =>  $uEmail,
                'role' => $uRole
            ];
        }

        $this->user->updateById($uId, $data);
        header("Location: http://localhost/lession2/index.php?controller=user&&action=adminPage");
    }

    public function updateInfor()
    {
        if (isset($_POST['update_userInfor'])) {
            $uUserName = $_POST['uUsername'];
            $uPassword = $_POST['uPassword'];
            $uEmail = $_POST['uEmail'];
            $uId = $_POST['uId'];

            $data = [
                'username' => $uUserName,
                'password' =>  $uPassword,
                'email' =>  $uEmail,
            ];
        }

        $this->user->updateById($uId, $data);
        header('Location: http://localhost/lession2/index.php?controller=user&&action=userPage&id=' . $uId);
    }

    public function show($id)
    {
        $users = $this->user->findById($id);
        $users_arr = [];
        $users_arr_final = [];
        foreach ($users as $key => $valueP) {

            // echo $valueP;
            array_push($users_arr, $valueP);
            array_push($users_arr_final, $users_arr);

            header('Content-Type: application/json');

            echo json_encode($users_arr_final);
        }
    }

    public function destroy()
    {
        if (isset($_POST['delete_user'])) {
            $pId = $_POST['uId'];
        }
        $this->user->deleteById($pId);
        header("Location: http://localhost/lession2/index.php?controller=user&&action=adminPage");
    }
}
