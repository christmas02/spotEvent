@extends('prestataire/layout/master')

@section('content')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">

                </div>
            </div>
        </div>
        <divr class="clearfix">
    </div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Informations compte prestataire</h2>
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
                    @endif

                    <!-- Smart Wizard -->
                    <p></p>
                    <div>

                        <form method="POST" action="/save/compte/prestatire" enctype="multipart/form-data">
                            @csrf
                            <div id="">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Nom de la structure <small class="required text-danger">(Obligatoire)</small>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="name" class="form-control  @error('nom') is-invalid @enderror" id="name" value="{{ old('name') }}">
                                        <input type="text" name="id_user" hidden value="{{ $infoUser->id }}" class="form-control">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Secteur d'activité <small class="required text-danger">(Obligatoire)</small>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="id_prestations" class="form-control" value="{{ old('id_prestations') }}">
                                            <option value="">Choisir votre prestation</option>
                                            @foreach($listPrestation as $items)
                                            <option value="{{ $items->id }}"> {{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_prestations')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Situation géographique <small class="required text-danger">(Obligatoire)</small>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="localisation" class="form-control" value="{{ old('localisation') }}">
                                            <option value="">Choisir la commune</option>
                                            @foreach($listCommune as $items)
                                            <option value="{{ $items->id }}"> {{ $items->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('localisation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Détail sur la localisation <small>Une présentation de 100 mots</small> <small class="required text-danger">(Obligatoire)</small></label>

                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea rows="4" size="100" name="detail_localisation" class="form-control" value=""> {{ old('detail_localisation') }} </textarea>

                                        @error('detail_localisation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Présentation de la structure <small>Une présentation de 250 mots</small> <small class="required text-danger">(Obligatoire)</small> </label>

                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea rows="4" size="400" name="presentation" class="form-control" value="" autocomplete="presentation">{{ old('presentation') }}</textarea>

                                        @error('presentation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Description du service <small class="required text-danger">(Obligatoire)</small> </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea rows="8" name="description" class="form-control" value="" autocomplete="description"> {{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                            </div>
                            <!-- Sstep-1 -->
                            <div id="">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="last-name">
                                        Numéro de téléphone <small class="required text-danger">(Obligatoire)</small>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="phone_service" class="form-control" value="{{ old('phone_service') }}">

                                        @error('phone_service')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Second numéro de téléphone
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="phone2_service" class="form-control">
                                        @error('phone2_service')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Numéro WhatsApp
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="phone_whastapp" class="form-control">
                                        @error('phone_whastapp')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Adresse électronique
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="email_service" class="form-control">
                                        @error('email_service')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <!-- Sstep-2 -->
                            <div id="">
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Estimation min
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select required="required" name="estimation_min" class="form-control " required>
                                            <option value="0">Choisir l'estimation</option>
                                            @foreach($listEstimation as $items)
                                            <option value="{{ $items->libelle }}"> {{ $items->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Estimation max
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select required="required" name="estimation_max" class="form-control " required>
                                            <option value="0">Choisir l'estimation</option>
                                            @foreach($listEstimation as $items)
                                            <option value="{{ $items->libelle }}"> {{ $items->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Sstep-3 -->
                            <div id="">
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-4 col-sm-4 label-align">Image
                                        principale (Taille maximum 23Mo) <small class="required text-danger">(Obligatoire)</small></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_five" accept="image/*" class="form-control" required>
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Enregistre</button>
                                    </div>
                                </div>

                            </div>
                            <!-- Sstep-4 -->
                        </form>
                    </div>
                    <!-- End SmartWizard Content -->

                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /page content -->
@endsection