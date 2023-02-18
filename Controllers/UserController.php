<?php


class UserController extends BaseController
{
    private $user;
    public function __construct(){
        // ke thua tu controller
        $this->loadModel('User');
        $this->user = new User();
    }

    public function index(){
        $users = $this->user->getAll();
        return $this->view('users.index', [
            'user' => $users,
            //'userRole' => $userRole,
        ]);
    }

    public function login(){
        return $this->view('pages.loginpage');

    }

    public function logout(){
        return $this->view('users.logoutview');
    }

    public function register(){
        $data = [
            'username' => 'checktest',
            'password' => 'checktest',
        ];

        //return $this->view('users.registerview');
        $this->user->store($data);
    }

    public function editProfile($id){
        $data = [
            'username' => 'edittest',
            'password' => 'edittest',
        ];

        //return $this->view('users.registerview');
        $this->user->updateById($id,$data);
    }

    public function edit($id){
        $users = $this->user->findById($id);
        return $this->view('users.useredit',[
            'user'=>$users,
        ]);
    }

    public function destroy($id){
        $this->user->deleteById($id);
    }
}