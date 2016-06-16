jQuery.extend(jQuery.validator.messages, {
    required: "Escribe algo el campo es requierio.",
    remote: "Please fix this field.",
    email: "Por favor la puñetera dirección tiene que ser de la forma xxx@xxx.xxx .",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Que sean IGUALES.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Tas pasao ¿TÚ VAS ACORDARTE DE TODO ESO? no mas que {0} characteres."),
    minlength: jQuery.validator.format("Tas quedao cortico cortico pon al menos {0} characteres que no se cobra."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characteres long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});