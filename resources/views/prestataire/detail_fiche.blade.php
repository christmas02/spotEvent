@extends('prestataire/layout/master')

@section('content') 
<?php 
    function gestPrestation($id){
        $prestation = \App\Prestation::where('id',$id)->first();
        return $prestation;
    }

    function getEstimation($id){
      $estimation = \App\Estimation::where('id',$id)->first();
      return $estimation;
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

                    <div class="col-md-12 col-sm-12 " style="border:0px solid #e5e5e5;">
                        @if($ficheExiste->statu_fiche == 0 )
                        <p class="alert alert-warning "> En cours de traitement</p>
                        @elseif($ficheExiste->statu_fiche == 1 )
                        <p class="alert alert-info "> Actif</p>
                        @elseif($ficheExiste->statu_fiche == 2 )
                        <p class="alert alert-danger "> Inactif</p>
                        @endif
                        <h3 style="" class="prod_title">{{ $ficheExiste->name }} / {{ $ficheExiste->localisation }}</h3>
                        <h4><strong>Présentation :</strong>{{ $ficheExiste->presentation }}.</h4>
                        <h4><strong>Detail de localisation :</strong>{{ $ficheExiste->detail_localisation }}.</h4>
                        <h4><strong>Description :</strong>{{ $ficheExiste->description }}.</h4>
                        <h4>Interval de facturation de la prestation : {{ number_format($ficheExiste->estimation_min) }} .XOF  -  {{ number_format($ficheExiste->estimation_max) }}.XOF </h4>
                        <h4><strong>Telephone</strong> : {{ $ficheExiste->phone_service }} / {{ $ficheExiste->phone2_service }}</h4>
                        <h4>Whatsapp : {{ $ficheExiste->phone_whastapp }}</h4>
                        <h4>Facebook : {{ $ficheExiste->lien_facebook }}</h4>
                        <h4>Email : {{ $ficheExiste->email_service }}</h4>
                        <h4>Secteur : {{ gestPrestation($ficheExiste->id_prestations)->name }}</h4>
                        
                        <br />

                        <div class="">
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#exampleModalGalerie">
                            <i class="fa fa-pencil"></i> Modifier la gallerie</button>
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#exampleModalCenterInfo">
                            <i class="fa fa-folder"></i> Modifier mom profil</button>
                            
                        </div>
                        <hr>

                    </div>

                    <div class="col-md-12 col-sm-12 ">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="product-image">
                          <img src="{{asset('/storage/'.$ficheExiste->path_img)}}" alt="..." />
                        </div>
                      </div>
                      <div class="col-md-6">
                        @if(count($galerieExiste) == 0)
                          <div class="alert alert-warning">
                              <h4>Vous ne posédé pas de galerie photo, cette lucane vous permet de presenter vos réalisation,
                                  aux utilisateur qui visiteros votre profil<br> <a class="" data-toggle="modal" data-target="#exampleModalImages" href="#"> Ma galerie</a> <br>
                                  NB : Veiller contacter le services conseil et assistance au besoin</h4>
                          </div>
                        @else
                        @foreach($galerieExiste as $items)
                        <div class="product_gallery">
                            <div class="col-md-3"> 
                              <img width="100" height="80" style="margin-bottom: 30px;" src="{{asset('/storage/'.$items->path )}}" alt="spotevent" />
                            </div>
                        </div>
                        @endforeach
                        @endif
                      </div>
                    </div>
                      <div></div>
                      <br>

                    </div>
                  
                  </div>
                  @else
                    <div class="alert alert-danger">
                    <h4>Vous devez completez les informations relative a votre comptre prestataire,
                        pour le fais cliquez cliquer sur ce lien <br> <a href="/infos/compte/prestatire/{{ $infoUser->id }}"> Compte prestataire</a> <br>
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

<div class="modal fade" id="exampleModalGalerie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier la gallerie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
            <input type="text" hidden name="id" value="">
            <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">

                            <th class="column-title">Image </th>
                            <th class="column-title"> </th>
                            <th class="column-title"> </th>

                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($galerieExiste as $items)
                          <tr class="even pointer">
                            <td class="a-center ">
                            <img width="50" height="50" src="{{asset('/storage/'.$items->path )}}" alt="..." />
                            </td>
                            <td> {{ $items->path }}</td>
                            <td class=" last">
                              <a href="" class="btn btn-info"><i class="fa fa-pencil"></i> </a>
                              <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                            </td>
                          </tr>
                        @endforeach
                          
                          
                        </tbody>
                      </table>
                    </div>
                                
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        @if(count($galerieExiste) == 6)
       
        @else
        <button type="" data-toggle="modal" data-target="#exampleModalImages" class="btn btn-success">Ajouter</button>
        @endif
      </div>
    
    </div>
  </div>
</div>


@if($ficheExiste)
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
                    class="col-form-label col-md-3 col-sm-3 label-align">Détail localisaton</label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea rows="4" name="detail_localisation" class="form-control">{{$ficheExiste->detail_localisation}}</textarea>
                </div>
            </div>
            <div class="item form-group">
                <label for="middle-name"
                    class="col-form-label col-md-3 col-sm-3 label-align">Présentation</label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea rows="4" name="presentation" class="form-control">{{$ficheExiste->presentation}}</textarea>
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
                  Estimation min<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <select required="required" name="estimation_min" class="form-control " required>
                                        <option>Choisir l'estimation</option>
                                            @foreach($listEstimation as $items)
                                                <option value="{{ $items->libelle }}"> {{ $items->libelle }}</option>
                                            @endforeach    
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Estimation max<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                <select required="required" name="estimation_max" class="form-control " required>
                                        <option>Choisir l'estimation</option>
                                            @foreach($listEstimation as $items)
                                                <option value="{{ $items->libelle }}"> {{ $items->libelle }}</option>
                                            @endforeach    
                </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Téléphone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="phone_service" class="form-control" value="{{ $ficheExiste->phone_service }} ">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                Téléphone secondaire<span class="required">*</span>
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
                 Lien facebook <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="lien_facebook" class="form-control" value="{{ $ficheExiste->lien_facebook }}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                 Lien instagram <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="lien_instagram" class="form-control" value="{{ $ficheExiste->lien_instagram }}">
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
@endif


@endsection