@extends('admin/layout/master')

@section('content') 
<?php 
    function gestPrestation($id){
        $prestation = \App\Prestation::where('id',$id)->first();
        return $prestation;
    }

?>
<!-- page content -->
<div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Information sur la fiche du prestataire </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                  <div class="input-group">
                    
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
                       <li><a href="/liste/prestataires" class=""><i class="fa fa-chevron-up"></i>Retour</a>
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
                      <h3>{{ $prestataire->nom }}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-envelope user-profile-icon"></i> {{ $prestataire->adresse }}</li>
                        <li><i class="fa fa-phone user-profile-icon"></i> {{ $prestataire->numero }}</li>
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
            </div>
            
            <div class="row">
            
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Compte de prestation</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  @if(Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
                  @elseif(Session::has('danger'))
                  <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                  @elseif(Session::has('warning'))
                  <div class="alert alert-warning">{{ Session::get('warning') }}</div>
                  @endif

                  @if($prestataire)
                  <div>

                    <div class="col-md-6 col-sm-7 ">
                      <div class="product-image">
                        <img src="{{asset('/storage/'.$prestataire->path_img)}}" alt="..." />
                      </div>
                      <br>
                    @if($galerie != [])
                     <div class="product_gallery">
                      @foreach($galerie as $image)
                        <a>
                          <img width="50" height="90" src="{{asset('/storage/'.$image->path)}}" alt="..." />
                        </a>
                      @endforeach
                      </div>
                    @else
                        <div class="alert alert-warning">
                        <h4>Ce compte ne possede pas de portfolio</h4>
                        </div>
                    @endif
                      
                    </div>

                    <div class="col-md-6 col-sm-5 " style="border:0px solid #e5e5e5;">
                        @if($prestataire->statu_fiche == 0 )
                        <button class="btn btn-warning "> En cours de traitement</button>
                        @elseif($prestataire->statu_fiche == 1 )
                        <button class="btn btn-info "> Actif</button>
                        @elseif($prestataire->statu_fiche == 2 )
                        <button class="btn btn-danger "> Inactif</button>
                        @endif
                        {{ $prestataire->id_user }}
                        <h3 style="" class="prod_title">{{ $prestataire->name }} / {{ $prestataire->localisation }}</h3>
                        <h4>{{ $prestataire->presentation }}.</h4>
                        <br>
                        <h4>{{ $prestataire->description }}.</h4>
                        <h4>Interval de facturation de la prestation :  .XOF  -  .XOF </h4>
                        <h4>Telephone : {{ $prestataire->phone_service }} / {{ $prestataire->phone2_service }}</h4>
                        <h4>Whatsapp : {{ $prestataire->phone_whastapp }}</h4>
                        <h4>Facebook : {{ $prestataire->lien_facebook }}</h4>
                        <h4>Email : {{ $prestataire->email_service }}</h4>
                        <h4>Secteur : {{ gestPrestation($prestataire->id_prestations)->name }}</h4>
                        
                        <br />


                    </div>
                  
                  </div>
                  @else
                    <div class="alert alert-danger">
                    <h4>Vous devez completez les informations relative a votre comptre prestataire,
                        pour le fais cliquez cliquer sur ce lien <br> <a href="/infos/compte/prestatire"> Compte prestataire</a> <br>
                        NB : Veiller contacter le services conseil et assistance au besoin</h4>
                    </div>
                  @endif

                  

                    


                  </div>
                </div>
              </div>
            

            <div>
            
            </div>
            </div>
            
          </div>
        </div>

<!-- /page content -->





@endsection