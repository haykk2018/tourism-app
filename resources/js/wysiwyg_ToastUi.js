import Editor from '@toast-ui/editor';
// import '@toast-ui/editor/dist/toastui-editor';
// import '@toast-ui/editor/dist/toastui-editor-viewer';
import '@toast-ui/editor/dist/toastui-editor.css';
import '@toast-ui/editor/dist/theme/toastui-editor-dark.css';

const editor = new Editor({
    el: document.querySelector('#editor'),
    previewStyle: 'vertical',
    height: '500px',
    // initialValue: content,
    theme: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "")
});

const viewer = Editor.factory({
    el: document.querySelector('#viewer'),
    viewer: true,
    height: '500px',
    // initialValue: content,
    theme: (window.matchMedia("(prefers-color-scheme: dark)").matches ? "" : "")
});
