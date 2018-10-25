@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1 class="text-center text-muted">
                {{ __("Posts del foro :name", ['name' => $forum->name]) }}
            </h1>

            <a href="/" class="btn btn-info pull-right">
                {{ __("Volver al listado de los foros") }}
            </a>

            <div class="clearfix"></div>

            <br/>

            @forelse($posts as $post)

                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-post">
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        <span class="pull-right">
                            {{ __("Owner") }}: {{ $post->owner->name }} {{-- Propietario del post --}}
                        </span>
                    </div>

                    <div class="panel-body">
                        {{ $post->description }}

                        <hr />

                      {{--   <b>{{ $post->showCategories($post->categories, __("Categorías")) }}<br /></b>

                        @if($post->attachment)
                            <img src="{{ $post->pathAttachment() }}" class="img-responsive img-rounded"/>
                        @endif
                    </div>

                    @if($post->isOwner())
                        <div class="panel-footer">
                            <form method="POST" action="/posts/{{ $post->slug }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" name="deletePost" class="btn btn-danger">
                                    {{ __("Eliminar post") }}
                                </button>
                            </form>
                        </div>
                    @endif--}} 

                </div>

            @empty
                <div class="alert alert-danger">
                    {{ __("No hay ningún post en este momento") }}
                </div>
            @endforelse

            @if($posts->count())
                {{ $posts->links() }}
            @endif

            {{--  
            @Logged()
            <h3 class="text-muted">{{ __("Añadir un nuevo post al foro :name", ['name' => $forum->name]) }}</h3>
            @include('partials.errors')

            <form method="POST" action="/posts" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="forum_id" value="{{ $forum->id }}"/>

                <div class="form-group">
                    <label for="title" class="col-md-12 control-label">{{ __("Título") }}</label>
                    <input id="title" class="form-control" name="title" value="{{ old('title') }}"/>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-12 control-label">{{ __("Descripción") }}</label>
                    <textarea id="description" class="form-control"
                              name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="categories">{{ __("Categorías") }}</label>
                    <select multiple class="form-control" id="categories" name="categories[]" size="11">
                        <option value="">{{ __("Selecciona categorías") }}</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <label class="btn btn-warning" for="file">
                    <input id="file" name="file" type="file" style="display:none;">
                    {{ __("Subir archivo") }}
                </label>

                <button type="submit" name="addPost" class="btn btn-default">{{ __("Añadir post") }}</button>
            </form>
            @else
                @include('partials.login_link', ['message' => __("Inicia sesión para crear un post")])
                @endLogged()--}}
        </div>
    </div>
@endsection