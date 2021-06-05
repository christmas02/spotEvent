@extends('prestataire/layout/master')

@section('content') 
         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tableau de bords</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
          
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{asset('/admin/images/user.png')}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{ $infoUser->name }}</h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-envelope user-profile-icon"></i> {{ $infoUser->email }}</li>
                        <li><i class="fa fa-phone user-profile-icon"></i>  {{ $infoUser->phone }} </li>
                      </ul>

                    </div>
                    <div class="col-md-9 col-sm-9 ">
                  

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Commentaire</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Evolution generale</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Liste reservation</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">

                              <li>
                                <div class="message_date">
                                  <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">Brian Michaels</h4>
                                  <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                  <br />
                                </div>
                              </li>

                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Designstion</th>
                                  <th>Valeurs</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                                <tr> 
                                  <td></td>
                                  <td>Nombre total de viste</td>
                                  <td class="hidden-phone">30</td>
                                </tr>
                                <tr> 
                                  <td></td>
                                  <td>Nombre total de prise contact</td>
                                  <td class="hidden-phone">30</td>
                                </tr>
                                <tr> 
                                  <td></td>
                                  <td>Nombre total de sollicitation</td>
                                  <td class="hidden-phone">30</td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                             <!-- start user projects -->
                             <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Informateion client</th>
                                  <th>Date</th>
                                  <th>Statu</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                                <tr> 
                                  <td></td>
                                  <td><a href="#">Alexis Djidonou - 07 48 99 79 45 - Abidjan cocody </a></td>
                                  <td>12 Janvier 2021</td>
                                  <td>lu</td>
                                </tr>
                                <tr> 
                                  <td></td>
                                  <td><a href="#">Alexis Djidonou - 07 48 99 79 45 - Abidjan cocody </a></td>
                                  <td>12 Janvier 2021</td>
                                  <td>En attante</td>
                                </tr>

                              </tbody>
                            </table>
                            <!-- end user projects -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                 
                  <div class="x_content">
                  <div>
                    @if($ficheExiste == null)
                      <div class="alert alert-danger">
                      <h4>Vous devez completez les informations relative a votre comptre prestataire,
                        pour le fais cliquez cliquer sur ce lien <br> <a href="/infos/compte/prestatire/{{ $infoUser->id }}"> Compte prestataire</a> <br>
                        NB : Veiller contacter le services conseil et assistance au besoin</h4>
                      </div>
                    @endif
                  </div>

                  <div>
                    @if(count($galerieExiste) == 0)
                      <div class="alert alert-warning">
                      <h4>Vous ne posédé pas de galerie photo, cette lucane vous permet de presenter vos réalisation,
                            aux utilisateur qui visiteros votre profil<br> <a class="" data-toggle="modal" data-target="#exampleModalImages" href="#"> Ma galerie</a> <br>
                            NB : Veiller contacter le services conseil et assistance au besoin</h4>
                      </div>
                    @endif
                  </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


    
@endsection