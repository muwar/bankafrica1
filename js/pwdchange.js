  function save() {

                                                    var opwd = document.getElementById("opwd").value;
                                                    var npwd = document.getElementById("npwd").value;
                                                    var cnpwd = document.getElementById("cnpwd").value;
                                                    //  alert(npwd);
                                                    if ((opwd === '') || (npwd === '') || (cnpwd === '')) {
                                                        alert("All fields are compulsory. Fill the spaces please")
                                                    }
                                                    else if ((npwd !== cnpwd)) {
                                                        alert("Error: These passwords are not consistent. Confirm the new password");
                                                    }
                                                    else if ((opwd === npwd) && (npwd === cnpwd)) {
                                                        alert("The old and new passwords are the same. No changes will be done");
                                                    }
                                                    else {
                                                        $.ajax({
                                                            type: "GET",
                    
                                                            url: "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=site/changepwd" +
                                                                    "&opwd=" + opwd +
                                                                    "&npwd=" + npwd +
                                                                    "&cnpwd=" + cnpwd
                                                                    ,
                                                            data: "", //ProposedSites
                                                            cache: false,
                                                            success: function(data) {
                                                                if (data == 'true') {
                                                                    alert('Password change effected')
                                                                    window.location = "http://" + document.getElementById("url").value + "/bankafrica1/index.php?r=site/profile";
                                                                }
                                                                else if (data == 'incorrect') {
                                                                    alert('The password provided is not consistent with the password that has been in use with this account. Recheck "Old Password"');
                                                                }
                                                                else {
                                                                    alert("Failure: Data Could Not Be Saved. Try Again.");
                                                                }
                                                            },
                                                            error: function(data) {
                                                                alert("Error Sending Data.");
                                                            }
                                                        });
                                                    }
                                                }