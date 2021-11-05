@extends('admin/layout/master')

@section('content')
<style>
* {
    box-sizing: border-box
}

/* Container needed to position the overlay. Adjust the width as needed */
.container-image {
    position: relative;
}

/* Make the image to responsive */
.image {
    display: block;
    width: 100px;
    height: auto;
}

/* The overlay effect - lays on top of the container and over the image */
.overlay {
    position: absolute;
    bottom: 0;
    /*background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.5);
    Black see-through */
    color: #f1f1f1;
    width: 10%;
    transition: .5s ease;
    opacity: 0;
    color: white;
    padding: 2px;
    text-align: center;
}

/* When you mouse over the container, fade in the overlay title */
.container-image:hover .overlay {
    opacity: 1;
}


.trash i {
    font-size: 90px;
    border: 1px solid #dc3545;
    ;
    color: #dc3545;
    ;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto;
    text-align: center;
    padding-top: 10px;
}

.trash {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto;
    text-align: center;
    padding-top: 10px;
    margin-bottom: 30px;
}
</style>
<style>
.uploader {
    display: block;
    clear: both;
    margin: 0 auto;
    width: 100%;
    max-width: 600px;
}

.uploader label {
    float: left;
    clear: both;
    width: 100%;
    padding: 2rem 1.5rem;
    text-align: center;
    background: #fff;
    border-radius: 7px;
    border: 3px solid #eee;
    transition: all 0.2s ease;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.uploader label:hover {
    border-color: #454cad;
}

.uploader label.hover {
    border: 3px solid #454cad;
    box-shadow: inset 0 0 0 6px #eee;
}

.uploader label.hover #start i.fa {
    transform: scale(0.8);
    opacity: 0.3;
}

.uploader #start {
    float: left;
    clear: both;
    width: 100%;
}

.uploader #start.hidden {
    display: none;
}

.uploader #start i.fa {
    font-size: 50px;
    margin-bottom: 1rem;
    transition: all 0.2s ease-in-out;
}

.uploader #response {
    float: left;
    clear: both;
    width: 100%;
}

.uploader #response.hidden {
    display: none;
}

.uploader #response #messages {
    margin-bottom: 0.5rem;
}

.uploader #file-image {
    display: inline;
    margin: 0 auto 0.5rem auto;
    width: auto;
    height: auto;
    max-width: 180px;
}

.uploader #file-image.hidden {
    display: none;
}

.uploader #notimage {
    display: block;
    float: left;
    clear: both;
    width: 100%;
}

.uploader #notimage.hidden {
    display: none;
}

.uploader progress,
.uploader .progress {
    display: inline;
    clear: both;
    margin: 0 auto;
    width: 100%;
    max-width: 180px;
    height: 8px;
    border: 0;
    border-radius: 4px;
    background-color: #eee;
    overflow: hidden;
}

.uploader .progress[value]::-webkit-progress-bar {
    border-radius: 4px;
    background-color: #eee;
}

.uploader .progress[value]::-webkit-progress-value {
    background: linear-gradient(to right, #393f90 0%, #454cad 50%);
    border-radius: 4px;
}

.uploader .progress[value]::-moz-progress-bar {
    background: linear-gradient(to right, #393f90 0%, #454cad 50%);
    border-radius: 4px;
}

.uploader input[type=file] {
    display: none;
}

.uploader div {
    margin: 0 0 0.5rem 0;
    color: #5f6982;
}

.uploader .btn {
    display: inline-block;
    margin: 0.5rem 0.5rem 1rem 0.5rem;
    clear: both;
    font-family: inherit;
    font-weight: 700;
    font-size: 14px;
    text-decoration: none;
    text-transform: initial;
    border: none;
    border-radius: 0.2rem;
    outline: none;
    padding: 0 1rem;
    height: 36px;
    line-height: 36px;
    color: #fff;
    transition: all 0.2s ease-in-out;
    box-sizing: border-box;
    background: #454cad;
    border-color: #454cad;
    cursor: pointer;
}
</style>
<style>
    .img-pub-horizontal{
        width: 100%;
       
        background: chartreuse;
        margin-bottom: 40px;
    }
    .img-pub-vertical{
        width: 100%;
       
        background: chartreuse;
        border: 1px solid #000;
    }
    .img-pub-horizontal img{
        width: 100%;
      
        border: 1px solid grey;
    }
    .title-img{
        font-size: 30px;
        margin: 10px auto;
        color: chocolate;
    }
</style>
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
                            <div class="col-sm-8">
                                @if($listPublicite)
                                    @foreach($listPublicite as $item)
                                    <h4 class="title-img">{{ $item->page }}</h4>
                                    <div class="img-pub-horizontal">
                                            <div class="container-image">
                                                <img
                                                    src="{{asset('/storage/'.$item->path )}}"
                                                    alt="spotevent" />
                                                <div class="overlay">
                                                    <button href="" data-toggle="modal"
                                                        data-target="#exampleModalUpadeImageSeconds{{$item->id}}"
                                                        class="btn btn-sm btn-primary btn-rounded"><i
                                                            class="fa fa-pencil"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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


@foreach($listPublicite as $item)
<!-- Modal  Modification une image -->
<div class="modal fade" id="exampleModalUpadeImageSeconds{{$item->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/update/imagepub" enctype="multipart/form-data">
                    @csrf
                    <center>
                        <h4>Modification de l'image !</h4>
                    </center>


                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ajouter l'
                            images</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <input type="text"  name="id" value="{{$item->id}}">
                        </div>

                    </div>

            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Modifier</button>
            </div>
            </form>
        </div>

    </div>
</div>

@endforeach





@endsection