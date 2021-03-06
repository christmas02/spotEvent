@extends('prestataire/layout/master')

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
                <h3>Mon compte </h3>
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
                    <h2>Information sur mon compte</h2>
                    <ul class="nav navbar-right panel_toolbox">
                       <li><a href="/welcome/tableau/gesttion" class=""><i class="fa fa-chevron-up"></i>Retour</a>
                    </ul>
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

                  @if($ficheExiste)
                  <div>

                    <div class="col-md-6 col-sm-7 ">
                      <div class="product-image">
                        <img src="{{asset('/image/'.$ficheExiste->path_img)}}" alt="..." />
                      </div>
                      <br>
                      @if($galerieExiste == null)
                        <div class="alert alert-warning">
                        <h4>Vous ne pos??d?? pas de galerie photo, cette lucane vous permet de presenter vos r??alisation,
                            aux utilisateur qui visiteros votre profil<br> <a class="" data-toggle="modal" data-target="#exampleModalImages" href="#"> Ma galerie</a> <br>
                            NB : Veiller contacter le services conseil et assistance au besoin</h4>
                        </div>
                      @endif
                      <div class="product_gallery">
                      @foreach($galerieExiste as $image)
                        <a>
                          <img width="50" height="90" src="{{asset('/image/'.$image->path)}}" alt="..." />
                        </a>
                      @endforeach
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-5 " style="border:0px solid #e5e5e5;">
                        @if($ficheExiste->statu_fiche == 0 )
                        <button class="btn btn-warning "> En cours de traitement</button>
                        @elseif($ficheExiste->statu_fiche == 1 )
                        <button class="btn btn-info "> Actif</button>
                        @elseif($ficheExiste->statu_fiche == 2 )
                        <button class="btn btn-danger "> Inactif</button>
                        @endif
                        <h3 style="" class="prod_title">{{ $ficheExiste->name }} / {{ $ficheExiste->localisation }}</h3>
                        <h4>{{ $ficheExiste->description }}.</h4>
                        <h4>Interval de facturation de la prestation : {{ number_format($ficheExiste->montant_min_prest) }} .XOF  - {{ number_format($ficheExiste->montant_max_prest) }} .XOF </h4>
                        <h4>Telephone : {{ $ficheExiste->phone_service }} / {{ $ficheExiste->phone2_service }}</h4>
                        <h4>Whatsapp : {{ $ficheExiste->phone_whastapp }}</h4>
                        <h4>Facebook : {{ $ficheExiste->lien_facebook }}</h4>
                        <h4>Email : {{ $ficheExiste->email_service }}</h4>
                        <h4>Secteur : {{ gestPrestation($ficheExiste->id_prestations)->name }}</h4>
                        
                        <br />

                        <div class="">
                        {{--<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-pencil"></i> Modifier la gallerie</button>--}}
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#exampleModalCenterInfo">
                            <i class="fa fa-folder"></i> Modifier mom profil</button>
                            
                        </div>

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


<!-- Modal  MODIFIER LES IMAGES-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier la gallerie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form method="POST" action="/update/gallerie/appart" enctype="multipart/form-data">
                            @csrf
                                <input type="text" hidden name="id" value="">
                                <div class="item form-group">
                                   <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        principale</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_one" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        2</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_two" class="form-control">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        3</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_three" class="form-control">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        4</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_five" class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        5</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_for" class="form-control">
                                    </div>
                                </div>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-success">Enregistre</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  MODIFIER LES INFORMATION -->
<div class="modal fade" id="exampleModalCenterInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier mon compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/update/compte/prestatire" enctype="">
            @csrf
            <input type="text" hidden name="id" value="{{$ficheExiste->id}}">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Nom de la structure <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="name" class="form-control" value="{{$ficheExiste->name}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Situation geographie <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="localisation" class="form-control" value="{{$ficheExiste->localisation}}">
                </div>
            </div>
            <div class="item form-group">
                <label for="middle-name"
                    class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea rows="8" name="description" class="form-control">{{$ficheExiste->description}}</textarea>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Tarification min<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="montant_min_prest" class="form-control" value="{{ $ficheExiste->montant_min_prest }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Tarification max<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="montant_max_prest" class="form-control" value="{{ $ficheExiste->montant_max_prest }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Telephone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="phone_service" class="form-control" value="{{ $ficheExiste->phone_service }} ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Telephone secondaire<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="phone2_service" class="form-control" value="{{ $ficheExiste->phone2_service }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Whatsapp<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="phone_whastapp" class="form-control" value="{{ $ficheExiste->phone_whastapp }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                 Liens facebook <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="lien_facebook" class="form-control" value="{{ $ficheExiste->lien_facebook }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Adresse email<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="email_service" class="form-control" value="{{ $ficheExiste->email_service }}">
                </div>
            </div>



                                

                                

                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-success">Enregistre</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endsection