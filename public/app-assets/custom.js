$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function isChecked() {
        var checkAll = $('#chkAll').attr('checked');
        var flag = false;
        $('input.checkboxes').each(function (index, element) {
            if (element.checked) {
                flag = true;
            }
        });
        if (checkAll || flag) {
            flag = true;
        }
        return flag;
    }

    function deleteAllItem(data) {
        jQuery.ajax({
            type: "post",
            url: url_delete_item,
            data: {
                data: data,
            },
            success: function (resp) {
                resp = jQuery.parseJSON(resp);

                if (resp.result) {
                    oTable.fnDraw();
                    notification("success", resp.message, "Thành công!")
                } else {
                    notification("error", resp.message, "Thất bại!")
                }
            },
        });
    }

    function notification(type = "success", text, title) {
        $('.confirm-text').on('click', function () {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa không ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        icon: type,
                        title: title,
                        text: text,
                        confirmButtonClass: 'btn btn-success',
                    })
                }
            })
        });
    }

    $("#btnDeleteAll").click(function () {
        var is_checked = isChecked();
        if (is_checked) {
            deleteAllItem($("#frmTbList").serialize());
        } else {
            notification("error", "", "Thất bại!");
        }
    });

    /* Select/Deselect all checkboxes in tables */
    $("thead input:checkbox").click(function () {
        var checkedStatus = $(this).prop("checked");
        var table = $(this).closest("table");

        $("tbody input:checkbox", table).each(function () {
            $(this).prop("checked", checkedStatus);
        });
    });
})