<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            Question: <br>
            a<sup>2</sup> + b<sup>2</sup> =  c <sup>2</sup><br>
            a + b + c = 1000 <br>
            a*b*c = ???<br><br>
            
            
            Answer: <br>
            a<sup>2</sup> + b<sup>2</sup> =  c <sup>2</sup><br>
            <=> c <sup>2</sup> - a<sup>2</sup> = b<sup>2</sup> <br>
            <=> (c - a) * (c + a) = b<sup>2</sup> <br>
            <=>(c + a) / b = b / (c - a) (1)   {a,b,c > 0}<br> <br>
            
            Set: (c + a) = m; b = n <br>
            =>(c + a) / b = m/n <br>
            from (1) => (c - a) / b = n / m <br><br>
            
            we have: <br>
            c/b + a/b = m/n (m > n >0) <br>
            c/b - a/b = n/m <br>
            => 2 * (c/b) = m/n + n/m <br>
            => c/b = (m<sup>2</sup> + n<sup>2</sup>) / 2*m*n <br><br>
            
            =>  c = m<sup>2</sup> + n<sup>2</sup><br>
            and b = 2*m*n <br>
            
            => a = m<sup>2</sup> - n<sup>2</sup> (2) <br><br>
            
            
            we have a + b + c = 1000 <br>
            from (2)
            => (m<sup>2</sup> - n<sup>2</sup>) + 2*m*n + (m<sup>2</sup> + n<sup>2</sup>) = 1000<br>
            <=>2 * m<sup>2</sup> + 2*m*n = 1000 <br>
            <=>m * (m + n) = 500 <br>
            Prediction: <br>
            m = 1 ; (m+n) = 500 => n = 499 (fail: m>n) OR m = 500; m + n = 1 (fail) <br>
            OR m = 2; (m+n) = 250 => n = 248 (fail: m>n) OR m = 250; m + n = 2 (fail) <br>
            OR m = 4; (m+n) = 125 => n = 121(fail: m>n) OR m = 125; m + n = 4 (fail) <br>
            OR m = 5; m + n = 100 => n = 95 (fail: m>n) OR m = 100; m + n = 5 (fail) <br>
            OR <b>m = 20; m+n = 25 => n = 5 (true)</b> OR m = 25; m+n = 20 (fail)<br><br>
            
            with m = 20; n=5 and (2) <br>
            => a = 375 and b = 200 and c = 425<br><br>
            
            We have:
            a*b*c = (m<sup>2</sup> - n<sup>2</sup>) * 2*m*n (m<sup>2</sup> + n<sup>2</sup>)<br>
            = (m<sup>4</sup> - n<sup>4</sup>) * 2*m*n <br>
            = 2*m<sup>5</sup>*n - 2*m*n<sup>5</sup> <br><br>
            
            from (2)
            => a*b*c =  2*(20)<sup>5</sup>*(5) - 2*(20)*(5)<sup>5</sup> <br>
            = 31875000
            
        </div>
    </body>
</html>
