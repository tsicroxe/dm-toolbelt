<div class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col bg-gray-900 text-white shadow-lg">
    <livewire:sidebar-icon icon="dashicons:admin-home" text="Home" url="/" />

    <livewire:sidebar-icon icon="arcticons:fiftheditioncharactersheet" text="Character Sheets" url="{{ route('characters') }}" />
    <livewire:sidebar-icon icon="codicon:references" text="Reference Docs" url="{{ route('references') }}" />

    <livewire:sidebar-icon icon="ic:outline-generating-tokens" text="Tokenizer Coming Soon!" url="{{ route('tokenizer') }}" />

    <ul class="m-5">
        <li>D</li>
        <li>M</li>
        <li>'</li>
        <li>S</li>
        <li><br></li>
        <li>T</li>
        <li>O</li>
        <li>O</li>
        <li>L</li>
        <li>B</li>
        <li>E</li>
        <li>L</li>
        <li>T</li>
    </ul>
</div>