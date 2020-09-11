<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

    <body>

        <div class="container">

            <div class="row">
                <div class="offset-2 col-8">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Login Here</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/api/login">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" placeholder="Enter your email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" />
                                </div>
                                <button type="submit" class="btn btn-info btn-block">Login</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            Don't have an account? <a href="api/create">Register here</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </body>
</html>
