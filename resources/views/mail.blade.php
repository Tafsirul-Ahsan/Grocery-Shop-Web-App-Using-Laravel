<form action="{{url('mail')}}" method="post">
	@csrf
	<button class="btn-btn-info">Send mail</button>
</form>