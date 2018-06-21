<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
	
</head>
<body>
    <div id="result">

    </div>
    <button name="ajaxButton" id="ajaxButton">Click me</button>


    <script type="text/javascript">
        var httpRequest;
        document.getElementById("ajaxButton").addEventListener('click', makeRequest);

        function makeRequest() {
            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
              alert('Giving up :( Cannot create an XMLHTTP instance');
              return false;
            }
            httpRequest.onreadystatechange = successFunction;
            httpRequest.open('GET', '/test.php');
            httpRequest.send();
        }

        function successFunction() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    alert(httpRequest.responseText);
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }

    </script>
</body>
</html>

