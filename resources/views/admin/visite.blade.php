@extends('admin/layout/master')


<?php  

function getUser($id){

    $user = App\User::where('id',$id)->first();
    return $user;

}

function getPestataire($id){
    $prestataire = App\Fiche::where('id_user',$id)->first();
    return $prestataire;
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
                <h3></h3>
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
                        <h2>Historique des visites<small></small></h2>
                       
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
                                                    <th> </th>
                                                    <th> Utilisateur </th>
                                                    <th> Prestataire </th>
                                                    <th> Date de visite </th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @if($allvisite)
                                                @foreach($allvisite as $item)
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        @if($item->id_user != 0)
                                                        {{ getUser($item->id_user)->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                       
                                                        @if($item->id_prestataire != 0 and getPestataire($item->id_prestataire) != null)
                                                        {{ getPestataire($item->id_prestataire)->name }} / {{ $item->name_prestataire }} 
                                                        @endif</td>
                                                    <td>{{ $item->created_at }}</td>
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