<?php


namespace Controllers;

/**
 * Description of Week6Controller
 *
 * @author cv
 */
class ApiController extends Controller {
    public function __construct($requestPath = []) {
        parent::__construct();
       
        if($requestPath[2] === 'user')
        {
            $this->user($requestPath[3]);
        }
    }
    
    public function user($id) {
        
        $user = new \Classes\User;
        $user = \Classes\User::get_user_byID($id);
        if($user)
        {
            echo json_encode([
                'status'    =>true, 
                'id'        =>$user->getID(),
                'name'      =>$user->getName(),
                'email'     =>$user->getEmail(),
                'created'   =>$user->getCreated()
            ]);
            exit();
        }
        else {
            echo json_encode([
                'status'    =>false, 
                'id'        =>'',
                'name'      =>'',
                'email'     =>'',
                'created'   =>''
            ]);
            exit();
        }
    }
}
