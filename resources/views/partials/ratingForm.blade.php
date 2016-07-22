<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Rate
					{{$speaker->speaker_name}}</h4>
			</div>
			<div class="modal-body">
				<div id="stars">
					<div class="row" id="stars">
					{!! Form::open(); !!}
						@foreach ($options as $option)
							<div class="col-lg-6 star-container {{$option->id===5 ? 'col-lg-offset-3' : ''}}">
								<div class="in-line">
									<p>{{$option->name}}</p>
									<span class="glyphicon glyphicon-info-sign info2" data-container="body" data-toggle="tooltip" data-placement="right" title="{{$option->description}}"></span>
								</div>
								<input id="input{{$option->id}}" class="kv-ltr-theme-svg-star rating-loading " value="2">
								<!-- Only contains the grade but is never showed -->
								{!! Form::number( $option->id ,2,array('id'=> $option->id, 'class'=>'hidden', 'step'=>'any')); !!}
							</div>
						@endforeach
						<div class="btn btn-primary right-align", id="grades">Save grades</div>
					</div>
				</div>
	    <!-- Contains the second part of the notation. It is showed when the button "Save grades" in clicked -->
				<div class="row" id="text-fields" style="display:none">
					<div class="col-lg-10 col-lg-offset-1 form-group">
						<span>Comment and quote are optional, if you don't wish to leave a comment and/or a quote, juste click on submit.</span></br>
					{!! Form::label('comment', 'Your comment :') !!} 
					{!!Form::textarea('comment', null , array('class' => 'form-control',
						'placeholder'=>'一個好的評論，應該能夠讓人做為是否參加同一個講者未來的演講的參考。因此這個評論應該著重於同一個講者不同場演講的共通點。首要的評分關鍵是講者能夠選取適合觀眾、演講長度、公告的主題的題材的能力。更為重要的是講者在傳達時，是否有能力以清晰、有啟發性且吸引人的方式表達。如果你還是不太知道該如何撰寫你的評論，可以嘗試先以文字敘述你以上填寫評分的原因。'));
						!!}</div>
					<div class="col-lg-10 col-lg-offset-1 form-group">{!!
						Form::label('quote', 'A quote from the speech :') !!} {!!
						Form::text('quote', null , array('class' => 'form-control')); !!}
					</div>
					<div class="col-lg-10 col-lg-offset-1 form-group">
					<div class="btn btn-primary" id="show-grades">See grades</div>
						{!! Form::submit('Submit',array('class' => 'btn btn-primary btn
						col-lg-offset-10')); !!}
					</div>
					{!!Form::close(); !!}
				</div>
			</div>
			<div class="modal-footer"></div>