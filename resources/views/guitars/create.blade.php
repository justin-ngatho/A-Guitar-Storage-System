@extends ('layout')

@section ('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

   <form  class="form  bg-white p-6 border-1" method= "POST" action="{{route('guitars.store')}}">
@csrf
   <div>
    <label for="guitar-name" class="text-sm">Guitar Name</label>
    <input type="text" class="text-lg border-1" id="guitar-name" name="guitar-name" value = "{{old ('guitar-name') }}">
    @error ('guitar-name')
    <div class="form-error">
      {{ $message }}
    </div>
    @enderror

   </div>

   <div>
    <label for="brand" class="text-sm">Brand</label>
    <input type="text" class="text-lg border-1" id="brand" name="brand" value = "{{old ('brand') }}">
    @error ('brand')
    <div class="form-error">
      {{ $message }}
    </div>
    @enderror
   </div>

   <div>
    <label for="year" class="text-sm">Year Made</label>
    <input type="text" class="text-lg border-1" id="year" name="year" value = "{{old ('year') }}">
    @error ('year')
    <div class="form-error">
      {{ $message }}
    </div>
    @enderror
   </div>

   <div>
    <button class="border-1"type="submit">Submit</button>
   </div>
   </form>  

   
</div>

@endsection