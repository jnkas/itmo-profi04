var pos = 0, test, test_status, picture, question, choice, choices, chA, chB, chC, correct = 0;
var pictures = ["porrige.jpeg", "ataman.jpeg", "face.png", "sorcerer.jpeg", "finger.jpeg"];
var questions = [
    [ " - Что это? Каша, что ли?", " - Солянка, сэр.", " - Овсянка, сэр.", " - Подлянка, сэр.", "B" ],
	[ " - Попандопуло, обратись ко мне! - Можно. Пан атаман Грициан... ", "эпический", "нордический", "Таврический", "C" ],
	[ "- Что у вас с лицом?", " - Корпоратив отметили.", " - В Астории поужинал.", " - Жена невовремя вернулась.", "B" ],
	[ " - Вы привлекательны, я чертовски привлекателен. Чего зря время терять? В полночь жду. Ну как, придёте?  - И не подумаю. А ещё пожалуюсь мужу — и он …", "превратит вас в крысу.", "подаст на вас в суд.", "врежет вам по наглой морде.", "A"],
    [" - С такими я не танцую! (с) Этим жестом Тося намекает на то, что ", "у Ильи руки-крюки.", "у Ильи проблемы с потенцией.", "Илье не мешало бы быть повежливее.", "C"]
];
function _(x){
	return document.getElementById(x);
}
function renderQuestion(){
	test = _("test");
	if(pos >= questions.length){
		test.innerHTML = "<h2>Верных ответов: " + correct + " из " + questions.length + "</h2>";
		_("test_status").innerHTML = "Тест завершен.";
        picture.src = "";
		pos = 0;
		correct = 0;
        return false;
	}
    
	_("test_status").innerHTML = "Вопрос № "+(pos+1);
    picture = document.getElementById('picture');
    picture.src = pictures[pos];
    question = questions[pos][0];
	chA = questions[pos][1];
	chB = questions[pos][2];
	chC = questions[pos][3];
	test.innerHTML = "<h3>"+question+"</h3>";
    test.innerHTML += "<input type='radio' name='choices' value='A'> "+chA+"<br>";
	test.innerHTML += "<input type='radio' name='choices' value='B'> "+chB+"<br>";
	test.innerHTML += "<input type='radio' name='choices' value='C'> "+chC+"<br><br>";
	test.innerHTML += "<button onclick='checkAnswer()'>Ответить</button>";
}
function checkAnswer(){
	choices = document.getElementsByName("choices");
	for(var i=0; i<choices.length; i++){
		if(choices[i].checked){
			choice = choices[i].value;
		}
	}
	if(choice == questions[pos][4]){
		correct++;
	}
	pos++;
	renderQuestion();
}
window.addEventListener("load", renderQuestion, false);