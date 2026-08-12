@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <p class="lead">Product created successfully!</p>
    </div>
  </div>
</div>
@endsection
