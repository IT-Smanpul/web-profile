<div class="w-full rounded-lg border border-gray-200 bg-gray-50" wire:ignore x-data="setupEditor(
    $wire.entangle('{{ $attributes->wire('model')->value() }}')
)"
  x-init="() => init($refs.editor)" wire:ignore {{ $attributes->whereDoesntStartWith('wire:model') }}>
  <div class="border-b border-gray-200 px-3 py-2">
    <div class="flex flex-wrap items-center">
      <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse">
        <x-editor.button name="Bold" action="toggleBold">
          <span class="icon-[tabler--bold] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Italic" action="toggleItalic">
          <span class="icon-[tabler--italic] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Underline" action="toggleUnderline">
          <span class="icon-[tabler--underline] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Strikethrough" action="toggleStrike">
          <span class="icon-[tabler--strikethrough] size-5"></span>
        </x-editor.button>
        <div class="px-1">
          <span class="block h-4 w-px bg-gray-300"></span>
        </div>
        <x-editor.button name="Highlight" action="toggleHighlight">
          <span class="icon-[tabler--highlight] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Add Link" action="setLink">
          <span class="icon-[tabler--link] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Remove Link" action="unsetLink">
          <span class="icon-[tabler--unlink] size-5"></span>
        </x-editor.button>
        <div class="px-1">
          <span class="block h-4 w-px bg-gray-300"></span>
        </div>
        <x-editor.button name="Align Left" action="toggleAlign('left')">
          <span class="icon-[tabler--align-left] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Align Center" action="toggleAlign('center')">
          <span class="icon-[tabler--align-center] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Align Right" action="toggleAlign('right')">
          <span class="icon-[tabler--align-right] size-5"></span>
        </x-editor.button>
        <div class="px-1">
          <span class="block h-4 w-px bg-gray-300"></span>
        </div>
        <x-editor.button name="Bullet List" action="toggleBulletList">
          <span class="icon-[tabler--list] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Ordered List" action="toggleOrderedList">
          <span class="icon-[tabler--list-numbers] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Blockquote" action="toggleBlockquote">
          <span class="icon-[tabler--quote] size-5"></span>
        </x-editor.button>
        <x-editor.button name="Horizontal Rule" action="toggleHorizontalRule">
          <span class="icon-[tabler--flip-horizontal] size-5"></span>
        </x-editor.button>
      </div>
    </div>
  </div>
  <div class="rounded-b-lg bg-white px-4 py-2">
    <div class="block w-full border-0 bg-white px-0 text-sm text-gray-800 focus:ring-0" x-ref="editor">
    </div>
  </div>
</div>
