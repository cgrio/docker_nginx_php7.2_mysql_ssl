@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="/diploma/salvar" method="post" enctype="multipart/form-data">
                @csrf

                <input type="file" name="xml_diploma">

            <button type="submit" class="btn btn-primary">Enviar</button>
            </form>


            <div class="col-3"><img  class="img-fluid" src="https://apprecs.org/ios/images/app-icons/256/ae/1074957486.jpg" alt="" /></div>

  <a href="/diploma/assinar" class="btn btn-secondary">Assinar</a>
        </div>
    </div>
</div>
@endsection
