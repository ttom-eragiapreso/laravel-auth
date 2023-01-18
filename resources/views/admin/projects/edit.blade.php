@extends('layouts.app')

@section('content')
  <h1>Edit the project details</h1>

  <div class="container">
    <form action="{{ route('admin.project.update', $project) }}" method="POST">
      @method('PUT')
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Project Name</label>
        <input type="text" name="name" class="form-control" id="name"
          placeholder="The name of your project" value="{{ $project->name }}">
      </div>
      <div class="mb-3">
        <label for="client_name" class="form-label fw-bold">Project Client Name</label>
        <input id="client_name" type="text" name="client_name" class="form-control"
          placeholder="The name of the client of this project" value="{{ $project->client_name }}">
      </div>

      <div class="mb-3">
        <label for="summary" class="form-label fw-bold">Project Summary</label>
        <textarea name="summary" id="summary" cols="30" rows="10" class="form-control">{{ $project->summary }}</textarea>
      </div>


      <button class="btn btn-info">Salva</button>
    </form>
  </div>
@endsection
