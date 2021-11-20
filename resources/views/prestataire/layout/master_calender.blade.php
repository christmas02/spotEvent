<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title> |Spoteventapp </title>

    <!-- Bootstrap -->
    <link href="{{asset('/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="{{asset('/admin/vendors/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/fullcalendar/dist/fullcalendar.print.css')}}" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('/admin//build/css/custom.min.css')}}" rel="stylesheet">

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="l'annuaire nuptial digital" />
    <meta property="og:image" content="https://spoteventapp.net/images/logo.spoteventapp.png" />
    <meta property="og:url" content="https://spoteventapp.net/" />
    <meta property="og:type" content="siteweb" />
    <meta property="og:locale" content="" />
    <meta property="og:videos" content="" />
    <meta property="og:site_name" content="spoteventapp" />
    <meta property="og:description" content="Nous sommes une plateforme de mise en relation entre les acteurs de l'univers du mariage et les personnes désireuses de réaliser un mariage." />
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title"> <span>Spotevent</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if($infoUser->path_user != NULL)
                            <img src="{{asset('spotevent/public/storage/'.$infoUser->path_user)}}" alt="..."
                                class="img-circle profile_img" width="100">
                            @else
                            <img src="{{asset('/admin/images/user.png')}}" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <h2>{{ $infoUser->name }}</h2>
                            <small>{{ $infoUser->email }}</small>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="/welcome/tableau/gesttion/{{ $infoUser->id }}"><i class="fa fa-home"></i>
                                        Tableau de bord</span></a></li>
                                <li><a href="/fiche/prestataire/{{ $infoUser->id }}"><i class="fa fa-edit"></i> Mon
                                        compte</span></a></li>
                                <li><a href="/list/demande/{{ $infoUser->id }}"><i class="fa fa-table"></i> Liste des
                                        demandes </a></li>
                                        <li><a href="/Agenda/{{ $infoUser->id }}"><i class="fa fa-table"></i>
                                        Mon agenda </a></li>
                                <li><a href="/list/messageries/{{ $infoUser->id }}"><i class="fa fa-comments"></i>
                                        Messagerie</a></li>

                                <li><a><i class="fa fa-sign-out"></i> Deconnexion </a></li>

                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">

                                 {{  $infoUser->name }}
                                    
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalProfile"
                                        href="#"> Profil</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalmdp"
                                        href="#"> Mot de passe</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}<i class="fa fa-sign-out pull-right"></i>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">-</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">



                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- ######################################################## -->
            @yield('content')
            <!-- ######################################################## -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    <a href="">SpotEvent</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- Modal  MODIFIER DU COMPTE PRESTATAIRES-->
    <div class="modal fade" id="exampleModalImages" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="/save/gallerie" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <h4>Création de ma galerie !</h4>
                        </center>
                        <h5>Vous avez la possibilité de choisir plusieur images (shift + le clique sur l'image).</h5>
                        <br>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ajouter les
                                images</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" name="images[]" class="form-control" multiple>
                                <input type="text" hidden name="id_user" value="{{ $infoUser->id }}">
                            </div>

                        </div>
                        <div id="erreur" class="alert alert-danger">Vous pouvez enregistre que 6 images</div>
                </div>
                <div class="modal-footer-btn">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" id="imageUploadForm" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal  MODIFIER DU COMPTE PRESTATAIRES-->
    <div class="modal fade" id="exampleModalvideo" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="/save/video" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <h4>Ajouter une video</h4>
                        </center>
                        <h5>Vous avez la possibilité .</h5>
                        <br>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ajouter les
                                video</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" name="video" accept="video/*" class="form-control">
                                <input type="text" hidden name="id_user" value="{{ $infoUser->id }}">
                            </div>

                        </div>
                </div>
                <div class="modal-footer-btn">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" id="imageUploadForm" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal  MODIFIER DU PROFILE UTILISATEUR-->
    <div class="modal fade" id="exampleModalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalProfile"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <center>
                        <h4>Modification du profil</h4>
                    </center>
                    <hr>
                    <form method="POST" class="row" action="/save/profil" enctype="multipart/form-data">
                        @csrf

                        <div class="item form-group col-md-3">
                            <center class="img_profil">
                                @if($infoUser->path_user != NULL)
                                <img src="{{asset('spotevent/public/storage/'.$infoUser->path_user)}}" alt="..."
                                    class="img-circle profile_img" style="width:200; margin-left: 0px;">
                                
                                @else
                                <img src="{{asset('/admin/images/user.png')}}" alt="..." class="img-circle profile_img">
                                @endif
                            </center>
                        </div>
                        <div class="col-md-8">
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nom et
                                    prénom</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="name" class="form-control" value="{{ $infoUser->name }}">
                                    <input type="" hidden name="id" class="form-control" value="{{ $infoUser->id }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Numéro de
                                    téléphone</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="phone" class="form-control" value="{{ $infoUser->phone }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Adresse
                                    email</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="text" name="email" class="form-control" value="{{ $infoUser->email }}">
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer-btn">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal  MODIFIER DU MOT DE PASSE-->
    <div class="modal fade" id="exampleModalmdp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="/save/password" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <h4>Modification du mot de passe</h4>
                        </center>
                        <hr>

                        <input type="" hidden name="id" class="form-control" value="{{ $infoUser->id }}">
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mot de
                                passe</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" name="password" class="form-control" value="">
                            </div>

                        </div>
                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirmation
                                mot de parse_str</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" name="password_confirmation" class="form-control" value="">
                            </div>
                        </div>
                </div>
                <div class="modal-footer-btn">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>


     <!-- calendar modal -->
     <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
        
    <!-- jQuery -->
    <script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/admin/vendors/nprogress/nprogress.js')}}"></script>
    <!-- FullCalendar -->
    <script src="{{asset('/admin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('/admin/build/js/custom.min.js')}}"></script>


  
  



</body>

</html>