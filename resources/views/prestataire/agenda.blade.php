@extends('prestataire/layout/master')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small></small></h3>
            </div>

        </div>

        <div class="clearfix"></div>
        @if($ficheExiste)
        @if($ficheExiste->agenda == 0)

        {{-- Mettre le gestionnaire d'agenda ici --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mon agenda <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="color: #fff;" ><a href="#" data-toggle="modal"
                                            data-target="#modalAgendar" class="btn btn-info">Ajouter un evenement</a></li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Heure</th>
                          <th>Evenement</th>

                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Tiger</td>
                          <td>Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                        </tr>
        
                      </tbody>
                    </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        @else
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mon agenda <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger">
                                    <h4>Vous ne disposez pas de cette fonctionnalité. <br>
                                        NB : Veuillez contacter le service conseil et assistance en cas de besoin.</h4>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        @endif
        @else

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mon agenda <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger">
                                    <h4>Vous devez complèter les informations relatives à votre compte prestataire.<br>
                                        Pour le faire cliquez sur ce lien <a href="/infos/compte/prestatire/{{ $infoUser->id }}"> Compte prestataire</a> <br>
                                        NB : Veuillez contacter le service conseil et assistance en cas de besoin.</h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        @endif



    </div>
</div>
</div>
<!-- /page content -->








@endsection