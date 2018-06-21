<h2>
Number guessing game 
</h2>

Please insert number (1-100):<br>
<div class="input-group mb-3">
  <div class="input-group-prepend">
      <button class="btn btn-outline-secondary" type="enter" id="enter">Enter</button>
  </div>
    <input type="number" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" id="input">
</div>
<p></p>
    
<script>
    var button = document.getElementById('enter');
    var input = document.getElementById('input');
    var p = document.querySelector('p');
    var jackspot = Math.floor(Math.random() * 101) + 1;

    function check(){
      
      if(input.value < jackspot) {
        p.innerHTML = "less than jackspot";
      }
      else if(input.value > jackspot) {
        p.innerHTML = "great than jackspot";
      }
      else {
        p.innerHTML = "You are winner. The jackspot is: " + jackspot;
      }
    }

    button.onclick = check();
    input.addEventListener('input', function()
    {
        check();
    });
    
</script>
