@props(['action', 'name'])

<div class="tooltip">
  <button class="tooltip-toggle btn btn-square btn-soft" type="button" aria-label="Tooltip" {{ $attributes }}
    @click="{{ $action }}">
    {{ $slot }}
  </button>
  <span class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible" role="tooltip">
    <span class="tooltip-body">Toggle {{ $name }}</span>
  </span>
</div>
