	@if($flash = session('message'))
				<div class="alert alert-warning" id="flash">
					{{$flash}}
				</div>
	@endif

	<script type="text/javascript">
		$(document).ready(function(){

			$('#flash').fadeOut(6000);

		});
	</script>