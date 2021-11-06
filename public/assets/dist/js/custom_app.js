$(document).ready(function(){
    $('.f-r-mt').on('submit',function(event){
        event.preventDefault;
        if (!$('#remember-me').is(':checked')) {
            create_toast('Accept Privacy Policy.');
            return false;
        }
    });
    $('.toastify').hide();
});
function create_toast(text){
    $('.toastify').show();
    $('.toastify').html(text);
    setTimeout(function(){ $('.toastify').hide(); }, 3000);
}