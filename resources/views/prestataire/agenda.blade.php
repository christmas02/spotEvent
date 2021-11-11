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

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mon agenda <small></small></h2>
                        
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
                                @if($ficheExiste)
                                    @if($ficheExiste->agenda == 1)

                                    {{-- Mettre le gestionnaire d'agenda ici --}}

                                    @else
                                    <div class="alert alert-danger">
                                        <h4>Vous ne disposez pas de cette fonctionnalité. <br>
                                            NB : Veuillez contacter le service conseil et assistance en cas de besoin.</h4>
                                    </div>
                                    @endif
                                @else
                                <div class="alert alert-danger">
                                    <h4>Vous devez complèter les informations relatives à votre compte prestataire.<br>
                                        Pour le faire cliquez sur ce lien <a
                                            href="/infos/compte/prestatire/{{ $infoUser->id }}"> Compte prestataire</a> <br>
                                        NB : Veuillez contacter le service conseil et assistance en cas de besoin.</h4>
                                </div>
                                @endif

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
<div class="modal fade" id="modalMessagerie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="mesgs">
                    <div class="msg_history">
                    </div>
                    <div class="type_msg">
                        <form method="post" action="/save/message/prestataire">
                            @csrf
                            <div class="input_msg_write">
                                <input type="hidden" value="0" name="conversation">
                                <input type="hidden" value="" id="recepteur" name="id_recepteur">
                                <input type="hidden" value="{{ $infoUser->id }}" name="id_emmetteur">
                                <input type="text" name="contenus" class="write_msg" placeholder="Message ..."
                                    required />
                                <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection