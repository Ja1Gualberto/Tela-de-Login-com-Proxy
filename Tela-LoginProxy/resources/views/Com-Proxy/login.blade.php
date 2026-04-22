<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-info">

  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-6 col-lg-4">

        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h3 class="text-center mb-4">Login Com Proxy</h3>

            <form action="{{ route('login.submit') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label for="emailInput" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="emailInput" placeholder="nome@exemplo.com" required>

                @error('email')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="senhaInput" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" id="senhaInput" placeholder="Sua senha" required>
              </div>

              <div class="d-grid mb-2">
                <button type="submit" class="btn btn-primary">Entrar</button>
              </div>

              <div class="">
                <label for="">
                  Não possui conta <a href="{{ route('cadastro') }}">cadastre-se</a>
                </label>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
