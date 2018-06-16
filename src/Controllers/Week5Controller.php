<?php

namespace Controllers;

class Week5Controller extends Controller {
    public function __construct() { 
        parent::__construct();
        $this->model = new \Models\Week5Model();
        //$this->add_100_users_random_name();
        $this->getAllusers();
        $this->template[] = '/Templates/Week5.template.php';
        $this->view = new \Views\View($this->template);
    }
    
    public function add_100_users_list_name() {
        $this->model->addData(['function' => 'add100userslistname']);
        $user = new \Classes\User();
        $email = ['@gmail.com','@yahoo.com','@ymail.com','@outlook.com'];
        $date = new \DateTime();
        $input = fopen("./name.cv", "r") or die("Unable to open file!");
        $i = 0;
        while(!feof($input)) {
            $date->setTimestamp(random_int(0, 1520000000));
            $name = fgets($input);
            $name = str_replace("\n","",$name);
            $user->setName($name);
            $user->setEmail($name . $email[random_int(0, 2)]);
            $user->setCreated($date->format('Y-m-d'));
            $i += \Classes\User::adduser($user);
        }
        
        $this->model->addData('Add: ' .$i . ' users.');
        
        fclose($input);
        
       \Classes\Mysql::disconnect_db();
    }
    
    public function add_100_users_random_name()
    {
        $this->model->addData(['function' => 'add100usersrandomname']);
        $user = new \Classes\User();
        //str_shuffle: random string
        $email = ['@gmail.com','@yahoo.com','@ymail.com','@outlook.com'];
        $date = new \DateTime();
        $count = 0;
        for($i=0; $i<100; $i++)
        {
            $date->setTimestamp(random_int(0, 1520000000));
            $name = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, rand(5,10));
            $user->setName(ucfirst($name));
            $user->setEmail($name . $email[random_int(0, 3)]);
            $user->setCreated($date->format('Y-m-d'));
            $count += \Classes\User::adduser($user);
        }
        
         $this->model->addData('Add: ' .$count . ' users.');
    }

    public function getAllusers()
    {
        $this->model->addData(['function' => 'getAllusers']);
        $this->model->addData(\Classes\User::getAlluser());
        \Classes\Mysql::disconnect_db();
    }
    
}
