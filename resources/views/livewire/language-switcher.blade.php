<div>
    <a href="#" onclick="openDropdown(event,'{{ $this->id }}')">
        <div>
            <span class="">
                {{ $currentLanguage }}
            </span>
        </div>
    </a>
    <div class="hidden" id="{{ $this->id }}">
        @foreach($languages as $language)
            <a wire:click="changeLocale('{{ $language['short_code'] }}')" href="#" class="">
                {{ $language['title'] }}
            </a>
        @endforeach
    </div>
</div>
