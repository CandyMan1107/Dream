<script src="/js/JHM-Custom/relation_info.js"></script>
<script>relation_info( <?=json_encode($data)?> )</script>

<div class="row">
	<div class="col-md-1" name="relation-view">
		@foreach ($data as $relation)
			<img id="{{$relation['id']}}" src="/img/background/relationImg/{{$relation['relHref']}}" alt="relation image" class="img-circle img-things-size relation_list" name="img_icon" />
		@endforeach
	</div>		
	<div class="col-md-11" name="relation-info">
		{{-- RELATION IMG --}}
	</div>	
</div>