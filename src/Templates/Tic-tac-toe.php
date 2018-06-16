<style type="text/css">
	table {
		text-align: center;
	}
	table#tictactoe{
		border-style: solid;
		border-width: 5px;
		font-size: 50px;
	}

	table#tictactoe tr,td {
		border-style: inset;
		width: 100px;
		height: 100px;
	}

	.visible {
		pointer-events: auto;
	}

	.hidden {
    	pointer-events : none;
	}
	
	.active {
		border-color: #20c997;
		border-style: outset;
	}

	.borderless td, .borderless th {
    border: none;
	}	
</style>
<script type="text/javascript">
	var flag = 0;
</script>

<table id="tictactoe" align="center">
	<tr>
		<td class="tictactoe" onclick='play(this)' id="td-one"></td>
		<td class="tictactoe" onclick='play(this)' id="td-two"></td>
		<td class="tictactoe" onclick='play(this)' id="td-three"></td>
	</tr>

	<tr>
		<td class="tictactoe" onclick='play(this)' id="td-four"></td>
		<td class="tictactoe" onclick='play(this)' id="td-five"></td>
		<td class="tictactoe" onclick='play(this)' id="td-six"></td>
	</tr>

	<tr>
		<td class="tictactoe" onclick='play(this)' id="td-seven"></td>
		<td class="tictactoe" onclick='play(this)' id="td-eight"></td>
		<td class="tictactoe" onclick='play(this)' id="td-nine"></td>
	</tr>
</table>

<br><br>

<table align="center" id="showscore">
	<tr>
		<td id='user1' class="active"></td>
		<td id="score1"></td>
		<td style="border-style: none; width: 200px" >	
			<button class="btn btn-success" id="again">Play again</button>
			<p id="showwin"></p>
		</td>
		<td id="user2"></td>
		<td id="score2"></td>
	</tr>
</table>

<table class="table borderless">
	<tr>
		<td><button id="h-h" class="btn btn-primary">Human - Human</button></td>
		<td><button id="h-ce" class="btn btn-primary">Human - Computer(Easy)</button></td>
		<td><button id="h-cm" class="btn btn-primary">Human - Computer(Medium)</button></td>
		<td><button id="cm-cm" class="btn btn-primary">Computer(Medium) - Computer(Medium)</button></td>
	</tr>

</table>



<script type="text/javascript">
    var tds = document.querySelectorAll('.tictactoe');

    var user1 = document.getElementById('user1'),
        score1 = document.getElementById('score1'),
        user2 = document.getElementById('user2'),
        score2 = document.getElementById('score2');

    var btn = document.getElementById('again');

    var showwin = document.getElementById('showwin');

    var Users = {
        list: [],

        addUser: function(name, symbol, score = 0, count = 0, level = 0) {
                this.list.push({
                    name: name,
                    symbol: symbol,
                    score:score,
                    count: count,
                    level: level
                });
        },

        getListUser: function(){
                return this.list;
        }

    }

    Users.addUser('Human','X');
    Users.addUser('Computer','O');

    var list = Users.getListUser();

    function showscore() {
            //show score 2 users
        user1.innerHTML = list[0].name;
        score1.innerHTML = list[0].score;
        user2.innerHTML =  list[1].name;
        score2.innerHTML = list[1].score;
    }

    showscore();

    btn.onclick = function(){
        for (var i = 0; i < tds.length; i++) {
            tds[i].innerHTML = "";
            tds[i].classList.remove('hidden');
            tds[i].classList.add('visible');
        }
        showwin.innerHTML="";
        list[0].count = 0;
        list[1].count = 0;
        user2.classList.remove('active');
        user1.classList.add('active');
    }

    function showWinner(user)
    {
    	for (var i = 0; i < tds.length; i++) {
            tds[i].classList.remove('visible');
            tds[i].classList.add('hidden');
        }

        user2.classList.remove('active');
        user1.classList.remove('active');

        showwin.innerHTML = user.name + " Win!";
        user.score += 1;
        showscore();
    }

    function checkwin(user) {
    	if(tds[0].innerHTML === user.symbol && tds[1].innerHTML === user.symbol && tds[2].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}
    	else if(tds[3].innerHTML === user.symbol && tds[4].innerHTML === user.symbol && tds[5].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}
    	else if(tds[6].innerHTML === user.symbol && tds[7].innerHTML === user.symbol && tds[8].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}
    	else if(tds[0].innerHTML === user.symbol && tds[3].innerHTML === user.symbol && tds[6].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}
    	else if(tds[1].innerHTML === user.symbol && tds[4].innerHTML === user.symbol && tds[7].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}
    	else if(tds[2].innerHTML === user.symbol && tds[5].innerHTML === user.symbol && tds[8].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}
    	else if(tds[0].innerHTML === user.symbol && tds[4].innerHTML === user.symbol && tds[8].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}
    	else if(tds[2].innerHTML === user.symbol && tds[4].innerHTML === user.symbol && tds[6].innerHTML === user.symbol)
    	{
    		showWinner(user);
    		return 1;
    	}

    	return 0;
    }

    list[1].level = 1;
    function play(element)
    {
        if(list[0].count == list[1].count)
        {
            element.innerHTML = list[0].symbol;
            if(checkwin(list[0]) == 0)
            {
	            list[0].count += 1;
	            element.classList.add('hidden');
	            
	            if(list[0].count < 5)
	            {
	                    user1.classList.remove('active');
	                    user2.classList.add('active');
	            }
	            else {
	                    user2.classList.remove('active');
	                    user1.classList.remove('active');
	            }
        	}

        	if(list[1].level !=0 &&list[0].level ==0)
        	{
        		console.log(list[1]);
        		list[1].count += 1;
            }
       	
        }
        else 
        {
       		element.innerHTML = list[1].symbol;
            if(checkwin(list[1]) == 0)
            {
	            list[1].count += 1;
	            element.disabled=true;
	            element.classList.add('hidden');
	            user2.classList.remove('active');
	            user1.classList.add('active');
        	}
       	}
    }
</script>