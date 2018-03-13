@extends('layouts.app')

@section('content')
<div class="container">
    @if($isFirstMonth)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quiz') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('quiz.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('¿Que le gustaria agregar al informe') }}</label>
                            <div class="col-md-6">
                                  <textarea class="form-control" rows="5" id="question1" name="question1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Información Correcta') }}</label>
                            <div class="col-md-6">
                                <label class="radio-inline"><input type="radio" name="question2" value="1">Si</label>
                                <label class="radio-inline"><input type="radio" name="question2" value="2">No</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('De la escala del 1 al 5 es rapido') }}</label>
                            <div class="col-md-6">
                               <label class="radio-inline"><input type="radio" name="question3" value="1">1</label>
                                <label class="radio-inline"><input type="radio" name="question3" value="2">2</label>
                                <label class="radio-inline"><input type="radio" name="question3" value="3"> 3</label>
                                <label class="radio-inline"><input type="radio" name="question3" value="4"> 4</label>
                                <label class="radio-inline"><input type="radio" name="question3" value="5"> 5</label>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endsection
