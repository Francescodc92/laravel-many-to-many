@extends('layouts.app')

@section('page-title', 'Edit Project'.$project->id)

@section('main-content')
<div class="col-12 mb-4">
  <h1>Edit Project: {{ $project->title }}</h1>
</div>
<div class="row">
  <div class="col-12">
    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
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
          value="{{ old('title', $project->title) }}"  
          required
        >
        @error('title')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="preview" class="form-label">Preview img link</label>
        <input 
          type="text" 
          maxlength="2048" 
          class="form-control @error('preview') is-invalid @enderror" 
          id="preview" 
          name="preview"
          value="{{ old('preview', $project->preview) }}"
          placeholder="Enter value..."
        >
        @error('preview')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="row">
        <div class="mb-3 col-12 col-md-6">
            <label for="collaborators" class="form-label">
              Collaborators
            </label>
            <input 
              type="text" 
              maxlength="255" 
              class="form-control @error('collaborators') is-invalid @enderror" 
              id="collaborators" 
              name="collaborators" 
              value="{{ old('collaborators', $project->collaborators) }}"
              placeholder="Enter value..." 
              required
            >
            @error('collaborators')
              <div class="alert alert-danger my-2">
                  {{ $message }}
              </div>
            @enderror 
        </div>

        <div class="mb-3 col-12 col-md-6">
          <label for="technologies" class="form-label">
            Technologies
            <span class="text-danger">
              *
            </span>
          </label>
          <input 
            type="text" 
            class="form-control @error('technologies') is-invalid @enderror" 
            id="technologies" 
            name="technologies"
            value="{{ old('technologies', $project->technologies) }}"
            placeholder="Enter value..." 
            required
          >
          @error('technologies')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <select class="form-select" id="type_id" name="type_id">
        <option value="">Seleziona un tipo</option>
        @foreach ($types as $type)
          <option 
            value="{{ $type->id }}"
            {{ old('type_id', $project->type_id) ==  $type->id ? 'selected':'' }} 
          >
            {{ $type->title }}
          </option>
        @endforeach
      </select>


      <div class="mb-3">
        <label for="description" class="form-label">
          Description
          <span class="text-danger">
            *
          </span>
        </label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
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
