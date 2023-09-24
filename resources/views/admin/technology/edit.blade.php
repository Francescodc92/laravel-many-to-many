@extends('layouts.app')

@section('page-title', 'Edit Technology')

@section('main-content')
<div class="col-12 mb-4">
  <h1>Edit Technology: {{ $technology->title }}</h1>
</div>

<div class="row">
  <div class="col-12">
    <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">
          Title
          <span class="text-danger">
            *
          </span>
        </label>
        <input 
          type="text" 
          class="form-control @error('title') is-invalid @enderror"
          maxlength="100" 
          id="title" 
          name="title" 
          placeholder="Enter title..." 
          value="{{ old('title', $technology->title) }}"  
          required
        >
        @error('title')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">
          Description
          <span class="text-danger">
            *
          </span>
        </label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $technology->description) }}</textarea>
        @error('description')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>
      
      <button type="submit" class="btn btn-warning">
        Modifica
      </button>
    </form>
  </div>
</div>
@endsection
