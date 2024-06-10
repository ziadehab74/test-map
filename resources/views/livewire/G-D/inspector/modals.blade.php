@script
<script>
    $wire.on('_delete-it_', (data, params) => {
        Swal.fire({
            title: data.title,
            text: data.text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "{{__('Inspector._delete_box_confirm_btn_text_')}}",
            cancelButtonText: "{{__('Inspector._delete_box_cancel_btn_text_')}}"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.delete(data.id);
            }
        });
    });
    // -------------------------------------------------------------
    $wire.on('_restore-it_', (data, params) => {
        Swal.fire({
            title: data.title,
            text: data.text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "{{__('Inspector._restore_box_confirm_btn_text_')}}",
            cancelButtonText: "{{__('Inspector._restore_box_cancel_btn_text_')}}"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.restore(data.id);
            }
        });
    });
</script>
@endscript