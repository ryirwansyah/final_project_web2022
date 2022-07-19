function sweet (kali){
        swal("Good job!",kali, "success");
}
function sweet1 (kali,kali2){
        swal(kali+" "+kali2);
}
function sweet2 (txt){
        swal({   title: "Apakah anda yakin ",   text: "Ingin"+txt+"",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){   swal("Deleted!", "Your imaginary file has been deleted.", "success"); });
}
function sweet3 (){
        swal({   title: "Are you sure?",   text: "You will not be able to recover this imaginary file!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   cancelButtonText: "No, cancel plx!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     swal("Deleted!", "Your imaginary file has been deleted.", "success");   } else {     swal("Cancelled", "Your imaginary file is safe :)", "error");   } });
}
function sweet4 (){
        swal({   title: "Ajax request example",   text: "Submit to run ajax request",   type: "info",   showCancelButton: true,   closeOnConfirm: false,   showLoaderOnConfirm: true, }, function(){   setTimeout(function(){     swal("Ajax request finished!");   }, 2000); });
}