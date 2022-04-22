<div class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col bg-gray-900 text-white shadow-lg">

    @auth
        <livewire:sidebar-icon icon="arcticons:fiftheditioncharactersheet" text="Character Sheet" url="{{ route('characters') }}"/>
    @else
    <livewire:sidebar-icon icon="arcticons:fiftheditioncharactersheet" text="Character Sheet" url="{{ route('login') }}"/>

    @endauth
    <livewire:sidebar-icon icon="ic:outline-generating-tokens" text="Tokenizer"  url="{{ route('tokenizer') }}"/> 
    <livewire:sidebar-icon icon="codicon:references" text="Reference Docs"  url="{{ route('references') }}"/> 

</div>
