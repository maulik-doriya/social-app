@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <a href="{{URL::to('connections')}}">My Connection</a>
                                    <div class="card-header">Search</div>

                                    <div class="card-body">
                                       <div class="form-group row">
                                            <label for="search" class="col-md-4 col-form-label text-md-right">{{ __('Search') }}</label>

                                            <div class="col-md-6">
                                                <input id="search" type="text" class="form-control" autocomplete="search" autofocus>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th>Name</th>
                                                    <th>Connection</th>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
         $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $('#search').on('keyup',function(){
            $value=$(this).val();
            console.log($value)
            $.ajax({
                type : 'POST',
                url : '{{URL::to('search')}}',
                data:{'search':$value, "_token": "{{ csrf_token() }}",},
                success:function(data){
                    $('tbody').html(data);

                }
            });
        })

    });

</script>
@endsection
