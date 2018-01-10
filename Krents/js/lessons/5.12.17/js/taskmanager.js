;window.TaskManager = function (div) {
    this.div = div;
    this.id = 0;
};

TaskManager.prototype.getId = d = function (name) {
    return this.id++;
};
TaskManager.prototype.addTask = function (name) {
    var id = this.getId();
    var task = new Task(id, name);
    this.div.appendChild(task.view());
};

function Task(id, title) {
    this.id = id;
    this.title = title;
    this.complete = false;
}

Task.prototype.view = function () {
    var element = document.createElement('div');
    element.classList.add('checkbox');
    var label = document.createElement('label');

    label.setAttribute('for', 'label-' + this.id);
    var checkbox = document.createElement('input');
    checkbox.setAttribute('type', 'checkbox');
    checkbox.setAttribute('id', this.id);
    checkbox.addEventListener('change', this.done.bind(this));
    label.innerText = this.title;
    label.appendChild(checkbox);

    element.appendChild(label);
    return element;
};

Task.prototype.done = function (event) {
    var parent = event.target.parentNode;
    if (event.target.checked) {
        parent.classList.add('complete');
    }
    else {
        parent.classList.remove('complete');
    }
};