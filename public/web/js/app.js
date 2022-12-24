class Action {
    constructor(elem) {
        this._elem = elem;
        elem.onclick = this.onClick.bind(this); // (*)
    }

    start() {
        alert('старт');
    }


    onClick(event) {
        let action = event.target.dataset.action;
        if (action) {
            this[action]();
        }
    }
}

function action () {
    let button
}
