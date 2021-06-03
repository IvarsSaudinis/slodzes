@props(['title'])
<div class="flex p-4 space-x-4 bg-white rounded-lg md:space-x-6">
    <div class="flex flex-col justify-center align-middle"><p
            class="text-3xl font-semibold leading-none">{{ $title }}</p>
        <p class="capitalize">{{ $slot }}</p></div>
</div>
