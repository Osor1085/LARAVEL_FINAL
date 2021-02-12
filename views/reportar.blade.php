@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="POST" action="">
                        {{ csrf_field()}}

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('CATEGORIA') }}</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-control">
                                    <option value="">General</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="severity" class="col-md-4 col-form-label text-md-right">{{ __('SEVERIDAD') }}</label>
                            <div class="col-md-6">
                                <select name="severity" class="form-control">
                                    <option value="M">MENOR</option>
                                    <option value="N">NORMAL</option>
                                    <option value="A">ALTA</option>
                                </select> 
                            
                            </div> 
                        </div>

                        <div class="form-group row">
                                <label for="title"class="col-md-4 col-form-label text-md-right">{{ __('TITULO') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description"class="col-md-4 col-form-label text-md-right">{{ __('DESCRIPTION') }}</label>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control">{{old('description')}}</textarea>
                                </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-primary">Registrar incidente</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
