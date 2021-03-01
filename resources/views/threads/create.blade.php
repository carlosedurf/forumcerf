@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">

            <h2>Criar Tópico</h2>
            <hr>

            <div class="col-12">
                <form action="{{ route('threads.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="channel_id">Escolha um Canal para o tópico</label>
                        <select name="channel_id" id="channel_id" class="form-control @error('channel_id') is-invalid @enderror">
                            <option>Selecione um canal</option>
                            @foreach($channels as $channel)
                                <option value="{{ $channel->id }}" @if(old('channel_id') == $channel->id) SELECTED @endif>{{ $channel->name }}</option>
                            @endforeach
                        </select>

                        @error('channel_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Título Tópico</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Conteúdo Tópico</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>

                        @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-success" type="submit">Criar Tópico</button>

                </form>
            </div>

        </div>
    </div>

@endsection
