<!DOCTYPE html>
<html>
<head>
	<title>Expenses</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/fileinput.min.js')}}"></script><!--for image upload jquery input file with css-->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript" ></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}" type="text/javascript"></script>
	

	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/design.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
	
	<link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
      page. However, you can choose any other skin. Make sure you
      apply the skin class to the body tag so the changes take effect.
      -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-template.css') }}" rel="stylesheet">
</head>
<body>

	<!-- nav bar-->
	<div class="navbar navbar-default">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	     <a class="navbar-brand" href="#">Team Daily Expense Monitor</a>
	    </div>

	    <div class="collapse navbar-collapse">
	      <ul class="nav navbar-nav">
		    <li {{ (Request::is('home') ? 'class=active' : '') }}><a href="/home" >Home</a></li>
	        <li {{ (Request::is('teams') || Request::is('teams/create') ? 'class=active' : '') }}><a href="/teams" >Team</a></li>
	        <li {{ (Request::is('expenses') || Request::is('expenses/create') || Request::is('expenses/edit/{id}')  ? 'class=active' : '') }}><a href="/expenses" >Expenses</a></li>
			<li {{ (Request::is('http://www.cobold.in') ? 'class=active' : '') }}><a href="http://www.cobold.in" >Cobold Digital</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
			@auth
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<span class="caret"></span></a>
			@endauth
	          <ul class="dropdown-menu">
	            <li>
	              <a href="{{ url('/logout') }}"
	                  onclick="event.preventDefault();
	                           document.getElementById('logout-form').submit();">
	                  Logout
	              </a>

	              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	                  {{ csrf_field() }}
	              </form>
	            </li>
	          </ul>
	        </li>
	    </div><!--/.nav-collapse -->

	</div>



<div class="container">

	@yield('content')

</div>

<div class="footer" style="text-align:center;valign:bottom;">
Teams and their expenses By Laravel Framework.
</div>

<div class="overlay">
  <div class="popup">
		<div class="sk-folding-cube">
		  <div class="sk-cube1 sk-cube"></div>
		  <div class="sk-cube2 sk-cube"></div>
		  <div class="sk-cube4 sk-cube"></div>
		  <div class="sk-cube3 sk-cube"></div>
		</div>
	</div>
</div>



<script>

	$(document).ready(function(){

		//hide loading animation
		$('.overlay').hide();
		$('.sk-folding-cube').hide();

	 });

	// when called, will show loading animation
	function showLoad($msg)
	{$('#colour1'). click(function() { if($(this).is(':unchecked')) alert('Please check');  });
		/*if($msg != null)
			return confirm($msg);
		$('.overlay').show();
		$('.sk-folding-cube').show();*/
	}
	

</script>
<script>
    $(function() {
        $('.alert-success').fadeOut(5000);
        $('.alert-danger').fadeOut(5000);
    });
    </script>
@stack('scripts')

</body>
</html>
