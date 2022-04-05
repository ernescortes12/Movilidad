function loadActions() {
    var cons_int_or_nac_reg_nac = new Array('-- Seleccione una opción --', 'Convenio', 'Institucion', 'Movilidad')
    var reg_int = new Array('-- Seleccione una opción --', 'Convenio', 'Institucion', 'Movilidad')

    var con_reg_allActions = [
        [],
        cons_int_or_nac_reg_nac,
    ]

    var reg_allActions = [
        [],
        reg_int,
    ]

    // Opciones y valores de los select
    var main = document.getElementById('ori_actions')
    var main_value = main[ori_actions.selectedIndex].value
    var sec = document.getElementById('ori_nac_int')
    var sec_value = sec[ori_nac_int.selectedIndex].value
    var third = document.getElementById('ori_about_what')

    if (main_value == 1) {
        if (sec_value == 1) {
            actions = con_reg_allActions[main_options_value]
            num_actions = actions.length
            third.length = num_actions
            for (i = 0; i < num_actions; i++) {
                third.options[i].value = actions[i]
                third.options[i].text = actions[i]
            }
        } else if (sec_value == 2) {
            actions = reg_allActions[main_options_value]
            num_actions = actions.length
            third.length = num_actions
            for (i = 0; i < num_actions; i++) {
                third.options[i].value = actions[i]
                third.options[i].text = actions[i]
            }
        }

    } else {
        third.length = 1
        //coloco un guión en la única opción que he dejado
        third.options[0].value = "-- Seleccione una opción --"
        third.options[0].text = "-- Seleccione una opción --"
    }
    third.options[0].selected = true
}