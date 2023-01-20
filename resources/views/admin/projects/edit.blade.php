@extends('layouts.app')

@section('content')
  <h1 class="text-center my-5">Edit the project details</h1>

  <div class="container">
    <form action="{{ route('admin.project.update', $project) }}" method="POST"
      enctype="multipart/form-data">
      @method('PUT')
      @csrf

      {{-- Project name --}}
      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Project Name</label>
        <input type="text" name="name" class="form-control" id="name"
          placeholder="The name of your project" value="{{ $project->name }}">
      </div>
      {{-- Project cover image --}}
      <div class="mb-3">
        <label for="cover_image" class="form-label fw-bold">Cover Image</label>
        <input onchange="showImage(event)" type="file" name="cover_image" class="form-control"
          id="cover_image">
      </div>
      @if ($project->cover_image)
        <div>
          <img src="{{ asset('storage/' . $project->cover_image) }}" alt="" width="150"
            id="uploaded_image">
        </div>
      @endif
      {{-- Project client name --}}
      <div class="mb-3">
        <label for="client_name" class="form-label fw-bold">Project Client Name</label>
        <input id="client_name" type="text" name="client_name" class="form-control"
          placeholder="The name of the client of this project" value="{{ $project->client_name }}">
      </div>
      {{-- Project summary --}}
      <div class="mb-3">
        <label for="summary" class="form-label fw-bold">Project Summary</label>
        <textarea name="summary" id="summary" cols="30" rows="10" class="form-control">{{ $project->summary }}</textarea>
      </div>


      <button class="btn btn-info" type="submit">Salva</button>
    </form>
  </div>
  <script>
    function showImage(event) {
      console.log(event)
      const thumb = document.getElementById('uploaded_image');
      thumb.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>
@endsection
