'use strict';
$(document).ready(function () {

    if($('#editor-demo1').length) {
        CKEDITOR.replace('editor-demo1');
    }

    if($('#editor-demo2').length) {
        CKEDITOR.replace('editor-demo2', {
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [{
                "name": "basicstyles",
                "groups": ["basicstyles"]
            },
                {
                    "name": "links",
                    "groups": ["links"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list", "blocks"]
                },
                {
                    "name": "insert",
                    "groups": ["insert"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
    }

    if($('#editor-demo3').length) {
        CKEDITOR.replace('editor-demo3', {
            uiColor: '#CCEAEE'
        });
    }

    if($('#email-compose-editor').length) {
        CKEDITOR.replace('email-compose-editor', {
            toolbarGroups: [{
                "name": "basicstyles",
                "groups": ["basicstyles"]
            },
                {
                    "name": "links",
                    "groups": ["links"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list", "blocks"]
                },
                {
                    "name": "insert",
                    "groups": ["insert"]
                }
            ],
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
    }

});

if($('#editor-demo4').length) {
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline('editor-demo4');
}

if($('#editor-demo5').length) {
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline('editor-demo5');
}

if($('#editor-demo6').length) {
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline('editor-demo6');
}

$(document).ready(function () {
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
            // this.url = {{route('ckeditor.upload')}};
        }

        upload() {
            return this.loader.file.then(
                (file) =>
                    new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    })
            );
        }

        abort() {
            if (this.xhr) {
                this.xhr.abort();
            }
        }

        _initRequest() {
            const xhr = new XMLHttpRequest();

            xhr.open("POST", this.url.true);
            xhr.setRequestHeader("x-csrf-token", "{{csrf_token()}}")
            xhr.responseType = "json";
        }

        _initListeners(resolve, reject, file) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't Upload File : ${file.name}.`;
            xhr.addEventListener("error", () => reject(genericErrorText));
            xhr.addEventListener("abort", () => reject());
            xhr.addEventListener("load", () => {
                const response = xhr.response;
                if (!response || response.error) {
                    return reject(response && response.error ? response.error
                        .message : genericErrorText);
                }
                resolve({
                    default: response.url,
                });
            });

            if (xhr.upload) {
                xhr.upload.addEventListener("progress", (evt) => {
                    if (evt.lengthComputable) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                });
            }
        }

        _sendRequest(file) {
            const data = new FormData();
            data.append("upload", file);
            this.xhr.send(data)
        }
    }

    function simpleUploadAdapterPlugin(editor) {
        editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader);
        };
    }

    ClassicEditor
        .create(document.querySelector('#editor'), {
            extraPlugins: [simpleUploadAdapterPlugin],
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    '|',
                    'fontSize',
                    'fontColor',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'codeBlock',
                ]
            },
            language: {
                ui: 'fa',
                content: 'fa',
            },
            table: {
                contentToolbar: [
                    'tableClumn',
                    'tableRow',
                    'mergeTableCell',
                ]
            },
        })
        .then(editor => {
            console.log('Editor was intialized', editor);
        })
        .catch(error => {
            console.error(error.stack);
        });
});
