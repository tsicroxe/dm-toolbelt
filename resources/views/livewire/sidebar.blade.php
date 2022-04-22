<div class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col bg-gray-900 text-white shadow-lg">

    @auth
        <a target="_blank"><livewire:sidebar-icon icon="arcticons:fiftheditioncharactersheet" text="Character Sheet"/></a>
    @else
    <a target="_blank"><livewire:sidebar-icon icon="arcticons:fiftheditioncharactersheet" text="Character Sheet"/></a>
    @endauth
    <livewire:sidebar-icon icon="ic:outline-generating-tokens" text="Tokenizer"/> 
    <livewire:sidebar-icon icon="codicon:references" text="Reference Docs"/> 

</div>
