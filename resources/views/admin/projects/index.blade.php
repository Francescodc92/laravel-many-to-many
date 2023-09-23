@extends('layouts.app')

@section('page-title', 'all Projects')

@section('main-content')
  <div class="col-12 mb-4">
    <h1>All Projects</h1>
  </div>
    <div class="col-12 mb-4">
      <a href="{{ route('admin.projects.create') }}" class="btn btn-success w-100">
          + Aggiungi
      </a>
    </div>
    <div class="row">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Collaborators</th>
                <th scope="col">Technologies</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($projects as $project)
              
              <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->collaborators }}</td>
                <td>{{ $project->technologies }}</td>
                <td>
                  @if ($project->type)
                   <a href="{{ route('admin.types.show',['type'=> $project->type->id]) }}">{{ $project->type->title }}</a>
                      
                  @else
                    -   
                  @endif
                </td>
                <td>
                  <a href="{{ route('admin.projects.show',['project'=> $project->id]) }}" class="btn btn-primary mt-2">Vedi</a>
                  <a href="{{ route('admin.projects.edit', ['project'=>$project->id]) }}" class="btn btn-warning mt-2">
                    Modifica
                  </a>
                  <form 
                    action="{{ route('admin.projects.destroy', ['project'=>  $project->id]) }}"
                    method="POST"
                    class="d-inline-block mt-2"
                    onsubmit="return confirm('Sei sicuro di voler cancellare questo elemento?');"
                  >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2">
                        Elimina
                    </button>

                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
