@extends('layouts.template')

@section('content')

<section class="bannerlay">
    <div class="banner-layer">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="cards">
                
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-0 pb-1 mb-4 border-bottom">
                            <h1 style="color:white;">Publicação</h1>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                            </div>
                        </div>
                        
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nome:</strong>
                                        {{ $post->name }}
                                        <strong>Email:</strong>
                                        {{ $post->email }}
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">                
                                        <p>
                                            Criando em: {{ $post->created_at }} / Atualizado em: {{ $post->updated_at }}
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Post:</strong>
                                        {{ $post->posted }}
                                    </div>
                                </div>
                            </div>
                        </div>    

                        <div class="card">
                            <div class="card-body">
                                <div class="pull-left">
                                    <h2>Add New Comment</h2>
                                </div>
                                <br>
                                <div>
                                    <form action="{{ route('postcomments.store') }}" method="POST">
                                    @csrf
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <br>

                                                <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ \Auth::id() }}">
                                                <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $post->id }}">
                                            </div>
                                        
                                            <div>
                                                <input type="text" class="form-control" name="comentario" placeholder="Menssagem" autofocus>
                                            </div>
                                            <br>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>  
                                        </div>      
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                    @foreach ($postComments as $postComment)
                        <!-- edit -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="ModalEdit{{$postcomment->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar publicação</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('postcomments.update',$postcomment->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ \Auth::id() }}">

                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Publication:</label>
                                                <textarea class="form-control" id="message-text" name="comentario" placeholder="Menssagem">{{ $postcomentrio->comentario }}</textarea>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-dark">Salvar</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <!-- edit -->


                        <div class="jumbotron">
                            <label>
                                <strong>
                                    @if (auth()->user()->image)
                                        <img src="{{ asset(auth()->user()->image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                                    @endif
                                        {{ $postComment->name }} 
                                        - {{ $postComment->email }}</strong>
                                    <p>
                                        Criando em: {{ $postComment->created_at }} / Atualizado em: {{ $postComment->updated_at }}
                                    </p>
                            </label>
                            <hr class="my-3">

                            <p class="lead"><strong>Post:</strong> {{ $postComment->comentario }}</p>
                            
                            <hr class="my-3">
                            
                            <p class="lead">
                                
                                <form action="{{ route('postcomments.destroy',$postcomment->id) }}" method="POST">
                                
                                @if($post->user_id == \Auth::id())
                                    
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEdit{{$postcomment->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btnforums btn btn-danger"><i class="fa fa-trash"></i></button>
                                @endif         
                                </form>
                            </p>

                            
                        
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection