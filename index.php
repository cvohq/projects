<?php

    require __DIR__ . '/vendor/autoload.php';
    
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
    elseif($tag1 === 'week3') 
    {
        //get second value
        $tag2 = $requestPath[2];
        
        $controller = new Controllers\Week3Controller();
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
            
            $controller->evenlydivisible($tag3[0]);
        }
        
        if($tag2 === 'differencesumsquares')
        {
            $tag3 = array_map('intval', explode('/', $requestPath[3]));
            
            $controller->difference_sum_squares($tag3[0]);
        }
        
        if($tag2 === 'greatestproduct')
        {
            $tag3 = array_map('intval', explode('/', $requestPath[3]));
            $controller->greatestproduct($tag3[0]);
        }
        
        
        $model = $controller->getModel();
        
        $data = $model->getData();
        
        $view = $controller->getView();
        
        echo $view->render($data);  
    }
    elseif ($tag1 === 'week4') 
    {
        $tag2 = $requestPath[2];
        $controller = new Controllers\Week4Controller();
        
        if($tag2 === 'PythagoreanTriple')
        {
            $controller -> PythagoreanTriple();
        }
        elseif($tag2 === 'CollatzProblem')
        {
            
            $controller->LongestCountCollatzProblem();
        }
        
        $model = $controller->getModel();
        
        $data = $model->getData();
        
        $view = $controller->getView();
        
        echo $view->render($data);
    }
    else
    {
        echo 'Page not found';
    }
    
?>