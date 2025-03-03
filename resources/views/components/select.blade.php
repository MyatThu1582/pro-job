<select {{ $attributes->merge(['name'=>'', 'class'=>'form-control mb-3']) }}>
    {{ $slot }}
</select>