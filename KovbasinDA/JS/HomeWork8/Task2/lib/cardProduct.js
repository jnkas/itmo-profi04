;(function () {
    window.currProduct = {
        vendorCode: "",
        nameProd: "",
        price: "",
        currency: "",
        foto: "",
        descriptionProd: "",

        cardProduct: function (divId) {
            /*Задаем основные параметры переданного div*/
            var currDiv = document.getElementById(divId);
            currDiv.style.height = "500px";
            currDiv.style.width = "500px";
            currDiv.style.background = "gray";
            currDiv.style.display = "flex";
            currDiv.style.flexDirection = "column";
            currDiv.style.justifyContent = "center";
            currDiv.style.alignItems = "center";
            currDiv.style.border = "2px groove black";
            currDiv.style.margin = "10px";

            /*Название модели*/
            var h3Caption = document.createElement("h3");
            h3Caption.innerHTML = this.nameProd;
            h3Caption.width = "80%";
            currDiv.appendChild(h3Caption);

            /*Картинка*/
            var imgProd = document.createElement("img");
            imgProd.src = this.foto;
            imgProd.style.width = "80%";
            currDiv.appendChild(imgProd);

            /*Артикул и цена в одном div*/
            var divMainInf = document.createElement("div");
            divMainInf.style.width = "80%";
            divMainInf.style.display = "flex";
            divMainInf.style.flexDirection = "row";
            divMainInf.style.alignItems = "center";
            divMainInf.style.justifyContent = "center";
            divMainInf.style.margin = "10px";
            currDiv.appendChild(divMainInf);
            var vendorCodeSpan = document.createElement("span");
            vendorCodeSpan.innerHTML = "Артикул: " + this.vendorCode;
            vendorCodeSpan.style.width = "50%";
            vendorCodeSpan.style.textAlign = "center";
            divMainInf.appendChild(vendorCodeSpan);
            var priceSpan = document.createElement("span");
            priceSpan.innerHTML = "Цена: " + this.price + this.currency;
            priceSpan.style.width = "50%";
            priceSpan.style.textAlign = "center";
            divMainInf.appendChild(priceSpan);

            /*Описание*/
            var descriptProdP = document.createElement("p");
            descriptProdP.innerHTML = this.descriptionProd;
            descriptProdP.style.width = "90%";
            currDiv.appendChild(descriptProdP);
        }
    };
}());