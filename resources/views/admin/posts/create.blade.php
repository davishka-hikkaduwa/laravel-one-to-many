@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                There were some errors...
            </div>
        </div>
    @endif



    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div @error('title') class="is-invalid"@enderror>
            <label for="title">Title: </label>
            <input type="text" required minlength="10" maxlength="50" name="title" value="{{ old('title', '') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category_id">Categories: </label>
            <select name="category_id">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', -1) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div @error('content') class="is-invalid"@enderror>
            <label for="content">Content: </label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
@endsection
