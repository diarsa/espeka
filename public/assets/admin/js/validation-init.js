var Script = function () {

//    $.validator.setDefaults({
//        submitHandler: function() { alert("submitted!"); }
//    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                dibutuhkan: "required",
                nama_objek: "required",
                alamat: "required",
                keterangan: "required",
                status: "required",
                image: "required",
                image2: "required",
                image3: "required",

                //untuk input wisatawan di admin
                //nama: "required",
                //negara: "required",
                //tujuan: "required",
                //kunjungan: "required",
                //--untuk input wisatawan di admin

                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                dibutuhkan: "Kolom ini dibutuhkan",
                nama_objek: "Masukkan nama objek wisata",
                alamat: "Masukkan alamat objek wisata",
                keterangan: "Masukkan deskripsi singkat objek wisata",
                status: "Silakan pilih salah satu",
                image: "Masukkan gambar yang valid",
                image2: "Masukkan gambar yang valid",
                image3: "Masukkan gambar yang valid",

                //untuk input wisatawan di admin
                nama: "Nama dibutuhkan",
                negara: "Negara dibutuhkan",
                tujuan: "Tujuan dibutuhkan",
                kunjungan: "Kunjungan dibutuhkan",
                //--untuk input wisatawan di admin

                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                agree: "Please accept our policy"
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
