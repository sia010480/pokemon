<div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="login-window" id="loginWindow">
            <div style="font-family: Verdana,Arial,sans-serif; font-size: 12px; border-bottom: 1px solid rgb(221,29,40); padding: 10px; margin-bottom: 10px;">
                <span class="login-title-text"><h2>Pokemon Test - Shakespearean description</h2></span>
            </div>
            Please enter a pokemon name in the field below to get the Shakespearean description
            <form id="searchForm" style="padding: 30px;" action="#" method="post">
                <div class="form-group">
                    http://localhost/pokemon/httpdocs/api.php/Pokemon/<input type="text" id="pokemonName">
                    <button onclick="getData()" id="loginButton" class="submit-button">Search</button>
                </div>
            </form>
            <p>Need a hint? Try <a href="#" onclick="setPokemonName('charizard')">charizard</a>, <a href="#" onclick="setPokemonName('blastoise')">blastoise</a></p>
            <p style="font-weight: bold;">Output result:</p>
            <textarea id="outputResult" style="width: 100%;" rows="5"></textarea>
        </div>
    </div>
<div class="col-sm-2"></div>
<script>
        
            document.querySelector("#pokemonName").addEventListener("keyup", event => {
                if (event.key !== "Enter")
                    return; // Use `.key` instead.
                document.querySelector("#loginButton").click(); // Things you want to do.
                event.preventDefault(); // No need to `return false;`.
            });
            document.getElementById("searchForm").addEventListener("click", function(event){
            event.preventDefault();
            });
            document.getElementById("loginButton").addEventListener("click", function(event){
            event.preventDefault();
            });
            function getData()
            {
                var rPokemon = new XMLHttpRequest();
                rPokemon.open("GET", "api.php/Pokemon/" + document.getElementById("pokemonName").value);
                rPokemon.onload = function () {
                        var result = JSON.parse(rPokemon.responseText);
                        document.getElementById("outputResult").value = rPokemon.responseText;
                        document.getElementById("pokemonName").value = "";
                    };
                rPokemon.send();
                
            }
            function setPokemonName (name)
            {
                document.getElementById("pokemonName").value = name;
            }
</script>