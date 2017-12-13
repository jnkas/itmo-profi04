//Карты
var cards = [
    {
        name: "chicken",
        img: "images/chicken.png"
    },
    {
        name: "cow",
        img: "images/cow.png"
    },
    {
        name: "deer",
        img: "images/deer.png"
    },
    {
        name: "fox",
        img: "images/fox.png"
    },
    {
        name: "goat",
        img: "images/goat.png"
    },
    {
        name: "hedge",
        img: "images/hedge.png"
    },
    {
        name: "pig",
        img: "images/pig.png"
    },
    {
        name: "snake",
        img: "images/snake.png"
    }
]

//Делаем по паре карт
var cardsDouble = cards.slice(0);
for (var i = 0; i < cards.length; i++) {
    cardsDouble.push(cards[i]);
}
//Перемешиваем карты
function shuffleCards(arr) {
    for (var i = arr.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
    }
}
shuffleCards(cardsDouble);
//console.log(cardsDouble);

//Рисуем поле
var table = "<table id=\"cardTable\"><tr>";
for (var i = 0; i < cardsDouble.length; i++){
    if (i !==1 && (i+1) % 4 == true) {
        table = table + "</tr><tr>"
        }
    var newcard = "<td class=\"" + cardsDouble[i].name + "\" data-status=\"closed\"><img src=\"" + cardsDouble[i].img + "\"></td>" 
    table = table + newcard;
}
table = table + "</tr></table>";
document.getElementById("game").innerHTML = (table);

//Игра
var cardClicks = 0;
var $openCard;
var openCardClass;
var canClick = "yes";
var gameOver = "<img src=\"images/gameover.jpg\" id=\"gameOver\">";
var attempts = 0;
var closedCards = $("#cardTable td").attr("data-status","closed").length;

cardTable.addEventListener("click", showCard, false);

function showCard(e){     
    if($(e.target).attr("data-status") === "closed" && canClick === "yes") {
        if (cardClicks === 0) {
            $openCard = $(e.target);
            openCardClass = $(e.target).attr("class");
            $(e.target).children().css("visibility","visible");
            $(e.target).attr("data-status","open");
            cardClicks++;  
        }
        else {
            attempts++;
            $("#attempts").text("Попыток: " + attempts);
            
            if ($(e.target).attr("class") === openCardClass) {
                $(e.target).children().css("visibility","visible");
                $(e.target).attr("data-status","done");
                $openCard.attr("data-status","done");
                closedCards = closedCards - 2;
                    if (closedCards === 0) {
                        var result = "";
                        if (attempts < 10) {
                                result = "Великолепно!";
                              }
                        else if (attempts < 20) {
                                result = "Замечательно!";
                               }
                        else if (attempts < 30) {
                                result = "Хорошо!";
                               }
                        else {
                                result = "Неплохо!";
                            }
                        $("#attempts").text("Результат: " + result).css({color:"red", opacity: 0.0}).animate({opacity: 1.0},1000);
                        $("button").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},1000);
                };
                //cardClicks ++;
            }
            else {
                if (openCardClass === "fox" && $(e.target).attr("class") === "chicken" || openCardClass === "chicken" && $(e.target).attr("class") === "fox") {
                    $(e.target).children().css("visibility","visible");
                    $(e.target).attr("data-status","open");
                    $("#cardTable").children().fadeOut(2000);
                    setTimeout(function(){
                        $("#cardTable").replaceWith(gameOver);
                        $("#gameOver, #gameOverText").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},1000);
                        $("#attempts").text("Игра окончена!").css({color:"red", opacity: 0.0}).animate({opacity: 1.0},1000);
                        $("button").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},1000);
                               },1000);
                }
                
                else {
                $(e.target).children().css("visibility","visible");
                $(e.target).attr("data-status","open");
                
                canClick = "no";
                function hideCards(){
                    $("td").each(function(){
                        if ($(this).attr("data-status") == "open") {
                            $(this).children().css("visibility","hidden");
                            $(this).attr("data-status","closed");
                        }
                    })
                }
                canClick = "yes";
                setTimeout(hideCards, 1000);
            }
            }
            cardClicks = 0;
            openCardClass = "";
            //console.log(closedCards);
            
        }
    }
};