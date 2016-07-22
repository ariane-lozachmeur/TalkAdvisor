<div class="modal fade" tabindex="-1" id="login" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-perso">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				<!-- Body of the modal -->
				<div class="container-fluid">
					<form class="form-horizontal" role="form" method="POST"
						action="{{ url('/auth/login') }}">
						{{ csrf_field() }}

						<div
							class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email"
									value="{{ old('email') }}"> @if ($errors->has('email')) <span
									class="help-block"> <strong>{{ $errors->first('email') }}</strong>
								</span> @endif
							</div>
						</div>

						<div
							class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control"
									name="password"> @if ($errors->has('password')) <span
									class="help-block"> <strong>{{ $errors->first('password') }}</strong>
								</span> @endif
							</div>
						</div>
						<center>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label> <input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-social btn-perso">
									<span class="fa fa-btn fa-sign-in"></span> Login
								</button>

								<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot
									Your Password?</a>
							</div>
						</div></center>
					</form>
				</div>
				<!-- End of the body -->
			</div>
			<div class="modal-footer footer-perso">
				<div>You don't have an account ?</div>
				<button type="button" class="btn btn-perso-reverse" data-dismiss="modal"
					data-toggle="modal" data-target="#register">Register</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



