$("#controleInscription").validate({
        rules:{
            pseudo:{
                required:true,
                minlength:3,
                maxlength:63
            },
            nom:{
                required:true,
                minlength:2,
                maxlength:63
            },
            prenom:{
                required:true,
                minlength:2,
                maxlength:63
            },
            dateDeNaissance:{
                required:true,
                date:true,
                minlength:10,
                maxlength:63
            },
            mail1:{
                required:true,
                email:true
            },
            mail2:{
                required:true,
                email:true
            },
            adresse:"required",
            telephone:{
                required:true,
                minlength:10
            }
        },
        messages:{
            pseudo: "Votre pseudo dois contenir contenir entre 3 et 63 caratéres",
            nom: "Vos predecesseur n'avais pas ce nom ...",
            prenom: "Vous ne vous prénomé certainement pas comme ça",
            dateDeNaissance: "Etes vous sur d'etres bien née ce jour là?",
            mail1: "Tu ne m'auras pas, il faut rentrer un mail",
            mail2: "Ca ne marche toujours pas tu devrais vraiment rentré un mail",
            adresse: "A moins que tu habites dans une grotte ton adresse n'est pas valide ",
            telephone: "Un numero de telephone comme ça hummmm mais tu viens d'ou?"
        },
        submitHandler: function(form) {
            form.preventdefault();
            //form.submit();
        }
    });//fin du controle de formulaire

/*$("#valider").click(function() {
    $("form[id='controleInscription'").validate({
        rules:{
            pseudo:{
                required: true
                minlength : 3
                maxlength : 63
            },
            nom:{
                required: true
                minlength : 2
                maxlength : 63
            },
            prenom:{
                required: true
                minlength : 2
                maxlength : 63
            },
            dateDeNaissance:{
                required: true
                minlength : 10
                maxlength : 63
            },
            mail1:{
                required: true
                mail: true
            },
            mail2:{
                required: true
                mail: true
            },
            adresse: "required"
            },
            telephone:{
                required: true
                minlength : 10
            }
        },
        messages:{
            pseudo: "Votre pseudo dois contenir contenir entre 3 et 63 caratéres",
            nom: "Vos predecesseur n'avais pas ce nom ...",
            prenom: "Vous ne vous prénomé certainement pas comme ça",
            dateDeNaissance: "Etes vous sur d'etres bien née ce jour là?",
            mail1: "Tu ne m'auras pas, il faut rentrer un mail",
            mail2: "Ca ne marche toujours pas tu devrais vraiment rentré un mail",
            adresse: "A moins que tu habites dans une grotte ton adresse n'est pas valide ",
            telephone: "Un numero de telephone comme ça hummmm mais tu viens d'ou?"
        },
        submitHandler: function(form) {
            submit();
            form.submit();
        }

    });
});

$("form[name='carendfou'").validate({
        rules:{
            pseudo: "required",
            nom: "required",
            dateDeNaissance:"required",
            prenom:{
                required:true,
                minlength:13
                }
        },
        messages:{
            pseudo: "Wrong filling.",
            nom: "Wrong filling.",
            dateDeNaissance:"Wrong filling.",
            prenom:"Wrong filling."
        },
        submitHandler: function(form) {
            submit();
            form.submit();
        }
    });

*/