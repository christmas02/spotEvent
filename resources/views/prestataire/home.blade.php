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
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                 
                  <div class="x_content">
                  <div>
                    @if($ficheExiste == null)
                      <div class="alert alert-danger">
                      <h4>Vous devez completez les informations relative a votre comptre prestataire,
                        pour le fais cliquez cliquer sur ce lien <br> <a href="/infos/compte/prestatire"> Compte prestataire</a> <br>
                        NB : Veiller contacter le services conseil et assistance au besoin</h4>
                      </div>
                    @endif
                  </div>

                  <div>
                    @if($galerieExiste == null)
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