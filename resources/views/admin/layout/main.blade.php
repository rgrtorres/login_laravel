<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Administração</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            background-color: rgba(0,0,0,0.03)
        }

        menu {
            margin: 7px 0;
        }

        .container {
            display: flex;
        }

        .conteudo {
            background-color: white;
            margin: 7px 7px;
            box-shadow: rgba(0,0,0,0.10) 0 0 0 1px;
            border-radius: 3px;
            padding: 8px 8px;
            min-width: 700px;
        }

        .titulo {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <menu class="float-left">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Navegação</li>
                <li class="list-group-item"><a href="{{ route('admin.clientes') }}">Clientes</a></li>
                <li class="list-group-item"><a href="{{ route('admin.numeros') }}">Números</a></li>
                <li class="list-group-item"><a href="{{ route('admin.preferencias') }}">Preferencias</a></li>
                <li class="list-group-item"><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
                <li class="list-group-item"><a href="{{ route('admin.logout') }}">Sair</a></li>
            </ul>
        </menu>

        <main class="float-right">
            <div class="contaner">
                <section class="conteudo">
                    @yield('conteudo')
                </section>
            </div>
        </main>
    </div>
</body>
</html>
