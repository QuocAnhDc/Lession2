<?php


class UserController extends BaseController
{
    private $user;
    public function __construct()
    {
        // ke thua tu controller
        $this->loadModel('User');
        $this->user = new User();
    }

    public function index()
    {
        // $users = $this->user->getAll();
        // return $this->view('users.index', [
        //     'user' => $users,
        //     //'userRole' => $userRole,
        // ]);
        if ($_SESSION["userid"]) {
            return $this->view('users.show');
        }
        
        return $this->view('pages.loginpage');
    }
    public function admin()
    {
        return $this->view('pages.adminpage');
    }
    public function user()
    {
        return $this->view('pages.userpage');
    }

    public function login()
    {
        if (isset($_POST["login"])) {
            $username = $_POST["pUsername"];
            $password = $_POST["pPassword"];
        }
        $data = $this->user->login($username, $password);
        $count = mysqli_num_rows($data);
        $inforUser = $data->fetch_assoc();

        if ($count >= 1) {
            $_SESSION["userid"] = $inforUser["id"];

            if (!empty($_POST["remember"])) {

                setcookie("user_login", $_POST["username"], time() + (60*60*6));

                setcookie("userpassword", $_POST["password"], time() + (60*60*6));
            } else {

                if (isset($_COOKIE["user_login"])) {

                    setcookie("user_login", "");
                }

                if (isset($_COOKIE["userpassword"])) {

                    setcookie("userpassword", "");
                }
            }
            if ($inforUser['role'] == 'ADMIN_ROLE') {
                header("Location: http://localhost/lession2/index.php?controller=user&&action=admin");
            } else {
                header("Location: http://localhost/lession2/index.php?controller=user&&action=user");
            } //setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
        } else {
            //header("location:index.php");
            //setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
        }
        // return $this->view('pages.loginpage');
    }

    public function logout()
    {
        return $this->view('users.logoutview');
    }

    public function register()
    {
        $data = [
            'username' => 'checktest',
            'password' => 'checktest',
        ];

        //return $this->view('users.registerview');
        $this->user->store($data);
    }

    public function editProfile($id)
    {
        $data = [
            'username' => 'edittest',
            'password' => 'edittest',
        ];

        //return $this->view('users.registerview');
        $this->user->updateById($id, $data);
    }

    public function edit($id)
    {
        $users = $this->user->findById($id);
        return $this->view('users.useredit', [
            'user' => $users,
        ]);
    }

    public function destroy($id)
    {
        $this->user->deleteById($id);
    }
}
