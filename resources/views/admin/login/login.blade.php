<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>-::User Login::-</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
      <div class="container">
        <div class="row middle">
          <div class="col s6 offset-s3">
           <form method="POST" action="{{ route('login') }}">
             {{ csrf_field() }}
             <div class="card p-5">
               <div class="card-action">
                 <h4 class="login">LogIn form</h4>
               </div>
               <div class="card-content" style="padding-top:0px">
                 <div class="input-field">
                   <i class="material-icons prefix">mail</i>
                   <input id="email" type="email" name="email" class="validate b-bottom">
                   <label for="icon_email">Email</label>
                   <span class="text-danger" id="massage">{{ $errors->has('email')? $errors->first('email'): '' }}</span>
                 </div>
                 <div class="input-field">
                   <i class="material-icons prefix">enhanced_encryption</i>
                   <input id="password" type="password" name="password" class="validate b-bottom">
                   <label for="icon_password">Password</label>
                   <span class="text-danger" id="massage">{{ $errors->has('password')? $errors->first('password'): '' }}</span>
                 </div>
                 <label>
                    <input type="checkbox" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <span>Remember Me</span>
                  </label>
               </div>
                <div class="card-action">
                  <div class="input-field col s4" style="margin:0;">
                      <button type="submit" name="submit" class="btn waves-effect waves-orenge red" id="login"> Login</button>
                  </div> 
                </div>
            </div>
           </form>
         </div>
      </div>
      </div>
        <!-- for javascript -->
         
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>  
      
    </body>
</html>
