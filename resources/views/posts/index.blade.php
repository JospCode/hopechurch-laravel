@extends('layouts.template')

@section('content')

<section class="bannerlay">
    <div class="banner-layer">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="cards">

                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-0 pb-1 mb-4 border-bottom">
                            <h1 style="color:white;">Fórum</h1>
                            <div class="pull-right">                       
                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#ModalCreate">
                                    <i style="color:white;" class="fa fa-plus-circle" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <!-- create -->
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
                        <div class="modal fade bd-example-modal-lg" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Adicionar nova publicação</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('posts.store') }}" method="POST">
                                        @csrf

                                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ \Auth::id() }}">

                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Publication:</label>
                                                <textarea class="form-control" id="message-text" name="posted" placeholder="Menssagem"></textarea>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-dark">Publicar</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <!-- create -->

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

                        @foreach ($posts as $post)

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="ModalEdit{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar publicação</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('posts.update',$post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ \Auth::id() }}">

                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Publication:</label>
                                                <textarea class="form-control" id="message-text" name="posted" placeholder="Menssagem">{{ $post->posted }}</textarea>
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
                                    
                                    <img src="{{ $post->profile_image }}" style="width: 50px; height: 50px; border-radius: 50%;">
                                    {{ $post->name }} 
                                    - {{ $post->email }}
                                </strong>
                                    <p>
                                        Criando em: {{ $post->created_at }} / Atualizado em: {{ $post->updated_at }}
                                    </p>
                            </label>
                            <hr class="my-3">

                            <p class="lead"><strong>Post:</strong> {{ $post->posted }}</p>
                            
                            <hr class="my-3">
                            
                            <p class="lead">
                                
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    
                                    <a class="btnforums btn btn-primary" href="{{ route('posts.show',$post->id) }}"><i class="fa fa-comment"></i></a>
                                
                                @if($post->user_id == \Auth::id())
                                    
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEdit{{$post->id}}">
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