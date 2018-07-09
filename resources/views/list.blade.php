@extends('layouts.app')

@section('content')
<div class="container">
    {{ $users->links() }}
    <div class="row justify-content-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)          
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td><td>{{$user->email}}</td></tr>
                @endforeach
            </tbody>    
        </table>        
    </div>
    {{ $users->links() }}
    
<table class="table table-responsive table-hover">
  <thead>
        <tr><th>Column</th><th>Column</th><th>Column</th><th>Column</th></tr>
    </thead>
    <tbody>
        <tr class="clickable" data-toggle="collapse" id="row1" data-target=".row1">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row1">
            <td>- child row</td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row1">
            <td>- child row</td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
    </tbody>
</table>
<style>
.collapsing {
  -webkit-transition: height .01s ease;
  transition: height .01s ease
}
</style></div>
</div>
@endsection
