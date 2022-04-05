function loadActions() {
    var register = new Array('-- Seleccione una opción --', 'Movilidades');
    var consult = new Array('-- Seleccione una opción --', 'Movilidades', 'Convenios', 'Instituciones');

    var allActions = [
        [],
        register,
        consult,
    ];

    var main_options = document.getElementById('c_o_actions')
    var main_options_value = main_options[c_o_actions.selectedIndex].value
    var sec = document.getElementById('c_o_about_what')

    if (main_options_value != 0) {
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
        //coloco un guión en la única opción que he dejado
        sec.options[0].value = "-- Seleccione una opción --"
        sec.options[0].text = "-- Seleccione una opción --"
    }
    sec.options[0].selected = true
}