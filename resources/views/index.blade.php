@extends('layouts.master')
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://placehold.jp/1600x500.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://placehold.jp/1600x500.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://placehold.jp/1600x500.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container section">
    <h1 class="h2 text-center">Title</h1>
    <div class="row">
        <div class="col-sm col-md-6 col-lg-3 mb-4"> <!--Sirve para mejorar que tan responsiva es la página-->
          <div class="card">
            <img src="https://placehold.jp/300x200.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 mb-4"> <!--Sirve para mejorar que tan responsiva es la página-->
          <div class="card">
            <img src="https://placehold.jp/300x200.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 mb-4"> <!--Sirve para mejorar que tan responsiva es la página-->
          <div class="card">
            <img src="https://placehold.jp/300x200.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm col-md-6 col-lg-3 mb-4"> <!--Sirve para mejorar que tan responsiva es la página-->
          <div class="card">
            <img src="https://placehold.jp/300x200.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="container section">

</div>
@endsection