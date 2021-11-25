@extends('prestataire/layout/master')
<?php 

function libellePrestation($id){

    $data = App\Prestation::where('id',$id)->first();
    return $data;
}



?>

@section('content')
<style>
* {
    box-sizing: border-box
}

/* Container needed to position the overlay. Adjust the width as needed */
.container-image {
    position: relative;
}

/* Make the image to responsive */
.image {
    display: block;
    width: 100px;
    height: auto;
}

/* The overlay effect - lays on top of the container and over the image */
.overlay {
    position: absolute;
    bottom: 0;
    /*background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.5);
    Black see-through */
    color: #f1f1f1;
    width: 10%;
    transition: .5s ease;
    opacity: 0;
    color: white;
    padding: 2px;
    text-align: center;
}

/* When you mouse over the container, fade in the overlay title */
.container-image:hover .overlay {
    opacity: 1;
}


.trash i {
    font-size: 90px;
    border: 1px solid #dc3545;
    ;
    color: #dc3545;
    ;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto;
    text-align: center;
    padding-top: 10px;
}

.trash {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto;
    text-align: center;
    padding-top: 10px;
    margin-bottom: 30px;
}
</style>
<style>
.uploader {
    display: block;
    clear: both;
    margin: 0 auto;
    width: 100%;
    max-width: 600px;
}

.uploader label {
    float: left;
    clear: both;
    width: 100%;
    padding: 2rem 1.5rem;
    text-align: center;
    background: #fff;
    border-radius: 7px;
    border: 3px solid #eee;
    transition: all 0.2s ease;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.uploader label:hover {
    border-color: #454cad;
}

.uploader label.hover {
    border: 3px solid #454cad;
    box-shadow: inset 0 0 0 6px #eee;
}

.uploader label.hover #start i.fa {
    transform: scale(0.8);
    opacity: 0.3;
}

.uploader #start {
    float: left;
    clear: both;
    width: 100%;
}

.uploader #start.hidden {
    display: none;
}

.uploader #start i.fa {
    font-size: 50px;
    margin-bottom: 1rem;
    transition: all 0.2s ease-in-out;
}

.uploader #response {
    float: left;
    clear: both;
    width: 100%;
}

.uploader #response.hidden {
    display: none;
}

.uploader #response #messages {
    margin-bottom: 0.5rem;
}

.uploader #file-image {
    display: inline;
    margin: 0 auto 0.5rem auto;
    width: auto;
    height: auto;
    max-width: 180px;
}

.uploader #file-image.hidden {
    display: none;
}

.uploader #notimage {
    display: block;
    float: left;
    clear: both;
    width: 100%;
}

.uploader #notimage.hidden {
    display: none;
}

.uploader progress,
.uploader .progress {
    display: inline;
    clear: both;
    margin: 0 auto;
    width: 100%;
    max-width: 180px;
    height: 8px;
    border: 0;
    border-radius: 4px;
    background-color: #eee;
    overflow: hidden;
}

.uploader .progress[value]::-webkit-progress-bar {
    border-radius: 4px;
    background-color: #eee;
}

.uploader .progress[value]::-webkit-progress-value {
    background: linear-gradient(to right, #393f90 0%, #454cad 50%);
    border-radius: 4px;
}

.uploader .progress[value]::-moz-progress-bar {
    background: linear-gradient(to right, #393f90 0%, #454cad 50%);
    border-radius: 4px;
}

.uploader input[type=file] {
    display: none;
}

.uploader div {
    margin: 0 0 0.5rem 0;
    color: #5f6982;
}

.uploader .btn {
    display: inline-block;
    margin: 0.5rem 0.5rem 1rem 0.5rem;
    clear: both;
    font-family: inherit;
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    text-transform: initial;
    border: none;
    border-radius: 0.2rem;
    outline: none;
    padding: 0 1rem;
    height: 36px;
    line-height: 36px;
    color: #fff;
    transition: all 0.2s ease-in-out;
    box-sizing: border-box;
    background: #454cad;
    border-color: #454cad;
    cursor: pointer;
}
</style>
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

    function nbreImage($imgPos, $imgPoc){

      $nbrImg = $imgPos - $imgPoc;
      return $nbrImg;

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
                    @if($ficheExiste)
                    <div class="x_title">
                        <h2>Information sur mon compte</h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li class="dropdown-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenterInfo"
                                        href="#">Modifier ma fiche</a>
                                    @if(count($galerieExiste) < $ficheExiste->nbre_image)
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalImage"
                                            href="#">Ajoute d'image</a>

                                        @endif
                                </div>
                            </li>
                            <li><a href="" class=""><i class="fa fa-setting"></i>Parametre</a>
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


                        <div>

                            <div class="col-md-8 col-sm-8 " style="border:0px solid #e5e5e5;">
                                @if($ficheExiste->statu_fiche == 0 )
                                <p class="alert alert-warning "> En cours de traitement</p>
                                @elseif($ficheExiste->statu_fiche == 1 )
                                <p class="alert alert-info "> Actif</p>
                                @elseif($ficheExiste->statu_fiche == 2 )
                                <p class="alert alert-danger "> Inactif</p>
                                @endif
                                <h3 style="" class="prod_title">{{ $ficheExiste->name }}</h3>
                                <h4><strong>Présentation :</strong>{{ $ficheExiste->presentation }}.</h4>
                                <h4><strong>Detail de localisation :</strong>{{ $ficheExiste->detail_localisation }}.
                                </h4>
                                <h4><strong>Description :</strong>{{ $ficheExiste->description }}.</h4>
                                <h4>Interval de facturation de la prestation :
                                    {{ $ficheExiste->estimation_min }} .XOF -
                                    {{ $ficheExiste->estimation_max }}.XOF </h4>
                                <h4><strong>Telephone</strong> : {{ $ficheExiste->phone_service }} /
                                    {{ $ficheExiste->phone2_service }}</h4>
                                <h4>Whatsapp : {{ $ficheExiste->phone_whastapp }}</h4>
                                <h4>Facebook : {{ $ficheExiste->lien_facebook }}</h4>
                                <h4>Email : {{ $ficheExiste->email_service }}</h4>
                                <h4>Secteur : {{ gestPrestation($ficheExiste->id_prestations)->name }}</h4>

                                <br />


                                <hr>

                            </div>
                            <div class="col-md-4 col-sm-4">
                                @if($ficheExiste->video == 1)
                                    @if($videoExiste == NULL)
                                    <div class="alert alert-warning">
                                        <h4>Vous avez la possibilité d'ajouter une vidéo.<br>
                                            Pour le faire cliquez sur ce lien <a class="" data-toggle="modal"
                                                data-target="#exampleModalvideo" href="#"> Ma video</a><br>
                                            NB : Veuillez contacter le service conseil et assistance en cas de besoin.</h4>
                                    </div>
                                    @else
                                    <div class="">
                                        <div class="container-image">
                                        <video width="400" height="222" controls="controls">
                                        <source src="video.mp4" type="video/mp4" />
                                        <source src="video.webm" type="video/webm" />
                                        <source src="video.ogv" type="video/ogg" />
                                        Ici l'alternative à la vidéo : un lien de téléchargement, un message, etc.
                                        </video>
                                            <source src="{{asset('storage/'.$videoExiste->path)}}" type="video/mp4" />
                                            <div class="overlay">
                                                <button href="" data-toggle="modal"
                                                    data-target="#"
                                                    class="btn btn-sm btn-primary btn-rounded"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button href="" data-toggle="modal"
                                                    data-target="#"
                                                    class="btn btn-sm btn-danger btn-rounded"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                            </div>

                            <div class="col-md-12 col-sm-12 ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-image container-image">
                                            <img src="{{asset('spotevent/public/storage/'.$ficheExiste->path_img)}}"
                                                alt="..." />
                                            <div class="overlay">
                                                <a href="" data-toggle="modal"
                                                    data-target="#exampleModalUpadeImage{{$ficheExiste->id}}"
                                                    class="btn btn-sm btn-primary btn-rounded"><i
                                                        class="fa fa-pencil"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if(count($galerieExiste) == 0)
                                        <div class="alert alert-warning">
                                            <h4>Vous ne possédez pas de galerie photos.<br> Cette lucarne vous permet de
                                                présenter vos réalisations aux utilisateurs qui visiteront votre
                                                profil.<br> <a class="" data-toggle="modal"
                                                    data-target="#exampleModalImages" href="#"> Ma galerie</a> <br>
                                                NB : Veuillez contacter le service conseil et assistance en cas de
                                                besoin.</h4>
                                        </div>
                                        @else
                                        @foreach($galerieExiste as $items)
                                        <div class="">
                                            <div class="col-md-4 container-image">
                                                <img width="" height="" style="margin-bottom: 20px; width:100%;"
                                                    src="{{asset('spotevent/public/storage/'.$items->path )}}"
                                                    alt="spotevent" />
                                                <div class="overlay">
                                                    <button href="" data-toggle="modal"
                                                        data-target="#exampleModalUpadeImageSeconds{{$items->id}}"
                                                        class="btn btn-sm btn-primary btn-rounded"><i
                                                            class="fa fa-pencil"></i></button>
                                                    <button href="" data-toggle="modal"
                                                        data-target="#exampleModalDeletImage{{$items->id}}"
                                                        class="btn btn-sm btn-danger btn-rounded"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
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
                            <h4>Vous devez complèter les informations relatives à votre compte prestataire.<br>
                                Pour le faire cliquez sur ce lien <a
                                    href="/infos/compte/prestatire/{{ $infoUser->id }}"> Compte prestataire</a> <br>
                                NB : Veuillez contacter le service conseil et assistance en cas de besoin.</h4>
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


@if($ficheExiste)
<!-- Modal  MODIFIER LES INFORMATION -->
<div class="modal fade" id="exampleModalCenterInfo" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <center>
                    <h3>Modification des informations</h3>
                </center>
                <hr>
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
                    <!--<div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Situation geographie <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="localisation" class="form-control"
                                value="{{$ficheExiste->localisation}}">
                        </div>
                    </div>-->
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Détail
                            localisaton</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea rows="4" name="detail_localisation"
                                class="form-control">{{$ficheExiste->detail_localisation}}</textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name"
                            class="col-form-label col-md-3 col-sm-3 label-align">Présentation</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea rows="4" name="presentation"
                                class="form-control">{{$ficheExiste->presentation}}</textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name"
                            class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea rows="8" name="description"
                                class="form-control">{{$ficheExiste->description}}</textarea>
                        </div>
                    </div>
                    <!--<div class="item form-group">
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
                    </div>-->
                    <div class="item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Secteur d'activité
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="id_prestations" class="form-control" value="{{ old('id_prestations') }}"
                                required>
                                <option value="{{$ficheExiste->id_prestations}}" selected>
                                    {{ libellePrestation($ficheExiste->id_prestations)->name }}</option>
                                @foreach($listPrestation as $items)
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Téléphone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="phone_service" class="form-control"
                                value="{{ $ficheExiste->phone_service }} ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Téléphone secondaire<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="phone2_service" class="form-control"
                                value="{{ $ficheExiste->phone2_service }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Whatsapp<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="phone_whastapp" class="form-control"
                                value="{{ $ficheExiste->phone_whastapp }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Lien facebook <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="lien_facebook" class="form-control"
                                value="{{ $ficheExiste->lien_facebook }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Lien instagram <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="lien_instagram" class="form-control"
                                value="{{ $ficheExiste->lien_instagram }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            Adresse email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="email_service" class="form-control"
                                value="{{ $ficheExiste->email_service }}">
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

<!-- UPDATE IMAGES  PRINCIPAL-->
<div class="modal fade" id="exampleModalUpadeImage{{$ficheExiste->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <center>
                    <h4>Modification de l'image principal !</h4>
                </center>
                <!-- Upload  -->
                <form method="POST" action="/update/image" enctype="multipart/form-data" id="file-upload-form"
                    class="uploader">
                    @csrf
                    <input id="file-upload" type="file" name="image" accept="image/*" />
                    <input type="text" hidden name="id" value="{{ $ficheExiste->id }}">
                    <input type="text" hidden name="table" value="1">

                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden">
                        <div id="start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Selectionez votre image</div>
                            <div id="notimage" class="hidden">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Cliquer ici</span>
                        </div>
                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0">
                                <span>0</span>%
                            </progress>
                        </div>
                    </label>


            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Modifier</button>
            </div>
            </form>

        </div>

    </div>
</div>


<!-- ADD IMAGES -->
<div class="modal fade" id="exampleModalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/add/gallerie" enctype="multipart/form-data">
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
                            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                            <input type="text" hidden name="id_user" value="{{ $ficheExiste->id_user }}">
                            <input type="text" hidden name="imgPossible"
                                value="{{ nbreImage($ficheExiste->nbre_image, count($galerieExiste)) }}">
                        </div>

                    </div>
                    <br>
                    <hr>
                    <div id="" class="col-md-12 col-sm-6 alert alert-danger">Il vous reste
                        {{ nbreImage($ficheExiste->nbre_image, count($galerieExiste)) }} image(s)
                    </div>



            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Valider</button>
            </div>
            </form>
        </div>

    </div>
</div>
@endif

@foreach($galerieExiste as $items)
<!-- Modal  Modification une image -->
<div class="modal fade" id="exampleModalUpadeImageSeconds{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/update/image" enctype="multipart/form-data">
                    @csrf
                    <center>
                        <h4>Modification de l'image !</h4>
                    </center>


                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ajouter l'
                            images</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <input type="text" hidden name="id" value="{{$items->id}}">
                            <input type="text" hidden name="table" value="2">
                        </div>

                    </div>

            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Modifier</button>
            </div>
            </form>
        </div>

    </div>
</div>
@endforeach

@if($galerieExiste)
@foreach($galerieExiste as $items)
<!-- Modal suppression une image -->
<div class="modal fade" id="exampleModalDeletImage{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/delet/image" enctype="">
                    @csrf
                    <div class="trash"><i class="fa fa-trash"></i></div>
                    <center>
                        <h3>Voulez-vous vraiment supprimer !</h3>
                    </center>
                    <input type="text" hidden name="id" value="{{$items->id}}">
                    <input type="text" hidden name="table" value="2">

            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Valider</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif


@endsection