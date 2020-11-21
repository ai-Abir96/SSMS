$(document).ready(function(){

  $("#next-1").click(function(err){
     err.preventDefault();
    $("#imageError").html('');
    $("#firstnameError").html('');
    $("#lastnameError").html('');
    $("#nidnumberError").html('');
    $("#birthdateError").html('');


    var firstname = $("#firstname").val();
    var firstnamepattern = new RegExp("^[a-zA-Z]+$");

    var lastname = $("#lastname").val();
    var lastnamepattern = new RegExp("^[a-zA-Z]+$");

    var nidnumber = $("#nidnumber").val();
    var nidnumberpattern = new RegExp("^[0-9]+$");

    var birthdate = $("#birthdate").val();
    var today = new Date();
    var birthDate = new Date(birthdate);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m<0 || (m===0 && today.getDate()<birthDate.getDate())){
      age --;
    }


    var imagext = $("#image").val().split('.').pop().toLowerCase();
    var imagesize = $("#image")[0].files[0].size;
    var imagelength = $("#image")[0].files.length;

    //alert(imagelength);

        // ====Image  validation====
    if ($.inArray(imagext, ['png','jpg','jpeg']) == -1){$("#imageError").html("* Image is Required.Supported type[png,jpg,jpeg]");return false;}
    else if (imagesize>1000000){$("#imageError").html("* Image is Larger than 1mb.");return false;}
    else if (imagelength===0){$("#imageError").html("* Image is required.");return false;}
        // ====first name validation====
    else if(firstname==""){$("#firstnameError").html("* First Name is Required.");return false;}
    else if (!firstnamepattern.test(firstname)){$("#firstnameError").html("* only [A-Z a-z] is allowed");return false;}
    else if (firstname.length<3 || firstname.length>32) {$("#firstnameError").html("* First Name must be of 3 - 32 charecters only.");return false;}

        // ====last name validation====
    else if (lastname==""){$("#lastnameError").html("* Last Name is Required.");return false;}
    else if (!lastnamepattern.test(lastname)){$("#lastnameError").html("* only [A-Z a-z] is allowed");return false;}
    else if (lastname.length<3 || lastname.length>16) {$("#lastnameError").html("* Last Name must be of 3 - 32 charecters only.");return false;}

        // ==== NID Number validation====
    else if (nidnumber==""){$("#nidnumberError").html("* NID number is Required.");return false;}
    else if (!nidnumberpattern.test(nidnumber)){$("#nidnumberError").html("* only [0-9] is allowed");return false;}
    else if (nidnumber.length<10 || lastname.length>17) {$("#nidnumberError").html("* NID number must be of 10-17 Digits only.");return false;}

    else if (birthdate==""){$("#birthdateError").html("* Birth Date is Required.");return false;}
    else if (age<21){$("#birthdateError").html("* You Must Need to be atleast 21");return false;}

    else {
      $("#second").show();
      $("#first").hide();
      $("#progressBar").css("width","66.66%");
      $("#progressText").html("Step-2");
     }


  });

  $("#next-2").click(function(err){

    err.preventDefault();

    $("#phonenumberError").html('');
    $("#phonenumber2Error").html('');
    $("#address1Error").html('');
    $("#address2Error").html('');



    var phonenumber = $("#phonenumber").val();
    var phonenumberpattern = new RegExp("^[0-9]+$");

    var phonenumber2 = $("#phonenumber").val();
    var phonenumber2pattern = new RegExp("^[0-9]+$");

    var address1 = $("#address1").val();

    var address1 = $("#address2").val();

    if(phonenumber==""){$("#phonenumberError").html("* Phone Number is Required.");return false;}
    else if(!phonenumberpattern.test(phonenumber)){$("#phonenumberError").html("* Only number is allowed.");return false;}
    else if(phonenumber.length != 11){$("#phonenumberError").html("* 11 Digit Phone Number is Required.");return false;}

    else if(!phonenumber2pattern.test(phonenumber2)){$("#phonenumber2Error").html("* Only number is allowed.");return false;}
    else if(phonenumber2.length != 11){$("#phonenumber2Error").html("* 11 Digit Phone Number is Required.");return false;}

    else if(address1==""){$("#address1Error").html("* Present Address is Required.");return false;}

    else if(address2==""){$("#address2Error").html("* Permanent Address is Required.");return false;}

    else{
    $("#third").show();
    $("#second").hide();
    $("#progressBar").css("width","100%");
    $("#progressText").html("Step-3");
    }

  });

  $("#submit1").click(function(err){

    err.preventDefault();

    $("#enameError").html('');
    $("#ephonenumberError").html('');
    $("#ephonenumber2Error").html('');
    $("#relationError").html('');
    $("#raddressError").html('');


    var ename = $("#ename").val();
    var ernamepattern = new RegExp("^[A-Za-z]+$");

    var ephonenumber =$("#ephonenumber").val();
    var ephonenumberpattern = new RegExp("^[0-9]+$");

    var ephonenumber2 =$("#ephonenumber2").val();
    var ephonenumber2pattern = new RegExp("^[0-9]+$");

    var relation =$("#relation").val();
    var relationpattern = new RegExp("^[A-Za-z -]+$");

    var address =$("#address").val();


    if(ename == ""){$("#usernameError").html(" * Name is Required"); return false;}
    else if(!ernamepattern.test(ename)){$("#usernameError").html(" *Only A-Z a-z is Allowed"); return false;}
    else if(ename.length>64){$("#usernameError").html(" *Only 64 charecters are Allowed"); return false;}

    else if(ephonenumber == ""){$("#ephonenumberError").html(" * Phone number is Required"); return false;}
    else if(!ephonenumberpattern.test(ephonenumber)){$("#ephonenumberError").html(" *Only number is Allowed"); return false;}
    else if(ephonenumber.length !=11){$("#ephonenumberError").html(" *Only 11 Digit are Allowed"); return false;}

    else if(!ephonenumber2pattern.test(ephonenumber2)){$("#ephonenumber2Error").html(" *Only number is Allowed"); return false;}
    else if(ephonenumber2.length !=11){$("#ephonenumber2Error").html(" *Only 11 Digit are Allowed"); return false;}

    else if(relation == ""){$("#relationError").html(" * Relationship is Required"); return false;}
    else if(!relationpattern.test(relation)){$("#relationError").html(" *Only Alphabets and - is Allowed"); return false;}
    else if(relation.length !=15){$("#relationError").html(" *Only 15 Digit are Allowed"); return false;}

    else if(address == ""){$("#addressError").html(" * Address is Required"); return false;}
    else{ return true;}

  });



  $("#prev-2").click(function(){
    $("#second").hide();
    $("#first").show();
    $("#progressBar").css("width","33.33%");
    $("#progressText").html("Step-1");

  });


  $("#prev-3").click(function(){
    $("#third").hide();
    $("#second").show();
    $("#progressBar").css("width","66.66%");
    $("#progressText").html("Step-2");

  });


});
