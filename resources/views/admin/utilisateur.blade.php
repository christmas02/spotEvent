@extends('admin/layout/master')



@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tableau de bord</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des utilisateurs <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="color: #fff;" ><a href="/utilisateurs/{{ $infoUser->id }}" class="btn btn-info">Utilisateurs</a></li>
                            <li ><a href="/listPrestatiaire/{{ $infoUser->id }}" class="btn btn-danger">Prestataires</a></li>
                        </ul>
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
                                                    <th> Nom et prénoms </th>
                                                    <th> Adresse e-mail </th>
                                                    <th> Téléphone </th>
                                                    <th> Rôle </th>
                                                    <th> Profil </th>
                                                    <th> Date d'inscriptio </th>
                                                    
                                                </tr>
                                            </thead>
                                            @if($Utilisateur)
                                            @foreach($Utilisateur as $itmes)
                                            <tr>
                                                <td>{{ $itmes->name }}</td>
                                                <td>{{ $itmes->email }}</td>
                                                <td>{{ $itmes->phone }}</td>
                                                <td>
                                                    @if($itmes->role == 2 )
                                                    <span class="alert-succes"> Prestataire</span> 
                                                    @elseif($itmes->role == 1)
                                                    Utilisateur
                                                    @elseif($itmes->role == 3)
                                                    Administrateur
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($itmes->confirmation_token == NULL )
                                                    Profil activé
                                                    @else
                                                    Profil non activé
                                                    @endif
                                                </td>
                                                <td>{{ $itmes->created_at }}</td>
                                                
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
    </div>
</div>
<!-- /page content -->
@endsection