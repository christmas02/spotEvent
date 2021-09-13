@extends('admin/layout/master')

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

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des prestataires <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">



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
                                <div class="card-box table-responsive">

                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped jambo_table bulk_action"
                                            style="width:100%">
                                            <thead>
                                                <tr class="headings">
                                                    <th> Page </th>
                                                    <th> Titre du contenu </th>
                                                    <th> Contenus </th>

                                                    <th> Actions </th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @if($listContenu)
                                                @foreach($listContenu as $items)
                                                <tr>
                                                    <td> {{ $items->page }} </td>
                                                    <td> {{ $items->titre_contenus }}</td>
                                                    <td> {{ $items->contenus }}</td>

                                                    <td>
                                                        <div class="">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#exampleModalSetting{{$items->id}}"
                                                                class="btn btn-modal"><i class="fa fa-pencil"></i></a>

                                                        </div>
                                                    </td>
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
</div>
<!-- /page content -->

@foreach($listContenu as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalSetting{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center"></b></h4>
                <center>
                    <h3>Modification <b>{{ $items->titre_contenus }}</b></h3>
                </center>
                <hr>
                <div class="silde">

                    <form method="POST" action="/update/contenus">
                        @csrf

                        <input type="text" hidden name="id" value="{{$items->id}}">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                Page <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" name="titre_contenus" class="form-control" value="{{$items->page}}" disabled>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                Contenus <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea rows="10" name="contenus" class="form-control">
                                {{$items->contenus}}
                                </textarea>
                            </div>
                        </div>



                </div>
            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success">Sauver</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach






@endsection