jQuery (document).ready(function () {
    $("#predajBtn").click(function (e){
        e.preventDefault();

        let file_temp =$("#predajaZadatka input").val();

        if (file_temp.includes('.png') || file_temp.includes('.jpg') || file_temp.include ('.jpeg'))
        $("#predajaZadatka").submit();
    }else {
        alert('Datoteka mora biti PNG, JPG ili JPEG');
    });
});