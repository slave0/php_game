
try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

function ajax(url, method, data, elem_class) {
            var btn = $(this);
            $.ajax({
                method: "GET",
                url: url,
                dataType: "json",
                data: data,
                /*{
                    "name": btn.attr('name'),
                },*/
                success: function(html) {
                    $(elem_class).html(html);
                },
                error: function(er) {
                    console.log(er);
                }
            });
}



class Action {

    event_name;

    constructor(elem) {
        this._elem = elem;
        elem.onclick = this.onClick.bind(this); // (*)
    }

    start() {
        window.location.href = '/game';
        return false;
    }

    move() {
        let url = '/move';
        let method = "POST";
        let data = {
            "action": this.event_name,
        };
        let elem_class = ".board-info";
        return ajax(url, method, data, elem_class);
    }


    onClick(event) {
        let action = event.target.dataset.action;
        this.event_name = event.target.name;
        if (action) {
            this[action]();
        }
    }
}

let action_menu = document.querySelector(".action-menu");
if (action_menu) {
    new Action(action_menu);
}
