@extends('admin/layout/master')

@section('content')
<?php
function gestPrestation($id)
{
    $prestation = \App\Prestation::where('id', $id)->first();
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
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-6">
                                <div class="card">
                                    <div class="body l-parpl text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="2078" data-speed="2000" data-fresh-interval="700">{{ $visite }}</h3>
                                        <span class="text-white">Visites</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="card">
                                    <div class="body l-seagreen text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="1278" data-speed="2000" data-fresh-interval="700">{{ $phone }}</h3>
                                        <span class="text-white">Prises de contact</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521" data-speed="2000" data-fresh-interval="700">{{ $demande }}</h3>
                                        <span class="text-white">Sollicitations</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="card">
                                    <div class="body l-blue text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="978" data-speed="2000" data-fresh-interval="700">0</h3>
                                        <span class="text-white">Messagerie</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="card">
                                    <div class="body l-seagreen text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="1278" data-speed="2000" data-fresh-interval="700">{{ count($commentaire) }}</h3>
                                        <span class="text-white">Avis Utilisateurs</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521" data-speed="2000" data-fresh-interval="700">{{ $demande }}</h3>
                                        <span class="text-white">Sms reçus</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profil</h2>
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
                                    <img class="img-responsive avatar-view" src="{{asset('spotevent/public/storage/'.$infoUser->path_user )}}" alt="Avatar" title="...">
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

                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Évolution générale</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Liste des demandes</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">

                                    <div role="tabpanel" class="tab-pane active" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr style="font-size: 20px;">
                                                    <th></th>
                                                    <th>Designation</th>
                                                    <th>Statistiques</th>

                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 16px;">
                                                <tr>
                                                    <td></td>
                                                    <td>Nombre total de visites</td>
                                                    <td class="hidden-phone"><strong>{{ $visiteMonth }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Nombre total de prises de contact</td>
                                                    <td class="hidden-phone"><strong>{{ $phoneMonth }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Nombre total de sollicitations</td>
                                                    <td class="hidden-phone"><strong>{{ $demandeMonth }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr style="font-size: 20px;">
                                                    <th></th>
                                                    <th>Information client</th>
                                                    <th>Date</th>
                                                    <th>Statut</th>

                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 16px;">
                                                @if($listDemande)
                                                @foreach($listDemande as $items)
                                                <tr>
                                                    <td></td>
                                                    <td><a href="#" data-toggle="modal" data-target="#exampleModalDemande{{$items->id}}">{{ $items->name }}
                                                            - {{ $items->phone }}</a></td>
                                                    <td>{{ $items->created_at }}</td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                                @endif

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
                                    <img src="{{asset('spotevent/public/storage/'.$prestataire->path_img)}}" alt="..." />
                                </div>
                                <br>
                                @if($galerie != [])
                                <div class="product_gallery">
                                    @foreach($galerie as $image)
                                    <a>
                                        <img width="50" height="90" src="{{asset('spotevent/public/storage/'.$image->path)}}" alt="..." />
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
                                <h3 style="" class="prod_title">{{ $prestataire->name }} / </h3>
                                <h4>{{ $prestataire->presentation }}.</h4>
                                <br>
                                <h4>{{ $prestataire->description }}.</h4>
                                <h4>Interval de facturation de la prestation : .XOF - .XOF </h4>
                                <h4>Telephone : {{ $prestataire->phone_service }} / {{ $prestataire->phone2_service }}
                                </h4>
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
                                pour le fais cliquez cliquer sur ce lien <br> <a href="/infos/compte/prestatire"> Compte
                                    prestataire</a> <br>
                                NB : Veiller contacter le services conseil et assistance au besoin</h4>
                        </div>
                        @endif






                    </div>
                </div>
            </div>


            <div>



            </div>
        </div>


        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Avis Utilisateur</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                                            <thead>
                                                <tr class="headings">
                                                    <th> Utilisateur </th>
                                                    <th> Contenus </th>
                                                    <th> Note </th>
                                                </tr>
                                            </thead>
                                            @if($commentaire)
                                            @foreach($commentaire as $item)
                                            <tr>
                                                <td>{{ $item->utilisateur }}</td>
                                                <td>{{ $item->contenus }}</td>
                                                <td>
                                                    @for($i = 0; $i < $item->vote; $i++)
                                                        &#11088;
                                                        @endfor
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif


                                            <tbody>


                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>

        </div>

        <!-- /page content -->





        @endsection