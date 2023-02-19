<?php


class UserController extends BaseController
{
    private $user;
    public function __construct()
    {
        $this->loadModel('User');
        $this->user = new User();
    }

    public function indexPage()
    {
        return $this->view('pages.loginpage');
    }
    public function adminPage()
    {
        $users  = $this->user->getAll();
        $content = 'admin.index';
        return $this->view('pages.adminpage',[
            'user'=>$users,
            'content'=>$content,
        ]);
    }
    public function userPage($id)
    {
        $content = 'user.index';
        $user= $this->user->findById($id);
        return $this->view('pages.userpage',[
            'user'=>$user,
            'content'=>$content,
        ]);
    }
    public function registerPage()
    {
        return $this->view('pages.register');
    }

    public function login()
    {
        // session_start();
        if (isset($_POST["login"])) {
            $username = $_POST["pUsername"];
            $password = $_POST["pPassword"];
        }
        $data = $this->user->login($username, $password);
        $count = mysqli_num_rows($data);
        $inforUser = $data->fetch_assoc();

        if ($count >= 1) {
            $user_id= $inforUser["id"];
            if ($inforUser['role'] == 'ADMIN_ROLE') {
                    header("Location: http://localhost/lession2/index.php?controller=user&&action=adminPage");
            } else {
                header('Location: http://localhost/lession2/index.php?controller=user&&action=userPage&id='.$user_id);
            }
        } else {
        }
    }

    public function logout()
    {
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
            $message = 'success';
            return $this->view('pages.register');
            //header("Location: http://localhost/index.php?controller=product&&action=registerPage&&message=success");
        } catch (Exception $e) {
            return $this->view('pages.register');
        }
    }

    public function update()
    {
        if(isset($_POST['update_user'])){
            $uUserName = $_POST['uUsername'];
            $uPassword = $_POST['uPassword'];
            $uEmail = $_POST['uEmail'];
            $uRole= $_POST['uRole'];
            $uId = $_POST['uId'];

            $data = [
                'username' => $uUserName,
                'password' =>  $uPassword,
                'email' =>  $uEmail,
                'role' => $uRole
            ];   
        }

        $this->user->updateById($uId, $data);
        // header("Location: http://localhost/?controller=product&action=index");
        header("Location: http://localhost/lession2/index.php?controller=user&&action=adminPage");
    }

    public function updateInfor()
    {
        if(isset($_POST['update_userInfor'])){
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
        // header("Location: http://localhost/?controller=product&action=index");
        header('Location: http://localhost/lession2/index.php?controller=user&&action=userPage&id='.$uId);
    }

    public function show($id){
        $users = $this->user->findById($id);
        $users_arr = [];
        $users_arr_final = [];
        foreach ($users as $key => $valueP)
        {
            
            // echo $valueP;
            array_push($users_arr, $valueP);
            array_push($users_arr_final, $users_arr);

            header('Content-Type: application/json');

            echo json_encode($users_arr_final);
        }
      
    }

    public function destroy()
    {
        if(isset($_POST['delete_user'])){
            $pId = $_POST['uId'];
        }
        $this->user->deleteById($pId);
        header("Location: http://localhost/lession2/index.php?controller=user&&action=adminPage");
    }
}
