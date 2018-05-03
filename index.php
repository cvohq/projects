<?php
    //need load class Model, View, Control firs if not ->error
    require_once './Models/Model.php';
    require_once './Views/View.php';
    require_once './Controllers/Controller.php';
    
    //this function will loadd all file php in folder
    function require_all_file($dir)
    {
        $files = glob($dir . '/*.php');

        foreach ($files as $file) {
            require_once $file;   
        }
    }
    
    require_all_file('./Controllers');
    require_all_file('./Models');
    require_all_file('./Views');
    
    // get values after '/'  and set to array $requestPath
    $requestPath = explode('/', $_SERVER['REQUEST_URI']);
    
    //get first value 
    $tag1 = $requestPath[1];
    
    if ($tag1 === 'helloworld') {
        // Step 2: Use the correct controller
        $controller = new HelloworldController();
        // Step 3: Get the model
        $model = $controller->getModel();

        // Step 4/5: Get the data for the model
        $data = $model->getData();

        // Step 6/7: Use the data from the model and generate the view using the controller
        $view = $controller->getView();
        
//        var_dump($view);
        
        echo $view->render($data);
    }

    if($tag1 === 'week3') 
    {
        //get second value
        $tag2 = $requestPath[2];
        
        $controller = new Week3Controller();
        if($tag2 === 'math')
        {
            //get values after '?' and set to array $tag3
            $tag3 = explode('?', $requestPath[3]);

            $calculator = $tag3[0];  //=add/subtract/Multiply/divide
            parse_str($tag3[1], $number);
        
            if($calculator === 'add')
            {
                $controller->add($number);
            }
            
            if($calculator === 'subtract')
            {
                $controller->subtract($number);
            }
            
            if($calculator === 'multiply')
            {
                $controller->multiply($number);
            }
            
            if($calculator === 'divide')
            {
                $controller->divide($number);
            }
        }
        
        if($tag2 === 'evenlydivisible')
        {
            $tag3 = array_map('intval', explode('/', $requestPath[3]));
            
            $controller ->evenlydivisible($tag3[0]);
        }
        
        $model = $controller->getModel();
        
        $data = $model->getData();
        
        $view = $controller->getView();
        
        echo $view->render($data);
        
    }
    
?>