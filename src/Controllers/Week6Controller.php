<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of Week6Controller
 *
 * @author cv
 */
class Week6Controller extends Controller {
    public function __construct($requestPath = []) {
        parent::__construct();
        
        
        $this->model = new \Models\Week6Model();
        if($requestPath[2] === 'numberguessinggame')
        {
            $this->numberguessinggame();
        }
        elseif ($requestPath[2] === 'tictactoegame') {
            $this->tictactoegame();
        }
        $this->view = new \Views\View($this->template);
    }
    
    public function numberguessinggame() {
        $this->template[] = '/Templates/Number-guessing-game.php';
    }
    
    public function tictactoegame() {
        $this->template[] = '/Templates/Tic-tac-toe.php';
    }
}
