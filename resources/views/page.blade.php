<head>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --prime: #3EE;
            --background: #222;
            --font: #ddd;
            --error-color: #F04;
            --success-color: #2F2;
        }
        a {
            color: inherit;
            text-decoration: none;
        }
        a.decorated {
            color: inherit;
            padding: 10px;
            text-decoration: none;
            border: 2px solid var(--prime);
            border-radius: 10px;
            box-shadow: 2px 2px 2px black;
            transition-duration: 0.2s;
        }
        a.decorated:hover {
            box-shadow: 5px 5px 5px black;
            transition-duration: 0.2s;
        }
        body {
            background-color: var(--background);
            color: var(--font);
            margin: 0px;
            min-height: 100vh;
            font-family: Nunito;
        }
        header{
            background-color: var(--prime);
            color: var(--background);
            height: 75px;
            box-shadow: black 0px 3px 3px;
        }
        footer {
            background-color: var(--prime);
            color: var(--background);
            height: 75px;
            box-shadow: black 0px -3px 3px;
        }
        main {
            min-height: calc(100vh - 150px);
            padding-top: 50px;
            padding-bottom: 50px;
            box-sizing: border-box;
        }
        div.message {
	        width: 15%;
	        background-color: var(--background);
	        margin: 10px;
	        border-radius: 15px;
	        padding: 15px;
        }
        div.message.success {
            color: var(--success-color);
            box-shadow: 0px 0px 20px var(--success-color) inset;
        }
        div.message.error {
            color: var(--error-color);
            box-shadow: 0px 0px 20px var(--error-color) inset;
        }
    </style>
    @yield('title')
    @yield('styling')
</head>
<body>
    @include('fragments/_header')
    <main>
        @yield('content')
    </main>
    <footer></footer>
</body>