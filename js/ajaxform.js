$(document).ready(function () {
    $("#formCV").submit(function (event) {
        event.preventDefault();
        let email = $("#mailAddress").val();
        let subject = $("#subject").val();
        let message = $("#mailContent").val();
        let submit = $("#submitMail").val();
        $(".testAjax").load("email.php", {
            mailAddress: email,
            subject: subject,
            mailContent: message,
            submitMail: submit
        }, function() {
            $.ajax({
                url : 'email.php',
                type: 'POST',
                success: function() {
                    alert("Votre mail a été envoyé");
                },
                error: function() {
                    let errorMsg;
                    errorMsg = xhttp.status + " : " + xhttp.statusText;
                    alert(errorMsg);
                }
            })
/*             let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert('Mail envoyé');
               } else {
                   let errorMsg;
                   errorMsg = xhttp.status + xhttp.statusText;
                   alert(errorMsg);
               }
            };
            xhttp.open("POST", "email.php", true);
            xhttp.send(); */
        });
    })
})