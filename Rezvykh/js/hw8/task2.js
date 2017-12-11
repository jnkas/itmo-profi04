;(function(){

window.shop = {
	itemData: function(domElement, data) {
		var de = document.getElementById(domElement);
		var strItemData = "";
		var nameItem = data.name;
		var articulItem = data.articul;
		var imagesItem = "";
		var descroptionItem = "<p>" + data.descroption + "</p>";
		var featuresItem = "";
		var priceItem = "<p>Цена: " + data.price + "руб.</p>";
		var stockItem = "<p>Остаток на складе: " + data.stock + "шт.</p>";

		if (Object.keys(data.images).length > 1) {
			for (img in data.images) {
				var value = data.images[img];
				imagesItem += "<img class ='rounded img-fluid' src='" + value + "'>";
			}
		} else if (Object.keys(data.images).length === 1){
			imagesItem += "<img class ='rounded img-fluid' src='" + data.images.img1 + "'>";
		} else {
			imagesItem += "Фотография для товара отсутсвует";
		}

		if (Object.keys(data.features).length > 0) {
			featuresItem += "<h3>Характеристики</h3><ul>";
			for (feature in data.features) {
				var value  = data.features[feature];
				featuresItem += "<li>" + feature + ": " + value + "</li>";
			}
			featuresItem += "</ul>";
		}
		strItemData += "<h1>" + nameItem + "</h1>" + "Артикул: " + articulItem + "<div class='container'><div class='row'><div class='col'>" + imagesItem + "</div><div class='col'>" + data.descroption + featuresItem + "</div><div class='col'>" + priceItem + stockItem + "</div></div>";
		de.innerHTML = strItemData;
	}
}

}());
