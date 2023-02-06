<style>
    form#searchbar {
        text-align: center;
        display: grid;
        grid-template-columns: 5% auto 125px 5%;
    }
    form#searchbar a:hover + input[type="text"] {
        text-decoration: line-through;
        transition-duration: 0.2s;
    }
    form#searchbar a:hover + input[type="text"]::placeholder {
        text-decoration: none;
    }
    form#searchbar input[type="text"] {
        margin: 15px;
        margin-right: 20px;
        margin-left: 115px;
        padding: 5px;
        padding-left: 15px;
        height: 50px;
        border-radius: 15px;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
        border: solid 3px var(--prime);
        background: var(--background);
        outline: none;
        color: var(--prime);
        font-size: 110%;
        font-family: inherit;
        transition-duration: 0.2s;
        grid-column: 2/4;
        grid-row: 1;
    }
    form#searchbar input[type="text"]:focus {
        box-shadow: 7px 5px 10px black;
        transition-duration: 0.2s;
    }
    form#searchbar input[type="submit"] {
        height: 50px;
        width: 105px;
        margin: auto;
        margin-left: 0px;
        font-family: inherit;
        font-size: 110%;
        border: none;
        border-left: solid 3px var(--prime);
        background-color: var(--prime);
        color: var(--background);
        border-radius: 0px;
        border-bottom-right-radius: 15px;
        border-top-right-radius: 15px;
        cursor: pointer;
        grid-column: 3;
        grid-row: 1;
    }
    form#searchbar a {
        height: 20px;
        padding: 15px;
        margin: auto;
        width: 75px;
        margin-left: 15px;
        grid-column: 2;
        grid-row: 1;
        background-color: #222;
        transition-duration: 0.2s;
        z-index: 3;
    }
</style>

<form id="searchbar" method="get" action="/posts">
    <a class="decorated" href="/posts">Usuń filtr</a>
    <input type="text" name="search" placeholder="Wyszukaj posty" />
    <input type="submit" value="Szukaj" />
</form>