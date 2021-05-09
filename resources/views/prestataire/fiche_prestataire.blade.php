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
        <divr class="clearfix"> </divr

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Information compte prestataire</h2>
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
                        <p>This is a basic form wizard example that inherits the colors from the selected scheme.</p>
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li><a href="#step-1"><span class="step_no">1</span>
                                        <span class="step_descr">Etape 1<br />
                                            <small>Etape 1 Identification</small>
                                        </span></a>
                                </li>
                                <li><a href="#step-2"><span class="step_no">2</span>
                                        <span class="step_descr">Etape 2<br />
                                            <small>Etape 2 Contact</small>
                                        </span></a>
                                </li>
                                <li><a href="#step-3"><span class="step_no">3</span>
                                        <span class="step_descr"> Etape 3<br />
                                            <small>Etape 3 Tarification des services</small>
                                        </span></a>
                                </li>
                                <li><a href="#step-4"><span class="step_no">4</span>
                                        <span class="step_descr">Etape 4<br />
                                            <small>Etape 4 Galerie d'image</small>
                                        </span></a>
                                </li>
                            </ul>
							<form method="POST" action="/save/compte/prestatire" enctype="multipart/form-data">
                            @csrf
                            <div id="step-1">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Non de la structure <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="name"
                                                class="form-control " required>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Secteur d'activité <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select required="required" name="id_prestations" class="form-control " required>
                                            @foreach($listPrestation as $items)
                                                <option value="{{ $items->id }}"> {{ $items->name }}</option>
                                            @endforeach    
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="first-name">Situation goegraphique <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="localisation"
                                                class="form-control " required>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label for="middle-name"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <textarea rows="8" name="description" class="form-control" required></textarea>
                                        </div>
                                    </div>


                            </div>
                            <!-- Sstep-1 -->
                            <div id="step-2">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                        Numero de telephone<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="phone_service" class="form-control" required>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Numero de telephone second
                                        </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="phone2_service"  class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Numero whatsapp
                                        </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="phone_whastapp"  class="form-control">
                                    </div>
                                </div>


                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Votre lien facebook
                                        </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="lien_facebook"  class="form-control">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Adresse electronique
                                        </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="email_service"  class="form-control">
                                    </div>
                                </div>


                            </div>
                            <!-- Sstep-2 -->
                            <div id="step-3">
                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Montant minimum de la prestation
                                        </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="montant_min_prest"  class="form-control" required>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Montant maximun de la prestation
                                        </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="montant_max_prest"  class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Sstep-3 -->
                            <div id="step-4">
                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                        principale</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="image_five" class="form-control" required>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Galeries photo </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" name="" class="form-control">
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