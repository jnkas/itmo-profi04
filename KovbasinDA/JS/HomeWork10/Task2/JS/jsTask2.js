function Human(name, age, sex, interests) {
    this.name = name;
    this.age = age;
    this.sex = sex;
    this.interests = interests;

    this.groupingInf = function () {
        console.log("Человек: " + this.name + ". Возраст: " + this.age + " лет. Пол: " + this.sex
        + " Интересы: " + this.interests);
    }
}

function Student(name, age, sex, interests, university) {
    Human.call(this, name, age, sex, interests);

    this.university = university;

    this.groupingInf = function () {
        console.log("Человек: " + this.name + ". Возраст: " + this.age + " лет. Пол: " + this.sex
            + "" + " Интересы: " + this.interests + " Обучается в " + this.university);
    }
}