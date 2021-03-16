<script>
    $(function() {
        'use strict';

        var categoryForm = $('#category-form'),
            select = $('.select2');

        // Select2
        select.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this
                .select2({
                    placeholder: '[--- Vui lòng chọn ---]',
                    dropdownParent: $this.parent()
                })
                .change(function() {
                    $(this).valid();
                });
        });

        // Jquery Validation
        // --------------------------------------------------------------------
        if (categoryForm.length) {
            categoryForm.validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },
                    description: {
                        maxlength: 100
                    },
                    parent_id: {
                        required: true,
                    },
                    meta_keyword: {
                        maxlength: 60
                    },
                    meta_description: {
                        maxlength: 160
                    }
                },
                messages: {
                    name: {
                        required: "Tiêu đề danh mục không được bỏ trống.",
                        maxlength: "Tiêu đề danh mục không được vượt quá 50 ký tự.",
                    },
                    description: {
                        maxlength: "Mô tả danh mục không được vượt quá 100 ký tự.",
                    },
                    parent_id: {
                        required: "Danh mục cha không được bỏ trống.",
                    },
                    meta_keyword: {
                        maxlength: "Meta Keyword(SEO) không được vượt quá 60 ký tự.",
                    },
                    meta_description: {
                        maxlength: "Meta Description(SEO) không được vượt quá 160 ký tự.",
                    }
                }
            });
        }
    });

</script>