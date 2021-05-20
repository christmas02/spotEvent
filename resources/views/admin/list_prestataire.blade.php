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
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped jambo_table bulk_action"style="width:100%">
                      <thead>
                        <tr class="headings">
                            <th> Nom et prenom </th>
                            <th> Nom de la structure </th>
                            <th> Localisations </th>
                            <th> Services clients </th>
                            <th> Statu </th>
                            
                            <th> A la une </th>
                            
                            
                            <th> Actions </th>
                        </tr>
                      </thead>


                      <tbody>
                      @if($listePrestation)
                            @foreach($listePrestation as $items)
                                <tr>
                                    <td> {{ $items->nom }} / {{ $items->numero }}</td>
                                    
                                    
                                    <td> {{ $items->name }}</td>
                                    <td> {{ $items->localisation }}</td>
                                    <td> {{ $items->phone_service }}</td>
                                    
                                   
                                    <td>
                                    @if($items->statu_fiche == 0 )
                                    <span class="text-warning"> En cours</span>
                                    @elseif($items->statu_fiche == 1 )
                                    <span class="text-succes"> Actif</span>
                                    @elseif($items->statu_fiche == 2 )
                                    <span class="text-danger"> Inactif</span>
                                    @endif
                                    </td>

                                    {{--<td>
                                    @if($items->messagerie == 0 )
                                    <span class="text-warning"> En cours </span>
                                    @elseif($items->statu_fiche == 1 )
                                    <span class="text-succes"> Actif</span>
                                    @elseif($items->statu_fiche == 2 )
                                    <span class="text-danger"> Inactif</span>
                                    @endif
                                    </td>--}}

                                    <td>
                                    @if($items->position == 0 )
                                    <span class="text-warning"> En cours</span>
                                    @elseif($items->statu_fiche == 1 )
                                    <span class="text-succes"> Actif</span>
                                    @elseif($items->statu_fiche == 2 )
                                    <span class="text-danger"> Inactif</span>
                                    @endif
                                    </td>
                                    
                                    <td>
                                        <div class="">
                                            <a href="/fiche/prestataires/{{ $items->id }}" class="btn btn-modal"><i class="fa fa-eye"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModalSetting{{$items->id}}" class="btn btn-modal"><i class="fa fa-cog"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModalMessagerie{{$items->id}}" class="btn btn-modal"><i class="fa fa-envelope"></i></a>
                                            {{--<a href="#" data-toggle="modal" data-target="#exampleModalDelet{{$items->id}}" class="btn btn-modal"><i class="fa fa-trash"></i></a>--}}
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

@foreach($listePrestation as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalSetting{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Parametre du prestataire <b>{{ $items->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4 class="text-center"></b></h4> 
      <div class="silde">
        <form>
        @if($items->statu_fiche == 0)
            <div class="form-check form-switch">
                <input class="flat" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Activation du compte</label>
            </div>
        @else
            <div class="form-check form-switch">
                <input class="flat" type="checkbox" checked id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Désctivation du compte</label>
            </div>
        @endif
        @if($items->position == 0)
            <div class="form-check form-switch"">
                <input class="flat" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Mettre a la une</label>
            </div>
        @else
            <div class="form-check form-switch">
                <input class="flat" type="checkbox" checked id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Retirer de la une</label>
            </div>
        @endif
        @if($items->messagerie == 0)
            <div class="form-check form-switch">
                <input class="flat" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Activation la messagerie</label>
            </div>
        @else
            <div class="form-check form-switch">
                <input class="flat" type="checkbox" checked id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Désctivation la messagerie</label>
            </div>
        @endif
        @if($items->favoris == 0)
            <div class="form-check form-switch">
                <input class="flat" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Activation l'option favorie</label>
            </div>
        @else
            <div class="form-check form-switch">
                <input class="flat" type="checkbox" checked id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Désctivation l'option favorie</label>
            </div>
        @endif
        </form>
      </div>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-success">Valider</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($listePrestation as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalMessagerie{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Messagerie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <label>Message</label>
        <textarea class="form-control"></textarea>
      
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-info">Envoyer</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach


@foreach($listePrestation as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalDelet{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Suppression du compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="text-center">Etre vous sur de vouloir supprimer le compte de {{ $items->name }}</h5>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
        <button type="button" class="btn btn-danger">Supprimer</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection