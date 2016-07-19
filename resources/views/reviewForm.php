	<div id="stars">
		<div class="row">
			<div class="col-lg-6 star-container">
				<p>Content</p>
				<input id="input-content" name="input-content"
					class="kv-ltr-theme-svg-star rating-loading" value="2">
			</div>
			<div class="col-lg-6 star-container">
				<p>Easy to understand</p>
				<input id="input-underst" name="input-underst"
					class="kv-ltr-theme-svg-star rating-loading" value="2">
			</div>
			<div class="col-lg-6 star-container">
				<p>Captivating</p>
				<input id="input-captiv" name="input-captiv"
					class="kv-ltr-theme-svg-star rating-loading" value="2">
			</div>
			<div class="col-lg-6 star-container">
				<p>Inspiring</p>
				<input id="input-insp" name="input-insp"
					class="kv-ltr-theme-svg-star rating-loading" value="2">
			</div>
			<div class="col-lg-6 col-lg-offset-3 star-container">
				<p>Overall</p>
				<input id="input-overall" name="input-overall"
					class="kv-ltr-theme-svg-star rating-loading" value="2">
			</div>
		</div>
		<button class="btn btn-primary right-align" id="grades">Save grades</button>
	</div>
	<div class="row" id="text-fields" style="display: none">
		{!! Form::open(); !!}
		<!-- This div contains the grades given with the stars. They are updated with a script -->
		<div style="display: none">{!!
			Form::number('1',2,array('id'=>'grade-content')); !!} {!!
			Form::number('2',2,array('id'=>'grade-underst')); !!} {!!
			Form::number('3',2,array('id'=>'grade-captiv')); !!} {!!
			Form::number('4',2,array('id'=>'grade-insp')); !!} {!!
			Form::number('5',2,array('id'=>'grade-overall')); !!} {!!
			Form::text('id', $speaker->id ,array('id'=>'id')); !!}</div>
		<div class="col-lg-10 col-lg-offset-1 form-group">{!!
			Form::label('body', 'Your comment :') !!} {!! Form::textarea('body',
			null , array('class' => 'form-control',
			'placeholder'=>'一個好的評論，應該能夠讓人做為是否參加同一個講者未來的演講的參考。因此這個評論應該著重於同一個講者不同場演講的共通點。首要的評分關鍵是講者能夠選取適合觀眾、演講長度、公告的主題的題材的能力。更為重要的是講者在傳達時，是否有能力以清晰、有啟發性且吸引人的方式表達。如果你還是不太知道該如何撰寫你的評論，可以嘗試先以文字敘述你以上填寫評分的原因。'));
			!!}</div>
		<div class="col-lg-10 col-lg-offset-1 form-group">{!!
			Form::label('quote', 'A quote from the speech :') !!} {!!
			Form::text('quote', null , array('class' => 'form-control')); !!}</div>
		<div class="col-lg-10 col-lg-offset-1 form-group">
			<button class="btn btn-primary" id="show-grades">See grades</button>
			{!! Form::submit('Submit',array('class' => 'btn btn-primary btn
			col-lg-offset-10')); !!}
		</div>
		{!!Form::close(); !!}
	</div>