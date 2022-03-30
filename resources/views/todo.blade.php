@extends('layout.app')
@section('content')
<body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8  offset-md-2 mt-4">
                <input type="text" class=" col-md-11 offset-md-1 text-center form-control" id="task" placeholder="Enter the task name">
                <h3 class="text-center">Tasks</h3>
                <ul class="mt-4 col-md-11 offset-md-1" id="list" >

                </ul>
            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('js/todo.js')}}"></script>
</body>
</html>

@endsection
