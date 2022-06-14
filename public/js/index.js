function loadActions() {
    var listaAcciones = {
        registrar: ['Movilidad'],
        consultar: ['Convenio', 'Institucion', 'Movilidad']
    }

    var main_option = document.getElementById('c_o_actions')
    var sec_option = document.getElementById('c_o_about_what')
    var main_option_selected = main_option.value

    sec_option.innerHTML = '<option value="">-- Seleccione una opción --</option>'

    if (main_option_selected != "") {

        main_option_selected = listaAcciones[main_option_selected]


        main_option_selected.forEach(function (action) {
            let opcion = document.createElement('option')
            opcion.value = action.toLowerCase()
            opcion.text = action
            sec_option.appendChild(opcion)
        });
    }
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

function countCharsOb(obj) {
    document.getElementById("charNumOb").innerHTML = obj.value.length + '/600';
}

function countCharsAl(obj) {
    document.getElementById("charNumAl").innerHTML = obj.value.length + '/600';
}