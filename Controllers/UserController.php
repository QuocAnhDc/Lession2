<?php


class UserController   extends BaseController
{
    private $product;
    public function __construct(){
        // ke thua tu controller
        $this->loadModel('Product');
        $this->product = new User();
    }
    public function index(){
        $userRole = $this->product->getUserRole(1);

        $users = [
            [   
                'id' => 1,
                'name' => 'ip'
            ],
            [
                'id' => 2,
                'name' => 'and'
            ],
        ];

        return $this->view('users.index', [
            'user' => $users,
            'userRole' => $userRole,
        ]);
    }

    public function show(){
        return $this->view('products.show');

    }

    public function create(){
        return $this->view('products.create');
    }

    public function store(){
        return $this->view('products.store');
    }

    public function edit(){
        return $this->view('products.edit');
    }

    public function update(){
        return $this->view('products.update');
    }

    public function destroy(){
        return $this->view('products.destroy');
    }
}