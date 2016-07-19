@if(Session::has('flash_message'))
<div
	class="alert-perso alert alert-success {{Session::has('flash_message_important') ? 'alert-important' : ''}}">
	<button type="button" class="close" data-dismiss="alert"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	{{ Session::get('flash_message') }}
</div>
@endif
