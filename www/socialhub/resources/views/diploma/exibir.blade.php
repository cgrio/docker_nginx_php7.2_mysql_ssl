@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="d-flex justify-content-center align-items-center">
            <p class="h1"><img  class="img-fluid" width="50" src="https://apprecs.org/ios/images/app-icons/256/ae/1074957486.jpg" alt="" /> Diploma Digital</p>

        </div>

        <div class="col-md-10">
            <div class="row">

<div class="col-4">

    @if($arquivos_diploma)
    <select size="13" class="form-control" size="20">
        @foreach($arquivos_diploma as $xml_diploma)
        <option value="{{$xml_diploma}}">{{$xml_diploma}}</option>
        @endforeach
    </select>
    @endif

</div>
<div class="col-8">
    Conteúdo xml
</div>
</div>

<div class="d-flex justify-content-center p-5">

    <a href="/diploma/assinar" class="btn btn-secondary">Assinar</a>
</div>
        </div>
    </div>
</div>
@endsection
