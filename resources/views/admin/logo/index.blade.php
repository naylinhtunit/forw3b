@extends('admin.layouts.header')

@section('content')

@include('admin.layouts.left')
@include('admin.layouts.nav')

<!-- page content -->
<div class="right_col" role="main">
    
    <!--project details-->
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                
                @if (Auth::check()) <!--After login show-->
                
                    <!--Logo-->
                    <div class="panel panel-success">
                        <div class="panel-heading">Some Of Our Clients Logo Demo</div>
                        <div class="panel-body">
                
                            <div class="x_title">
                                
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="pull-right">
                                    <a href="{{ url('/panel/logo/create') }}" class="btn btn-success"> Add Logo </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            
                            <!-- start project list -->
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th>Image</th>
                                        <th>Project Name</th>
                                        <th>Price</th>
                                        <th>Start Date</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach ($logos as $logo)
                                    <tr>
                                        <td>{{$logo->id}}</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li>
                                                    <img src="{{ URL::to('/') }}/img/demo/logo/{{ $logo->image }}" class="avatar" alt="Avatar" />
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            {{$logo->name}}
                                        </td>
                                        <td>
                                            {{$logo->price}} MMK
                                        </td>
                                        <td>
                                            {{date('Y-m-d', strtotime($logo->created_at))}}
                                        </td>
                                        <td>
                                            <form action="{{ url('/panel/logo', $logo->id) }}" method="post">
                                                <a href="{{ url('panel/logo/edit', $logo->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" title="Trash">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                            <!-- end project list -->
                        </div>
                    </div>
                </div>
                
                @else <!--Before Login-->
                
                    <div class="container">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Login Form</div>
                                <div class="panel-body">
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                        
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                        
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                        
                                        <div class="form-group">
                                            <div class="container">
                                                    
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                        
                                                <div class="pull-right">
                                                    @if (Route::has('password.request'))
                                                        <a class="btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                        
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">Register Form</div>
                                <div class="panel-body">
                                    
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                        
                                        <div class="form-group">
                        
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Name') }}" autofocus>
                        
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                        
                                        </div>
                        
                                        <div class="form-group">
                        
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                        
                                        </div>
                        
                                        <div class="form-group">
                        
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                        
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                                
                                        </div>
                        
                                        <div class="form-group">
                                            
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                                
                                        </div>
                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                @endif
                
            </div>
        </div>
    </div>
    
    <!--project details end-->
</div>
<!-- /page content -->
@endsection