<style type="text/css">
    .disable {
            pointer-events : none;
	}
    .enable {
            pointer-events: auto;
        }
</style>

    <input type="number" id="txt" min="1">
    <button type="submit" name="ajaxButton" id="ajaxButton">Click</button>

    <p id="data-user"></p>
    <script type="text/javascript">
        var httpRequest;
        var btn = document.getElementById("ajaxButton");
        var txt = document.getElementById("txt");
        var data_user = document.getElementById("data-user");
        
        txt.addEventListener('input', function()
        {
            if(txt.value == 0)
            {
                btn.classList.add('disable');
            }
            else
            {
                btn.classList.add('enable');
                btn.classList.remove('disable');
            }
        });
        
        btn.addEventListener('click', makeRequest);
        
        function makeRequest() {
            httpRequest = new XMLHttpRequest();

            if (!httpRequest) {
              alert('Cannot create an XMLHTTP instance');
              return false;
            }
            httpRequest.open('GET', '/api/user/' + txt.value);
            httpRequest.onreadystatechange = successFunction;
            
            httpRequest.send();
            
        }

        function successFunction() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                var data = JSON.parse(httpRequest.responseText);
                var htmlstring = "Status: " +data.status +"<br>" +
                                "ID: " + data.id + "<br>" +
                                "Name: " +data.name + "<br>" +
                                "Email: " + data.email + "<br>" +
                                "Created: " +data.created;
                data_user.insertAdjacentHTML('beforeend', htmlstring);
            }
        }

    </script>


