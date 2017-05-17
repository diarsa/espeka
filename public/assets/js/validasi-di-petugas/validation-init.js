var Script = function () {

//    $.validator.setDefaults({
//        submitHandler: function() { }
//    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#validpetugas").validate({
            rules: {
                nama: "required",
                jmlobjek: {
                    required: true,
                    minlength: 0
                },
                jmljk1: {
                    required: true,
                    equalTo: "#jmlobjek"
                },
                jmljk2: {
                    required: true,
                    equalTo: "#jmlobjek"
                },
                agree: "required"
            },
            messages: {

                jmlobjek: {
                    required: "Harus isi jumlah ini "
                }
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();
