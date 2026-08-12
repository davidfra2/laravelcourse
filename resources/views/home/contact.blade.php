@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 mx-auto text-center">
      <p class="lead">Name: {{ $viewData["name"] }}</p>
      <p class="lead">Address: {{ $viewData["address"] }}</p>
      <p class="lead">Phone: {{ $viewData["phone"] }}</p>
    </div>
  </div>
</div>
@endsection
