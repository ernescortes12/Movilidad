function loadActions() {
    var register = new Array('-- Seleccione una opción --', 'Movilidad');
    var consult = new Array('-- Seleccione una opción --', 'Movilidad', 'Convenio', 'Institución');

    var allActions = [
        [],
        register,
        consult,
    ];

    var main_options = document.getElementById('c_o_actions')
    var main_options_value = main_options[c_o_actions.selectedIndex].value
    var sec = document.getElementById('c_o_about_what')

    if (main_options_value != "") {
        actions = allActions[main_options_value]
        num_actions = actions.length
        sec.length = num_actions
        for (i = 0; i < num_actions; i++) {
            sec.options[i].value = actions[i]
            sec.options[i].text = actions[i]
        }
    }
    else {
        sec.length = 1
        sec.options[0].value = "-- Seleccione una opción --"
        sec.options[0].text = "-- Seleccione una opción --"
    }
    sec.options[0].selected = true
}

function activateNacInt() {
    var main_option = document.getElementById('actions').value
    var sec_option = document.getElementById('about_what').value
    var third_option = document.getElementById('nacoInt')

    if (main_option != "" && sec_option != "") {
        if (main_option == "registrar" && sec_option == "convenios") {
            third_option.setAttribute('title', 'Solo se habilitará para registro de Movilidades o Consultas en general');
            third_option.disabled = true;
        } else if (main_option == "registrar" && sec_option == "instituciones") {
            third_option.setAttribute('title', 'Solo se habilitará para registro de Movilidades o Consultas en general')
            third_option.disabled = true;
        }
        else {
            third_option.removeAttribute('title');
            third_option.disabled = false;
        }
    } else {
        third_option.setAttribute('title', 'Solo se habilitará para registro de Movilidades o Consultas en general')
        third_option.disabled = true;
    }
}

function activateEntSal() {
    var main_option = document.getElementById('actions').value
    var sec_option = document.getElementById('about_what').value
    var fourth_option = document.getElementById('entSal')

    if (main_option != '' && sec_option != '') {
        if (main_option == 'registrar' && sec_option == 'movilidad') {
            fourth_option.removeAttribute('title');
            fourth_option.disabled = false;
        } else if (main_option == 'consultar' && sec_option == 'movilidad') {
            fourth_option.removeAttribute('title');
            fourth_option.disabled = false;
        } else {
            fourth_option.setAttribute('title', 'Solo se habilitará en registro y consulta de Movilidades')
            fourth_option.disabled = true;
        }
    } else {
        fourth_option.setAttribute('title', 'Solo se habilitará en registro y consulta de Movilidades')
        fourth_option.disabled = true;
    }


}

function messageNacInt() {
    var third_option = document.getElementById('nacoInt')
    third_option.setAttribute('title', 'Solo se habilitará para registro de Movilidades o consultas en general')
}

function messageEntSal() {
    var fourth_option = document.getElementById('entSal')
    fourth_option.setAttribute('title', 'Solo se habilitará en registro y consulta de Movilidades')
}

function activateDegree(option, title) {
    if (option != "") {
        if (option == "Docente") {
            title.removeAttribute('title')
            title.disabled = false;
        } else {
            title.setAttribute('title', 'Solo se habilitará para Docentes')
            title.disabled = true;
        }
    } else {
        title.setAttribute('title', 'Solo se habilitará para Docentes')
        title.disabled = true;
    }
}

function activateDegreeMIE() {
    var option = document.getElementById('mie_adminstudoc').value
    var titulo = document.getElementById('mie_titulos')
    activateDegree(option, titulo)
}

function activateDegreeMIS() {
    var option = document.getElementById('mis_adminstudoc').value
    var titulo = document.getElementById('mis_titulos')
    activateDegree(option, titulo)
}

function activateDegreeMNE() {
    var option = document.getElementById('mne_adminstudoc').value
    var titulo = document.getElementById('mne_titulos')
    activateDegree(option, titulo)
}

function activateDegreeMNS() {
    var option = document.getElementById('mns_adminstudoc').value
    var titulo = document.getElementById('mns_titulos')
    activateDegree(option, titulo)
}


function onloadLogFuncs() {
    messageEntSal()
    messageNacInt()
}