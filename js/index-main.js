var scrollleft = window.pageXOffset || document.documentElement.scrollLeft;
var scrolltop = window.pageYOffset || document.documentElement.scrollTop;


function checkall(){
    correct = email()
    function email(){
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            alert('Please provide a valid email address');
            return false;
        }
        else{return true}
    }
    correct = password()
    function password(){
        var password = document.getElementById('password');
        var filter = /^[A-Za-z]\w{8,20}$/;
        if(!password.value.match(filter)){
            alert('Please provide a valid password');
            password.style("border-color:red");
            return false;
        }
        else{return true}
    }
    correct = cpass()
    function cpass(){
        var cpassword = document.getElementById('cpassword');

        if(cpassword.value != password.value){
            alert('Passwords do not match. Pls re-enter');
            return false;
        }else{return true}
    }
    correct = birthdate()
    function birthdate(){
        var err = false;
        var birthday = document.getElementById('birthday');
        var bday_num = parseInt(birthday.value);

        if(bday_num<1 && bday_num>31){
            alert('Please provide a valid birthday');
            err =  true;
        }

        var birthmonth = document.getElementById('birthmonth');
        var bmonth_num = parseInt(birthmonth.value);

        if(bmonth_num<1 && bmonth_num>12){
            alert('Please provide a valid birthmonth');
            err = true;
        }

        var birthyear = document.getElementById('birthyear');
        var byear_num = parseInt(birthyear.value);

        if(byear_num<1900 && byear_num>2010){
            alert('Please provide a valid birthday');
            err = true;
        }

        if(err)return false;
        else return true;
    }
    correct = card()
    function card(){
        var cardno = document.getElementById('cardno');
        var card_num = parseInt(cardno.value);
        var filter = /^([0-9]{16})$/;

        if(cardno.value.match(filter)){
            alert('Please provide a valid Card Number');
            err = true;
        }

        var expdate = document.getElementById('expdate');
        var filter = /^([0-1][0-9][/][0-2][0-9])$/;

        if(expdate.value.match(filter)){
            alert('Please provide a valid Card Expiry Date');
            err = true;
        }

        var csc = document.getElementById('csc');
        var filter = /^([0-9]{3})$/;

        if(csc.value.match(filter)){
            alert('Please provide a valid Card CSC Number');
            err=true;
        }
        if(err)return false;
        else return true;
    }
}