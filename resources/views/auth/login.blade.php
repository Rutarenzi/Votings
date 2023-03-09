<!Doctype html>
<html lang="en-Us">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Rutagarama Axcel">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style2.css')}}">
    </head>
    <body>


        <div class="registerForm">
            <h3>Login</h3>
            <form method="post" action="{{ route('login')}}">
                  @csrf
                   
                  
                   
                   <input type="email" id="email" name="email" value="{{ old('email')}}" placeholder="Enter your email">
                   @error('name')
                   <span role=alert>
                        <strong>{{$message}}</strong>
                   </span>
                   @enderror
                  
                   <input type="password" id="password" name="password" placeholder="Enter your password">
                   @error('name')
                   <span role=alert>
                        <strong>{{$message}}</strong>
                   </span>
                    @enderror
                  
                  <input class="form-check-input" type="checkbox" name="remember" value={{ old('remember')? 'checked':''}}> 
               
                <button>Login</button>
            </form>
        </div>
    </body>
    </html>