<div class="mt-4">
    <ul class="flex flex-col space-y-4">
        @foreach ($posts as $post)
            <li>
                <livewire:post :post="$post" />
            </li>
        @endforeach
    </ul>
</div>
