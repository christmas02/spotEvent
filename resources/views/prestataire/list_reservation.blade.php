@extends('prestataire/layout/master')

@section('content') 
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des demandes de reservations <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
       
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                            <th>  </th>
                            <th> Nom et prenom </th>
                            <th> Contact Tel</th>
                            <th> Email </th>
                            <th> Message </th>
                            <th>  </th>
                            
                           
                        </tr>
                      </thead>
                      @if($listDemande)
                         @foreach($listDemande as $items)
                         <tr>
                             <td></td>
                             <td><a href="#" data-toggle="modal" data-target="#exampleModalDemande{{$items->id}}" >{{ $items->name }}</a></td>
                             <td>{{ $items->phone }}</td>
                             <td>{{ $items->email }}</td>
                             <td>{{ $items->message }}</td>
                             {{--<td style="width: 400px;">
                             @if( $items->message == 0)
                             <a href="#"> <span style="font-size: 16px;" class="text-danger">Non lu</span> </a>
                             @else
                                 <span class="alert-info">lu</span>
                             @endif
                             </td>--}}
                             <td style="width: 200px;">{{ $items->created_at }}</td>
                             
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
</div>
<!-- /page content -->

<!-- Modal -->
@foreach($listDemande as $items)
<div class="modal fade" id="exampleModalDemande{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Contenus du message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <strong>Client </strong>
        <h6>{{ $items->name }} / {{ $items->phone }}</h6>
        <hr>
        <strong>Message</strong><h6>{{ $items->message }}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection