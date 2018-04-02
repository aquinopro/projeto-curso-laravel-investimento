<label class="{{ $class ?? null }}">
	<span>{{ $label ?? $select ?? "ERRO" }}</span>
	{!! Form::select($select, $data ?? [], $value ?? null, $attributes) !!}
</label>