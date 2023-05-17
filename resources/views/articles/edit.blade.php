@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/articles/{{ $article->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" required="required" name="title" value="{{ $article->title }}"><br>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" required="required" name="content"
                    value="{{ $article->content }}"><br>
            </div>
            <div class="form-group">
                <label for="image">Feature Image</label>
                <input type="file" class="form-control" name="image"><br>
                @if ($article->featured_image)
                    <img width="150px" src="{{ asset('storage/' . $article->featured_image) }}" alt="Featured Image"><br>
                @else
                    <span>Tidak ada gambar tersedia</span><br>
                @endif
            </div>
            <button type="submit" class="btn btn-primary float-right">Ubah Data</button>
        </form>
    </div>
@endsection
