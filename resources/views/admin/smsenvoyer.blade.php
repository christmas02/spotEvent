@extends('admin/layout/master')
<?php 

function getUtilisateur($id){
    $data = App\User::where('id',$id)->first();
    return $data;
}

function getPrestataire($id){
    $data = App\Fiche::where('id_user',$id)->first();
    return $data;
}


?>
@section('content')
<style>
.btn-modal {
    background-color: #ccc;
    color: gray;
    border-radius: 50%;
}

.form-check-input {}

input:checked+.slider {
    background-color: #2196F3;
}

label {
    font-size: 18px;
    text-align: center;
}

.silde {
    margin: 0 190px;
}

.modal-title {

    color: #fff;

}

.modal-header {
    background-color: gray;
    text-align: right !important;
}

.modal-footer-btn {
    margin: 20px 38%;

}

.form-check-label {
    margin-left: 5px;
}
</style>
<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sms envoyer </h3>
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
                            
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="body l-seagreen text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                            </div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="1278"
                                            data-speed="2000" data-fresh-interval="700">{{ $stock_sms->volume }}</h3>
                                        <span class="text-white">Volume actuelle d'sms</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                            </div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521"
                                            data-speed="2000" data-fresh-interval="700">{{ count($listsms) }}</h3>
                                        <span class="text-white">Volume d'sms utiliser</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="body l-blue text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                            </div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="978"
                                            data-speed="2000" data-fresh-interval="700">{{ $stock_sms->volume - count($listsms) }}</h3>
                                        <span class="text-white">Volume d'sms restant</span>
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
                        <h2>Liste des sms envoyés <small></small></h2>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped jambo_table bulk_action"
                                            style="width:100%">
                                            <thead>
                                                <tr class="headings">
                                                    <th> En tete </th>
                                                    <th> Prestataire </th>
                                                    <th> Utilisateur </th>
                                                    <th> Numero prestataire </th>
                                                    <th> Statut </th>
                                                    <th> Message </th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @if($listsms)
                                                @foreach($listsms as $item)
                                                <tr>
                                                    <td>{{ $item->emetteur }}</td>
                                                    <td>{{ getPrestataire($item->id_prestataire)->name }}</td>
                                                    <td>{{ getUtilisateur($item->id_utilisateur)->name }}</td>
                                                    <td>{{ $item->numero_recepteur }}</td>
                                                    <td>{{ $item->statu }}</td>
                                                    <td>{{ $item->message }}</td>
                                                </tr>

                                                

                                                @endforeach
                                                @endif
                                               
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
    </div>
</div>



<!-- /page content -->

<!-- Modal demande formulaire -->




@endsection