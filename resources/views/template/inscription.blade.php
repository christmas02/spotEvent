<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <h1> Connexion </h1>
              <div>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse electronique" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" required autocomplete="current-password"/>
              </div>

              <div>
                <input class="btn btn-info btn-center" type="submit" value="Connexion">
                <a class="reset_pass" href="#">Mot de passe oublié ?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Êtes-vous déja inscrit ?
                  <a href="#signup" class="to_register"> S'inscrire </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-edit"></i> spotEvent !</h1>
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        @if(session('success'))
              <div class=" alert alert-success py-2 mb-2">
                                {{ session('success') }}
              </div>
        @endif

        <div id="register" class="animate form registration_form">
        
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <h1>Créer un compte utiiateur</h1>
              <div>
                <input type="text" name="name" class="form-control" placeholder="Non d'utilisateur" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required="" />
                <input type="text" name="role" hidden class="form-control" value="2" required="" />
              </div>
              <div>
                <input type="text" name="phone" class="form-control" size="10" maxlength="10" placeholder="Téléphone Ex:07XXXXXXXX" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="" />
                <p>Le mot de passe doit contenir au mimumum 8 caractères *</p>
              </div>
              <div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation mot de passe" required="" />
              </div>
              <div>
                <input class="btn btn-info btn-center" type="submit" value="Enregistrer">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Déjà membre ? 
                  <a href="#signin" class="to_register">Se connecter </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
        
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <h1>Créer un compte prestatire</h1>
              <div>
                <input type="text" name="name" class="form-control" placeholder="Non d'utilisateur" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required="" />
                <input type="text" name="role" hidden class="form-control" value="1" required="" />
              </div>
              <div>
                <input type="text" name="phone" class="form-control" size="10" maxlength="10" placeholder="Téléphone Ex:07XXXXXXXX" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="" />
                <p>Le mot de passe doit contenir au mimumum 8 caractères *</p>
              </div>
              <div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation mot de passe" required="" />
              </div>
              <div>
                <input class="btn btn-info btn-center" type="submit" value="Enregistrer">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Déjà membre ? 
                  <a href="#signin" class="to_register">Se connecter </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>

        </div>
      </div>
    </div>
  </body>
</html>