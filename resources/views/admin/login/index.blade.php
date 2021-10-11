<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        @if($errors->all())
            @foreach ($errors->all() as $error)
                <div><div class="alert alert-danger">{{$error}}</div></div>
            @endforeach
        @endif

        <form action="{{route('admin.login.do')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user">Usuário</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Sua senha</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Logar</button>
            </div>
        </form>
    </div>
</body>
</html>
