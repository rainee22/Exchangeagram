@props(['message' => ''])

<div x-data="notification" x-init="show" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:items-start sm:p-6"
    aria-live="assertive">
    <div class="flex flex-col items-center w-full space-y-4 sm:items-end">
        <div
            class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg pointer-events-auto ring-1 ring-black ring-opacity-5"
            style="display: none;"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="p-4">
                <div class="flex items-center">
                    <div class="flex justify-between flex-1 w-0">
                        <p class="flex-1 w-0 text-sm font-medium text-gray-900">
                            {{ $message }}
                        </p>
                    </div>

                    <div class="flex flex-shrink-0 ml-4">
                        <button
                            class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            type="button"
                            @click="hide">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let notification = () => {
    return {
        show: false,

        show() {
            this.show = true;

            setTimeout(() => {
                this.hide();
            }, 3000);
        },

        hide() {
            this.show = false;
        }
    }
}
</script>