@extends('layouts.app')

@section('page-title', 'all Technologies')

@section('main-content')
    <div class="col-12 mb-4">
      <h1>All Technologies</h1>
    </div>
    <div class="col-12 mb-4">
      <a href="{{ route('admin.technologies.create') }}" class="btn btn-success w-100">
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
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($technologies as $technology)
              
              <tr>
                <th scope="row">{{ $technology->id }}</th>
                <td>{{ $technology->title }}</td>
                <td>{{ $technology->description }}</td>
                <td>
                  <a href="{{ route('admin.technologies.show',['technology'=> $technology->id]) }}" class="btn btn-primary mt-2">Vedi</a>
                  <a href="{{ route('admin.technologies.edit', ['technology'=>$technology->id]) }}" class="btn btn-warning mt-2">
                    Modifica
                  </a>
                  <form 
                    action="{{ route('admin.technologies.destroy', ['technology'=>  $technology->id]) }}"
                    method="POST"
                    class="d-inline-block mt-2"
                    onsubmit="return confirm('Sei sicuro di voler cancellare questo elemento?');"
                  >
                    @csrf
                    @method('DELETE')
                    <button tecnology="submit" class="btn btn-danger mt-2">
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
