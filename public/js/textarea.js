tinymce.init({
    selector: 'textarea.default-editor',

    plugins: [
        'advlist', 'lists', 'charmap', 'preview',
        'searchreplace', 'visualblocks', 'code', 'fullscreen', 'autosave',
        'insertdatetime', 'help', 'wordcount'

    ],

    setup: function (editor) {
        editor.on('change', function (e) {
            editor.save();
        });
    }
});