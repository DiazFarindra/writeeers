<style>
    .area {
        width: 20%;
        height: 20%;
        position: absolute;
        border: 4px dashed #000;
        background-image: url('https://image.flaticon.com/icons/svg/864/864388.svg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: 64px 64px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        filter: alpha(opacity=50);
        -khtml-opacity: 0.5;
        -moz-opacity: 0.5;
        opacity: 0.5;
        text-align: center;
    }

    .area:hover,
    .area.dragging,
    .area.uploading {
        filter: alpha(opacity=100);
        -khtml-opacity: 1;
        -moz-opacity: 1;
        opacity: 1;
    }

    .area input {
        width: 400%;
        height: 100%;
        margin-left: -300%;
        border: none;
        cursor: pointer;
    }

    .area input:focus {
        outline: none;
    }
</style>

<script>
    var upload = document.getElementById('upload');

function onFile() {
    var me = this,
            file = upload.files[0],
            name = file.name.replace(/.[^/.]+$/, '');
        console.log('upload code goes here', file, name);
    }

    upload.addEventListener('dragenter', function (e) {
        upload.parentNode.className = 'area dragging';
    }, false);

    upload.addEventListener('dragleave', function (e) {
        upload.parentNode.className = 'area';
    }, false);

    upload.addEventListener('dragdrop', function (e) {
        onFile();
    }, false);

    upload.addEventListener('change', function (e) {
        onFile();
    }, false);

    if (file.type === 'audio/mp3' || file.type === 'audio/mpeg') {
        if (file.size < (3000 * 1024)) {
            upload.parentNode.className = 'area uploading';
        } else {
            window.alert('File size is too large, please ensure you are uploading a file of less than 3MB');
        }
    } else {
        window.alert('File type ' + file.type + ' not supported');
    }
</script>
