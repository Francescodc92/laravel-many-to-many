@extends('layouts.app')

@section('page-title', 'Single type')

@section('main-content')
<div class="col-12 mb-4">
  <h1>Single type: {{ $type->title }}</h1>
</div>
<div class="card  mb-3">
  <div class="row g-0">
      <div class="col-md-8">
          <div class="card-body ">
              <h5 class="card-title">{{ $type->title }}</h5>
              <p>
                  <span class="fw-bold">
                    descrizione:
                  </span> 
                  {{ $type->description }}
              </p>
              <div class="actions-container">
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
              </div>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col bg-light">
    <h2>
      Progetti collegati al tipo: 
      <span class="fw-bold">{{ $type->title }}</span> 
    </h2>
    <ul>
      @foreach ($type->projects as $project)
          <li>
            <a href="{{ route('admin.projects.show',['project'=> $project->id]) }}" class="mt-2">
              {{ $project->title }}
            </a>
          </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
