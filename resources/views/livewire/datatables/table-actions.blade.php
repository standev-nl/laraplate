<div class="flex space-x-1 justify-around">

    @if(in_array('view', $actions))
        <a href="{{ route($callback.'.show', $id) }}"
           class="px-3 py-2 text-teal-600 hover:bg-teal-600 hover:text-white rounded-md transition duration-300 ease-in-out">
            <i class="far fa-eye"></i>
        </a>
    @endif
    @if(in_array('edit', $actions))
        <a href="{{ route($callback.'.edit', $id) }}"
           class="px-3 py-2 text-blue-600 hover:bg-blue-600 hover:text-white rounded-md transition duration-300 ease-in-out">
            <i class="far fa-pencil"></i>
        </a>
    @endif
    @if(in_array('delete', $actions))
        <button wire:click="$emit('triggerDelete',{{ $id }})"
                class="px-3 py-2 text-red-600 hover:bg-red-600 hover:text-white rounded-md transition duration-300 ease-in-out">
            <i class="far fa-trash"></i>
        </button>

        @push('styles')
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
        @endpush
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {

                @this.on('triggerDelete', id => {
                    Swal.fire({
                        title: 'Weet je het zeker?',
                        type: "warning",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: 'Ja, verwijder',
                        cancelButtonText: 'Nee, behouden!'
                    }).then((result) => {
                        if (result.value) {

                            Swal.fire({
                                title: 'Succesvol verwijderd!',
                                type: "error",
                                icon: "error",
                                showCancelButton: false,
                                confirmButtonText: 'Oke',
                            });

                        @this.call('delete', id)
                        } else {

                            Swal.fire({
                                title: 'Er is niks aangepast!',
                                type: "info",
                                icon: "info",
                                showCancelButton: false,
                                confirmButtonText: 'Oke',
                            });

                            console.log("Canceled");
                        }
                    });
                });
                })
            </script>
        @endpush

    @endif

</div>
