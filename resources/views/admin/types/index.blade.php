@extends('layouts.app')

@section('page-title', 'all Types')

@section('main-content')
    <div class="col-12 mb-4">
      <h1>all Types</h1>
    </div>
    <div class="col-12 mb-4">
      <a href="{{ route('admin.types.create') }}" class="btn btn-success w-100">
          + Aggiungi
      </a>
    </div>
    <div class="row">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($types as $type)
              
              <tr>
                <th scope="row">{{ $type->id }}</th>
                <td>{{ $type->title }}</td>
                <td>{{ $type->description }}</td>
                <td>
                  <a href="{{ route('admin.types.show',['type'=> $type->id]) }}" class="btn btn-primary mt-2">vedi</a>
                  <a href="{{ route('admin.types.edit', ['type'=>$type->id]) }}" class="btn btn-warning mt-2">
                    Modifica
                  </a>
                  <form 
                    action="{{ route('admin.types.destroy', ['type'=>  $type->id]) }}"
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
