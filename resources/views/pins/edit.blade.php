@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pin
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pin, ['route' => ['pins.update', $pin->id], 'method' => 'patch']) !!}

                        @include('pins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection